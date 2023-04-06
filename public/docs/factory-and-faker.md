## Factory and Faker

##### Config Faker dengan locale Indonesia

edit file pada `~/config/app.php` lalu cari bagian `Faker` dan ubah default locale menjadi :
```php
'faker_locale' => env('FAKER_LOCALE','id_ID'),
```
secara otomatis akan menyesuaikan locale dengan file `.env` yang ada dan tambahkan parameter `FAKER_LOCALE` dengan value `id_ID`.

##### Membuat factory pada model User
buka file DatabaseSeeder.php pada folder `~/database/seeders/DatabaseSeeder.php` lalu aktifkan code dibawah ini :
```php
App\Models\User::factory(5)->create();
```
nantinya akan dibuatkan data user sebanyak 5 data.

##### Membuat factory pada model Post
ketikkan perintah berikut pada terminal :
```bash
php artisan make:factory PostFactory
```

##### Untuk membuat model dengan menambahkan migration, factory, dan seeder secara otomatis
Ketika ingin membuat model `Student` ketikkan perintah berikut pada terminal :
```bash
php artisan make:model Student -mfs
```
- `-m` untuk membuat migration
- `-f` untuk membuat factory
- `-s` untuk membuat seeder.


<p align="center">
  <a href="../../README.md">
    <img src="https://img.shields.io/static/v1?label=Home&message=%F0%9F%8F%A1&color=skyblue">
  </a>
</p>