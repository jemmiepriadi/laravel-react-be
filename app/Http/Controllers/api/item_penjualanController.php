<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item_Penjualan;
use Illuminate\Http\Request;

class item_penjualanController extends Controller
{
    public function getItemPenjualan()
    {
        $pelanggan = Item_Penjualan::all();
        return response()->json($pelanggan, 200);
        // return $pelanggan;
    }

    public function createOrUpdateItemPenjualan(Request $request)
    {
        if($request->id){
            $id= $request->id;
            if(Item_Penjualan::where('id', $id)->exists()){
                $pelanggan = Item_Penjualan::where('id', $id)->first();
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
        $pelanggan = Item_Penjualan::create($request->all());
        $pelanggan->save();
        return response()->json([
            "message" => "pelanggan record created"
        ], 201);
    }

    public function updateItemPenjualan(Request $request , $id)
    {
        if(Item_Penjualan::where('id', $id)->exists()){
            $pelanggan = Item_Penjualan::where('id', $id)->first();
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

    public function getItemPenjualanById($id)
    {
        if(Item_Penjualan::where('id', $id)->exists()){
            $pelanggan = Item_Penjualan::where('id', $id)->first();
            return response()->json($pelanggan, 200);
        }else{
            return response()->json([
                "message" => "pelanggan not found"
            ], 404);
        }
    }

    public function deleteItemPenjualan($id)
    {
        if(Item_Penjualan::where('id', $id)->exists()){
            $pelanggan = Item_Penjualan::where('id', $id)->first();
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
