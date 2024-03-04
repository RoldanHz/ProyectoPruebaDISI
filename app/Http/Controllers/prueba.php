<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class prueba extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function mostrarvista()
    {
        return view('prueba');
    }


    public function recibirParametros($id){
        return "El id recibido es: ".$id;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "Esta es la vista crear usuario";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "Esta es la vista ver usuario";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "Esta es la vista editar usuario";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return "Esta es la vista destroy usuario";
    }
}
