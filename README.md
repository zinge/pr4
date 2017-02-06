# pr4
laravel 5.4 build

Simple my close project, from work and laravel skill train
## Install steps
first install via [composer](http://getcomposer.org/), [laravel](https://laravel.com)
```
cd /home/lara
composer create-project --prefer-dist laravel/laravel .
```
clone me now! [Thnx for idea](http://stackoverflow.com/questions/5377960/whats-the-best-practice-to-git-clone-into-an-existing-folder)
```
git init
git remote add origin https://github.com/zinge/pr4.git
git fetch
git checkout origin/master -ft
```
Install via [composer](http://getcomposer.org/), [twbs/bootstrap](http://getbootstrap.com/). [Thnx for idea](http://stackoverflow.com/questions/19118367/how-to-setup-bootstrap-after-downloading-via-composer).

Edit composer.json, add 
```
"require":{
  ...,
  "twbs/bootstrap": "3.3.*"
}

"post-update-cmd": [
  ...,
  "ln -sfr vendor/twbs/bootstrap/dist public/bootstrap"
]

```
and run `composer update`

## License
The licensed under the [MIT license](http://opensource.org/licenses/MIT).
