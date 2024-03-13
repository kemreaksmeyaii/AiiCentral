<?php

namespace App\Http\Controllers;

use App\Helper\MenuFrontendHelper;
use App\Helper\VisitorHelper;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\Info;

class EveventDetailController extends Controller
{
    public function eventDetail($slug)
    {
        $url = url()->full();
        $slugUrl = explode('/', $url);
        $slugLanguage = $slugUrl[3] . '/' . $slugUrl[4];

        if (array_key_exists('en', Config::get('languages'))) {
            Session::put('applocale', 'en');
            App::setLocale(Session()->get('applocale'));
        }

        $info = Info::where('state', 1)->get();

        return $this->returnView($slug, $slugLanguage, $info);
    }

    public function eventDetailKh($slug)
    {
        $url = url()->full();
        $slugUrl = explode('/', $url);
        $slugLanguage = $slugUrl[4] . '/' . $slugUrl[5];

        if (array_key_exists('kh', Config::get('languages'))) {
            Session::put('applocale', 'kh');
            App::setLocale(Session()->get('applocale'));
        }

        $info = Info::where('state', 1)->get();

        return $this->returnView($slug, $slugLanguage, $info);
    }

    protected function returnView($slug, $slugLanguage)
    {
        $countDate = VisitorHelper::visitor();
        $menuFrontend = MenuFrontendHelper::menuFrontend();
        $topMenu = $menuFrontend['topMenu'];
        $mainMenu = $menuFrontend['mainMenu'];
        $bottomMenu = $menuFrontend['bottomMenu'];
        $menuFooterItems = $menuFrontend['menuFooterItems'];

        $data = Event::where('slug', $slug)->first();
        return view('Cms.detail-event', compact('topMenu', 'mainMenu', 'bottomMenu', 'menuFooterItems', 'slugLanguage', 'countDate', 'data'));
    }
}
