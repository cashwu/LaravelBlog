<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/20
 * Time: 22:00
 */

namespace App\Http\Controllers;

use App\Entity\Article;
use App\Entity\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Index()
    {
//        $categories = Category::orderBy("created_at")->get();

        $articles = Article::where("is_publish", "=", 1)
                    ->where("publish_date", "<=", date("Y-m-d"))
                    ->orderBy("created_at", "desc")
                    ->take(5)
                    ->get();

        $model = [
            "title" => "Index",
//            "categories" => $categories,
            "articles" => $articles
        ];

        return view("home.index", $model);
    }
}