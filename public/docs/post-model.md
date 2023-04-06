## Post Model

##### Membuat model terdapat 2 cara yaitu :
1. Menggunakan CLI
   gunakan perintah 
   ```bash
   php artisan make:model Post -m
   ```
    `-m` digunakan untuk membuat migration file
    tambahkan keyword `help` untuk melihat semua perintah yang tersedia, contoh : `php artisan help make:model`

2. Menggunakan artisan
   tekan tombol `ctrl+shift+p` pada vscode dan akan muncul command palette, kemudian ketik `artisan` dan pilih `Artisan: Make Model` dan akan muncul dialog untuk membuat model, isikan nama model dan pilih `Create Migration` untuk membuat migration file

Pemberian nama pada model menggunakan CapitalizeCase yang bersifat `singular` dan otomatis akan dibuatkan file migration dengan huruf kecil semua dengan `plural` pada folder `database/migrations`

##### Menambahkan data pada database
Untuk menambahkan mass assignment pada model, tambahkan property `$guarded = ['id']` pada model sehingga kolom `id` tidak boleh diisi, contoh :
```php
protected $guarded = ['id'];
```
Contoh menambahkan mass assignment pada model :
```bash
Post::create([
  'title' => 'Post 1',
  'slug' => 'post-1',
  'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
  'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi ullam recusandae molestias voluptatum corrupti, repudiandae quaerat facere odit illo porro explicabo dolorem laborum, ad maiores delectus soluta debitis illum officia minus adipisci iste aspernatur! Ipsam, cupiditate id velit a voluptate aspernatur delectus perspiciatis obcaecati, laudantium voluptatibus unde! Magnam iste deleniti ullam quaerat, aliquam vero dolore iure eligendi? Molestiae temporibus accusamus consectetur nobis inventore itaque dolore enim corrupti. Inventore eveniet cupiditate maiores corrupti officia ipsum? Reiciendis ducimus ipsum minima accusamus, veritatis, quasi repudiandae impedit voluptatum deleniti ex eaque ad, placeat expedita iste debitis nostrum blanditiis illo at nemo cupiditate nisi harum?'
])
```

##### Route Model Binding
Route model binding adalah fitur yang memungkinkan kita untuk mengambil data dari database berdasarkan parameter yang dikirimkan melalui URL, contoh :
```php
Route::get('/posts/{post}', function (Post $post) {
  return view('posts.show', [
    'post' => $post
  ]);
});
```

##### Mengubah link tiap post menggunakan slug
Dengan cara ubah route menjadi :
```php
Route::get('/posts/{post:slug}', function (Post $post) {
  return view('posts.show', [
    'post' => $post
  ]);
});
```
Kemudian ubah link pada file `index.blade.php` menjadi :
```php
<a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
```


<p align="center">
  <a href="../../README.md">
    <img src="https://img.shields.io/static/v1?label=Home&message=%F0%9F%8F%A1&color=skyblue">
  </a>
</p>