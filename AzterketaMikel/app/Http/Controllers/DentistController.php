<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user() || !$request->user()->hasRole('admin')) {
            return response()->json(['message' => 'Sarbide ukatuta'], 403);
        }

        $dentists = User::where('role', 'dentista')->get();

        return response()->json($dentists);
    }
}