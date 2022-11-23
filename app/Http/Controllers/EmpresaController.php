<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $empresa = empresa::All();
            return jsend_success($empresa);
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
                'email'=>'required',
                'telefono'=>'required',
                'ciudad'=>'required',
                'estado'=>'required',
                'direccion'=>'required',
                ]);
            $empresa = new empresa();
            $empresa->nombre= $request->nombre;
            $empresa->email= $request->email;
            $empresa->telefono = $request->telefono;
            $empresa->ciudad= $request->ciudad;
            $empresa->estado= $request->estado;
            $empresa->direccion= $request->direccion;


            $result=$empresa->save();
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
            $empresa = empresa::findOrFail($id);
            return jsend_success($empresa);
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
                'email'=>'required',
                'telefono'=>'required',
                'ciudad'=>'required',
                'estado'=>'required',
                'direccion'=>'required',
                ]);
                $empresa = empresa::findOrFail($request->id);
                $empresa->nombre= $request->nombre;

                $empresa->email= $request->email;
                $empresa->telefono = $request->telefono;

                $empresa->ciudad= $request->ciudad;

                $empresa->estado= $request->estado;
                $empresa->direccion= $request->direccion;


                $result=$empresa->save();


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
            $empresa = empresa::findOrFail($id);
            $result= $empresa->delete();

            return jsend_success($result);

        } catch (\Throwable $th) {
            return jsend_error($th);
        }


    }
}
