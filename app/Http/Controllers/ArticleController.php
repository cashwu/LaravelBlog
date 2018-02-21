<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/21
 * Time: 00:05
 */

namespace App\Http\Controllers;


use App\Entity\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function details($article_id)
    {
//        DB::enableQueryLog();

        $article = Article::where("id", $article_id)
                    ->with("Category")
                    ->first()
                    ->get();

//        dd($article[0] -> Category -> name);

        $article[0] -> created_at = new Carbon($article[0] -> created_at);

        $model = [
            "title" => "Article",
            "article" => $article[0]
        ];

        return view("article.details", $model);
    }
}