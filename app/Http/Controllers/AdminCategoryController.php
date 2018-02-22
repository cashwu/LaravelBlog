<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/22
 * Time: 22:33
 */

namespace App\Http\Controllers;


class AdminCategoryController extends Controller
{
    public function Index()
    {
        return view("admin.category.index");
    }
}