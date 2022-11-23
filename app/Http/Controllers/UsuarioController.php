<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;
use App\Models\User;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $user = User::with('empresas')->get();
            return jsend_success($user);
        } catch (\Throwable $th) {
            return jsend_error($th);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'nombre'=>'required',
                'apellido'=>'required',
                'email'=>'required',
                'telefono'=>'required',
                'fecha_nacimiento'=>'required',
                'genero'=>'required',
                'ciudad'=>'required',
                'pais'=>'required',
                'estado'=>'required',
                'id_empresa'=>'required',
                ]);
            $user = new User();
            $user->nombre= $request->nombre;
            $user->apellido= $request->apellido;
            $user->email= $request->email;
            $user->telefono = $request->telefono;
            $user->fecha_nacimiento= $request->fecha_nacimiento;
            $user->genero= $request->genero;
            $user->ciudad= $request->ciudad;
            $user->pais= $request->pais;
            $user->estado= $request->estado;
            $user->id_empresa= $request->id_empresa;


            $result=$user->save();
            return jsend_success($result);

        } catch (\Throwable $th) {
            return jsend_error($th);
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

        try {
            $user = User::findOrFail($id);
            return jsend_success($user);
        } catch (\Throwable $th) {
            return jsend_error($th);
        }

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'id'=>'required',
                'nombre'=>'required',
                'apellido'=>'required',
                'email'=>'required',
                'telefono'=>'required',
                'fecha_nacimiento'=>'required',
                'genero'=>'required',
                'ciudad'=>'required',
                'pais'=>'required',
                'estado'=>'required',
                'id_empresa'=>'required',
                ]);
                $user = User::findOrFail($request->id);
                $user->nombre= $request->nombre;
                $user->apellido= $request->apellido;
                $user->email= $request->email;
                $user->telefono = $request->telefono;
                $user->fecha_nacimiento= $request->fecha_nacimiento;
                $user->genero= $request->genero;
                $user->ciudad= $request->ciudad;
                $user->pais= $request->pais;
                $user->estado= $request->estado;
                $user->id_empresa= $request->id_empresa;

        $result=$user->save();


        return jsend_success($result);
        } catch (\Throwable $th) {
            return jsend_error($th);
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
        try {
            $user = User::findOrFail($id);
            $result= $user->delete();

            return jsend_success($result);

        } catch (\Throwable $th) {
            return jsend_error($th);
        }


    }
}
