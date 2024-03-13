<?php

namespace App\Http\Controllers;

use App\Helper\MenuFrontendHelper;
use Illuminate\Http\Request;
use App\Helper\VisitorHelper;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $url = url()->full();
        $slug = explode('/', $url);
        $slugLanguage = $slug[3];
        if (array_key_exists('en', Config::get('languages'))) {
            Session::put('applocale', 'en');
            App::setLocale(Session()->get('applocale'));
        }

        return $this->returnView($request->search, $slugLanguage);
    }

    public function searchKh(Request $request)
    {
        $url = url()->full();
        $slug = explode('/', $url);
        $slugLanguage = $slug[4];

        if (array_key_exists('kh', Config::get('languages'))) {
            Session::put('applocale', 'kh');
            App::setLocale(Session()->get('applocale'));
        }

        return $this->returnView($request->search, $slugLanguage);
    }

    protected function returnView($search, $slugLanguage)
    {
        $countDate = VisitorHelper::visitor();
        $menuFrontend = MenuFrontendHelper::menuFrontend();
        $topMenu = $menuFrontend['topMenu'];
        $mainMenu = $menuFrontend['mainMenu'];
        $bottomMenu = $menuFrontend['bottomMenu'];
        $menuFooterItems = $menuFrontend['menuFooterItems'];

        // $sql = "SELECT title_en, title_kh,   slug_en , id , introduction_en, introduction_kh , 'article' result_type
        //         FROM articles where title_en like '%$search%'
        //         or title_kh like '%$search%'
        //     union
        //     SELECT title_en, title_kh,  slug , id , '' intro_en, '' intro_kh, 'event' result_type
        //         FROM events where title_en like '%$search%'";
        // $data = DB::select($sql);

        $articles = DB::table('articles')
                ->select('title_en', 'title_kh', 'slug_en', 'slug_kh', 'id','parent_category_id',
                    'introduction_en as introduction',
                    'introduction_kh',
                    DB::raw("'article' as result_type"))
                ->where('title_en', 'like', '%'.$search.'%')
                ->where('state', 1)
                ->orWhere('title_kh', 'like', '%'.$search.'%')
                ->get();

        $events = DB::table('events')
                        ->select('title_en', 'title_kh', 'slug', 'id',
                            DB::raw("'' as introduction_en"),
                            DB::raw("'' as introduction_kh"),
                            DB::raw("'event' as result_type"))
                        ->where('title_en', 'like', '%'.$search.'%')
                        ->orWhere('title_kh', 'like', '%'.$search.'%')
                        ->get();

        $data = $articles->merge($events);



        return view('Cms.search', compact('topMenu', 'mainMenu', 'bottomMenu', 'menuFooterItems', 'slugLanguage', 'countDate', 'data', 'search'));
    }
}
