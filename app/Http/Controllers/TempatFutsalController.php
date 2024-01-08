<?php

namespace App\Http\Controllers;

use App\Models\tempatFutsal;
use Illuminate\Http\Request;

class TempatFutsalController extends Controller
{
    public function index()
    {
        $tempatFutsals = TempatFutsal::all();
        return response()->json($tempatFutsals, 200);
    }

    public function show($id)
    {
        $tempatFutsal = TempatFutsal::find($id);
        if (!$tempatFutsal) {
            return response()->json(['message' => 'Tempat Futsal not found'], 404);
        }
        return response()->json($tempatFutsal, 200);
    }

    public function store(Request $request)
    {
        $tempatFutsal = TempatFutsal::create($request->all());
        return response()->json($tempatFutsal, 201);
    }

    public function update(Request $request, $id)
    {
        $tempatFutsal = TempatFutsal::find($id);
        if (!$tempatFutsal) {
            return response()->json(['message' => 'Tempat Futsal not found'], 404);
        }
        $tempatFutsal->update($request->all());
        return response()->json($tempatFutsal, 200);
    }

    public function destroy($id)
    {
        $tempatFutsal = TempatFutsal::find($id);
        if (!$tempatFutsal) {
            return response()->json(['message' => 'Tempat Futsal not found'], 404);
        }
        $tempatFutsal->delete();
        return response()->json(['message' => 'Tempat Futsal deleted successfully'], 200);
    }

    public function findNearestOutlite($latitude, $longitude)
    {
        $earthRadius = 6371; // Radius Bumi dalam kilometer

        $outlite = DB::table('outlites')
        ->select('outlites.id', 'outlites.nama_outlite', 'outlites.alamat', 'outlites.no_hp', 'outlites.status', 'outlites.lat', 'outlites.lng', 'users.name')
                ->join('users', 'outlites.id_user', '=', 'users.id')
        ->selectRaw(
            "(CASE
                WHEN ( $earthRadius * acos( cos( radians(?) ) *
                    cos( radians( lat ) )
                    * cos( radians( lng ) - radians(?)
                    ) + sin( radians(?) ) *
                    sin( radians( lat ) ) )
                ) < 1 THEN
                CONCAT(( $earthRadius * acos( cos( radians(?) ) *
                    cos( radians( lat ) )
                    * cos( radians( lng ) - radians(?)
                    ) + sin( radians(?) ) *
                    sin( radians( lat ) ) )
                ) * 1000, ' m')
                ELSE
                CONCAT(( $earthRadius * acos( cos( radians(?) ) *
                    cos( radians( lat ) )
                    * cos( radians( lng ) - radians(?)
                    ) + sin( radians(?) ) *
                    sin( radians( lat ) ) )
                ), ' km')
            END) AS distance",
            [$latitude, $longitude, $latitude, $latitude, $longitude, $latitude, $latitude, $longitude, $latitude]
        )
         ->orderByRaw("CAST(SUBSTRING_INDEX(distance, ' ', 1) AS UNSIGNED) * 
                  CASE WHEN distance LIKE '%km' THEN 1000 ELSE 1 END ASC")
        ->where('status','sudah di validasi')
        ->get();
        return response()->json([
            "status"=>"sudah di validasi",
            "data"=>$outlite], 200);
    }
}
