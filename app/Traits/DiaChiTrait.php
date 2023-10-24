<?php

namespace App\Traits;
use DB;
trait DiaChiTrait
{
    public function getThanhPho()
    {
        $thanhpho = DB::table('tinh_thanh_pho')->get();
        return $thanhpho;
    }

    public function getQuanHuyen(Request $request)
    {
        $quanhuyen = DB::table('quan_huyen')
            ->where('matp', $request->MaThanhPho)
            ->get();
        if (count($quanhuyen) > 0) {
            return $quanhuyen;
        }
    }

    public function getPhuongXa(Request $request)
    {
        $phuongxa = DB::table('phuong_xa')
            ->where('maqh', $request->MaQuanHuyen)
            ->get();

        if (count($phuongxa) > 0) {
            return $phuongxa;
        }
    }

}
