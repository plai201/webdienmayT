<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhanHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement("INSERT INTO `nhan_hang` VALUES (1,'Panasonic','/storage/nhanhang/1/oNq6XgZfxrO4jfkeG7kM.png','gPhPl0Rry7f70pCYkdFI.png','2023-10-23 21:36:36','2023-10-23 21:36:36',NULL),(2,'LG','/storage/nhanhang/1/dN6kgA7kMN2nPsfRkerk.webp','sKL1no1S6KN8RiDvLjPr.webp','2023-10-23 21:37:05','2023-10-23 21:37:05',NULL),(3,'SamSung','/storage/nhanhang/1/QVyi03Djbejwnl8fTnxO.png','CbjD3nPwKY0wbZl0mN49.png','2023-10-23 21:37:35','2023-10-23 21:37:35',NULL);
");

    }
}
