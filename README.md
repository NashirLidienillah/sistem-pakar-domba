# Sistem Pakar Diagnosa Penyakit Domba

Ini adalah aplikasi sistem pakar berbasis web yang dibangun untuk membantu peternak mendiagnosis penyakit pada ternak domba. Sistem ini menggunakan metode **Certainty Factor (CF)** untuk menghitung tingkat keyakinan terhadap suatu penyakit berdasarkan gejala-gejala yang dipilih oleh pengguna.

---

## Fitur Utama

### **Untuk Pengguna (Peternak)**

- **Registrasi & Login:** Sistem otentikasi untuk pengguna.
- **Diagnosa Penyakit:** Antarmuka untuk memilih gejala dan tingkat keyakinan ($CF_{User}$).
- **Hasil Diagnosa:** Menampilkan hasil penyakit yang paling mungkin beserta persentase keyakinan, deskripsi, dan solusi.
- **Ringkasan Kesimpulan:** Paragraf naratif yang mudah dipahami mengenai hasil diagnosa.
- **Riwayat Diagnosa:** Pengguna dapat melihat kembali semua hasil diagnosa yang pernah dilakukannya.

### **Untuk Admin (Pakar)**

- **Dashboard Admin:** Halaman utama dengan ringkasan data (total gejala, penyakit, aturan) dan navigasi yang mudah.
- **CRUD Data Master:** Kemampuan untuk menambah, mengubah, dan menghapus (CRUD) data **Gejala**, **Penyakit**, dan **Aturan (Basis Pengetahuan)**.
- **Riwayat Diagnosa Global:** Admin dapat melihat, mencari, dan mengurutkan semua riwayat diagnosa dari semua pengguna.

---

## Tampilan Sistem

#### Halaman Login

![Halaman Login](public/screenshots/login.png)
_(Ganti `login.png` dengan nama file screenshot Anda)_

#### Halaman Hasil Diagnosa

![Hasil Diagnosa](public/screenshots/hasil-diagnosa.png)
_(Ganti `hasil-diagnosa.png` dengan nama file screenshot Anda)_

#### Dashboard Admin

![Dashboard Admin](public/screenshots/admin-dashboard.png)
_(Ganti `admin-dashboard.png` dengan nama file screenshot Anda)_

---

## Teknologi yang Digunakan

- **Framework:** CodeIgniter 4
- **Bahasa Pemrograman:** PHP 8.x
- **Database:** MySQL
- **Frontend:** Bootstrap 5, JavaScript, JQuery
- **Library Tambahan:** DataTables.js

---

## Panduan Instalasi Lokal

1.  **Clone repository ini:**
    ```bash
    git clone [https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git](https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git)
    ```
2.  **Masuk ke direktori proyek:**
    ```bash
    cd nama-folder-proyek
    ```
3.  **Install dependencies** menggunakan Composer:
    ```bash
    composer install
    ```
4.  **Konfigurasi file `.env`**: Salin file `env` menjadi `.env` dan sesuaikan pengaturan database (`database.default.hostname`, `database.default.database`, dll).
5.  **Buat database** di MySQL dengan nama yang sesuai dengan yang ada di file `.env`.
6.  **Import struktur database**: Impor file `database/db_domba_pakar.sql` ke dalam database yang baru Anda buat.
7.  **Jalankan Seeder** untuk mengisi data awal:
    ```bash
    php spark db:seed UserSeeder
    php spark db:seed AturanMassalSeeder
    ```
8.  **Jalankan server** pengembangan:
    ```bash
    php spark serve
    ```
9.  Buka aplikasi di `http://localhost:8080`.
    - Login Admin: `username: admin`, `password: admin123`

---

## Tim Pengembang

Mahasiswa Universitas Serang Raya - Teknik Informatika

- **M Nashir Lidienillah**
