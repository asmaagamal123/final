<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    public function index()
    {
        // Get all sensor data
        $sensorData = Sensor::all(); 
        return response()->json($sensorData);
    }

    public function update(Request $request, $id)
    {
        // Find the sensor data by its ID
        $sensorData = Sensor::findOrFail($id); 
        
        // Update the sensor data
        $sensorData->update($request->all());
        
        // Return a success message
        return response()->json(['message' => 'Sensor data updated successfully', 'updated_data' => $sensorData]);
    }
}
?>

