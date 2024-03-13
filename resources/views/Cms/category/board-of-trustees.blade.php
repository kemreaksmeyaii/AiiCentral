

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
    <div class="container-fluid header-wrapper">
        <div class="container px-4 py-3 d-flex align-items-end h-100">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4 ">
                    <div>
                        <div class="content-article-header py-5">
                            <div class="text-left text-center">
                                <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                                {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
                                </h1>
                                <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;">{{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}</h3>
                            </div>
             
                        </div>           
                    </div>
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 d-flex justify-content-between flex-direction-columns" >
                                    <div class="box pb-4">
                                        <a style="display:block;color:#333;text-decoration:none;" href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-lg-12 py-0 my-0">
                                                    <div>
                                                        <img style="object-fit:cover;" width="100%" height="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-school-committee.jpg') }}"
                                                            data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-12 my-0 py-0">
                                                    <div class="mt-4">
                                                        <h3 class="mb-1" style="font-size:1.4rem; font-weight:600;line-height:32px;">{{ Str::limit(App::getLocale() == 'en'?$value->title_en : $value->title_kh, 120) }}</h3> 
                                                        <p style="line-height:26px;">{{ App::getLocale() == 'kh' ? $value->introduction_kh : $value->introduction_en }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    
                                
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
