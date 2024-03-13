@extends('Cms.master-page')
@section('content')

    <div class="container-fluid header-wrapper" style="background-image:linear-gradient(0deg, rgba(250,250,250,0.5), rgba(250,250,250,0.5));">
        <div class="container px-4 py-3 d-flex align-items-end h-100">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4 ">
                    <div class="py-4">
                        <div>
                            <ul class="bc-box d-flex m-0 p-0 ">
                                <li class="bc-item"><a class="bc-link" style="" href="{{ App::getLocale() == 'kh' ? '/kh' : '/' }}">{{ App::getLocale() == 'kh' ? 'ទំព័រដើម' : 'Home' }}</a></li>
                                <li class="bc-item" style="padding:0 10px;"><a class="bc-link">/</a></li>
                                <li class="bc-item"><a class="bc-link" > {{App::getLocale() == 'en'?$data->title_en:$data->title_kh}}</a></li>
                            </ul>
                        </div> 
                        <div class="pt-2">
                            <h1 class="d-none d-md-block fw-bold" style="font-size:48px;">
                                {{App::getLocale() == 'en'?$data->title_en:$data->title_kh}}
                            </h1>
                            <h3 class="d-block d-md-none fw-bold" style="font-size:38px;"> {{App::getLocale() == 'en'?$data->title_en:$data->title_kh}}</h3>
                        </div>
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="mb-4">
                    <div style="font-size:1.2rem;">{{ App::getLocale() == 'kh' ? $data->date_kh : $data->date_en }}</div>
                   <p> {!! App::getLocale() == 'en'?$data->description_en:$data->description_kh !!} </p>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
@endsection
