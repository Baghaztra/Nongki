# Nongki

![Nongki Logo](./public/assets/img/logo.png)

## 📌 Deskripsi

**Nongki** adalah sebuah platform berbasis web untuk membantu pengguna menemukan tempat nongkrong di sekitar mereka. Proyek ini dikembangkan dalam rangka **Hackathon Firetect 2024** yang diselenggarakan oleh **Universitas Andalas**.

Aplikasi ini menyediakan fitur pencarian, pengelolaan data tempat nongkrong, serta tampilan tabel interaktif berbasis **DataTables**. Platform ini dibangun menggunakan **Laravel** sebagai backend dan **Vite** untuk pengelolaan asset modern.

---

## 📦 Teknologi yang Digunakan

* **Laravel 11**
* **Vite**
* **PHP 8**
* **MySQL**
* **DataTables JS**
* **Blade Templating**

---

## 📜 Fitur Utama

* 📃 Manajemen data tempat nongkrong (CRUD)
* 🔍 Pencarian data real-time dengan **DataTables**
* 📊 Tampilan tabel interaktif

---

## 🛠️ Cara Menjalankan Proyek

1. Clone repository ini:

   ```bash
   git clone https://github.com/Baghaztra/Nongki.git
   ```
2. Masuk ke folder proyek:

   ```bash
   cd Nongki
   ```
3. Install dependency:

   ```bash
   composer install
   npm install
   ```
4. Copy file `.env.example` menjadi `.env` dan atur konfigurasi database.
5. Generate key aplikasi:

   ```bash
   php artisan key:generate
   ```
6. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```
7. Jalankan server lokal:

   ```bash
   php artisan serve
   ```
8. Jalankan Vite:

   ```bash
   npm run dev
   ```

---

## 👥 Tim Pengembang

| Nama              | Peran                         |
| :---------------- | :---------------------------- |
| Topan Sidiq       | Project Manager               |
| Baghaztra Van Ril | Fullstack Developer (Laravel) |
| Pito Desri Pauzi  | Fullstack Developer (Vite)    |
| Salsabila Agustin | Data Collection               |
| Windy Anggreni    | Data Collection               |

---

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan kompetisi dan non-komersial.
