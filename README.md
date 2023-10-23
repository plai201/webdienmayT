 
# Hướng dẫn Cài Đặt Hệ Thống

## Yêu Cầu Hệ Thống
Trước khi bạn bắt đầu cài đặt, đảm bảo rằng bạn đã cài đặt các yêu cầu hệ thống sau:
- [PHP](https://www.php.net/) (phiên bản ≥ 8.1)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) hoặc một hệ thống quản lý cơ sở dữ liệu tương tự.

## Cài Đặt
1. Sao chép dự án từ kho lưu trữ:

   ```bash
   git clone https://github.com/plai201/webdienmayT.git
   
   

 2. Di chuyển vào thư mục dự án:
    ví dụ thư mục có đường dẫn: D:\WebSite\webdienmay
    ```bash
    cd /d "D:\WebSite\webdienmayT"
 3. Cài đặt composer cho dự án
    ```bash
    composer install
 4. Tạo file môi trường
    ```bash
    copy .env.example .env
    ```
    Mở file .env vừa tạo và cấu hình
    ![image](https://github.com/plai201/webdienmayT/assets/88482704/bbb129c6-bcec-44f1-afbc-5f57ddd5c1f1){:width="100px"}



 6. Tạo khoá ứng dụng
    ```bash
    php artisan key:generate
 7. Chạy ứng dụng và sử dụng
     ```bash
    php artisan serve
=======
# webdienmayT
 
