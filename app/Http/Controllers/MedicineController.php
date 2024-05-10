<?php
// MedicineController.php
namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return response()->json($medicines);
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return response()->json($medicine);
    }

    public function store(Request $request)
    {
        $medicine = Medicine::create($request->all());
        return response()->json($medicine, 201);
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


