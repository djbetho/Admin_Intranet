<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecordSolicitud;
class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('page.new_solicitud');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $solicitud = new RecordSolicitud;
        return view('pages.new_solicitud',["solicitud"=>$solicitud]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valores = [
            'rut'       => $request->rut,
            'detalle'   =>$request->detalle,
            'reemplazo' =>$request->reemplazo,
            'fecha'     =>$request->fecha
            ];
            
            if(RecordSolicitud::create($valores)){
                return redirect('/solicitud');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
            $solicitud = RecordSolicitud::find($id);
            return view('pages.edit_solicitud',["solicitud"=>$solicitud]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
