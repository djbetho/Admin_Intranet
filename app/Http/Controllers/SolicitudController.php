<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecordSolicitud;
use App\User;
use App\semestre;
use Mail;
use App\Mail\SendMessage;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Carbon\Carbon;

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


        $detalle  = $request->get('detalle');

        $solicitud = RecordSolicitud::where('rut', '=', auth()->user()->rut)
                                    ->name($detalle)
                                    ->paginate(6);




        return view('pages.index',['solicitud'=>$solicitud] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $actual = Carbon::now();

      $lista     = semestre::where('fecha_ini', '<=',$actual->format('Y-m-d'))
                            ->where("fecha_term",">=",$actual->format('Y-m-d'))->first();

      //Necesito sabaer la cantidad de dias de permisos ya solicitado en este semestre
      $cantidad  =  RecordSolicitud::where('rut', '=', auth()->user()->rut)
                                      ->where('fecha_desde', '<=',$actual->format('Y-m-d'))
                                      ->where("fecha_hasta",">=",$actual->format('Y-m-d'))->get();

            dd($cantidad);


        // Mostramos un formulario para crear nuevos ejemplos
        $solicitud = new RecordSolicitud;

         return view('pages.new_solicitud',['solicitud'=>$solicitud,
                                            'nombre_semestre_actual'=>$lista]);
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

        if($request->fecha_hasta === null){
          $options  = [
              'rut'             =>  $request->rut,
              'detalle'         =>  $request->detalle,
              'fecha_desde'     =>  $request->fecha_desde,
              'fecha_hasta'     =>  $request->fecha_hasta,
              'reemplazo'       =>  $request->reemplazo,
              'cantidad_dias'   =>  '1'
              ];
        }else{
          $options  = [
              'rut'             =>  $request->rut,
              'detalle'         =>  $request->detalle,
              'fecha_desde'     =>  $request->fecha_desde,
              'fecha_hasta'     =>  $request->fecha_hasta,
              'reemplazo'       =>  $request->reemplazo,
              'cantidad_dias'   =>  $difdayin->diffInWeekdays($difdayout)+1
              ];
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

        if($solicitud->save()){
          return redirect('/solicitud')
                ->with('info','Solicitud editada con exito');
        }else{
          return view("pages.edit_solicitud",["solicitud" => $solicitud]);
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
}
