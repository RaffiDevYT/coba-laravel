## N+1 Problem

##### Install [clockwork](https://github.com/itsgoingd/clockwork)
Clockwork adalah library untuk menjalankan query data dengan lebih cepat, sehingga tidak terjadi [N+1 problem](https://signoz.io/blog/N+1-query-distributed-tracing/#:~:text=N%2B1%20query%20problem%20is,related%20entities%20of%20the%20object.).
Untuk menginstall clockwork, jalankan perintah berikut pada terminal.
```bash
composer require clockwork/clockwork
```
##### Melakukan [eager loading](https://laravel.com/docs/9.x/eloquent-relationships#eager-loading)
Untuk mengatasi N+1 problem, kita perlu melakukan eager loading pada model yang akan kita gunakan. Pada contoh ini, kita akan melakukan eager loading pada model `Post` dan `Category`.
```php
// app\Http\Controllers\PostController.php
public function index()
{
    $posts = Post::with(['category', 'author'])->latest();
    return view('posts', [
        'posts' => $posts
    ]);
}
```

##### Melakukan [Lazy Loading](https://laravel.com/docs/9.x/eloquent-relationships#lazy-eager-loading) pada category dan author
Dengan menambahkan `load` pada route, kita bisa melakukan lazy loading pada model `category` dan `author`.
```php
// routes\web.php
Route::get('/categories/{category:slug}', function (Category $category) {
    return view ('posts', [
        'posts' => $category->posts->load('category', 'author')
    ]);
});
```

<p align="center">
  <a href="../../README.md">
    <img src="https://img.shields.io/static/v1?label=Home&message=%F0%9F%8F%A1&color=skyblue">
  </a>
</p>