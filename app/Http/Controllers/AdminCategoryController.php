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
            $err = $this->GetCategoryValidatorErrorMsg();
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

    public function edit($category_id)
    {
        $model = [
            "category" => $this->GetCategoryById($category_id)
        ];

        return view("admin.category.edit", $model);
    }

    public function editPost($category_id)
    {
        $input = request()->all();

        $sameNameCategory = Category::where("name", $input["name"])
                ->where("id", "!=", $category_id)
                ->count() > 0;

        if ($sameNameCategory) {

            return redirect()->back()
                ->withErrors($this -> GetCategoryValidatorErrorMsg())
                ->withInput($input);
        }

        $this->GetCategoryById($category_id)->update($input);

        return redirect("/admin/category");
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

    /**
     * @return array
     */
    private function GetCategoryValidatorErrorMsg()
    {
        return [
            "msg" => "文章分類名稱不可重複"
        ];
    }
}