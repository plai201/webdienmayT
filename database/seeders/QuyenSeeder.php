<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement("INSERT INTO `quyen` VALUES (1,'Danh mục sản phẩm','Danh mục sản phẩm',0,NULL),(2,'Xem danh sách','Xem danh sách',1,'Danh mục sản phẩm_Xem danh sách'),(3,'Thêm','Thêm',1,'Danh mục sản phẩm_Thêm'),(4,'Sửa','Sửa',1,'Danh mục sản phẩm_Sửa'),(5,'Xoá','Xoá',1,'Danh mục sản phẩm_Xoá'),(6,'Khôi phục','Khôi phục',1,'Danh mục sản phẩm_Khôi phục'),(7,'Nhãn hàng','Nhãn hàng',0,NULL),(8,'Xem danh sách','Xem danh sách',7,'Nhãn hàng_Xem danh sách'),(9,'Thêm','Thêm',7,'Nhãn hàng_Thêm'),(10,'Sửa','Sửa',7,'Nhãn hàng_Sửa'),(11,'Xoá','Xoá',7,'Nhãn hàng_Xoá'),(12,'Khôi phục','Khôi phục',7,'Nhãn hàng_Khôi phục'),(13,'Sản phẩm','Sản phẩm',0,NULL),(14,'Xem danh sách','Xem danh sách',13,'Sản phẩm_Xem danh sách'),(15,'Thêm','Thêm',13,'Sản phẩm_Thêm'),(16,'Sửa','Sửa',13,'Sản phẩm_Sửa'),(17,'Xoá','Xoá',13,'Sản phẩm_Xoá'),(18,'Khôi phục','Khôi phục',13,'Sản phẩm_Khôi phục'),(19,'Tài khoản','Tài khoản',0,NULL),(20,'Xem danh sách','Xem danh sách',19,'Tài khoản_Xem danh sách'),(21,'Thêm','Thêm',19,'Tài khoản_Thêm'),(22,'Sửa','Sửa',19,'Tài khoản_Sửa'),(23,'Xoá','Xoá',19,'Tài khoản_Xoá'),(24,'Khôi phục','Khôi phục',19,'Tài khoản_Khôi phục'),(25,'Vai trò','Vai trò',0,NULL),(26,'Xem danh sách','Xem danh sách',25,'Vai trò_Xem danh sách'),(27,'Thêm','Thêm',25,'Vai trò_Thêm'),(28,'Sửa','Sửa',25,'Vai trò_Sửa'),(29,'Xoá','Xoá',25,'Vai trò_Xoá'),(30,'Khôi phục','Khôi phục',25,'Vai trò_Khôi phục'),(31,'Quyền','Quyền',0,NULL),(32,'Xem danh sách','Xem danh sách',31,'Quyền_Xem danh sách'),(35,'Đơn hàng chi tiết','Đơn hàng chi tiết',0,NULL),(36,'Xem danh sách','Xem danh sách',35,'Đơn hàng chi tiết_Xem danh sách'),(37,'Xoá','Xoá',35,'Đơn hàng chi tiết_Xoá'),(38,'Đơn hàng khuyến mãi','Đơn hàng khuyến mãi',0,NULL),(39,'Xem danh sách','Xem danh sách',38,'Đơn hàng khuyến mãi_Xem danh sách'),(40,'Thêm','Thêm',38,'Đơn hàng khuyến mãi_Thêm'),(41,'Sửa','Sửa',38,'Đơn hàng khuyến mãi_Sửa'),(42,'Xoá','Xoá',38,'Đơn hàng khuyến mãi_Xoá'),(43,'Thống kê','Thống kê',0,NULL),(44,'Xem danh sách','Xem danh sách',43,'Thống kê_Xem danh sách'),(45,'Đơn hàng','Đơn hàng',0,NULL),(46,'Xem danh sách','Xem danh sách',45,'Đơn hàng_Xem danh sách'),(47,'Sửa','Sửa',45,'Đơn hàng_Sửa'),(48,'Khách hàng','Khách hàng',0,NULL),(49,'Xem danh sách','Xem danh sách',48,'Khách hàng_Xem danh sách'),(50,'Thêm','Thêm',48,'Khách hàng_Thêm'),(51,'Sửa','Sửa',48,'Khách hàng_Sửa'),(52,'Đánh giá sản phẩm','Đánh giá sản phẩm',0,NULL),(53,'Xem danh sách','Xem danh sách',52,'Đánh giá sản phẩm_Xem danh sách'),(54,'Sửa','Sửa',52,'Đánh giá sản phẩm_Sửa'),(55,'Xoá','Xoá',52,'Đánh giá sản phẩm_Xoá');");
    }
}
