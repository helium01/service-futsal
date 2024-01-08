<?php

namespace App\Http\Controllers;

use App\Models\lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::all();
        return response()->json($lapangans, 200);
    }

    public function show($id)
    {
        $lapangan = Lapangan::find($id);
        if (!$lapangan) {
            return response()->json(['message' => 'Lapangan not found'], 404);
        }
        return response()->json($lapangan, 200);
    }

    public function store(Request $request)
    {
        $lapangan = Lapangan::create($request->all());
        return response()->json($lapangan, 201);
    }

    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::find($id);
        if (!$lapangan) {
            return response()->json(['message' => 'Lapangan not found'], 404);
        }
        $lapangan->update($request->all());
        return response()->json($lapangan, 200);
    }

    public function destroy($id)
    {
        $lapangan = Lapangan::find($id);
        if (!$lapangan) {
            return response()->json(['message' => 'Lapangan not found'], 404);
        }
        $lapangan->delete();
        return response()->json(['message' => 'Lapangan deleted successfully'], 200);
    }
}
