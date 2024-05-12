<?php



    //// In UserController.php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
            'age' => 'nullable|integer',
            'date_of_birth' => 'nullable|date',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'weight' => $request->weight,
            'height' => $request->height,
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
}


// app/Http/Controllers/UserController.php



class UserController extends Controller
{
    public function attachMedicine($userId, $medicineId, $duration)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $medicine = Medicine::find($medicineId);

        if (!$medicine) {
            return response()->json(['error' => 'Medicine not found'], 404);
        }

        // Attach the medicine to the user with duration
        $user->medicines()->attach($medicineId, ['duration' => $duration]);

        return response()->json(['message' => 'Medicine attached to user successfully']);
    }

    public function getUserMedicines($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Retrieve medicines for a user with their durations
        $medicines = $user->medicines()->withPivot('duration')->get();

        return response()->json(['medicines' => $medicines]);
    }
}
