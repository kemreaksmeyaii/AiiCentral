@extends('Cms.master-page')
@section('content')

<div class="container-fluid bannerContent" style="background:url('{{ asset('public/storage/photos/Accolades/Accolades.jpg') }}'); ">
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex">
                        <h1 class="fs-1 text-white p-3" style="background-color:#145E8A;">
                            {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
                        </h1>
                    </div>
                    <div class="bg-white p-3 m-0" style="font-size:1.3rem !important;">
                        {!! App::getLocale() == 'kh' ? $data['category']->description_kh : $data['category']->description_en !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mobile-content" style="background-color:#55B6E1;">
        <div style="padding:5% !important;">
            <h1>
                {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
            </h1>
        </div>
    </div>
   
    <style>
        .accolade-box{
            overflow:hidden;
            position:relative;
        }
        .accolade-image img{
            overflow:hidden;
        }
        .accolade-description{
            position:absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            transform: translateY(100%);
            transition: all 0.4s ease-in-out;
            opacity: 0;
            height:100%;
            widht:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            text-align:center;
            background: linear-gradient(90deg, rgba(23,84,130,1) 0%, rgba(43,147,200,1) 100%);
        }
        .accolade-box:hover .accolade-description{
            transform: translateY(0);
            opacity:1;
            padding:15px;
        }
    </style>

    <div class="container-xl my-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="g-4 row">
                    @foreach ($data['article'] as $key=>$value)
                        <?php
                            $path = explode('/',$value->thumbnail);
                            $nameImage = $path[count($path)-1];
                        ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="accolade-box">
                                        <div class="accolade-image">
                                            <img style="border:5px solid #fff;" width="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-acolade.jpg') }}"
                                                data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                        </div>
                                        <div class="accolade-description">
                                            <h5 class="p-0 m-0" style="line-height:20px;font-size:1rem;color:#fff;">{{ App::getLocale() == 'en'? $value->title_en : $value->title_kh }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    @endforeach
                </div>

                <nav aria-label="" class="d-flex justify-content-center">
                    {{ $data['article']->onEachSide(1)->links( "pagination::bootstrap-4") }}
                </nav>
            </div>
        </div>
    </div>


@endsection

