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
        $model = [
            "category" => $this->GetCategory()
        ];

        return view("admin.article.create", $model);
    }

    public function createPost()
    {
        $input = request()->all();
        $input["is_publish"] = request()->has("is_publish");

        $validator = Validator::make($input, $this->validatorRules());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)->withInput($input);
        }

        $input["view_count"] = 0;

        Article::create($input);

        return redirect("/admin");
    }

    public function details($article_id)
    {
        $model = [
            "article" => $this->GetArticleById($article_id)
        ];

        return view("admin.article.details", $model);
    }

    public function edit($article_id)
    {
        $model = [
            "article" => $this->GetArticleById($article_id),
            "category" => $this->GetCategory()
        ];

        return view("admin.article.edit", $model);
    }

    public function editPost($article_id)
    {
        $input = request()->all();
        $input["is_publish"] = request()->has("is_publish");

        $validator = Validator::make($input, $this->validatorRules());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)->withInput($input);
        }

        $article = $this->GetArticleById($article_id);
        $article->update($input);

        return redirect("/admin");
    }

    public function delete()
    {

    }

    private function GetArticleById($article_id)
    {
        return Article::where("id", $article_id)
            ->with("Category")
            ->first();
    }

    private function GetCategory()
    {
        return Category::orderBy("id")->get();
    }

    private function validatorRules()
    {
        return [
            "category_id" => ["required", "integer"],
            "subject" => ["required", "max:100"],
            "summary" => ["required", "max:1024"],
            "content" => ["required", "max:2000"]
        ];
    }
}