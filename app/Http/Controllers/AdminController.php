<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/21
 * Time: 13:12
 */

namespace App\Http\Controllers;


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
        return view("admin.index");
    }

    public function logout()
    {
        session()->forget("user_id");
        return redirect("/admin/login");
    }


}