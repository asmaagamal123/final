<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::all();
        return response()->json($drugs);
    }

    public function show($id)
    {
        $drug = Drug::findOrFail($id);
        return response()->json($drug);
    }

    public function store(Request $request)
    {
        $drug = Drug::create($request->all());
        return response()->json($drug, 201);
    }

    public function update(Request $request, $id)
    {
        $drug = Drug::findOrFail($id);
        $drug->update($request->all());
        return response()->json($drug, 200);
    }

    public function destroy($id)
    {
        Drug::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
