<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function getBarang()
    {
        $barang = Barang::all();
        return response()->json($barang, 200);
    }

    public function createOrUpdateBarang(Request $request)
    {
        if($request->KODE){
            $id = $request->KODE;
            if(Barang::where('KODE', $id)->exists()){
                $barang = Barang::where('KODE', $id)->first();
                $barang->fill($request->all())->save();
                return response()->json([
                    "message" => "barang record updated"
                ], 201);
            }else{
                return response()->json([
                    "message" => "barang not found"
                ], 404);
            }
        }
        $barang = Barang::create($request->all());
        // return $barang;
        $barang->save();
        return response()->json([
            "message" => "barang record created"
        ], 201);
    }

    public function updateBarang(Request $request , $id)
    {
        if(Barang::where('KODE', $id)->exists()){
            $barang = Barang::where('KODE', $id)->first();
            $barang->fill($request->all())->save();
            return response()->json([
                "message" => "barang record updated"
            ], 201);
        }else{
            return response()->json([
                "message" => "barang not found"
            ], 404);
        }
    }

    public function getBarangById($id)
    {
        if(Barang::where('KODE', $id)->exists()){
            $barang = Barang::where('KODE', $id)->first();
            return response()->json($barang, 200);
        }else{
            return response()->json([
                "message" => "barang not found"
            ], 404);
        }
    }

    public function deleteBarang($id)
    {
        if(Barang::where('KODE', $id)->exists()){
            $barang = Barang::where('KODE', $id)->first();
            $barang->delete();
            return response()->json([
                'message' => 'delete successfull'
            ], 200);
        }else{
            return response()->json([
                "message" => "barang not found"
            ], 404);
        }
    }
}
