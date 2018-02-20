<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/20
 * Time: 22:00
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function Index()
    {
        return view("Home.index");
    }
}