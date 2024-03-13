<?php

namespace App\Helper;

use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Slide;
use App\Models\Event;
use App\Models\CategoryEvent;
use App\Models\Info;
use App\Models\PopupHome;
use App\Models\VideoEmbed;
use Illuminate\Support\Facades\DB;
use GMaps;
use App\Models\Quiz;
// use FarhanWazir\GoogleMaps\GMaps;


class ViewHelper
{


    public static function get_view_by_type($menu_type, $reference_id = null)
    {
  

        switch ($menu_type) {

            // Single Article
            case ('single_article'):
                $article = Article::where('state', 1)
                    ->where('id', $reference_id)
                    ->first();

                $info = Info::where('state', 1)->get();

                if ($article == null) { // page not found
                    return [
                        'data' => null,
                        'view' => 'Cms.page-error',
                    ];
                }
         
                return [
                    'data' => [
                        'article' => $article,
                        'info' => $info
                        ] ,
                    'view' => 'Cms.single-article',
                ];

            // Feature Article
            case ('feature_article'):
                $data = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('feature', '=', 1)
                    ->paginate(15);
                if (count($data) == null) { // page not found
                    return [
                        'data' => null,
                        'view' => 'Cms.page-error',
                    ];
                }
                return [
                    'data' => $data,
                    'view' => 'Cms.feature-article',
                ];

            // Single Category
            case ('single_category'):

                $category = CategoryArticle::find($reference_id);
                
                $article = Article::where('state', 1)
                ->where('schedule', '<=', date('Y-m-d'))
                ->where('parent_category_id', $reference_id)
                ->orderBy('schedule', 'DESC')
                ->orderBy('ordering','ASC')
                ->paginate(15);

                $latest_article = Article::where('state', 1)
                ->where('schedule', '<=', date('Y-m-d'))
                ->where('parent_category_id', $reference_id)
                ->orderBy('schedule', 'DESC')
                ->orderBy('ordering','ASC')
                ->orderBy('id','DESC')
                ->first();
            
                $info = Info::where('state', 1)->get();

                // dd($category->id);

                if($category->id == 26){

                    $quizzes = Quiz::orderBy('ordering','ASC')->with('questionTypes')->get();

                    return [
                        'data' => [
                            'category' => $category,
                            'info' => $info,
                            'quizzes' => $quizzes
                        ],
                        'view' => 'Cms.quiz.test-your-english',
                    ];
                }

                // dd($category->id);

               
                
               
                if($category->id == 6){


                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->whereIn('parent_category_id', [2, 3, 6, 7, 8, 9, 10])
                    ->orderBy('schedule', 'DESC')
                    ->orderBy('ordering','ASC')
                    ->paginate(20);

                    // dd($article);


                    $latest_article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->whereIn('parent_category_id', [2, 3, 6, 7, 8, 9, 10])
                    ->orderBy('schedule', 'DESC')
                    ->orderBy('ordering','ASC')
                    ->orderBy('id','DESC')
                    ->latest()
                    ->first();

                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'latest_article' => $latest_article, 
                            'info' => $info
                        ],
                        'view' => 'Cms.category.allNews',
                    ];

                }
                

                // School Committee
                if($category->id == 12){
                    
                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('ordering','ASC')
                    ->paginate(20);

                    $school_committee_description = Info::where('key','school-committee')->get();

                    if (count($school_committee_description) == null) { // page not found
                        return [
                            'data' => null,
                            'view' => 'Cms.page-error',
                        ];
                    }
                    
                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article, 
                            'school_committee_description' => $school_committee_description,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.school-committee',
                    ];
                }

                if($category->id == 21){
                   

                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('schedule', 'ASC')
                    ->paginate(15);

                    return [
                    'data' => [
                        'category' => $category, 
                        'article' => $article,
                        'info' => $info
                    ],
                    'view' => 'Cms.category.academics'
                    ];
                    
                }

                if($category->id == 23){

                    return [
                        'data' => [
                            'category' => $category, 
                            'info' => $info
                        ],
                        'view' => 'Cms.category.about-us'
                        ];
                }

                //history
                if($category->slug == 'history'){

                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('schedule', 'ASC')
                    ->orderBy('ordering','ASC')
                    ->get();

                    return [
                    'data' => [
                        'category' => $category, 
                        'article' => $article,
                        'info' => $info
                    ],
                    'view' => 'Cms.history'
                    ];
                }
                // newsletter
                if($category->id == 11){
                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    // ->orderBy('schedule', 'ASC')
                    ->orderBy('ordering','DESC')
                    ->paginate(15);
                    
                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.newsletter',
                    ];
                }
                // board-of-trustees
                if($category->slug == 'board-of-trustees'){
                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.board-of-trustees',
                    ];
                }
                // publications
                if($category->slug == 'publications'){
                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.publications',
                    ];
                }
                // institutions-and-companies
                if($category->slug == 'institutions-and-companies'){
                    
                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('ordering','ASC')
                    ->get();

                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.institutions-and-companies',
                    ];
                }
                // aii forum
                if($category->slug == 'aii-forum' || $category->slug == 'forum' || $category->slug == 'alumni'){

                    $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('schedule', 'DESC')
                    ->orderBy('ordering','ASC')
                    ->get();

                    // return response()->json($article);

                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.aii-forum'
                    ];
                }

                if($category->slug == 'accolades' || $category->slug == 'accolade'){
                    return [
                        'data' => [
                            'category' => $category, 
                            'article' => $article,
                            'info' => $info
                        ],
                        'view' => 'Cms.category.accolades',
                        
                    ];
                }


                if (count($article) == null) { // page not found
                    return [
                        'data' => null,
                        'view' => 'Cms.page-error',
                    ];
                }

                

                return [
                    'data' => [
                        'category' => $category, 
                        'article' => $article , 
                        'latest_article' => $latest_article
                    ],
                    'view' => 'Cms.single-category',
                ];

            // Category List
            case ('category_list'):
                $data = CategoryArticle::where('state', 1)->paginate(9);
                if (count($data) == null) { // page not found
                    return [
                        'data' => null,
                        'view' => 'Cms.page-error',
                    ];
                }
                return [
                    'data' => $data,
                    'view' => 'Cms.category-list',
                ];
                // Article List
            case ('article-list'): // list by id category article
                $data = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->paginate(15);
                if (count($data) == null) { // page not found
                    return [
                        'data' => null,
                        'view' => 'Cms.page-error',
                    ];
                }
                return [
                    'data' => $data,
                    'view' => 'Cms.article-list',
                ];

            // Contact Form
            case ('contact_form'):
                $data = Info::where('state', 1)->get();
                $mapData = self::mapDatapageContact($data);
                return [
                    'data' => $mapData,
                    'view' => 'Cms.contact-form',
                ];

            // Contact Form
            case ('history_page'):
                $data = Info::where('state', 1)->get();
                
                return [
                    'data' => $data,
                    'view' => 'Cms.history',
                ];

            // Articles
            case ('articles'): // page detail articles
                // replace reference id to slug at pageController
                $data = Article::where('slug_en', $reference_id)->first();
                
                $relateData = Article::where('parent_category_id', $data->parent_category_id)
                ->where('state', 1)
                ->where('schedule', '<=', date('Y-m-d'))
                ->orderBy('ordering','ASC')
                ->get();

                $category = CategoryArticle::find($reference_id);
                $article = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('schedule', 'ASC')
                    ->orderBy('ordering','ASC')
                    ->paginate(15);
                
                
                if ($data == null) { // page not found
                    return [
                        'data' => null,
                        'view' => 'Cms.page-error',
                    ];
                }


                
                
                if(
                    $data->category->id == 12 
                    || $data->category->id == 14 
                    || $data->category->id == 11 
                    || $data->category->id == 13
                    || $data->category->id == 15
                    || $data->category->id == 16
                    || $data->category->id == 17
                    || $data->category->id == 18
                    || $data->category->id == 21
                ){
                    $relateArticle = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    // ->whereIn('id', explode(',', $data->relate_article))
                    ->where('parent_category_id', $data->parent_category_id)
                    ->where('id','!=', $data->id)
                    ->orderBy('ordering','ASC')
                    ->get();

                }else{

                    $relateArticle = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    // ->whereIn('id', explode(',', $data->relate_article))
                    ->where('parent_category_id', $data->parent_category_id)
                    ->where('id','!=', $data->id)
                    ->orderBy('id','DESC')
                    ->take(15)
                    ->get();
                }

             

                $info = Info::where('state', 1)->get();

                return [
                    'data' => [
                        'dataDetail' => $data,
                        'relateArticle' => $relateArticle,
                        'relateData' => $relateData,
                        'info' => $info
                    ],
                    'view' => 'Cms.detail-article',
                ];

            // Event List
            case ('event_list'):
                // parent_category_id == 1 is list event
                $data = Event::where('state', 1)
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(15);
                    $info = Info::where('state', 1)->get();

                return [
                    'data' => $data,
                    'view' => 'Cms.event-list',
                    'info' => $info
                ];

            // Events Grid
            case ('event_grid'):
                // parent_category_id == 2 is Grid event
                $category_event = CategoryEvent::select('name_kh', 'name_en')
                    ->where('id', $reference_id)
                    ->where('state', 1)
                    ->first();
                    // dd($category_event);
                    $event = Event::where('state', 1)
                    ->where('parent_category_id', $reference_id)
                    ->orderBy('start_date', 'ASC')
                    ->where('start_date','>=', date("Y/m/d", strtotime(today())))
                    ->paginate(15);

                $info = Info::where('state', 1)->get();


                $articles = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', 3)
                    ->orderBy('schedule', 'DESC')
                    ->orderBy('ordering', 'ASC')
                    ->limit(2)
                    ->get();
                return [
                    'data' => [
                        'event' => $event,
                        'category_event' => $category_event,
                        'info' => $info,
                        'articles' => $articles
                    ],
                    'view' => 'Cms.event-grid',
                ];

            // Main Page
            case ('main_page'):
                
                $popUp = PopupHome::where('state', 1)
                    ->where('active', 1)
                    ->first();

                $academics = Article::where('state', 1)
                    ->where('schedule', '<=', date('Y-m-d'))
                    ->where('parent_category_id', 21)
                    ->orderBy('schedule', 'ASC')
                    ->orderBy('ordering','ASC')
                    ->get();
                $academics_category = CategoryArticle::where('state', 1)->where('id', $academics[0]->parent_category_id)->first();

                $feature_school_events = Article::where('state', 1)->where('feature', 1)->first();

                

                if($feature_school_events == null){
                    $feature_school_events == Article::where('state', 1)->where('feature','==', 0)->first(); 
                }

                

                $campusSlides = Info::where('state', 1)->where('type','campusSlide')->get();
                $info = Info::where('state', 1)->get();

                $slide = Slide::where('state', 1)->latest()->first();

                return [
                    'data' => [
                        'popUp' => $popUp,
                        'academics' => $academics,
                        'feature_school_events' => $feature_school_events,
                        'campusSlides' => $campusSlides,
                        // 'map' => $map,
                        'academics_category' => $academics_category,
                        'info' => $info,
                        'slide' => $slide
                    ],
                    'view' => 'Cms.home',
                ];
            default:
                return 'Cms.default';
        }
    }

    public static function mapDatapageContact($data)
    {
        $latitude = $data->filter(function ($value, $key) {
            return $value->key == 'latitude';
        });
        $longitude = $data->filter(function ($value, $key) {
            return $value->key == 'longitude';
        });
        $titleMap = $data->filter(function ($value, $key) {
            return $value->key == 'title-tap';
        });
        $contentMap = $data->filter(function ($value, $key) {
            return $value->key == 'content-map';
        });
        $phone = $data->filter(function ($value, $key) {
            return $value->type == 'phone';
        });
        $email = $data->filter(function ($value, $key) {
            return $value->type == 'email';
        });
        $socailMedia = $data->filter(function ($value, $key) {
            return $value->type == 'socailMedia';
        });
        $website = $data->filter(function ($value, $key) {
            return $value->type == 'website';
        });
        return [
            'latitude' => $latitude->first(),
            'longitude' => $longitude->first(),
            'titleMap' => $titleMap->first(),
            'contentMap' => $contentMap->first(),
            'phone' => $phone,
            'email' => $email,
            'socailMedia' => $socailMedia,
            'website' => $website,
        ];
    }
}
