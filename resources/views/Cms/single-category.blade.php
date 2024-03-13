@extends('Cms.master-page')
@section('metatag')
    <?php
        $logo = '';
        foreach ($menuFooterItems as $key => $value) { if($value->key == 'logo'){$logo = $value->image; }}
    ?>
    <meta property="og:image" content=" {{ $logo }} " />
    <meta property="og:title"  content="{{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }} - Aii Language Center" />
    <meta property="og:description" content="Aii Language Centers (Aii) are North American Standard based centers specializing in languages. Aii offers a series of English, Chinese and Thai language programs. TOEFL preparation course is also offered to meet the needs of a variety of different learner’s needs." />
@endsection
@section('content')
    <div class="container-fluid bannerContent d-none d-lg-block"
        style="background:url('{{ $data['latest_article']->thumbnail }}');"
     >
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6 p-4 box" style="background-color:rgba(255,255,255,0.7);">
                    <a style="display:block;color:#333;text-decoration:none;" href="{{ url(App::getLocale() == 'en'?'articles/'.$data['latest_article']->slug_en :'kh/articles/'.$data['latest_article']->slug_en)}}">     
                        <small style="font-size: 15px;">
                        {{ App::getLocale() == 'kh' ?  KhmerDateTime\KhmerDateTime::parse($data['latest_article']->schedule)->format('LLLL') : Carbon\Carbon::parse($data['latest_article']->schedule)->format('l, F d, Y') }}
                        </small>
                        <h3 class="text-3-line mt-2" style="font-size:1.5rem; font-weight:600;line-height:32px;"> {{ Str::limit(App::getLocale() == 'en'?$data['latest_article']->title_en : $data['latest_article']->title_kh, 120) }}</h3> 
                        <p class="text-5-line">{{ App::getLocale() == 'kh' ? $data['latest_article']->introduction_kh : $data['latest_article']->introduction_en }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl my-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-11 my-5">
                <div class="row g-5 d-flex justify-content-center">
                    @foreach ($data['article'] as $key=>$value)
                        <?php
                            $path = explode('/',$value->thumbnail);
                            $nameImage = $path[count($path)-1];
                        ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="box">
                                        <a style="display:block;color:#333;text-decoration:none;" href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                            <div class="row g-4 d-flex align-items-center">
                                                <div class="col-sm-5 col-xl-4 py-0 my-0">
                                                    <div>
                                                        <img style="object-fit:cover;" width="100%" height="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-news.jpg') }}"
                                                            data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 col-xl-8 my-0 py-0">
                                                    <div class="mt-4 mt-sm-0">
                                                        <small style="font-size: 15px;">
                                                            {{ App::getLocale() == 'kh' ?  KhmerDateTime\KhmerDateTime::parse($value->schedule)->format('LLLL') : Carbon\Carbon::parse($value->schedule)->format('l, F d, Y') }}
                                                        </small>
                                                        <h3 class="text-2-line my-3" style="font-size:1.5rem; font-weight:600;line-height:32px;">{{ Str::limit(App::getLocale() == 'en'?$value->title_en : $value->title_kh, 120) }}</h3> 
                                                        <p class="text-3-line" style="line-height:26px;">{{ App::getLocale() == 'kh' ? $value->introduction_kh : $value->introduction_en }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <hr class="my-4 mt-5" style="color:#145E8A;">
                                
                            </div>
                    @endforeach
                </div>

                <nav aria-label="" class="d-flex justify-content-center mt-4">
                    {{ $data['article']->onEachSide(1)->links( "pagination::bootstrap-4") }}
                </nav>
            </div>
        </div>
    </div>
@endsection
