<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Name;
use Response;

class nameController extends Controller {

    public function getAll() {
        $name = DB::table('names')->get();
        return view('welcome', compact('name'));
    }

    public function store(Request $request) {
        $name = new Name;
        $name->name = $request->name;
        $name->save();
        return response()->json($name);
    }

    public function delete(Name $id) {
        $id->delete();
    }

    public function update(Request $request) {
        $names = Name::find($request->id);
        $names->name = $request->name;
        $names->save();

        return response()->json($names);
    }

}
