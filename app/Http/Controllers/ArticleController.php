<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(){
        $articles=DB::table('articles')
        ->join('authors','articles.author_id','authors.id')
        ->join('categories','articles.category_id','categories.id')
        ->select('articles.*','authors.name','categories.cName')
        ->get();

        return response()->json([
            'status'=>1,
            'articles'=>$articles,
        ],200);
    }
}
