@extends('Cms.master-page')
@section('metatag')
    <!-- facebook -->
    <meta property="og:image" content=" {{ $data['dataDetail']->thumbnail }}  " />
    <meta property="og:title"  content="{{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}" />
    <meta property="og:description"  content="{{ App::getLocale() == 'en' ? $data['dataDetail']->introduction_en : $data['dataDetail']->introduction_kh }}" />
    <!-- twitter -->
    <meta name="twitter:title" content="{{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}">
    <meta name="twitter:description" content="{{ App::getLocale() == 'en' ? $data['dataDetail']->introduction_en : $data['dataDetail']->introduction_kh }}">
    <meta name="twitter:image" content=" {{ $data['dataDetail']->thumbnail }} ">
@endsection

@section('content')

<style>
    .thumbnail-content{
        margin-top:-140px;
        z-index:1;

        @media all and (max-width: 991px) {
            margin-top:0px;
        }
    }
   
    .description-content p{
        font-size:18px;
    }           
</style>


@if(

    $data['dataDetail']->category->id == 12 
    || $data['dataDetail']->category->id == 14 
    || $data['dataDetail']->category->id == 11 
    || $data['dataDetail']->category->id == 13
    || $data['dataDetail']->category->id == 15
    || $data['dataDetail']->category->id == 16
    || $data['dataDetail']->category->id == 17
    || $data['dataDetail']->category->id == 18
    )
@if($data['dataDetail']->category->id == 11)
<div class="container py-3 py-lg-5">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-12">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="description-content">
                        {!! App::getLocale() == 'en' ? $data['dataDetail']->article_editor_en : $data['dataDetail']->article_editor_kh !!}
                        <div class="mt-5 d-flex">
                            <!-- AddToAny BEGIN -->
                            <div style="border:1px solid #555;border-radius:3px;padding:0 12px;margin-right:5px;"><i class="fa-solid fa-share-nodes"></i> {{ App::getLocale() == 'kh' ? 'ចែករំលែក':'Share'}} </div>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container py-3 py-lg-5">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-12">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-xl-9 col-lg-8">
                    <!-- 15 14 12 -->
                    @if($data['dataDetail']->category->id == 16 || $data['dataDetail']->category->id == 15 || $data['dataDetail']->category->id == 14 || $data['dataDetail']->category->id == 12)
                        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-lg-start align-items-center m-0" style="border:1px solid #eee;background-color:#fafafa;">
                            <div class="d-flex justify-content-center" style="margin-right:15px;">
                                <img class="d-none d-md-block" style="max-width:220px;" src="{{ asset('public/storage/photos/lazyloading/lazyloading-school-committee.jpg') }}" data-src="{{ $data['dataDetail']->thumbnail }}" alt="{{ $data['dataDetail']->thumbnail }}">
                                <img class="d-block d-md-none" style="max-width:220px;margin-top:30px;" src="{{ asset('public/storage/photos/lazyloading/lazyloading-school-committee.jpg') }}" data-src="{{ $data['dataDetail']->thumbnail }}" alt="{{ $data['dataDetail']->thumbnail }}">
                            </div>
                            <div class="p-3" > 
                                <div>
                                    <h1 class="d-none d-md-block fw-bold" style="font-size:38px;">
                                        {{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}
                                    </h1>
                                    <h3 class="d-block d-md-none fw-bold" style="font-size:28px;text-align:center;">{{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}</h3>
                                    @if($data['dataDetail']->introduction_en != null || $data['dataDetail']->introduction_kh != null)
                                        <p class="d-none d-md-block" style="font-size:1.6rem;font-weight:600;">{{ App::getLocale() == 'en' ? $data['dataDetail']->introduction_en : $data['dataDetail']->introduction_kh }}</p>
                                        <p class="d-block d-md-none text-center" style="line-height:26px; font-size:1.3rem;font-weight:600;">{{ App::getLocale() == 'en' ? $data['dataDetail']->introduction_en : $data['dataDetail']->introduction_kh }}</p>
                                    @endif
                                </div>
                            </div> 
                        </div>
                    @else
                        <div>
                            
                            <?php
                                $path = explode('/',$data['dataDetail']->thumbnail);
                                $nameImage = $path[count($path)-1];
                            ?>    
                            <div class="d-flex justify-content-center" style="margin-right:15px;">
                                <img style="width:100%;" src="{{ asset('public/storage/photos/lazyloading/lazyloading.jpg') }}" data-src="{{ $data['dataDetail']->thumbnail }}" alt="{{ $data['dataDetail']->thumbnail }}">
                            </div>
                            <div class="pt-4"> 
                                <div>
                                    <h1 class="d-none d-md-block fw-bold" style="font-size:38px;">
                                        {{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}
                                    </h1>
                                    <h3 class="d-block d-md-none fw-bold" style="font-size:38px;">{{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}</h3>
                                    @if($data['dataDetail']->introduction_en != null || $data['dataDetail']->introduction_kh != null)
                                        <p style="font-size:1.6rem;font-weight:600;">{{ App::getLocale() == 'en' ? $data['dataDetail']->introduction_en : $data['dataDetail']->introduction_kh }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="description-content my-4">
                        {!! App::getLocale() == 'en' ? $data['dataDetail']->article_editor_en : $data['dataDetail']->article_editor_kh !!}
                        <div class="mt-5 d-flex">
                            <!-- AddToAny BEGIN -->
                            <div style="border:1px solid #555;border-radius:3px;padding:0 12px;margin-right:5px;"><i class="fa-solid fa-share-nodes"></i> {{ App::getLocale() == 'kh' ? 'ចែករំលែក':'Share'}} </div>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                        </div>
                    </div>
                </div>
                @if($data['dataDetail']->category->id != 13 || $data['dataDetail']->category->id != 11)
                    <div class="col-xl-3 col-lg-4 ">
                        <?php
                            $path = explode('/',$data['dataDetail']->thumbnail);
                            $nameImage = $path[count($path)-1];
                        ?>
                        <!-- style="position:sticky;top:15px;" -->
                        
                        <div style="background-color:#fff; padding:20px;border:1px solid #eee;position:relative;">
                            <div>
                                <h4 style="color:#145E8A;text-transform:uppercase;">{{ App::getLocale() == 'kh' ? $data['dataDetail']->category->name_kh : $data['dataDetail']->category->name_en }}</h4>
                            </div>
                            <style>
                                .relateContent{
                                    color:#333;
                                }
                                .relateContent:hover{
                                    color:#145E8A;
                                }
                            </style>
                            @foreach($data['relateArticle'] as $value)
                                <?php
                                    $path = explode('/',$value->thumbnail);
                                    $nameImage = $path[count($path)-1];
                                ?>
                                <a class="relateContent" style="display:block; text-decoration:none;border-top:1px solid #eee;" href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                    <div class="row g-2 d-flex align-items-center" style="padding:10px 0;">
                                        <div class="col-4">
                                            <img style="object-fit:cover;" width="100%" height="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-school-committee.jpg') }}"
                                                data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                        </div>
                                        <div class="col-8">
                                            <h5 style="font-size:1rem;margin:0;">{{ App::getLocale() == 'kh' ? $value->title_kh : $value->title_en }}</h5>
                                            <p style="line-height:20px;font-size:0.9rem;">{{ App::getLocale() == 'kh' ? $value->introduction_kh : $value->introduction_en }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif


@else
<div class="container-fluid  header-wrapper" >
    <div class="container px-4 py-3 d-flex align-items-center">
        <div class="row d-flex justify-content-center w-100">
            <div class="col-xl-12" style="display:flex;flex-direction:columns;align-items:end;">
                <div class="content-article-header py-5">
                    <div class="text-left mt-3">
                        <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                            {{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}
                        </h1>
                        <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;">{{ App::getLocale() == 'en' ? $data['dataDetail']->title_en : $data['dataDetail']->title_kh }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container px-4 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-12">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-9 mt-4">
                    <div class="description-content">
                        {!! App::getLocale() == 'en' ? $data['dataDetail']->article_editor_en : $data['dataDetail']->article_editor_kh !!}
                    </div>
                    <div class="mt-3 d-flex">
                        <!-- AddToAny BEGIN -->

                        <div style="border:1px solid #555;border-radius:3px;padding:0 12px;margin-right:5px;"><i class="fa-solid fa-share-nodes"></i> {{ App::getLocale() == 'kh' ? 'ចែករំលែក':'Share'}} </div>
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                </div>
                {{-- Related Articles --}}
                    <div class="col-lg-3 mt-4">
                            <div style="color:#fff; background-color: #2574ad;margin:0;padding:15px 20px 5px 20px;">
                                <h6>{{ App::getLocale() == 'kh' ? $data['dataDetail']->category->name_kh : $data['dataDetail']->category->name_en }} </h6>
                            </div>
                        <div class="p-4" style="background-color:#fafafa;">
                            
                            <div class="row">
                                @foreach($data['relateArticle'] as $value)
                                <?php
                                    $path = explode('/',$value->thumbnail);
                                    $nameImage = $path[count($path)-1];
                                ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <div>
                                            <style>
                                                .relateNews{
                                                    display:block;color:#333;text-decoration:none;
                                                }
                                                .relateNews:hover{
                                                    text-decoration: underline;
                                                }
                                            </style>
                                            <a class="relateNews"  href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                                <div class="d-flex flex-column justify-content-between" style="display:flex:flex-direction:column;justify-content:space-between;">
                                                    <div class="mb-2">
                                                        <div class="news-title" style="font-size:1.5rem;">
                                                            <h3 class="text-2-line" style="font-size:1rem;line-height:26px;"> {{ Str::limit(App::getLocale() == 'en'?$value->title_en : $value->title_kh, 120) }}</h3> 
                                                        </div>
                                                        @if($value->category->id == 18)
                                                        <div>
                                                            <small class="text-secondary text-capitalize" style="font-size: 14px;">
                                                                {{ Carbon\Carbon::parse($value->schedule)->format('F d, Y') }}
                                                            </small>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

@endif




@endsection
@section('script')
<!-- owl carousel   -->
<link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.carousel.min.css') }}">

<!-- owl carousel  -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('plugin/owlcarousel/js/script.js') }}"></script>

@endsection