## Searching and Pagination

##### Add Searching for Post
Tambahkan form search pada `posts.blade.php` pada folder `resources/views/posts` dengan kode berikut:
```php
<form action="" method="GET">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
    <button class="btn btn-outline-secondary" type="submit">Search</button>
  </div>
</form>
```
- Name `search` pada input berfungsi untuk menyimpan nilai yang diinputkan pada form search. 
- Value `{{ request('search') }}` berfungsi untuk menampilkan nilai yang diinputkan pada form search saat klik tombol search.
- Type `submit` berfungsi untuk mengirimkan data yang diinputkan pada form search sehingga dapat berjalan dengan menekan tombol enter.

Disini juga menambahkan jika user mencari kata tetapi tidak ada hasil yang cocok maka akan menampilkan pesan `No result found for {{ request('search') }}` dengan kode berikut:
```php
@if ($posts->count() == 0)
  <div class="alert alert-danger">
    No result found for {{ request('search') }}
  </div>
@endif
```

##### Testing Form Searching
Lakukan test terhadap form search yang telah dibuat dengan cara masukkan keyword pada form search dan tekan tombol search. Kemudian lakukan `dump and die` pada `PostController.php` pada folder `app/Http/Controllers` untuk melihat hasilnya.
```php
public function index()
{
  dd(request('search'));
}
```
Jika berhasil maka akan menampilkan hasil pencarian yang diinputkan pada form search.

##### Menjalankan query search pada database
Untuk menjalankan query search pada database maka tambahkan kode berikut pada `PostController.php` pada folder `app/Http/Controllers`:
```php
public function index()
{
  $posts = Post::when(request('search'), function ($query) {
    $query->where('title', 'like', '%' . request('search') . '%')
          ->orWhere('body', 'like', '%' . request('search') . '%');
  });

  return view('posts', [
    'posts' => $posts->get();
  ]);
}
```

##### Melakukan query search pada model dengan eloquent
Untuk melakukan query search pada model dengan eloquent menggunakan [query scope](https://laravel.com/docs/9.x/eloquent#local-scopes) maka pindahkan kode berikut ke `Post.php` pada folder `app/Models`:
```php
public function scopeFilter($query)
{
  if(request('search')) {
    return $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
  }
}
```
dan pada `PostController.php` pada folder `app/Http/Controllers` tambahkan kode berikut:
```php
public function index()
{
  return view('posts', [
    'posts' => Post::latest()->filter()->get();
  ]);
}
```
`filter()` berfungsi untuk menjalankan query scope yang telah dibuat pada model yaitu `scopeFilter()`.

##### `request('search')` pada model `Post.php` kerjaannya Controller bukan model
Untuk melakukan `request('search')` pada Controller maka perlu menggunakan `isset` pada model `Post.php` pada folder `app/Models`:
```php
public function scopeFilter($query, array $filters)
{
  if(isset($filters['search']) ? $filters['search'] : false) {
    return $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
  }
}
```
- array `$filters` berfungsi untuk menampung banyak nilai yang diinputkan pada form search, nantinya search tidak hanya kata dari judul atau body saja tetapi juga dari author, category, dan tag.
- `isset(request('search')) ? request('search') : false` berfungsi untuk mengecek apakah ada nilai yang diinputkan pada form search atau tidak jika ada maka akan menjalankan query search pada baris kode dibawahnya dan jika tidak maka tidakn akan menjalankan kode dibawahnya.
- Ubah kode `request('search')` pada `return $query....` menjadi `$filters['search']`

Pada `PostController.php` pada folder `app/Http/Controllers` edit kode menjadi:
```php
public function index()
{
  return view('posts', [
    'posts' => Post::latest()->filter(request(['search']))->get();
  ]);
}
```
- `request(['search'])` berfungsi untuk menampung nilai yang diinputkan pada form search.

##### Menambahkan pagination dan use bootstrap
Untuk menambahkan pagination dengan menambahkan methode `paginate()` pada `PostController.php` dan tambahkan jumlah data per halaman contoh :
```php
public function index()
{
  return view('posts', [
    'posts' => Post::latest()->filter(request(['search']))->paginate(5)->withQueryString();
  ]);
}
```
- angka `5` berfungsi untuk menampilkan 5 data per halaman.
- method `withQueryString()` berfungsi untuk menampilkan query string pada url sehingga ketika user pilih category atau tag maka query string akan tetap ada.

Dan untuk menambahkan link pagination pada `posts.blade.php` pada folder `resources/views/posts` tambahkan kode berikut:
```php
{{ $posts->links() }}
```
Secara otomatis bootstrap akan menambahkan link pagination pada halaman akan tetapi tampilan pagination menggunakan tailwind maka perlu menggunakan bootstrap, dapat dilihat [disini](https://laravel.com/docs/9.x/pagination#using-bootstrap)

<p align="center">
  <a href="../../README.md">
    <img src="https://img.shields.io/static/v1?label=Home&message=%F0%9F%8F%A1&color=skyblue">
  </a>
</p>