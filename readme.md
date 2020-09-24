# ¿Vos y cuántos más?
Un juego para saber qué porcentaje de la población de la Argentina es similar a vos.

Creado por el equipo de [Chequeado](http://chequeado.com)

![Logo Chequeado](http://chequeado.com/wp-content/uploads/2015/02/logo2.png)

Con el apoyo de [HIVOS](https://latin-america.hivos.org/)

![Logo Hivos](https://vosycuantosmas.chequeado.com/images/hivos.svg)

# Development

## Dev environment using Vagrant See: https://laravel.com/docs/5.2/homestead 
- Follow this instructions to install `VirtualBox` https://www.virtualbox.org/wiki/Downloads
- Install `Vagrant` https://www.vagrantup.com/downloads.html
- Install `Composer CLI` https://getcomposer.org/doc/00-intro.md
- Clone source code `git clone https://github.com/chequeado/vos-y-cuantos-mas.git`
- Go to `vos-y-cuantos-mas` repo and install dependencies using Composer run `composer install`
- Copy `.env` file running `cp .env.example .env` 
- Complete in `.env` file the database params for `Homestead`.
- Select a THEME between chq or unicef!
- Make sure that PHP is in version 7.1
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
- Run `php artisan key:generate` to create a custom encrypt key.
- Create `Homestead config file` running `php vendor/bin/homestead make`
- Run `vagrant up`
- Access to VM using `vagrant ssh`
- Go to `vos-y-cuantos-mas` directory
- Create and populate the database `php artisan migrate --seed`
- Create a new entry in your `hosts` file with: `192.168.10.10   chequeado.local`
- In your browser go to `chequeado.local` you could see the app running.
- Go to login page: `http://chequeado.local/login`
- Admin User: `admin@admin.com` Password: `1234`
- Ready to create test content and do your job developing!

## Every day dev work
- Go to cloned directory
- Run `vagrant up` to start the VM
- Run `vagrant ssh` to log in to the VM
- Run `vagrant halt` to stop the VM

## Deploy
- Git pull on your php server
- Create an empty mysql database
- Copy `.env.example` as `.env` and complete the data (social + database + language + GA)
- Run `composer install`
- Run `composer dump-autoload`
- Run `php artisan migrate --seed`

## Themes
- Available `chq` & `unicef`
- Set in `.env` for chequeado:
```bash
THEME=chq
```
- Check theme files: https://github.com/chequeado/vos-y-cuantos-mas/tree/master/public/css
- Check theme views: https://github.com/chequeado/vos-y-cuantos-mas/tree/master/resources/views/frontend/themes

## Admin
- Go to `<THE URL>/login`
- User: admin@admin.com Pass: 1234
- Change password immediately.

## Styles + Javascript builds
- Run `gulp watch` to watch files and automatic rebuild.
- Run `gulp` to build on demand.

# Basado en:

## Laravel 5.* Boilerplate, Currently 5.2.23 [Screenshots](http://imgur.com/a/uEKuq)

[![Latest Stable Version](https://poser.pugx.org/rappasoft/laravel-5-boilerplate/v/stable)](https://packagist.org/packages/rappasoft/laravel-5-boilerplate) [![Latest Unstable Version](https://poser.pugx.org/rappasoft/laravel-5-boilerplate/v/unstable)](https://packagist.org/packages/rappasoft/laravel-5-boilerplate)

### Laravel 5.1

You can download the last stable build of Laravel 5.1 [here](https://github.com/rappasoft/laravel-5-boilerplate/tree/Legacy_5.1).

### Introduction

Laravel Boilerplate provides you with a massive head start on any size web application. It comes with a full featured access control system out of the box with an easy to learn API and is built on a Twitter Bootstrap foundation with a front and backend architecture. We have put a lot of work into it and we hope it serves you well and saves you time!

### Wiki

Please view the [wiki](https://github.com/rappasoft/laravel-5-boilerplate/wiki) for a list of [features](https://github.com/rappasoft/laravel-5-boilerplate/wiki#features) as well as [installation instructions](https://github.com/rappasoft/laravel-5-boilerplate/wiki/1.-Installation).

### Issues

If you come across any issues please [report them here](https://github.com/rappasoft/Laravel-5-Boilerplate/issues).

### Contributing

Thank you for considering contributing to the Laravel Boilerplate project! Please feel free to make any pull requests, or e-mail me a feature request you would like to see in the future to Anthony Rappa at rappa819@gmail.com.

### Security Vulnerabilities

If you discover a security vulnerability within this boilerplate, please send an e-mail to Anthony Rappa at rappa819@gmail.com, or create a pull request if possible. All security vulnerabilities will be promptly addressed. Please reference [this page](https://github.com/rappasoft/laravel-5-boilerplate/wiki/7.-Security-Fixes) to make sure you are up to date.

### Donations

If you would like to help the continued efforts of this project, any size [donations](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=JJWUZ4E9S9SFG&lc=US&item_name=Laravel%205%20Boilerplate&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted) are welcomed and highly appreciated.

### License

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)
