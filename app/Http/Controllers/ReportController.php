<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RecordSolicitud;
use Mail;
use App\Mail\SendMessage;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Carbon\Carbon;






class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::all();
    return view('report.index', compact('users'));
    }


    public function busqueda(Request $request){
      if($request->user_selected == 'all'){
        // $lista_pdf = RecordSolicitud::where('estado','=','1')
        //                               ->whereMonth("fecha_desde",$request->mes)
        //                               ->get();
        $lista_pdf2 = RecordSolicitud::whereMonth("fecha_desde", '=',$request->mes)
                                      ->whereYear("fecha_desde", '=',$request->ano)
                                      ->where('estado','=','1')
                                      ->get();
        $lista_pdf = $lista_pdf2->groupBy('rut');


      }else{
        $lista_pdf = RecordSolicitud::where('rut',$request->user_selected)
                                      ->where('estado','=','1')
                                      ->whereMonth("fecha_desde", '=',$request->mes)
                                      ->whereYear("fecha_desde", '=',$request->ano)
                                      ->get();
        $lista_pdf = $lista_pdf->groupBy('rut');
      }


    $pdf = \PDF::loadView('report.vista1', compact('lista_pdf') );
    return $pdf->stream('reporte.pdf');
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Request $request,$id)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
