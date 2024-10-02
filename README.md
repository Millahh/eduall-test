1. **Clone Repository**
   Clone repositori ini ke dalam direktori lokal Anda dengan menggunakan perintah berikut:
   ```bash
   git clone <URL_REPOSITORY>
   cd <NAMA_FOLDER_REPOSITORY>
2. **Instal dependensi**
    ```bash
    composer install
    npm install
3. **Salin .env**
    ```bash
    cp .env.example .env
4. **Pengaturan database**
    ```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=<NAMA_DATABASE>
    DB_USERNAME=<USERNAME>
    DB_PASSWORD=<PASSWORD>
5. **Migrasi seeder**
    ```bash
    php artisan migrate --seed
6. **Jalankan server dan frontend**
    ```bash
    php artisan serve
    npm run dev
