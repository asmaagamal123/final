<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class CustommedicineController  extends Controller
{
    public function index()
    {
        return Medicine::all();
    }

    public function store(Request $request)
    {
        return Medicine::create($request->all());
    }

    public function show($id)
    {
        return Medicine::findOrFail($id);
    }
}

