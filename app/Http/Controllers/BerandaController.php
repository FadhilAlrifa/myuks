<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\Student;
use App\Models\User;
use Database\Factories\ArticleFactory;
// use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('homes', [
            "url_name" => "Beranda",
            "nav_title" => "Solusi Kesehatan",
            "user" => User::latest()->get(),
            "articles" => Article::latest()->get(),
            "articles_category" => ArticleCategory::all(),
            "medicines" => Medicine::latest()->get(),
            "medicines_category" => MedicineCategory::all(),
            "students" => Student::all(),
        ]);
    }
}
