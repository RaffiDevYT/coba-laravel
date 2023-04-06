## Database, Migration and Eloquent

1. Untuk dapat menggunakan database, kita harus mengkonfigurasi database di file .env, contoh konfigurasi database di file .env:

```env
DB_CONNECTION=mysql
...
```

2. Untuk membuat database, kita bisa menggunakan perintah berikut:

```bash
php artisan migrate
```

3. Untuk mengisi database, kita bisa menggunakan tinker. 
  ```bash
  php artisan tinker
  ```

4. Kemudian kita buat variabel untuk mendefinisikan model yang akan kita gunakan, contoh:

  ```bash
  $user = new App\Models\Post();
  ```
  atau dengan perintah
  ```bash
  $user = new User();
  ```

5. Kemudian kita bisa mengisi database dengan perintah berikut:

  ```bash
  $user->title = "Judul Post";
  $user->slug = "judul-post";
  $user->body = "Lorem ipsum dolor sit: amet consectetur adipisicing elit. Quisquam, quod.";"
  $user->save();
  ```

6. Untuk melihat isi database, kita bisa menggunakan perintah berikut:

  ```bash
  $user->all();
  ```
  atau dengan perintah
  ```bash
  $user->get();
  ```

<p align="center">
  <a href="../../README.md">
    <img src="https://img.shields.io/static/v1?label=Home&message=%F0%9F%8F%A1&color=skyblue">
  </a>
</p>