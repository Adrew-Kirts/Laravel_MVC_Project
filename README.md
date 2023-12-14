
# Laravel_MVC_Project

#### Dev env

run `php artisan serve
` to launch server on localhost

run `npm run dev` to vite compiler for Tailwind 


#### Install debug bar

`
composer require barryvdh/laravel-debugbar --dev
`

Making sure in `.env` to have: `APP_DEBUG=true
`

------

#### Create and configure SqLite db

In .env only keep:

`DB_CONNECTION=sqlite
`

`DB_DATABASE=/absolute/path/to/database.sqlite
`

Then:

`Touch database/database.sqlite`

-----

File structuration of a Laravel project: 

```
Laravel Project
├── app
│   ├── Console
│   ├── Http
│   ├── Models
│   ├── Providers
│   ├── Services
│   └──...
├── config
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   └──...
├── database
│   ├── factories
│   ├── migrations
│   ├── seeds
│   └──...
├── public
│   └── vendor
│      └── telescope
├── resources
│   ├── views (blades)
│   ├── css
│   └──...
├── routes
│   ├── api.php
│   ├── web.php
│   └──...
├── storage
│   ├── app
│   ├── framework
│   └──...
├── tests
│   ├── Feature
│   ├── Unit
│   └──...
├── vendor
│   └──...
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
└── README.md
```
