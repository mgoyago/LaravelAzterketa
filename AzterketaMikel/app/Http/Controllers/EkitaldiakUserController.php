<?php

namespace App\Http\Controllers;

use App\Models\Ekitaldiak;
use App\Models\User;
use Illuminate\Http\Request;

class EkitaldiakUserController extends Controller
{
    public function userEkitaldianSartu(Request $request, $Id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $ekitaldiak = Ekitaldiak::find($Id);

        if (!$ekitaldiak) {
            return response()->json(['message' => 'Ekitaldia ez da aurkitu']);
        }

        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json(['message' => 'User-a ez da aurkitu']);
        }

        $ekitaldiak->users()->attach($user->id);

        return response()->json(['message' => 'User-a Ekitaldian sartu da']);
    }
    public function parteHartzaileakIkusi(Request $request, $Id)
    {

        $ekitaldiak = Ekitaldiak::find($Id);

        if (!$ekitaldiak) {
            return response()->json(['message' => 'Ekitaldia ez da aurkitu']);
        }

        $users = $ekitaldiak->users;

        return response()->json($users);
    }
    public function nireEkitaldiakIkusi(Request $request, $Id)
    {
        $user = User::find($Id);

        if (!$user) {
            return response()->json(['message' => 'User-a ez da aurkitu'], 404);
        }

        $ekitaldiak = $user->ekitaldiak;

        return response()->json($ekitaldiak);
    }
    public function ekitaldianSartu(Request $request, $Id)
    {
        $user = auth()->user();

        $ekitaldiak = Ekitaldiak::find($Id);

        if (!$ekitaldiak) {
            return response()->json(['message' => 'Ekitaldia ez da aurkitu'], 404);
        }

        if ($ekitaldiak->users->contains($user->id)) {
            return response()->json(['message' => 'Usur-a aurretik sartuta dago'], 400);
        }

        $ekitaldiak->users()->attach($user->id);

        return response()->json(['message' => 'Ekitaldiaren barruan zaude']);
    }
}
