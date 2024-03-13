@extends('Cms.master-page')
@section('content')

    <div class="container-fluid bannerContent" style="background:url('{{ $data['article']->thumbnail }}'); ">
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <h1 class="title">
                        {{ App::getLocale() == 'en' ? $data['article']->title_en : $data['article']->title_kh }}
                    </h1>
                    <div class="description">
                        {!! App::getLocale() == 'en' ? $data['article']->introduction_en : $data['article']->introduction_kh !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mobile-content">
        <div class="inner-mobile-content">
            <h1 class="title">
                {{ App::getLocale() == 'en' ? $data['article']->title_en : $data['article']->title_kh }}
            </h1>
            <div class="description-item">
                {!! App::getLocale() == 'en' ? $data['article']->introduction_en : $data['article']->introduction_kh !!}
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 m-0">
       
       <div class="row g-0 m-0" style="background-color:#FFD271;">
           <div class="col-lg-6" >
               <div class="imageSection">
                   <img src="{{ asset('public/storage/photos/default/program.jpg') }}"  data-src="{{ asset('public/storage/photos/library/library-inside.jpg') }}" width="100%" alt="public/storage/photos/about/overviewinside.jpg">
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

