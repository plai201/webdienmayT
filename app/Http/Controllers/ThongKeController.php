<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function trangchu(){
        return view('admin.thongke.thongke');
    }
}
