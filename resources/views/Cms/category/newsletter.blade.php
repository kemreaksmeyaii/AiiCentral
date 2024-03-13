

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

    <div class="container-fluid bannerContent" style="background:url('{{ asset('public/storage/photos/newsletter/newsletterCentral.jpg') }}'); ">
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex">
                        <h1 class="fs-1 text-white p-3" style="background-color:#145E8A;">
                            {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mobile-content">
        <div class="inner-mobile-content">
            <h1 class="title">
                {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
            </h1>
            
        </div>
    </div>

    <div class="container-xl my-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-11 my-5">
                <div class="row g-4 d-flex justify-content-center">
                    @foreach ($data['article'] as $key=>$value)
                        <?php
                            $path = explode('/',$value->thumbnail);
                            $nameImage = $path[count($path)-1];
                        ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" >
                                <div class="box border">
                                    <a style="display:block;color:#333;text-decoration:none;" href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                        <div>
                                            <div>
                                                <img style="object-fit:cover;" width="100%" height="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-newsletter.jpg') }}"
                                                    data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                            </div>
                                            <div class="p-3 text-center">
                                                <h3 class="mb-3" style="font-size:1.1rem; font-weight:600;line-height:32px;">{{ Str::limit(App::getLocale() == 'en'?$value->title_en : $value->title_kh, 120) }}</h3> 
                                                <p style="line-height:26px;">{{ App::getLocale() == 'kh' ? $value->introduction_kh : $value->introduction_en }}</p>
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
