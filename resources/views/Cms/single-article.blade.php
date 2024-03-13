
@extends('Cms.master-page')
@section('content')

<style>
    table.customTable {
        width: 100%;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 2px;
        border-color: #145E8A;
        border-style: solid;
        color: #070707;
    }

    table.customTable td, table.customTable th {
        border-width: 2px;
        border-color: #145E8A;
        border-style: solid;
        padding: 5px;
    }

    table.customTable thead {
        background-color: #145E8A;
    }
</style>
    <!-- overview -->
    @if($data['article']->id == 112) 
    <div class="container-fluid bannerContent" style="background:url('{{ $data['article']->thumbnail }}'); object-position:center top !important;background-position:center !important;">
    @else
    <div class="container-fluid bannerContent" style="background:url('{{ $data['article']->thumbnail }}'); object-position:right top !important;">
    @endif   
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex">
                        <h1 class="fs-1 text-white p-3" style="background-color:#145E8A;">
                            {{ App::getLocale() == 'en' ? $data['article']->title_en : $data['article']->title_kh }}
                        </h1>
                    </div>
                    @if($data['article']->introduction_en != null )
                        <div class="bg-white p-3 m-0" style="font-size:1.3rem !important;">
                            {!! App::getLocale() == 'en' ? $data['article']->introduction_en : $data['article']->introduction_kh !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mobile-content" style="background-color:#55B6E1;">
        <div style="padding:5% !important;">
            <h1>
             {{ App::getLocale() == 'en' ? $data['article']->title_en : $data['article']->title_kh }}
            </h1>
            <div>
                {!! App::getLocale() == 'en' ? $data['article']->introduction_en : $data['article']->introduction_kh !!}
            </div>
        </div>
    </div>
    @if($data['article']->id == 119)
    <!-- tuition fees -->
        <div class="container-fluid p-0 m-0">
            <div class="container my-3">
                <div class="row g-0 m-0 d-flex justify-content-center">
                    <div class="col-lg-12">
                        {!! App::getLocale() == 'kh' ?  $data['article']->article_editor_kh:$data['article']->article_editor_en  !!}
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container-fluid p-0 m-0">
        <div class="row g-0 m-0">
            <div class="col-lg-6">
                <div>
                    <!-- get only image tag -->
                    @php
                        preg_match_all('/<img[^>]+>/i', App::getLocale() == 'kh' ?  $data['article']->article_editor_kh:$data['article']->article_editor_en, $imgTags);
                        echo implode("\n", $imgTags[0]);
                    @endphp
                </div>
            </div>
            <div class="col-lg-6" style="background-color:#FFD271;">   
                <div style="padding:10% !important;" >
                    <!-- get all tag deference only image tag -->
                    {!! strip_tags( App::getLocale() == 'kh' ?  $data['article']->article_editor_kh:$data['article']->article_editor_en , '<h1><h2><h3><h4><h5><h6><p><strong><ul><li><a><span><i>' ) !!}
                </div>
            </div>
        </div>     
    </div>
    @endif
@endsection

