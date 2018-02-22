<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/21
 * Time: 13:12
 */

namespace App\Http\Controllers;


use App\Entity\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $Email = "cc@cc.cc";
    private $Password = "\$2y\$10\$YuKHD6rxN0pqn2IODqPAqO18RKH9MJyNVS4xEkVDhtXityvfAcHK6";

    public function Login()
    {
        return view("admin.login");
    }

    public function LoginPost()
    {
        $input = request()->all();
        $isPasswordCorrect = Hash::check($input["password"], $this->Password);

        if ($input["email"] === $this->Email && $isPasswordCorrect) {
            session()->put("user_id", $this->Email);
            return redirect("/admin");
        }

        $errorMsg = [
            "msg" => ["login filed"]
        ];

        return redirect()->back()->withInput()->withErrors($errorMsg);
    }

    public function Index()
    {
        $articles = Article::orderBy("created_at", "desc")
                ->with("Category")
                ->paginate(parent::rowPerPage);

        $model = [
            "title" => "Article List",
            "articles" => $articles
        ];

        return view("admin.index", $model);
    }

    public function logout()
    {
        session()->forget("user_id");
        return redirect("/admin/login");
    }


}