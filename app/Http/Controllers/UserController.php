<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{


    public function exportPdf(){
      $users = User::get();
      $pdf  = PDF::loadView('pdf.user',compact('users'));

      return $pdf->download('user_list.pdf');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
      $name  = $request->get('name');

       $users = User::orderBy('id', 'DESC')
           		->name($name)
           		->paginate(4);
        return view('users.index', compact('users'));
    }
    public function create()
    {

        // Mostramos un formulario para crear nuevos ejemplos
        $user = new User;
          $roles = Role::get();
       return view('users.create',compact('user','roles'));
    }


    public function store(Request $request)
    {
        $options  = [
            'rut'          =>  $request->rut,
            'name'         =>  $request->name,
            'apellido'     =>  $request->apellido,
            'direccion'    =>  $request->direccion,
            'telefono'     =>  $request->telefono,
            'email'        =>  $request->email,
            'password'     =>  '$2y$10$unPdg1zud9Mv9P/ULQvWiubSw5OqeNe5ubiNizz24VfbN0NPmIe4y'
            ];

            if($user = User::create($options )){

              $user->roles()->sync($request->get('roles'));

                return redirect('/user')
                ->with('info','Usuario creado con exito');

            }else{
                return view('users.create');

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
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
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
        $user = User::find($id);

        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('user.edit', $user->id)
            ->with('info', 'Usuario Editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
