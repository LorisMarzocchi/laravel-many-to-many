<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    private $validation= [
        'name'         => 'required|string|max:50',
        'description'  => 'required|string|max:1000',
    ];

    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }


    public function create()
    {
        return view('Admin.types.create');
    }


    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();
        // Salvare i dati nel database
        $newType = new Type();
        $newType->name          = $data['name'];
        $newType->description    = $data['description'];
        $newType->save();



        return redirect()->route('admin.types.show', ['type' => $newType]);
    }


    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }


    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }


    public function update(Request $request, Type $type)
    {
        $request->validate($this->validation);

        $data = $request->all();


        $type->name           = $data['name'];
        $type->description    = $data['description'];
        $type->update();

        return redirect()->route('admin.types.show', ['type' => $type]);
    }


    public function destroy(Type $type)
    {
        // $type->projects()->detach();

        $type->delete();
        return to_route('admin.types.index')->with('delete_success', $type);
    }
}
