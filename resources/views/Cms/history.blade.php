@extends('Cms.master-page')
@section('content')
    <style>

        .bannerContent{
            background-size:cover !important;
            object-fit:cover !important;
            background-position:right !important;
            object-position:top right !important;
            height:800px;
            width:100%;
        }
       
        .inner-desktop-content{
            display:flex !important;
            align-items:end !important; 
            height:800px;
            padding:60px 0 !important;
            width:100%;
        }

        .inner-desktop-content .title{
            font-size:58px !important;
            background-color:#145E8A;
            color:#fff;
            font-weight:600;
            padding:15px;
            display:flex;
        }

        .inner-desktop-content .description{
            font-size:21px !important;
            background-color:#fafafa; 
            color:#333;
            padding:12px;
        }
        

        .mobile-content{
            padding:20px;
            margin:0;
        }

        .imageSection , .descriptionSection{
            padding:20px;
        }



        /* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
            .mobile-content{
                display:block !important;
            }
            .desktop-content{
                display:none !important;
            }

            .bannerContent{
                background-size:cover !important;
                object-fit:cover !important;
                background-position:right !important;
                object-position:top right !important;
                height:350px !important;
            }
            .imageSection, .descriptionSection{
                padding:20px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .mobile-content{
                display:block !important;
            }
            .desktop-content{
                display:none !important;
            }

            .bannerContent{
                background-size:cover !important;
                object-fit:cover !important;
                background-position:right !important;
                object-position:top right !important;
                height:350px !important;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .mobile-content{
                display:block !important;
            }
            .desktop-content{
                display:none !important;
            }
            .bannerContent{
                background-size:cover !important;
                object-fit:cover !important;
                background-position:right !important;
                object-position:top right !important;
                height:350px !important;
            }
            .imageSection , .descriptionSection, .inner-mobile-content{
                padding:60px;
            }
        } 

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .mobile-content{
                display:none !important;
            }
            .desktop-content{
                display:block !important;
            }
            .bannerContent{
                background-size:cover !important;
                object-fit:cover !important;
                background-position:right !important;
                object-position:top right !important;
                height:800px !important;
            }

            .imageSection , .descriptionSection, .inner-mobile-content{
                padding:60px;
            }
        } 

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .mobile-content{
                display:none !important;
            }
            .desktop-content{
                display:block !important;
        
            }
            .inner-desktop-content{
                padding:120px 0 !important;
            }

            .imageSection , .descriptionSection, .inner-mobile-content{
                padding:60px;
            }
        }

    
    </style>
    <div class="container-fluid bannerContent" style="background:url('{{ asset('public/storage/photos/about/history.jpg') }}'); ">
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <h1 class="title">
                        {{ App::getLocale() == 'en' ? 'History':'ប្រវត្តិរបស់​មជ្ឈមណ្ឌល​ភាសា អេ​ អាយ​ អាយ' }}
                    </h1>
                    <div class="description">
                        {{ App::getLocale() == 'kh' ? 'មជ្ឈមណ្ឌលភាសា អេ អាយ អាយ (Aii) គឺជាមជ្ឈមណ្ឌលដែលមានមូលដ្ឋានលើស្តង់ដារអាមេរិកខាងជើងដែលមានឯកទេសខាងភាសា។ អេ អាយ អាយ ផ្តល់ជូននូវកម្មវិធីបណ្ដុះបណ្ដាលភាសាអង់គ្លេស ចិន និងថៃ និងវគ្គត្រៀម TOEFL ដើម្បីបំពេញតម្រូវការផ្សេងៗរបស់អ្នកសិក្សាគ្រប់វ័យ។': 'Aii Language Centers (Aii) are North American Standard based centers specializing in languages. Aii offers series of English, Chinese and Thai language training programs and TOEFL preparation course to meet variety of needs of learners of all ages.' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mobile-content">
        <div class="inner-mobile-content">
            <h1 class="title">
                {{ App::getLocale() == 'en' ? 'History':'ប្រវត្តិរបស់​មជ្ឈមណ្ឌល​ភាសា អេ​ អាយ​ អាយ' }}
            </h1>
            <div class="description">
                {{ App::getLocale() == 'kh' ? 'មជ្ឈមណ្ឌលភាសា អេ អាយ អាយ (Aii) គឺជាមជ្ឈមណ្ឌលដែលមានមូលដ្ឋានលើស្តង់ដារអាមេរិកខាងជើងដែលមានឯកទេសខាងភាសា។ អេ អាយ អាយ ផ្តល់ជូននូវកម្មវិធីបណ្ដុះបណ្ដាលភាសាអង់គ្លេស ចិន និងថៃ និងវគ្គត្រៀម TOEFL ដើម្បីបំពេញតម្រូវការផ្សេងៗរបស់អ្នកសិក្សាគ្រប់វ័យ។': 'Aii Language Centers (Aii) are North American Standard based centers specializing in languages. Aii offers series of English, Chinese and Thai language training programs and TOEFL preparation course to meet variety of needs of learners of all ages.' }}
            </div>
        </div>
    </div>


    <div class="container-fluid p-0 m-0">
       
            <div class="row g-0 m-0">
                <div class="col-12 col-lg-12">
                    <section class="timeline">
                        <ul>
                            @foreach($data['article'] as $value)
                                <li>
                                    <div>
                                        {{ App::getLocale() == 'kh' ? $value->title_kh : $value->title_en }}
                                        <img class="mt-3" src="{{ asset('public/storage/photos/lazyloading/lazyloading-history.jpg') }}" data-src="{{ $value->thumbnail }}" width="100%"
                                            alt="{{ $value->thumbnail }}">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                </div>
            </div>
        
    </div>


    <script>
    (function () {
        "use strict";

        // define variables
        var items = document.querySelectorAll(".timeline li");

        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function callbackFunc() {
            for (var i = 0; i < items.length; i++) {
                if (isElementInViewport(items[i])) {
                    items[i].classList.add("in-view");
                }
            }
        }

        // listen for events
        window.addEventListener("load", callbackFunc);
        window.addEventListener("resize", callbackFunc);
        window.addEventListener("scroll", callbackFunc);
    })();
</script>
@endsection










