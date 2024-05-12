<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineController extends Controller
{
    public function conflictingMaterials($name)
    {
        $medicine = Medicine::where('name', $name)->first();

        if (!$medicine) {
            return response()->json(['error' => 'Medicine not found'], 404);
        }

        $conflictingMaterials = $medicine->conflictingMaterials->pluck('conflicting_material');

        return response()->json(['conflicting_materials' => $conflictingMaterials]);
    }

    
}


