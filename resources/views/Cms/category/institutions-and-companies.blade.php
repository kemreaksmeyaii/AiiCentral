@extends('Cms.master-page')
@section('content')
<div class="container-fluid header-wrapper">
        <div class="container px-4 py-3 d-flex align-items-end h-100">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4">
                    <div class="py-5">
                        <div class="pt-2 text-center">
                            <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                                {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
                            </h1>
                            <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;"> {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}</h3>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl my-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row g-4">
                    @foreach ($data['article'] as $key=>$value)
                        <?php
                            $path = explode('/',$value->thumbnail);
                            $nameImage = $path[count($path)-1];
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="border">
                                <a style="display:block;color:#333;text-decoration:none;" href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                    <div class="row">
                                        <div class="box col-12 d-flex justify-content-center align-items-center" >
                                            <div>  
                                                <div class="d-flex justify-content-center">
                                                    <img width="50%" style="width:100%;" 
                                                        src="{{ asset('public/storage/photos/lazyloading/lazyloading.jpg') }}"
                                                        data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                                </div>
                                                <div class="p-3" style="min-height:90px;display:flex;align-items:center; justify-content:center; text-align:center;">
                                                    <h5 class="text-center" style="min-height:38px;font-size:1.2rem;">{{ App::getLocale() == 'en'? $value->title_en : $value->title_kh }}</h5>
                                                </div>
                                            </div>  
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
@endsection