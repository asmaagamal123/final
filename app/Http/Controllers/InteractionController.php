<?php
// InteractionController.php
namespace App\Http\Controllers;

use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function index()
    {
        $interactions = Interaction::all();
        return response()->json($interactions);
    }

    public function store(Request $request)
    {
        $interaction = Interaction::create($request->all());
        return response()->json($interaction, 201);
    }
}