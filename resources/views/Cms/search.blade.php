@extends('Cms.master-page')
@section('content')

    <div class="container-fluid header-wrapper">
        <div class="container px-4 py-3 d-flex align-items-end h-100">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4 ">
                    <div>
                        <div class="content-article-header py-5">
                            <div class="text-left text-center">
                                <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                                    {{App::getLocale() == 'en'?'Search Results for':'លទ្ធផលនៃការស្វែងរក'}} : {{$search}}
                                </h1>
                                <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;"> {{App::getLocale() == 'en'?'Search Results for':'លទ្ធផលនៃការស្វែងរក'}} : {{$search}}</h3>
                            </div>
             
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="p-md-5 p-3 bg-white">
            <div class="row justify-content-center">
                <div class="col-lg-9 row d-flex justify-content-center">
                    @foreach ($data as $key=>$value )
                        <div class="col-lg-12" style="background-color: #fff;border-top:1px solid #eee; margin:8px; padding:25px;">
                            <div style="float: left;">
                                <h4 style="font-size:1.2rem;">{{App::getLocale() == 'en'?$value->title_en:$value->title_kh}}</h4>
                            </div>
                            @if ($value->result_type == 'article')
                                <a class="btn btn-dark-purple" style="float: right;"
                                    @if($value->parent_category_id == 1)
                                        href="{{url(App::getLocale() == 'en' ? '/' : '/kh/').'/'.$value->slug_en}}">
                                                {{App::getLocale() == 'en'?'Show article':'បង្ហាញអត្តបទ'}}
                                    @else 
                                        href="{{url(App::getLocale() == 'en' ? '/articles' : '/kh/articles').'/'.$value->slug_en}}">
                                            {{App::getLocale() == 'en'?'Show article':'បង្ហាញអត្តបទ'}}
                                    @endif
                                </a>
                            @else
                                <a class='btn btn-dark-purple' style="float: right;"
                                    href='{{url(App::getLocale() == "en"?"/events":"/kh/events")."/".$value->slug}}'>
                                    {{App::getLocale() == 'en'?'Show article':'បង្ហាញអត្តបទ'}}
                                </a>
                            @endif
                        </div>
                        
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
