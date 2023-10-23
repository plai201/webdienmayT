<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateVaiTro extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vai_tro')->insert([
            ['TenVaiTro'=>'admin', 'TenHienThi'=>'Quản trị hệ thông'],
            ['TenVaiTro'=>'guest', 'TenHienThi'=>'Khách hàng'],
            ['TenVaiTro'=>'developer', 'TenHienThi'=>'Phát triển hệ thống'],
            ['TenVaiTro'=>'employee', 'TenHienThi'=>'Nhân viên'],
        ]);
    }
}
