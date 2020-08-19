<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecordSolicitud;
use App\User;
use App\semestre;
use Mail;
use App\Mail\SendMessage;
use App\Mail\AceptadoPermiso;
use App\Mail\RechazadoPermiso;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Carbon\Carbon;
use SweetAlert;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $count_acep = RecordSolicitud::Count('estado')->where('estado','1')->where('rut', '=', auth()->user()->rut)->first();
        $count_pend = RecordSolicitud::Count('estado')->whereNull('estado')->where('rut', '=', auth()->user()->rut)->first();

        if(!$count_acep){
                $suma = 0;
            }else{
                 $suma = $count_acep->count();
            }

          if(!$count_pend){
              $sumaP = 0;
          }else{
               $sumaP = $count_pend->count();
          }
        $actual = Carbon::now();

        //Semestre actual
        $lista     = semestre::where('fecha_ini', '<=',$actual->format('Y-m-d'))
                              ->where("fecha_term",">=",$actual->format('Y-m-d'))->first();


        $detalle  = $request->get('detalle');

        $solicitud = RecordSolicitud::where('rut', '=', auth()->user()->rut)
                                    ->name($detalle)
                                    ->paginate(6);


        return view('pages.index',['solicitud'            => $solicitud,
                                  'nombre_semestre_actual'=> $lista,
                                  'cantidad_per'          => $suma,
                                  'cantidad_p'            => $sumaP]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $actual = Carbon::now();

      //Semestre actual
      $lista     = semestre::where('fecha_ini', '<=',$actual->format('Y-m-d'))
                            ->where("fecha_term",">=",$actual->format('Y-m-d'))->first();

        // Mostramos un formulario para crear nuevos ejemplos
        $solicitud = new RecordSolicitud;

        $datos = RecordSolicitud::where('rut', '=', auth()->user()->rut)->get();

         return view('pages.new_solicitud',['solicitud'=>$solicitud,
                                            'nombre_semestre_actual'=>$lista,
                                          'datos'=>$datos])->with('SolicitudController', $this);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $difdayin = Carbon::parse($request->fecha_desde);
      $difdayout = Carbon::parse($request->fecha_hasta);

      if($request->fecha_hasta == NULL ){
          $lista     = semestre::where('fecha_ini', '<=',$difdayin)->where('fecha_term','>=',$difdayin)->first();


      }else{
          $lista     = semestre::where('fecha_ini', '<=',$difdayin)
                                ->where('fecha_term','>=',$difdayout)->first();
        }


       if(!$lista){

        return back()->with('info','Semestre no esta creado, revise la fechas ingresadas')->withInput();
       }


        if($request->fecha_hasta === null){
          $options  = [
              'rut'             =>  $request->rut,
              'detalle'         =>  $request->detalle,
              'fecha_desde'     =>  $difdayin,
              'fecha_hasta'     =>  $difdayout,
              'reemplazo'       =>  $request->reemplazo,
              'cantidad_dias'   =>  '1',
              'semestre'        =>  $lista->name,
              'ss'              =>  $request->ss
              ];
              $request->cantidad_dias = '1';
        }else{
          $options  = [
              'rut'             =>  $request->rut,
              'detalle'         =>  $request->detalle,
              'fecha_desde'     =>  $difdayin,
              'fecha_hasta'     =>  $difdayout,
              'reemplazo'       =>  $request->reemplazo,
              'cantidad_dias'   =>  $difdayin->diffInWeekdays($difdayout)+1,
              'semestre'        =>  $lista->name,
              'ss'              =>  $request->ss
              ];
            $request->cantidad_dias = $difdayin->diffInWeekdays($difdayout)+1;
        }



            if(RecordSolicitud::create($options )){
              //Busco el usuario con rol de director para enviar el correo con
              //las solicitud de permiso
                $dire_email = User::whereHas("roles", function($q){ $q->where("name", "Director"); })->get('email');



                Mail::to($dire_email)
                  ->cc(auth()->user()->email)
                  ->send(new SendMessage($request));


                return redirect('/solicitud')
                ->with('info','Solicitud creada con exito ');

            }else{
                return view('pages.new_solicitud');

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Muestra un recurso
        $solicitud = RecordSolicitud::find($id);

        return view('pages.show ',['solicitud' => $solicitud ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            // Muestra un formulario para editar un recurso
            $solicitud = RecordSolicitud::find($id);
            return view("pages.edit_solicitud",["solicitud" => $solicitud]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        // Actualizar un recurso específico
        $solicitud = RecordSolicitud::find($id);

        $solicitud->rut = $request->rut;
        $solicitud->detalle = $request->detalle;
        $solicitud->reemplazo = $request->reemplazo;
        $solicitud->fecha_desde = $request->fecha_desde;
        $solicitud->fecha_hasta = $request->fecha_hasta;
        $solicitud->estado = $request->estado;
        $solicitud->observacion = $request->observacion;


        switch ($request->estado) {
          case '1':
            // code...
            if($solicitud->save()){


              Mail::to($solicitud->user->email)->cc('noreply@sanfranciscoasis.cl')->send(new AceptadoPermiso($request));

                return redirect('/workpermit')
                      ->with('info','Solicitud aceptada con exito');


              }else{
                return view("pages.edit_solicitud",["solicitud" => $solicitud]);
              }
            break;
          case '2':
          // code...
          if($solicitud->save()){
            Mail::to($solicitud->user->email)->cc('noreply@sanfranciscoasis.cl')->send(new RechazadoPermiso($request));

              return redirect('/workpermit')
                    ->with('info','Solicitud Rechazada con exito');
            }else{
              return view("pages.edit_solicitud",["solicitud" => $solicitud]);
            }
              break;

          default:
          // code...
          if($solicitud->save()){
              return redirect('/solicitud')
                    ->with('info','Solicitud editada con exito');
            }else{
              return view("pages.edit_solicitud",["solicitud" => $solicitud]);
            }
            break;
        }



    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Elimina un recurso
        RecordSolicitud::destroy($id);
        return redirect('/solicitud')
        ->with('info','Solicitud eliminada con exito');

    }
    public function ValidarPermiso(Request $request)
    {

    if(!isset($request->fecha_hasta)){

      $difdayin = Carbon::parse($request->fecha_desde);
      $lista     = semestre::where('fecha_ini', '<=',$difdayin)->where('fecha_term','>=',$difdayin)->first();
      $cantidad_dias = 1;
    }else{
        $difdayin = Carbon::parse($request->fecha_desde);
        $difdayout = Carbon::parse($request->fecha_hasta);
        $lista     = semestre::where('fecha_ini', '<=',$difdayin)
                              ->where('fecha_term','>=',$difdayout)->first();

      $cantidad_dias = $difdayin->diffInWeekdays($difdayout)+1;
      }


   $count_acep = RecordSolicitud::where('estado','1')->where('rut', '=', auth()->user()->rut)->where('semestre', '=',$lista->name)->get()->sum('cantidad_dias');

          if($count_acep >= $lista->cantidad){
            $count_acep = $count_acep;
            $goce = "Alerta. Ya tienes $count_acep dias de permisos ya aceptados en el $lista->name, Esta nueva  solicitud de ".$cantidad_dias." dias, es sin goce de sueldo" ;
            $alerta = 3;
            $diferencia=$cantidad_dias;
          }elseif($count_acep <= $lista->cantidad){
                $suma_diferencia = $count_acep+$cantidad_dias;

                if($suma_diferencia >= $lista->cantidad){

                  $diferencia = $suma_diferencia-$lista->cantidad;
                  $goce = "Alerta la cantidad de dias que solicitaste (".$cantidad_dias." días) es mayor a la cantidad dias diponibles con goce de sueldo en $lista->name. Actualmente estás solicitando, ".$diferencia." día(s) sin goce de sueldo";
                  $alerta = 2;
                }else{
                  $goce="Alerta la cantidad de dias que solicitaste (".$cantidad_dias." días) es con goce de sueldo";
                  $diferencia ="";
                }

          }

            return "{\"result\":\"ko\",\"error\":\"$goce\",\"ss\":\"$diferencia\"}";

    }


}
