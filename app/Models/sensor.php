<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    /**
     * Display the specified sensor data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // احصل على بيانات الحساس الأول
        $sensorData = Sensor::first(); 
        
        // ارجاع البيانات كـ JSON
        return response()->json($sensorData);
    }

    /**
     * Update the specified sensor data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        // احصل على بيانات الحساس الأول
        $sensorData = Sensor::first(); 
        
        // قم بتحديث البيانات باستخدام البيانات المُرسلة في الطلب
        $sensorData->update($request->all());
        
        // ارجاع رسالة نجاح بتحديث البيانات
        return response()->json(['message' => 'Sensor data updated successfully']);
    }
}
