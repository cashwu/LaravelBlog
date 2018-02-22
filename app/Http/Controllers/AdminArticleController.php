<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/22
 * Time: 11:04
 */

namespace App\Http\Controllers;


use App\Entity\Article;
use App\Entity\Category;
use Illuminate\Support\Facades\Validator;

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

        $rules = [
            "category_id" => ["required", "integer"],
            "subject" => ["required", "max:100"],
            "summary" => ["required", "max:1024"],
            "content" => ["required", "max:2000"]
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $input["is_publish"] = request()->has("is_publish");
        $input["view_count"] = 0;

        Article::create($input);

        return redirect("/admin");
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