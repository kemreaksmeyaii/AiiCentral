@extends('Cms.master-page')
@section('content')
     
    <div class="container-fluid header-wrapper">
        <div class="container px-4 py-3 d-flex align-items-end h-100">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4">
                    <div class="py-5">
                        <div class="pt-2 text-center">
                            <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                                {{ App::getLocale() == 'en' ? $data['category_event']->name_en : $data['category_event']->name_kh }}
                            </h1>
                            <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;"> {{ App::getLocale() == 'en' ? $data['category_event']->name_en : $data['category_event']->name_kh }}</h3>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="container-xl my-5">
         <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row g-4 mb-4 ">
                    @foreach($data['articles'] as $article)
                    <div class="col-md-6 col-lg-12">
                        <div class="row" style="border-radius: 0;margin:0;padding:0;">
                            <div class="col-lg-4 p-0">
                                <img src="{{ asset('public/storage/photos/default/news-lazyload.jpg') }}" data-src="{{ $article->thumbnail }}" width="100%" alt="{{ $article->thumbnail }}">
                            </div>
                            <div class="col-lg-8 p-3 pt-0">
                                <h3 style="font-size:1.3rem; font-weight:600;line-height:32px;">{{ App::getLocale() == 'kh' ? $article->title_kh : $article->title_en}}</h3>
                                <p class="text-3-line">{{ App::getLocale() == 'kh' ? $article->introduction_kh : $article->introduction_en}}</p>
                                <small style="font-size: 15px;">
                                <i class="fa-regular fa-clock"></i> {{ App::getLocale() == 'kh' ?  KhmerDateTime\KhmerDateTime::parse($article->schedule)->format('LLLL') : Carbon\Carbon::parse($article->schedule)->format('l, F d, Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row event-list mb-4">
                    @foreach ($data['event'] as $key => $value)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div style="border:1px solid #eee; background: #fff; border-radius: 0;">
                            <div>
                                <div style="text-align:center;background-color: #145E8A; color:#fff;padding:12px;">
                                    <div>{{ App::getLocale() == 'kh' ? $value->date_kh : $value->date_en }}</div>
                                </div>
                                <div class="p-3" style="min-height:150px;">{{ App::getLocale() == 'en' ? $value->title_en : $value->title_kh }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <nav aria-label="" class="d-flex justify-content-center">
                    {{ $data['event']->links( "pagination::bootstrap-4") }}
                </nav>
            </div>
         </div>
      </div>
@endsection
