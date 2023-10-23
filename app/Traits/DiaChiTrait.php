<?php

namespace App\Traits;
use DB;
trait DiaChiTrait
{
    public function getThanhPho()
    {
        $thanhpho = DB::table('devvn_tinhthanhpho')->get();
        return $thanhpho;
    }

    public function getQuanHuyen(Request $request)
    {
        $quanhuyen = DB::table('devvn_quanhuyen')
            ->where('matp', $request->MaThanhPho)
            ->get();
        if (count($quanhuyen) > 0) {
            return $quanhuyen;
        }
    }

    public function getPhuongXa(Request $request)
    {
        $phuongxa = DB::table('devvn_xaphuongthitran')
            ->where('maqh', $request->MaQuanHuyen)
            ->get();

        if (count($phuongxa) > 0) {
            return $phuongxa;
        }
    }

}
