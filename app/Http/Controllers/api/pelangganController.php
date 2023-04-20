<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
    public function getPelanggan()
    {
        $pelanggan = Pelanggan::all();
        return response()->json($pelanggan, 200);
        // return $pelanggan;
    }

    public function createOrUpdatePelanggan(Request $request)
    {
        if($request->id){
            $id = $request->id;
            if(Pelanggan::where('ID_PELANGGAN', $id)->exists()){
                $pelanggan = Pelanggan::where('ID_PELANGGAN', $id)->first();
                $pelanggan->fill($request->all())->save();
                return response()->json([
                    "message" => "pelanggan record updated"
                ], 201);
            }else{
                return response()->json([
                    "message" => "pelanggan not found"
                ], 404);
            }
        }
        $pelanggan = Pelanggan::create($request->all());
        $pelanggan->save();
        return response()->json([
            "message" => "pelanggan record created"
        ], 201);
    }

    public function updatePelanggan(Request $request , $id)
    {
        if(Pelanggan::where('ID_PELANGGAN', $id)->exists()){
            $pelanggan = Pelanggan::where('ID_PELANGGAN', $id)->first();
            $pelanggan->fill($request->all())->save();
            return response()->json([
                "message" => "pelanggan record updated"
            ], 201);
        }else{
            return response()->json([
                "message" => "pelanggan not found"
            ], 404);
        }
    }

    public function getPelangganById($id)
    {
        if(Pelanggan::where('ID_PELANGGAN', $id)->exists()){
            $pelanggan = Pelanggan::where('ID_PELANGGAN', $id)->first();
            return response()->json($pelanggan, 200);
        }else{
            return response()->json([
                "message" => "pelanggan not found"
            ], 404);
        }
    }

    public function deletePelanggan($id)
    {
        if(Pelanggan::where('ID_PELANGGAN', $id)->exists()){
            $pelanggan = Pelanggan::where('ID_PELANGGAN', $id)->first();
            $pelanggan->delete();
            return response()->json([
                'message' => 'delete successfull'
            ], 200);
        }else{
            return response()->json([
                "message" => "pelanggan not found"
            ], 404);
        }
    }


}
