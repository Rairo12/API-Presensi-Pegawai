<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function login(){
        $nip = request()->header('nip');
        $password = request()->header('password');

        $hasil = PegawaiModel::query()
            ->where('nip', $nip)->first();
        
        if($hasil == null){
            return response()->json([
                'pesan' => "Nip $nip tidak terdaftar"
            ], 404);
        }elseif (Hash::check($password, $hasil->password)) {
            $hasil->save();

            return response()->json([
                'data'  => $hasil
            ]);
        }else {
            return response()->json([
                'pesan'  => 'nip dan Kata password tidak cocok'
            ]);
        }
    }

    public function logout(){
        $nip = request()->user()->nip;
        $p = PegawaiModel::query()->where('nip', $nip)->first;

        if ($p != null) {
            $p->save();
            return response()->json([
                'data'  => 1
            ]);
        }else {
            return response()->json([
                'pesan' => 'Logout tidak berhasil, pengguna tidak tersedia'
            ], 404);
        }
    }

    public function simpan_foto(){
        $nip = request()->user()->nip;
        $p = PegawaiModel::query()->where('nip', $nip)->first;

        if ($p == null) {
            return response()->json([
                'pesan' => 'Pengguna tidak terdaftar'
            ], 404);
        }

        $b64foto = request('file_foto');
        
        if (strlen($b64foto) < 1023) {
            return response()->json([
                'pesan' => 'File foto kurang ukurannya'
            ], 406);
        }

        $foto = base64_decode($b64foto);
        $r = Storage::put("foto/$nip.jpg", $foto);

        return response()->json([
            'data'  => $r
        ], $r == true ? 200 : 406);
    }

    public function foto(){
        $nip = request()->user()->nip;
        $file = "foto/$nip.jpg";
        
        if(Storage::exists($file) == false){
            return response()->json([
                'pesan'=>'not found'
            ], 404);
        }
        
        $foto = Storage::get("foto/$nip.jpg");

        return response()->withHeaders([
            'Content-type' => 'image/jpeg'
        ])->setContent($foto)->send();
    }

    public function store(){
        $fields = [
            'nip',
            'nama',
            'gender',
            'jabatan',
            'alamat',
            'no_hp',
            'email',
            'foto',
        ];
        
        $data = new PegawaiModel();
        foreach($fields as $f ){
            $data->$f = \request($f);
        }
        $data->pegawai_id = request()->user()->nip;
        
        return response()->json([
            'data' => $data
        ], $data->saveOrFail() ? 200: 406 );
    }

    public function update(){
        $nip = request()->user()->nip;
        $p = PegawaiModel::query()->where('nip', $nip)->first;

        if ($p == null) {
            return response()->json([
                'pesan'  => 'Pengguna tidak ditemukan'
            ], 404);
        }

        $p->alamat = request('alamat');
        $p->no_hp = request('no_hp');
        $p->email = request('email');
        $r = $p->save();

        return response()->json([
            'data'  => $p
        ], $r == true ? 200 : 406);
    }
    
    public function show(PegawaiModel $w){
        return response()->json([
            'data'  => $w
        ]);
    }
}
