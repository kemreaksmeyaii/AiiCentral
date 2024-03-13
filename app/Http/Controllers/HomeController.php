<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (session()->has('AuthToken') == false) {
            return redirect('login');
        }

        return View('Home.index');
    }

    public function getFristNewsCarousel(){
        $news = CategoryArticle::where('state', 1)->where('slug', 'news')->first();
        $news_arclile = Article::where('state', 1)->where('parent_category_id', $news->id)->where('schedule', '<=', date('Y-m-d'))->orderBy('id', 'DESC')->paginate(8);
        return $news_arclile;
    }

    public function newsArticleHome(){
        $news = CategoryArticle::where('state', 1)->where('slug', 'news')->first();
        $news_arclile = Article::where('state', 1)->where('parent_category_id', $news->id)->where('schedule', '<=', date('Y-m-d'))->orderBy('id', 'DESC')->paginate(8);    
        return $news_arclile;
    }


    // public function dashboard()
    // {
    //     if (session()->has('AuthToken') == false) {
    //         return redirect('login');
    //     }

    //     return View('Home.dashboard');
    // }


    public function preview(Request $request) {
		$id = $request->id;
		$article = Article::where('id', $id)->first();
		return response()->json($article);
	}


    public function loadMoreData(Request $request)
    {
        $start = $request->input('start');

        $data = Article::where('state', 1)
            ->where('parent_category_id', 12)
            ->orderBy('ordering','ASC')
            ->offset($start)
            ->limit(20)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 20
        ]);

    }

}
