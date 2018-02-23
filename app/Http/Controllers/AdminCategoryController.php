<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/22
 * Time: 22:33
 */

namespace App\Http\Controllers;


use App\Entity\Category;

class AdminCategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::orderBy("id")
            ->paginate(parent::rowPerPage);

        $model = [
            "categories" => $categories
        ];

        return view("admin.category.index", $model);
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function createPost()
    {
        $input = request()->all();

        $sameNameCategory = Category::where("name", $input["name"])->count() > 0;

        if ($sameNameCategory) {
            $err = [
                "msg" => "文章分類名稱不可重複"
            ];
            return redirect()->back()
                ->withErrors($err)->withInput($input);
        }

        Category::create($input);

        return redirect("/admin/category");
    }

    public function details($category_id)
    {
        $model = [
            "category" => $this->GetCategoryById($category_id)
        ];

        return view("admin.category.details", $model);
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

        $this->GetArticleById($article_id)->update($input);

        return redirect("/admin");
    }

    public function delete($article_id)
    {
        $model = [
            "article" => $this->GetArticleById($article_id),
            "category" => $this->GetCategory()
        ];

        return view("admin.article.delete", $model);
    }

    private function GetCategoryById($category_id)
    {
        return Category::where("id", $category_id)
                ->first();
    }
}