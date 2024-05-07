<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::with('usuario')-> paginate(10);
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'nombre' => 'required|unique:tags',
        ]);

        $tag = new Tags();
        $tag->nombre = $request->nombre;
        $tag -> estado = true;
        $tag -> usuario_id = auth()->user()->id;
        if ($tag -> save()) {
            return redirect('/tags')->with('success', 'Tag creada con éxito');
        } else {
            return back()->with('error', 'No se pudo crear el tag');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tags $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tags::find($id);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:categorias,nombre,' . $id,
        ]);

        $tag = Tags::find($id);
        $tag -> nombre = $request -> nombre;
        $tag -> estado = true;
        $tag -> usuario_id = auth()->user()->id;
        if ($tag -> save()) {
            return redirect('/tags')->with('success', 'Categoría actualizada con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar la categoría');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function estado($id)
    {
        $tag = Tags::find($id);
        $tag -> estado = !$tag -> estado;
        if ($tag -> save()) {
            return redirect('/tags')->with('success', 'Estado actualizada con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar el estado');
        }
    }
}
