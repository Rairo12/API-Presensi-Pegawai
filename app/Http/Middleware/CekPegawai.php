<?php

namespace App\Http\Middleware;

use App\Models\PegawaiModel;

use Closure;
use Illuminate\Http\Request;

class CekPegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $nip= $request->header("nip");

        $pegawai = PegawaiModel::query()->where([
            'nip' -> $nip,
        ])->first();
        if ($pegawai == null){
            return response()->json([
                'message' => 'Pegawai belum login'
            ], 403);
        }
        
        $request->setUserResolver(function()use($pegawai){
            return $pegawai;
        });

        return $next($request);
    }
}
