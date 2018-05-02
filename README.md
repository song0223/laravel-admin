# laravel-admin
自用的laravel admin后台 只有简单的权限功能

我自己简单的将laravel单项目的形式改造成多项目形式，core就是公共类放置的地方（例如model，seed，migration或者一些job）

下面简单记录下多项目改造的方式：
- 第一步：cd到项目根目录，执行laravel安装的代码 (app-web是多项目的目录名) 不过这种方式会将直接执行composer，懒不想弄一个源，所以目前可以直接cd到app-web将vendor删掉
```
composer create-project --prefer-dist laravel/laravel app-web
```
- 第二步：(将命名空间改成需要的)
```php
cd app-web
php artisan app:name App\\Web
```
- 第三步：修改composer.json（命名空间要跟上面修改的一致）
```php
"autoload": {
    "psr-4" : {
        ...
        "App\\Web\\": "app-web/app/"
    }
},
"autoload-dev": {
   "psr-4": {
      ...
      " Tests\\Web\\": "app-web/tests/",
   }
},
```
- 第四步：修改public/index.php（简单的意思就是指向整个项目下的vendor/autoload而不是单个里面）
```php
require __DIR__.'/../vendor/autoload.php'; => require __DIR__.'/../../vendor/autoload.php';
```
- 第五步：修改新增项目下的artisan
```php
require __DIR__.'/vendor/autoload.php'; => require __DIR__.'/../vendor/autoload.php';
```
- 第六步：修改bootstrap/app.php（简单的来说就是将默认的Application换成我费了好大劲才找的一个Application，我把他放在了core/Foundation，功能就是执行php app-web/artisan的时候会将需要的composer.json指向根目录，App\Web是要跟当前修改的命名空间一致）
```php
$app = new Illuminate\Foundation\Application => $app = new App\Foundation\Application

App\Http\Kernel::class => App\Web\Http\Kernel::class

App\Console\Kernel::class => App\Web\Console\Kernel::class

App\Exceptions\Handler::class => App\Web\Exceptions\Handler::class
```

- 最后执行composer dump-autoload

--
简单写下框架用法：
```
git clone git@github.com:song0223/laravel-admin.git
```  
```
composer install
```
```
php core/artisan migrate
```
```
php core/artisan db:seed
```
记得修改下.evn文件信息再跑migration