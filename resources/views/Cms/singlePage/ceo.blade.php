
@extends('Cms.master-page')
@section('content')
    <div class="container-fluid bannerContent" style="background:url('{{ $data['article']->thumbnail }}'); ">
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <h1 class="title">
                        {{ App::getLocale() == 'en' ? $data['article']->title_en : $data['article']->title_kh }}
                    </h1>
                    @if($data['article']->introduction_en != null)
                    <div class="description" style="font-size:1.7rem !important;">
                        {!! App::getLocale() == 'en' ? $data['article']->introduction_en : $data['article']->introduction_kh !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container mobile-content">
        <div class="inner-mobile-content">
            <h1 class="title">
                {{ App::getLocale() == 'en' ? $data['article']->title_en : $data['article']->title_kh }}
            </h1>
            @if($data['article']->introduction_en != null)
            <div class="description-item" style="font-size:1.6rem !important;">
                {!! App::getLocale() == 'en' ? $data['article']->introduction_en : $data['article']->introduction_kh !!}
            </div>
            @endif
        </div>
    </div>


    <div class="container-fluid p-0 m-0">
       
            <div class="row g-0 m-0" style="background-color:#0B3347;">
                <div class="col-lg-6" >
                    <div class="imageSection">
                        <div class="mb-3">
                            <img class="mb-2" src="{{ asset('public/storage/photos/default/program.jpg') }}" data-src="{{ asset('public/storage/photos/about/education.jpg') }}" width="100%" alt="">
                            <p style="text-align:center;color:#fff;">A true educator</p>
                        </div>
                        
                        <div>
                            <img class="mb-2" src="{{ asset('public/storage/photos/default/program.jpg') }}" data-src="{{ asset('public/storage/photos/about/graduation.jpg') }}" width="100%" alt="">
                            <p style="text-align:center;color:#fff;">An inspiration for the youth</p>
                        </div>
                        <div>
                            <img class="mb-2" src="{{ asset('public/storage/photos/default/program.jpg') }}" data-src="{{ asset('public/storage/photos/about/advocate1.jpg') }}" width="100%" alt="">
                            <p style="text-align:center;color:#fff;">An advocate for change</p>
                        </div>
                        <div>
                            <img class="mb-2" src="{{ asset('public/storage/photos/default/program.jpg') }}" data-src="{{ asset('public/storage/photos/about/great-service1.jpg') }}" width="100%" alt="">
                            <p style="text-align:center;color:#fff;">A great service to the people</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="background-color:#fff;">   
                    <div class="descriptionSection">
                            {!! App::getLocale() == 'kh' ? $data['article']->article_editor_kh : $data['article']->article_editor_en !!}
                    </div>
                </div>
            </div>
        
    </div>

@endsection






