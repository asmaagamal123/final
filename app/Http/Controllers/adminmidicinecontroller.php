<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.medicines.index', ['medicines' => $medicines]);
    }

    public function create()
    {
        return view('admin.medicines.create');
    }

    public function store(Request $request)
    {
        $medicine = Medicine::create($request->all());
        return redirect()->route('medicines.index');
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('admin.medicines.show', ['medicine' => $medicine]);
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('admin.medicines.edit', ['medicine' => $medicine]);
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());
        return redirect()->route('medicines.index');
    }

    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}

