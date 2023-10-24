<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThongSoKyThuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement("INSERT INTO `thong_so_ky_thuat` VALUES (1,'Model','2023-10-23 21:35:32','2023-10-23 21:35:32',NULL),(2,'Màu sắc','2023-10-23 21:35:32','2023-10-23 21:35:32',NULL),(3,'Nhà sản xuất','2023-10-23 21:35:32','2023-10-23 21:35:32',NULL),(4,'Xuất xứ','2023-10-23 21:35:32','2023-10-23 21:35:32',NULL),(5,'Năm ra mắt','2023-10-23 21:35:32','2023-10-23 21:35:32',NULL),(6,'Thời gian bảo hành','2023-10-23 21:35:32','2023-10-23 21:35:32',NULL);
");

    }
}
