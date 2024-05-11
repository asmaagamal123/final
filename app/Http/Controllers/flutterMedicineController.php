<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fluttermidicine;

class MedicineController extends Controller
{
    public function index()
    {
        return Medicine::all();
    }

    public function store(Request $request)
    {
        $medicine = Medicine::create($request->all());
        return response()->json($medicine, 201);
    }

    public function show($id)
    {
        return Medicine::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());
        return response()->json($medicine, 200);
    }

    public function destroy($id)
    {
        Medicine::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

