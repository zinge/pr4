# pr4
laravel 5.4 build

Simple my close project, from work and laravel skill train
## Install steps
first install via [composer](http://getcomposer.org/), [laravel](https://laravel.com)
```
cd /home/lara
composer create-project --prefer-dist laravel/laravel .
```
## Make auth
Simple in box auth laravel way say, this easy, use:
```
php artisan make:auth
```

clone me now! [Thnx for idea](http://stackoverflow.com/questions/5377960/whats-the-best-practice-to-git-clone-into-an-existing-folder)
```
git init
git remote add origin https://github.com/zinge/pr4.git
git fetch
git checkout origin/master -ft
```
and run `composer update`

## Seed default admin
Look files database/seeds/roleSeed.php, edit if need, and seed from database
```
composer dump-autoload
php artisan migrate:refresh
php artisan db:seed
```

## License
The licensed under the [MIT license](http://opensource.org/licenses/MIT).
