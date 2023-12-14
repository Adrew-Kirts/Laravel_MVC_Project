
# Laravel_MVC_Project

### Dev env

run `php artisan serve
` to launch server on localhost

run `npm run dev` to vite compiler for Tailwind 


### Install debug bar

`
composer require barryvdh/laravel-debugbar --dev
`

Making sure in `.env` to have: `APP_DEBUG=true
`

------

### Create and configure SqLite db

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

### API routes :

#### Retrieving the list of movies

The `/api/movies` route returns the complete list of movies.

**Method:** GET

## Retrieving a movie by ID

The `/api/movie/{id}` route returns the information of a specific movie using its ID.

**Method:** GET

**Parameter:**

- `id`: the ID of the movie to retrieve

## Creating a new movie

The `/api/movies/` route allows you to create a new movie.

**Method:** POST

**Header:**

```
Content-Type: application/json
```

**Body:**

```json
{"created_at":"2023-12-14T11:15:03.000000Z",
    "updated_at":null,"title":"EEEEEE",
    "year":"2011",
    "artwork":"https:\/\/image.tmdb.org\/t\/p\/w500\/cAWLz9kFv4xc6IsEXTj2DrcqD55.jpg",
    "description":"Brandon, a thirty-something man living in New York, eludes intimacy with women but feeds his deepest desires with a compulsive addiction to sex. When his younger sister temporarily moves into his apartment, stirring up bitter memories of their shared painful past, Brandon's life, like his fragile mind, gets out of control.",
    "actor":"Michael Fassbender, Carey Mulligan, James Badge Dale, Nicole Beharie, Lucy Walters",
    "studio":null,
    "genre":"YOLO"}
```

## Updating an existing movie

The `/api/movie/{id}` route allows you to update the information of an existing movie using its ID.

**Method:** PUT

**Parameter:**

- `id`: the ID of the movie to update

**Header:**

```
Content-Type: application/json
```

**Body:**

```json
{"created_at":"2023-12-14T11:15:03.000000Z",
    "updated_at":null,"title":"EEEEEE",
    "year":"2011",
    "artwork":"https:\/\/image.tmdb.org\/t\/p\/w500\/cAWLz9kFv4xc6IsEXTj2DrcqD55.jpg",
    "description":"Brandon, a thirty-something man living in New York, eludes intimacy with women but feeds his deepest desires with a compulsive addiction to sex. When his younger sister temporarily moves into his apartment, stirring up bitter memories of their shared painful past, Brandon's life, like his fragile mind, gets out of control.",
    "actor":"Michael Fassbender, Carey Mulligan, James Badge Dale, Nicole Beharie, Lucy Walters",
    "studio":null,
    "genre":"YOLO"}
```

## Deleting a movie

The `/api/movie/{id}` route allows you to delete an existing movie using its ID.

**Method:** DELETE

**Parameter:**

- `id`: the ID of the movie to delete

## Connecting to the API

To connect to the API, you can use the built-in OAuth2 authentication method of Laravel Sanctum. You need to create an access token using the `/api/token` route.
