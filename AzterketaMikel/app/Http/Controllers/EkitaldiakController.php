<?php
namespace App\Http\Controllers;

use App\Models\Ekitaldiak;
use Illuminate\Http\Request;

class EkitaldiakController extends Controller
{
    public function index()
    {
        $ekitaldiak = Ekitaldiak::all();
        return response()->json($ekitaldiak);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'izena' => 'required|string|max:255',
            'data' => 'required|date',
            'azalpena' => 'nullable|string',
        ]);

        $ekitaldiak = Ekitaldiak::create($validated);
        return response()->json($ekitaldiak, 201);
    }

    public function show($id)
    {
        $ekitaldiak = Ekitaldiak::findOrFail($id);
        return response()->json($ekitaldiak);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'izena' => 'required|string|max:255',
            'data' => 'required|date',
            'azalpena' => 'nullable|string',
        ]);

        $ekitaldiak = Ekitaldiak::findOrFail($id);
        $ekitaldiak->update($validated);

        return response()->json($ekitaldiak);
    }

    public function destroy($id)
    {
        $ekitaldiak = Ekitaldiak::findOrFail($id);
        $ekitaldiak->delete();

        return response()->json(['message' => 'Ekitaldiak eliminado correctamente']);
    }
}
