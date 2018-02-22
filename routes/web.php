<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@Index");

Route::get("/article/details/{article_id}", "ArticleController@Details");

Route::get("/article", "ArticleController@Index");

Route::group(["prefix" => "admin"], function () {

    Route::get("/login", "AdminController@Login");

    Route::post("/login", "AdminController@LoginPost");

    Route::group(["middleware" => ["authAdmin"]], function () {

        Route::get("/", "AdminController@Index");

        Route::post("/logout", "AdminController@Logout");

        Route::group(["prefix" => "article"], function () {

            Route::get("/create", "AdminArticleController@create");

            Route::get("/edit/{article_id}", "AdminArticleController@edit");

            Route::get("/delete/{article_id}", "AdminArticleController@delete");

            Route::get("/details/{article_id}", "AdminArticleController@details");
        });
    });
});





