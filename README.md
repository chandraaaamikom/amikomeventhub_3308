# Tugas 1 - Pemrograman Web

**Identitas Mahasiswa:**
* **Nama:** Chandra Pratama Wahana Putra
* **NIM:** 24.12.3308
* **Jurusan:** Sistem Informasi (SI04)

---

AmikomEventHub

AmikomEventHub adalah aplikasi web berbasis Laravel yang dirancang untuk memudahkan manajemen acara (event) dan sistem pemesanan tiket di lingkungan Universitas Amikom. Aplikasi ini mencakup fitur manajemen event, reservasi tiket, dan integrasi pembayaran menggunakan Midtrans.
Fitur Utama

    Manajemen Event: Admin dapat membuat, mengedit, dan menghapus event.

    Reservasi Tiket: Pengguna dapat memesan tiket acara dengan mudah.

    Integrasi Pembayaran: Terintegrasi dengan Midtrans untuk proses transaksi tiket yang aman dan otomatis.

    Dashboard Admin: Panel khusus untuk memantau data event dan transaksi yang masuk.

Tech Stack

    Framework: Laravel

    Database: MySQL

    Deployment: Railway and Laravel Cloud

    Payment Gateway: Midtrans

    Frontend: Tailwind/Bootstrap

Link Deployment

https://amikomeventhub3308-production.up.railway.app/

https://amikomeventhub-3308-amikomeventhub3308-lwysbc.free.laravel.cloud/


Cara Menjalankan Lokal (Development)

Jika ingin menjalankan proyek ini di komputer lokal, ikuti langkah berikut:

    Clone repository:
    Bash

    git clone https://github.com/chandraaaamikom/amikomeventhub_3308.git
    cd amikomeventhub_3308

    Install dependencies:
    Bash

    composer install
    npm install

    Setup Environment:
    Salin file .env.example menjadi .env dan sesuaikan konfigurasi database Anda:
    Bash

    cp .env.example .env
    php artisan key:generate

    Jalankan Migrasi & Seeder:
    Bash

    php artisan migrate --seed

    Jalankan Aplikasi:
    Bash

    php artisan serve

Kredensial Login (Testing)

Untuk keperluan pengujian/penilaian, gunakan akun berikut:

    Email: admin@amikom.ac.id

    Password: password
