<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        return response()->json($pesanans, 200);
    }

    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan not found'], 404);
        }
        return response()->json($pesanan, 200);
    }

    public function store(Request $request)
    {
        $pesanan = Pesanan::create($request->all());
        return response()->json($pesanan, 201);
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan not found'], 404);
        }
        $pesanan->update($request->all());
        return response()->json($pesanan, 200);
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan not found'], 404);
        }
        $pesanan->delete();
        return response()->json(['message' => 'Pesanan deleted successfully'], 200);
    }
}
