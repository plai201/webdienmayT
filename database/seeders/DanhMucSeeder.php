<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement("INSERT INTO `danh_muc_san_pham` VALUES (1,'Tủ lạnh',0,'/storage/danhmuc/1/CD89ZLoqiWY87QnJQnE4.png','tulanh.png','2023-10-23 21:26:34','2023-10-23 21:26:50',NULL),(2,'TiVi',0,'/storage/danhmuc/1/2MIpPOzrKSwIIGNqWbIA.png','MplVXxk56vrm3OtYhZBk.png','2023-10-23 21:27:26','2023-10-23 21:32:14',NULL),(3,'Máy giặt',0,'/storage/danhmuc/1/ZAjcSblcnxmRvH2UgiMQ.jpg','Jlvs5bw8ebQtKLkFYPER.jpg','2023-10-23 21:27:50','2023-10-23 21:32:27',NULL),(4,'Máy lạnh',0,'/storage/danhmuc/1/jjzdDQ1tMhGZwSMfZUtE.jpg','z6hVdtLC9rruwqueNfKG.jpg','2023-10-23 21:27:58','2023-10-23 21:52:56',NULL),(5,'Tivi SamSung',2,NULL,NULL,'2023-10-23 21:33:06','2023-10-23 21:33:06',NULL),(6,'TiVi Sony',2,NULL,NULL,'2023-10-23 21:33:17','2023-10-23 21:33:17',NULL),(7,'TiVi LG',2,NULL,NULL,'2023-10-23 21:33:30','2023-10-23 21:33:30',NULL),(8,'Tủ lạnh Panasonic',1,NULL,NULL,'2023-10-23 21:33:45','2023-10-23 21:33:45',NULL),(9,'Tủ lạnh SamSung',1,NULL,NULL,'2023-10-23 21:33:55','2023-10-23 21:54:04',NULL),(10,'Máy lạnh Panasonic',4,NULL,NULL,'2023-10-23 21:52:41','2023-10-23 21:52:41',NULL);
");
    }
}
