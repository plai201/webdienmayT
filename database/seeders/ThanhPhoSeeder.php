<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanhPhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement("
            INSERT INTO `tinh_thanh_pho` VALUES ('01','Thành phố Hà Nội','Thành phố Trung ương','HANOI'),('02','Tỉnh Hà Giang','Tỉnh','HAGIANG'),('04','Tỉnh Cao Bằng','Tỉnh','CAOBANG'),('06','Tỉnh Bắc Kạn','Tỉnh','BACKAN'),('08','Tỉnh Tuyên Quang','Tỉnh','TUYENQUANG'),('10','Tỉnh Lào Cai','Tỉnh','LAOCAI'),('11','Tỉnh Điện Biên','Tỉnh','DIENBIEN'),('12','Tỉnh Lai Châu','Tỉnh','LAICHAU'),('14','Tỉnh Sơn La','Tỉnh','SONLA'),('15','Tỉnh Yên Bái','Tỉnh','YENBAI'),('17','Tỉnh Hoà Bình','Tỉnh','HOABINH'),('19','Tỉnh Thái Nguyên','Tỉnh','THAINGUYEN'),('20','Tỉnh Lạng Sơn','Tỉnh','LANGSON'),('22','Tỉnh Quảng Ninh','Tỉnh','QUANGNINH'),('24','Tỉnh Bắc Giang','Tỉnh','BACGIANG'),('25','Tỉnh Phú Thọ','Tỉnh','PHUTHO'),('26','Tỉnh Vĩnh Phúc','Tỉnh','VINHPHUC'),('27','Tỉnh Bắc Ninh','Tỉnh','BACNINH'),('30','Tỉnh Hải Dương','Tỉnh','HAIDUONG'),('31','Thành phố Hải Phòng','Thành phố Trung ương','HAIPHONG'),('33','Tỉnh Hưng Yên','Tỉnh','HUNGYEN'),('34','Tỉnh Thái Bình','Tỉnh','THAIBINH'),('35','Tỉnh Hà Nam','Tỉnh','HANAM'),('36','Tỉnh Nam Định','Tỉnh','NAMDINH'),('37','Tỉnh Ninh Bình','Tỉnh','NINHBINH'),('38','Tỉnh Thanh Hóa','Tỉnh','THANHHOA'),('40','Tỉnh Nghệ An','Tỉnh','NGHEAN'),('42','Tỉnh Hà Tĩnh','Tỉnh','HATINH'),('44','Tỉnh Quảng Bình','Tỉnh','QUANGBINH'),('45','Tỉnh Quảng Trị','Tỉnh','QUANGTRI'),('46','Tỉnh Thừa Thiên Huế','Tỉnh','THUATHIENHUE'),('48','Thành phố Đà Nẵng','Thành phố Trung ương','DANANG'),('49','Tỉnh Quảng Nam','Tỉnh','QUANGNAM'),('51','Tỉnh Quảng Ngãi','Tỉnh','QUANGNGAI'),('52','Tỉnh Bình Định','Tỉnh','BINHDINH'),('54','Tỉnh Phú Yên','Tỉnh','PHUYEN'),('56','Tỉnh Khánh Hòa','Tỉnh','KHANHHOA'),('58','Tỉnh Ninh Thuận','Tỉnh','NINHTHUAN'),('60','Tỉnh Bình Thuận','Tỉnh','BINHTHUAN'),('62','Tỉnh Kon Tum','Tỉnh','KONTUM'),('64','Tỉnh Gia Lai','Tỉnh','GIALAI'),('66','Tỉnh Đắk Lắk','Tỉnh','DAKLAK'),('67','Tỉnh Đắk Nông','Tỉnh','DAKNONG'),('68','Tỉnh Lâm Đồng','Tỉnh','LAMDONG'),('70','Tỉnh Bình Phước','Tỉnh','BINHPHUOC'),('72','Tỉnh Tây Ninh','Tỉnh','TAYNINH'),('74','Tỉnh Bình Dương','Tỉnh','BINHDUONG'),('75','Tỉnh Đồng Nai','Tỉnh','DONGNAI'),('77','Tỉnh Bà Rịa - Vũng Tàu','Tỉnh','BARIAVUNGTAU'),('79','Thành phố Hồ Chí Minh','Thành phố Trung ương','HOCHIMINH'),('80','Tỉnh Long An','Tỉnh','LONGAN'),('82','Tỉnh Tiền Giang','Tỉnh','TIENGIANG'),('83','Tỉnh Bến Tre','Tỉnh','BENTRE'),('84','Tỉnh Trà Vinh','Tỉnh','TRAVINH'),('86','Tỉnh Vĩnh Long','Tỉnh','VINHLONG'),('87','Tỉnh Đồng Tháp','Tỉnh','DONGTHAP'),('89','Tỉnh An Giang','Tỉnh','ANGIANG'),('91','Tỉnh Kiên Giang','Tỉnh','KIENGIANG'),('92','Thành phố Cần Thơ','Thành phố Trung ương','CANTHO'),('93','Tỉnh Hậu Giang','Tỉnh','HAUGIANG'),('94','Tỉnh Sóc Trăng','Tỉnh','SOCTRANG'),('95','Tỉnh Bạc Liêu','Tỉnh','BACLIEU'),('96','Tỉnh Cà Mau','Tỉnh','CAMAU');
           ");
    }
}
