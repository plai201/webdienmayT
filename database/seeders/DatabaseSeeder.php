<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CreateVaiTro::class,
            QuyenSeeder::class,
            QuyenVaiTroSeeder::class,
            VaiTroTaiKhoanSeeder::class,
            PhuongXaSeeder::class,
            QuanHuyenSeeder::class,
            ThanhPhoSeeder::class,
            DanhMucSeeder::class,
            NhanHangSeeder::class,
            SanPhamSeeder::class,
            AnhSanPhamSeeder::class,
            ThongSoKyThuatSeeder::class,
            SanPhamThongSoSeeder::class,
        ]);
    }
}
