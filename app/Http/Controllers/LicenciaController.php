<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Licencia;
use Carbon\Carbon;
class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $licencias = Licencia::where('rut', '=', auth()->user()->rut)
                            ->paginate(10);

      return view('licencia.index', compact('licencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Mostramos un formulario para crear nuevos ejemplos
      $licencia = new Licencia;
      return view('licencia.create',['$licencia'=>$licencia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $difdayin = Carbon::parse($request->fecha_ini);
      $difdayout = Carbon::parse($request->fecha_term);
      $options  = [
          'rut'                 =>  auth()->user()->rut,
          'nro_licencia'        =>  $request->nro_licencia,
          'fecha_desde'         =>  $difdayin,
          'fecha_hasta'         =>  $difdayout,
          'dias'                =>  $request->dias,
          'estado'             =>  $request->estado


          ];


      $licencia = Licencia::create($options);
      return redirect()->route('licencia.index')
      ->with('info','Licencia ingresada con exito ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $licencia = Licencia::find($id);

      return view('licencia.show', compact('licencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $licencia = Licencia::find($id);
      return view('licencia.edit', compact('licencia'));
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
      $licencia = Licencia::find($id);
      $licencia->update($request->all());
      return redirect()->route('licencia.index', $licencia->id)
          ->with('info', 'Licencia guardada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $licencia = Licencia::find($id)->delete();

      return back()->with('info', 'Licencia eliminada correctamente');
    }
}
