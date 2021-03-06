<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = \App\Attribute::all();
        return view('admin.attributes.index', ['attributes' => $attributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        return view('admin.attributes.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'identification' => 'required|max:255'
        ]);

        $attribute= new \App\Attribute;
        $attribute->name=$request->get('name');
        $attribute->category_id=$request->get('category_id');
        $attribute->identification=$request->get('identification');

        if($request->get('assignment_multiple') === "on") {
            $attribute->assignment_multiple = true;
        } else {
            $attribute->assignment_multiple = false;
        }

        $attribute->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/attributes')->with(['success' => "Attribute has been created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = \App\Attribute::find($id);
        return view('admin.attributes.show', ['attribute' => $attribute]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = \App\Attribute::find($id);
        $categories = \App\Category::all();

        return view('admin.attributes.edit', ['attribute' => $attribute, 'categories' => $categories]);
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
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|max:255',
            'identification' => 'required|max:255'
        ]);

        $attribute= \App\Attribute::find($id);
        $attribute->name=$request->get('name');
        $attribute->category_id=$request->get('category_id');
        $attribute->identification=$request->get('identification');

        if($request->get('assignment_multiple') === "on") {
            $attribute->assignment_multiple = true;
        } else {
            $attribute->assignment_multiple = false;
        }

        $attribute->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/attributes')->with(['success' => "Attribute has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = \App\Attribute::find($id);
        $attribute->delete();
        return redirect('attributes')->with("success","Attribute has been deleted.");
    }
}
