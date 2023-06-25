<?php

namespace App\Http\Controllers;

use App\Models\CutiModel;

use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function store(){
        $fields = [
            'nip',
            'waktu_masuk',
            'lokasi_masuk',
            'ip_masuk',
            'waktu_tengah',
            'lokasi_tengah',
            'ip_tengah',
            'waktu_pulang',
            'lokasi_pulang',
            'ip_pulang',
        ];
        
        $data = new CutiModel();
        foreach($fields as $f ){
            $data->$f = \request($f);
        }
        $data->pegawai_id = request()->user()->nip;
        
        return response()->json([
            'data' => $data
        ], $data->saveOrFail() ? 200: 406 );
    }
}
