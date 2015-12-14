<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * page accueil
 * uses => appelle le nom du controller et l'action(=fonction) du controller
 */

Route::get('/', [
        "as" => "home_page",
       "uses" => "MainController@index"
    ]);



//////////////////////////////////pages statiques//////////////////////////////////////////


/**
 * page faq
 */
// match l'URL /faq et retourne une vue
Route::get('/faq', function () {
    return view('Pages/faq');
});


/**
 * page about
 */
Route::get('/about', function () {
    return view('Pages/about');
});

/**
 * page concept
 */
Route::get('/concept', function () {
    return view('Pages/concept');
});




////////////////////////////////////routes implicites //////////////////////////

/**
 * Auth routing
 * routes implicites
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);


//////////////////////////////////////pages dynamiques//////////////////////////////////////////


/**
 * groupe de routes Admin = backoffice
 * les URLS seront préfixées par "admin"
 */
Route::group(["prefix" => "admin"], function(){





    /**
     * groupe de routes de Categories
     * les URLS seront préfixées par "categories"
     */
    Route::group(["prefix" => "categories"], function(){

        /**
         * page index : liste des categories
         */
        Route::get('/', [

            "uses" => "CategoriesController@index"
        ]);

        Route::get('/index', [
            "as" => "categories_index",
            "uses" => "CategoriesController@index"
        ]);

        /**
         * page create : creer une categorie
         */
        Route::get('/create', [
            "as" => "categories_create",
            "uses" => "CategoriesController@create"
        ]);

        /**
         * page read : voir une categorie
         */
        Route::get('/read/{id}', [
            "as" => "categories_read",
            "uses" => "CategoriesController@read"
        ])->where('id', '\d+');

        /**
         * page edit : editer une categorie
         * prend un argument id en URL
         * le type d'argument est vérifié par le where
         */
        Route::get('/edit/{id}', [
            "as" => "categories_edit",
            "uses" => "CategoriesController@edit"
        ])->where('id', '\d+');

        /**
         * page delete : supprimer une categorie
         */
        Route::get('/delete/{id}', [
            "as" => "categories_delete",
            "uses" => "CategoriesController@delete"
        ])->where('id', '\d+');

        /**
         * enregistre une catégorie dans la BDD depuis un formulaire
         */
        Route::post('/store', [
            "as" => "categories_store",
            "uses" => "CategoriesController@store"
        ]);

    });

    /**
     * groupe de routes de Actors
     * les URLS seront préfixées par "actors"
     */
    Route::group(["prefix" => "actors"], function(){

        /**
         * page index : liste des acteurs
         */
        Route::get('/', [
            "uses" => "ActorsController@index"
        ]);

        Route::get('/index', [
            "as" => "actors_index",
            "uses" => "ActorsController@index"
        ]);

        /**
         * page create : creer un acteur
         */
        Route::get('/create', [
            "as" => "actors_create",
            "uses" => "ActorsController@create"
        ]);

        /**
         * page read : voir un acteur
         */
        Route::get('/read/{id}', [
            "as" => "actors_read",
            "uses" => "ActorsController@read"
        ])->where('id', '\d+');

        /**
         * page edit : editer un acteur
         */
        Route::get('/edit/{id}', [
            "as" => "actors_edit",
            "uses" => "ActorsController@edit"
        ])->where('id', '\d+');

        /**
         * page delete : supprimer un acteur
         */
        Route::get('/delete/{id}', [
            "as" => "actors_delete",
            "uses" => "ActorsController@delete"
        ])->where('id', '\d+');

        /**
         * enregistre un acteur dans la BDD depuis un formulaire
         */
        Route::post('/store', [
            "as" => "actors_store",
            "uses" => "ActorsController@store"
        ]);

    });

    /**
     * groupe de routes de Directors
     * les URLS seront préfixées par "directors"
     */
    Route::group(["prefix" => "directors"], function(){

        /**
         * page index : liste des realisateurs
         */
        Route::get('/', [
            "uses" => "DirectorsController@index"
        ]);

        Route::get('/index', [
            "as" => "directors_index",
            "uses" => "DirectorsController@index"
        ]);

        /**
         * page create : creer un realisateur
         */
        Route::get('/create', [
            "as" => "directors_create",
            "uses" => "DirectorsController@create"
        ]);

        /**
         * page read : voir un realisateur
         */
        Route::get('/read/{id}', [
            "as" => "directors_read",
            "uses" => "DirectorsController@read"
        ])->where('id', '\d+');

        /**
         * page edit : editer un realisateur
         */
        Route::get('/edit/{id}', [
            "as" => "directors_edit",
            "uses" => "DirectorsController@edit"
        ])->where('id', '\d+');

        /**
         * page delete : supprimer un realisateur
         */
        Route::get('/delete/{id}', [
            "as" => "directors_delete",
            "uses" => "DirectorsController@delete"
        ])->where('id', '\d+');

        /**
         * enregistre un réalisateur dans la BDD depuis un formulaire
         */
        Route::post('/store', [
            "as" => "directors_store",
            "uses" => "DirectorsController@store"
        ]);

    });


    /**
     * groupe de routes de Movies
     * les URLS seront préfixées par "movies"
     */
    Route::group(["prefix" => "movies"], function(){

        /**
         * page index : liste des films
         */
        Route::get('/', [
            "uses" => "MoviesController@index"
        ]);

        Route::get('/index', [
            "as" => "movies_index",
            "uses" => "MoviesController@index"
        ]);

        /**
         * page create : creer un film
         */
        Route::get('/create', [
            "as" => "movies_create",
            "uses" => "MoviesController@create"
        ]);

        /**
         * page read : voir un film
         */
        Route::get('/read/{id}', [
            "as" => "movies_read",
            "uses" => "MoviesController@read"
        ])->where('id', '\d+');

        /**
         * page edit : editer un film
         */
        Route::get('/edit/{id}', [
            "as" => "movies_edit",
            "uses" => "MoviesController@edit"
        ])->where('id', '\d+');

        /**
         * page delete : supprimer un film
         */
        Route::get('/delete/{id}', [
            "as" => "movies_delete",
            "uses" => "MoviesController@delete"
        ])->where('id', '\d+');

        /**
         * enregistre un film dans la BDD depuis un formulaire
         */
        Route::post('/store', [
            "as" => "movies_store",
            "uses" => "MoviesController@store"
        ]);

        /**
         * active un film dans la BDD depuis un formulaire
         */
        Route::get('/activate/{id}', [
            "as" => "movies_activate",
            "uses" => "MoviesController@activate"
        ])->where('id', '\d+');

        /**
         * met en avant un film dans la BDD depuis un formulaire
         */
        Route::get('/cover/{id}', [
            "as" => "movies_cover",
            "uses" => "MoviesController@cover"
        ])->where('id', '\d+');

    });

    /**
     * groupe de routes de Cinemas
     * les URLS seront préfixées par "cinemas"
     */
    Route::group(["prefix" => "cinemas"], function(){

        /**
         * page index : liste des cinemas
         */
        Route::get('/', [

            "uses" => "CinemasController@index"
        ]);

        Route::get('/index', [
            "as" => "cinemas_index",
            "uses" => "CinemasController@index"
        ]);

        /**
         * page create : creer un cinema
         */
        Route::get('/create', [
            "as" => "cinemas_create",
            "uses" => "CinemasController@create"
        ]);

        /**
         * page read : voir un cinema
         */
        Route::get('/read/{id}', [
            "as" => "cinemas_read",
            "uses" => "CinemasController@read"
        ])->where('id', '\d+');

        /**
         * page edit : editer un cinema
         * prend un argument id en URL
         * le type d'argument est vérifié par le where
         */
        Route::get('/edit/{id}', [
            "as" => "cinemas_edit",
            "uses" => "CinemasController@edit"
        ])->where('id', '\d+');

        /**
         * page delete : supprimer un cinema
         */
        Route::get('/delete/{id}', [
            "as" => "cinemas_delete",
            "uses" => "CinemasController@delete"
        ])->where('id', '\d+');

        /**
         * enregistre un cinema dans la BDD depuis un formulaire
         */
        Route::post('/store', [
            "as" => "cinemas_store",
            "uses" => "CinemasController@store"
        ]);
    });

        /**
         * groupe de routes de Comments
         * les URLS seront préfixées par "comments"
         */
        Route::group(["prefix" => "comments"], function(){

            /**
             * page index : liste des commentaires
             */
            Route::get('/', [

                "uses" => "CommentsController@index"
            ]);

            Route::get('/index', [
                "as" => "comments_index",
                "uses" => "CommentsController@index"
            ]);



            /**
             * page delete : supprimer un commentaire
             */
            Route::get('/delete/{id}', [
                "as" => "comments_delete",
                "uses" => "CommentsController@delete"
            ])->where('id', '\d+');


            /**
             * active un commentaire dans la BDD depuis un formulaire
             */
            Route::get('/activate/{id}', [
                "as" => "comments_activate",
                "uses" => "CommentsController@activate"
            ])->where('id', '\d+');

        });


});






























