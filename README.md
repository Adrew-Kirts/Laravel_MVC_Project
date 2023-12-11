
# Laravel_MVC_Project


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

