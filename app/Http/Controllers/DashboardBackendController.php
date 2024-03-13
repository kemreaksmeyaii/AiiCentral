<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Helper\RBAC;
use App\Helper\VisitorHelper;
use App\Models\Article;
use App\Models\Event;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardBackendController extends Controller
{

    public function DashboardBackend()
    {
        if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
            //return redirect to authourized
            return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
        }
        $visitor    = self::mapVisitor();
        $article    = self::mapArticle();
        $event      = self::mapEvent();

        return [
            'visitor' => $visitor,
            'article' => $article,
            'event' => $event
        ];
    }

    static function mapVisitor()
    {
        $currentDate = self::currentDate();
        $day    = Visitor::where('state', 1)->whereDay('created_at', $currentDate['currentDay'])->count();
        $month  = Visitor::where('state', 1)->whereMonth('created_at', $currentDate['currentMonth'])->count();
        $year   = Visitor::where('state', 1)->whereYear('created_at', $currentDate['currentYear'])->count();
        $all    = Visitor::where('state', 1)->count();
        $visitors  = Visitor::orderBy('created_at')->get();

        $chart = array();
        foreach ($visitors as $v) {
            $lable = ($v->created_at)->format('M Y');
            if (!array_key_exists($lable, $chart)) {
                $chart[$lable] = 1;   
            } else {
                $chart[$lable] = $chart[$lable] + 1;
            }
        }

        return [
            'data'  => $visitors,
            'day'   => $day,
            'month' => $month,
            'year'  => $year,
            'all'   => $all,
            'chart' => $chart
        ];
    }
   
    static function mapArticle()
    {
        $currentDate = self::currentDate();
        $day    = Article::where('state', 1)->whereDay('created_at', $currentDate['currentDay'])->count();
        $month  = Article::where('state', 1)->whereMonth('created_at', $currentDate['currentMonth'])->count();
        $year   = Article::where('state', 1)->whereYear('created_at', $currentDate['currentYear'])->count();
        $all    = Article::where('state', 1)->count();
        $article  = Article::orderBy('created_at')->get();

        $chart = array();
        foreach ($article as $v) {
            $lable = ($v->created_at)->format('M Y');
            if (!array_key_exists($lable, $chart)) {
                $chart[$lable] = 1;   
            } else {
                $chart[$lable] = $chart[$lable] + 1;
            }
        }

        return [
            'data' => $article,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'all' => $all,
            'chart' => $chart
        ];
    }
    static function mapEvent()
    {
        $currentDate = self::currentDate();
        $day    = Event::where('state', 1)->whereDay('created_at', $currentDate['currentDay'])->count();
        $month  = Event::where('state', 1)->whereMonth('created_at', $currentDate['currentMonth'])->count();
        $year   = Event::where('state', 1)->whereYear('created_at', $currentDate['currentYear'])->count();
        $all    = Event::where('state', 1)->count();
        $event  = Event::orderBy('created_at')->get();
        
        $chart = array();
        foreach ($event as $v) {
            $lable = ($v->created_at)->format('M Y');
            if (!array_key_exists($lable, $chart)) {
                $chart[$lable] = 1;   
            } else {
                $chart[$lable] = $chart[$lable] + 1;
            }
        }

        return [
            'data' => $event,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'all' => $all,
            'chart' => $chart
        ];
    }

    static function currentDate()
    {
        $currentDate = Carbon::now();
        $currentDay =  $currentDate->format('d');
        $currentMonth =  $currentDate->format('m');
        $currentYear =  $currentDate->format('Y');

        return [
            'currentDate' =>  $currentDate,
            'currentDay' =>  $currentDay,
            'currentMonth' =>  $currentMonth,
            'currentYear' =>  $currentYear,
        ];
    }
}
