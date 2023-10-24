<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnhSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement("INSERT INTO `anh_san_pham` VALUES (1,1,'/storage/sanpham/1/vHXnCQAGvv1gKCuu5Wu9.jpg','10051659-smart-tivi-qled-samsung-4k-65-inch-qa65q60bakxxv-2_75ej-0w.jpg','2023-10-23 21:41:00','2023-10-23 21:41:00',NULL),(2,1,'/storage/sanpham/1/s95sqHv1KuxEdPCYzBby.jpg','10051659-smart-tivi-qled-samsung-4k-65-inch-qa65q60bakxxv-2_wcqk-zo.jpg','2023-10-23 21:41:00','2023-10-23 21:41:00',NULL),(3,1,'/storage/sanpham/1/XKkeMNIllXYUdo0zbYg9.jpg','10051659-smart-tivi-qled-samsung-4k-65-inch-qa65q60bakxxv-3_m8hq-v3.jpg','2023-10-23 21:41:00','2023-10-23 21:41:00',NULL),(4,1,'/storage/sanpham/1/1S8iLcBvfVoJpySNqyyR.jpg','10051659-smart-tivi-qled-samsung-4k-65-inch-qa65q60bakxxv-4_vtu1-np.jpg','2023-10-23 21:41:00','2023-10-23 21:41:00',NULL),(5,2,'/storage/sanpham/1/WCLDtPU9rPZ9sLSfCBRR.jpg','10055523-smart-tivi-lg-4k-55-icnh-55ur9050psk-1.jpg','2023-10-23 21:43:36','2023-10-23 21:43:36',NULL),(6,2,'/storage/sanpham/1/Kq7JtqBKHHZtLYOjPc21.jpg','10055523-smart-tivi-lg-4k-55-icnh-55ur9050psk-2.jpg','2023-10-23 21:43:36','2023-10-23 21:43:36',NULL),(7,2,'/storage/sanpham/1/smEwRMYzVP5eQPjXFNmd.jpg','10055523-smart-tivi-lg-4k-55-icnh-55ur9050psk-3.jpg','2023-10-23 21:43:36','2023-10-23 21:43:36',NULL),(8,2,'/storage/sanpham/1/bzRnOipw4QvZ8JddPKx2.jpg','10055523-smart-tivi-lg-4k-55-icnh-55ur9050psk-4.jpg','2023-10-23 21:43:36','2023-10-23 21:43:36',NULL),(9,3,'/storage/sanpham/1/xXSdHii4ua84h7fyFk90.jpg','10055295-google-tivi-sony-4k-43-inch-kd-43x80l-vn3-1.jpg','2023-10-23 21:46:00','2023-10-23 21:46:00',NULL),(10,3,'/storage/sanpham/1/oGoUgGnb4WM3c0ThBOt8.jpg','10055295-google-tivi-sony-4k-43-inch-kd-43x80l-vn3-2.jpg','2023-10-23 21:46:00','2023-10-23 21:46:00',NULL),(11,3,'/storage/sanpham/1/93QYWmIw2ydrzgBlhEje.jpg','10055295-google-tivi-sony-4k-43-inch-kd-43x80l-vn3-3.jpg','2023-10-23 21:46:00','2023-10-23 21:46:00',NULL),(12,3,'/storage/sanpham/1/pzqmZA9TBH4biNpBiaRK.jpg','10055295-google-tivi-sony-4k-43-inch-kd-43x80l-vn3-4.jpg','2023-10-23 21:46:00','2023-10-23 21:46:00',NULL),(13,4,'/storage/sanpham/1/QnHfVfrXqoa0G8mGxNdm.jpg','10042058-tu-lanh-samsung-inverter-680-lit-sbs-rs62r5001m9-1.jpg','2023-10-23 21:49:16','2023-10-23 21:49:16',NULL),(14,4,'/storage/sanpham/1/HebAmyObSbmsj9tOvCWT.jpg','10042058-tu-lanh-samsung-inverter-680-lit-sbs-rs62r5001m9-2.jpg','2023-10-23 21:49:16','2023-10-23 21:49:16',NULL),(15,4,'/storage/sanpham/1/nkJjolzM3Ozjdqe11IN3.jpg','10042058-tu-lanh-samsung-inverter-680-lit-sbs-rs62r5001m9-3.jpg','2023-10-23 21:49:16','2023-10-23 21:49:16',NULL),(16,4,'/storage/sanpham/1/UHettxY5ZikAeMQ7FnnP.jpg','10042058-tu-lanh-samsung-inverter-680-lit-sbs-rs62r5001m9-4_5y9j-xw.jpg','2023-10-23 21:49:16','2023-10-23 21:49:16',NULL),(17,5,'/storage/sanpham/1/YQ7b6andoEdnZyHr8Taa.jpg','10035897-may-lanh-panasonic-inverter-1-hp-cu-cs-vu9ukh-8-01.jpg','2023-10-23 21:51:58','2023-10-23 21:51:58',NULL),(18,5,'/storage/sanpham/1/oTLYxyTww0Jo9stUOARC.jpg','10035897-may-lanh-panasonic-inverter-1-hp-cu-cs-vu9ukh-8-02.jpg','2023-10-23 21:51:58','2023-10-23 21:51:58',NULL),(19,5,'/storage/sanpham/1/V0DCYsYzZkfbLiBTbMPL.jpg','10035897-may-lanh-panasonic-inverter-1-hp-cu-cs-vu9ukh-8-03.jpg','2023-10-23 21:51:58','2023-10-23 21:51:58',NULL),(20,5,'/storage/sanpham/1/9Mzft2rrbCY4lpoJPuBi.jpg','10035897-may-lanh-panasonic-inverter-1-hp-cu-cs-vu9ukh-8-04.jpg','2023-10-23 21:51:58','2023-10-23 21:51:58',NULL),(21,6,'/storage/sanpham/1/EFTErnc6ssX3WbEsvQeo.jpg','10050090-may-giat-lg-inverter-10-kg-fv1410s4p-1.jpg','2023-10-23 21:56:12','2023-10-23 21:56:12',NULL),(22,6,'/storage/sanpham/1/APMsIrRXwExw3fEByiIv.jpg','10050090-may-giat-lg-inverter-10-kg-fv1410s4p-2.jpg','2023-10-23 21:56:12','2023-10-23 21:56:12',NULL),(23,6,'/storage/sanpham/1/fMysMMApROBbBsWQYVOR.jpg','10050090-may-giat-lg-inverter-10-kg-fv1410s4p-3.jpg','2023-10-23 21:56:12','2023-10-23 21:56:12',NULL),(24,6,'/storage/sanpham/1/egQXKdMTcGpn5OK6kedY.jpg','10050090-may-giat-lg-inverter-10-kg-fv1410s4p-4.jpg','2023-10-23 21:56:12','2023-10-23 21:56:12',NULL);
");
    }
}
