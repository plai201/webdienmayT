<<<<<<< HEAD

# Hướng dẫn Cài Đặt Hệ Thống

## Yêu Cầu Hệ Thống
Trước khi bắt đầu cài đặt, đảm bảo rằng đã cài đặt các yêu cầu hệ thống sau:
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
   /D/WebSite/webdienmayT 
3. Cài đặt composer cho dự án
   ```bash
   composer install
4. Tạo file môi trường
   ```bash
   cp .env.example .env
   ```
   Mở file .env vừa tạo và cấu hình: Đây là cấu hình cho hệ quản trị CSDL MySQL
    - DB_CONNECTION=mysql 
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE= Tên cơ sở dữ liệu (1)
    - DB_USERNAME= Tên tài khoản
    - DB_PASSWORD= Mật khẩu
5. Tạo cơ sở dữ liệu 
    - Tạo mới cơ sở dữ liệu (1)
    - Cài đặt dữ liệu
   ```bash
   php artisan migrate
   
   php artisan db:seed

6. Tạo khoá ứng dụng
   ```bash
   php artisan key:generate
7. Chạy ứng dụng và sử dụng
    ```bash
   php artisan serve
   
8. Tài khoản admin
    - email: nguyenthanhtungksa@gmail.com
    - pass: 12345
=======
# webdienmayT
 
