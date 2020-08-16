
# lara-vue-u
## 51. Seeding bookings (generating random, non overlapping time series)
model factoryを作成 ```php artisan make:factory BookingFactroy```  
### BookingFactory.phpを編集
- Carbon::instance($faker->dateTimeBetween('-1 months', '+1 months'));
- (clone 変数)でオブジェクトのクローンを作成(参照: https://www.php.net/manual/ja/language.oop5.cloning.php)
- $to変数にはclonした$from変数+addDays(random_int(0.14));とする
- returnで$fromとtoを返す
### BookingsTableSeeder.phpを編集
```php artisan make:seeder BookingsTableSeeder```
- DatabaseSeederにcallすることを忘れない
- Bookingクラスをfactoryし、それをmake()で作成したものを$booking変数に代入
- $bookings変数にはcollect()に配列の$bookig変数を入れる 
- ループでfromとtoを作成
- Booking::make([ // ])では$booking = new Booking()でインスタンスを作成し、$booking->from = $fromとしてインスタンスを作成することと同じ。
- $bookings->push($booking)で配列に追加。bookableモデルのbookings()からsaveMany()で$bookingsを保存
- saveMany()について(参照: https://readouble.com/laravel/5.8/ja/eloquent-relationships.html#Save%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89)
- マスアサインメント機能がデフォルトで有効になっているDBにデータを挿入するためにはモデルにカラムの宣言をする(protected $fillable=['カラム名'];)
- 最後に```php artisan migrate:refresh --seeder```を実行

## 52. Single Action Controller
シングルアクションコントローラ(参照: https://readouble.com/laravel/5.7/ja/controllers.html#single-action-controllers)
```php artisan make:controller Api/BookableAvailabilityController --invokable```
- invokable=呼び出し可能 という意味
- なぜかrouteを記述後に上の生成コマンドを入力するとエラーが出るので、コマンド→route記述をするとOK




<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

