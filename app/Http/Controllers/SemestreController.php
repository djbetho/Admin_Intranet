<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\semestre;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $semestre = semestre::paginate();

      return view('semestres.index', compact('semestre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Mostramos un formulario para crear nuevos ejemplos
      $semestre = new semestre;
      return view('semestres.create',['semestre'=>$semestre]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $semestre = semestre::create($request->all());
      return redirect()->route('semestre.index')
      ->with('info','Semestre creado con exito ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $semestre = semestre::find($id);

      return view('semestres.show', compact('semestre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $semestre = semestre::find($id);
          return view('semestres.edit', compact('semestre'));
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
          $semestre = semestre::find($id);
          $semestre->update($request->all());
          return redirect()->route('semestre.index', $semestre->id)
              ->with('info', 'Semestre guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $semestre = semestre::find($id)->delete();

      return back()->with('info', 'Semestre eliminado correctamente');
    }
}
