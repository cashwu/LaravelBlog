<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/22
 * Time: 11:04
 */

namespace App\Http\Controllers;


use App\Entity\Category;

class AdminArticleController extends Controller
{
    public function create()
    {
        $category = Category::orderBy("id")->get();

        $model = [
            "category" => $category
        ];

        return view("admin.article.create", $model);
    }

    public function createPost()
    {
        $input = request()->all();

        dd($input);
    }


    public function edit()
    {

    }

    public function details()
    {

    }

    public function delete()
    {

    }
}