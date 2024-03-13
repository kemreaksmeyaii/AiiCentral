<?php

namespace App\Http\Controllers;

use App\Helper\MenuFrontendHelper;
use App\Models\Menu;
use App\Helper\MenuHelper;
use App\Helper\ViewHelper;
use App\Helper\VisitorHelper;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

use App\Models\Article;
use App\Models\Info;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request as FacadesRequest;


class PageController extends Controller
{

    protected function render($slug = null)
    {
        // if ($slug == null && url()->previous() == url()->current()) {
        //     return redirect('/'); // default home page kh
        // }
        $url = explode('/', $slug);
        $slugMenu =  $this->fixUrl($slug);
        $slugLanguage = $slugMenu['slugLanguage'];

        $countDate = VisitorHelper::visitor();
        $menuFrontend = MenuFrontendHelper::menuFrontend();
        $topMenu = $menuFrontend['topMenu'];
        $mainMenu = $menuFrontend['mainMenu'];
        $bottomMenu = $menuFrontend['bottomMenu'];
        $menuFooterItems = $menuFrontend['menuFooterItems'];

        // home page or main page
        if ($slug == null || $slug == 'kh') { // on root url
            $type = 'main_page';
            $reference_id = null;
        } else { // have slug by menu

            // page detail
            $type = 'not detail';
            if (count($url) > 1) {

                if ($url[0] == 'articles' && count($url) == 2) { // page english (articles/slug page)
                    $type = $url[0];
                    $reference_id = $url[1];
                }
                if ($url[1] == 'articles' && count($url) == 3) { // page khmer (kh/articles/slug page)
                    $type = $url[1];
                    $reference_id = $url[2];
                }
            }

            if ($type != 'articles') {
                if ($slugMenu['slugMenu'] == 'article-list') { // page list article by category
                    $type = $slugMenu['slugMenu'];
                    if (count($url) == 2 && $url[0] == 'article-list') { // for english
                        $reference_id = $url[1];
                    }
                    if (count($url) == 3 && $url[0] == 'kh') {
                        $reference_id = $url[2];
                    }
                } else {
                    $menu_item = Menu::where('slug', $slugMenu['slugMenu'])->first();
                    if ($menu_item) {
                        $type = $menu_item->menu_type;
                        $reference_id = $menu_item->reference_id;
                    } else {
                        return view('Cms.page-error', compact('topMenu', 'mainMenu', 'bottomMenu', 'menuFooterItems', 'slugLanguage', 'countDate'));
                    }
                }
            }
        }
        $data = ViewHelper::get_view_by_type($type, $reference_id);

        return view($data['view'], compact('topMenu', 'mainMenu', 'bottomMenu', 'menuFooterItems', 'slugLanguage', 'countDate'))->with('data', $data['data']);
    }

    protected function fixUrl($slug = null)
    {
        $url = explode('/', $slug);
        if ($slug == null) { // not slug home en
            $language = 'en'; // defualt en
            $slugMenu = 'main_page';
        } else if (count($url) > 1) { // page have slug > 1
            if ($url[0] == 'kh') { // slug > 1 page kh
                $language = 'kh';
                $slugMenu = $url[1];
            } else { // slug > 1 page en
                $language = 'en';
                $slugMenu = $url[0];
            }
        } else if ($url[0] == 'kh') { // one slug home kh
            $language = 'kh';
            $slugMenu = 'main_page';
        } else { // one slug home en
            $slugMenu = $url[0];
            $language = 'en';
        }

        if (array_key_exists($language, Config::get('languages'))) {
            Session::put('applocale', $language);
            App::setLocale(Session()->get('applocale'));
        }

        // button change language
        if ($url[0] == 'kh') {
            unset($url[0]); // delete index
            $slugLanguage = implode('/', $url); // convert to slug
        } else if ($slug == null) {
            $slugLanguage = '/';
        } else {

            $slugLanguage = $slug;
        }

        return [
            'slugMenu' => $slugMenu,
            'slugLanguage' => $slugLanguage
        ];
    }
}
