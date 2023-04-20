<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use DateTime;
use Illuminate\Http\Request;

class penjualanController extends Controller
{
    public function getPenjualan()
    {
        $penjualan = Penjualan::all();
        for($i = 0; $i < sizeof($penjualan); $i++){
            $penjualan[$i]->TGL = date('d/m/y', strtotime($penjualan[$i]->TGL));
        }
        return response()->json($penjualan, 200);
    }

    public function createOrUpdatePenjualan(Request $request)
    {
        if($request->ID_NOTA){
            $id = $request->ID_NOTA;
            if(Penjualan::where('ID_NOTA', $id)->exists()){
                $penjualan = Penjualan::where('ID_NOTA', $id)->first();
                $penjualan->KODE_PELANGGAN = is_null($request->KODE_PELANGGAN) ? $penjualan->KODE_PELANGGAN : $request->KODE_PELANGGAN;
                $penjualan->SUBTOTAL = is_null($request->SUBTOTAL) ? $penjualan->SUBTOTAL : $request->SUBTOTAL;

                $penjualan->TGL = date('Y-m-d', strtotime($request->TGL));
                $penjualan->save();
                return response()->json([
                    "message" => "penjualan record updated"
                ], 201);
            }else{
                return response()->json([
                    "message" => "penjualan not found"
                ], 404);
            }
        }
        $penjualan = Penjualan::create($request->all());
        // $penjualan->TGL = $request->TGL->format('dd/mm/yy');
        $penjualan->save();
        return response()->json([
            "message" => "penjualan record created"
        ], 201);
    }

    public function updatePenjualan(Request $request , $id)
    {
        if(Penjualan::where('ID_NOTA', $id)->exists()){
            $penjualan = Penjualan::where('ID_NOTA', $id)->first();
            $penjualan->fill($request->all());
            // $penjualan->TGL = date('d/m/y', strtotime($request->TGL));
            // return $penjualan->TGL;
            $penjualan->save();
            return response()->json([
                "message" => "penjualan record updated"
            ], 201);
        }else{
            return response()->json([
                "message" => "penjualan not found"
            ], 404);
        }
    }

    public function getPenjualanById($id)
    {
        if(Penjualan::where('ID_NOTA', $id)->exists()){
            $penjualan = Penjualan::where('ID_NOTA', $id)->first();
            // $penjualan->TGL = date('d/m/y', strtotime($penjualan->TGL));
            return response()->json($penjualan, 200);
        }else{
            return response()->json([
                "message" => "penjualan not found"
            ], 404);
        }
    }

    public function deletePenjualan($id)
    {
        if(Penjualan::where('ID_NOTA', $id)->exists()){
            $penjualan = Penjualan::where('ID_NOTA', $id)->first();
            $penjualan->delete();
            return response()->json([
                'message' => 'delete successfull'
            ], 200);
        }else{
            return response()->json([
                "message" => "penjualan not found"
            ], 404);
        }
    }
}
