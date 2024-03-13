@extends('Cms.master-page')


@section('metatag')
    <meta property="og:image" content="{{ asset('FrontEnd/Image/3.jpg') }}" />
    <meta property="og:title"  content="Home - Aii Language Center" />
    <meta property="og:description" content="Aii Language Centers (Aii) are North American Standard based centers specializing in languages. Aii offers a series of English, Chinese and Thai language programs. TOEFL preparation course is also offered to meet the needs of a variety of different learner’s needs." />

@endsection
@section('content')
    <section style="padding:0; position:relative;">
        <div class="container-fluid m-0 p-0">
            <iframe style="width: 100%; aspect-ratio: 16/9;pointer-events:none;padding:0;margin:0;" src="{{ $data['slide']->link_slide }}&autoplay=1&controls=0&loop=1&mute=1&modestbranding=1&&showinfo=0&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </section>

<style>
    .btnAboutUC{
        width:50%;
        @media all and (max-width: 991px) {
            width:100%;;
        }
    }
</style>
    <section style="margin-top:-10px;">
        <div class="container-fluid m-0 p-0">
            <div class="row g-0 m-0 p-0" style="background-color:#F2BE1A;">
                <div class="col-lg-6 py-0 py-lg-5" style="display:flex;align-items:center;justify-content:center;">
                    <div style="width:100%;padding:10%;max-width:720px;">
                        <h1 class="d-none d-lg-block" style="font-size:2.5rem;font-weight:600;">{{ App::getLocale() == 'kh' ? 'គិតថាចង់រៀនភាសាថ្មីមែនទេ? ឈប់គិត!':'Think you want to learn a new language? Check out our programs now!' }} </h1>
                        <h1 class="d-block d-lg-none" style="font-size:2rem;font-weight:600;">{{ App::getLocale() == 'kh' ? 'គិតថាចង់រៀនភាសាថ្មីមែនទេ? ឈប់គិត!':'Think you want to learn a new language? Check out our programs now!' }} </h1>
                        <p>{{ App::getLocale() == 'kh' ? 'ការរៀនភាសា ឬជំនាញថ្មីមិនងាយស្រួលសម្រាប់នរណាម្នាក់ឡើយ។ សូមពិនិត្យមើលកម្មវិធីរបស់យើងឥឡូវនេះ។':'Learning a new language or skill has never been easier or accessible to anyone. Check out our programs now.' }} </p>
                        <div>
                            <div style="margin-bottom:15px;">
                                <a href="{{ App::getLocale() == 'en' ? 'academics' : 'kh/academics'}}" class="btn btn-primary btnAll btnAboutUC">{{ App::getLocale() == 'kh' ? 'កម្មវិធីសិក្សា':'Our Programs' }} </a>
                            </div>
                            <div>
                                <a href="{{ App::getLocale() == 'en' ? 'test-your-english' : 'kh/test-your-english'}}" class="btn btn-primary btnAll btnAboutUC">{{ App::getLocale() == 'kh' ? 'តេស្តភាសាអង់គ្លេស':'Test Your English' }} </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="background-color:#fff;">
                    <img style="object-fit:cover; height:100%;width:100%; background-repeat:no-repeat;background-size:cover;background-position:center;" src="{{ asset('public/storage/photos/lazyloading/lazyloading-news.jpg') }}" data-src="{{ asset('FrontEnd/Image/3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section style="padding:5% 0; background-color:#C7EAFB;">
        <div class="container-fluid m-0 p-0">
            <div class="container">
                <div class="row m-0 p-0">
                    <div class="col-lg-6 m-0 p-0" >
                        <div>
                            <img src="{{ asset('public/storage/photos/lazyloading/lazyloading-news.jpg') }}" data-src="{{ asset('public/storage/photos/Home/angel1.jpg') }}" width="100%" alt="{{ asset('storage/photos/Home/angel1.jpg') }}">
                        </div>
                        <div style="display:flex;justify-content:end;width:100%;">
                            <div style="background-color:#55B6E1;padding:40px;width:400px;">
                                <h5 style="line-height:29px;">{{ App::getLocale() == 'kh' ? '“ចាប់តាំងពីខ្ញុំបានឈានជើងចូល Aii មានរឿងពីរដែលខ្ញុំបានផ្តល់អាទិភាព។ មួយ​គឺ​ការ​បង្ហាញ​ខ្លួន​ខ្ញុំ​ និង​ពីរ​គឺ​ដើម្បី​ធ្វើ​ឱ្យ​ប្រសើរ​ឡើង​ក្នុង​ការ​និយាយ​។ សាលានេះបានផ្តល់ឱ្យខ្ញុំនូវឱកាសដើម្បីបង្ហាញថាខ្ញុំជានរណា និងអ្វីដែលខ្ញុំមានសមត្ថភាព។ ខ្ញុំ​បាន​ចេញ​ពី​ការ​ចង់​ស្នាក់​នៅ​ក្នុង​តំបន់​ផាសុកភាព​របស់​ខ្ញុំ​ទៅ​ជា​ការ​ចង់​ស្គាល់​មនុស្ស​ឲ្យ​បាន​ច្រើន និង​សាកល្បង​អ្វី​ដែល​ថ្មី»':'“Ever since I stepped foot into Aii, there are two things I have prioritized. One is to express myself and two is to make improvements in speaking. This school had given me the chance to show who I was and  what I was capable of. I went from wanting to stay in my comfort zone to wanting to know more people and try new things.”' }} </h5>
                                <h4 class="mt-4">{{ App::getLocale() == 'kh' ? 'Angel ChaiJiaen':'Angel ChaiJiaen' }} </h4>
                                <h6>{{ App::getLocale() == 'kh' ? 'អតីតនិស្សិត Aii សាខាទួលគោក':'Aii Alumni from Toul Kork Campus' }} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-0 p-0">
                        <div>
                            <img src="{{ asset('public/storage/photos/lazyloading/lazyloading-news.jpg') }}" data-src="{{ asset('public/storage/photos/Home/ajourneywithaii.jpg') }}" width="100%" alt="{{ asset('public/storage/photos/Home/ajourneywithaii.jpg') }}">
                        </div>
                        <div style="display:flex:justify-content:start;width:100%;">
                            <div style="background-color:#ffc259;padding:40px;max-width:400px;">
                                <h3 style="font-weight:600;" class="mb-3">{{ App::getLocale() == 'kh' ? 'ដំណើរ​មួយ​ពាន់​ម៉ាយ​ចាប់​ផ្ដើម​ជាមួយ Aii':'A journey of a thousand miles begins with Aii.' }} </h3>
                              
                                <div>
                                    <a href="https://registration.aii.edu.kh/login" target="_blank" style="width:100%;" class="btn btn-primary btnAll btnExploreUC">{{ App::getLocale() == 'kh' ? 'ចុះឈ្មោះឥឡូវនេះ!' : 'Register now!' }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color:#253D7F;padding:4% 0;">
        <div class="container-fluid">
            <div class="container py-5">
                <div class="row g-4 d-flex align-items-center">
                    <div class="col-lg-6">
                        <h3 style="color:#F2BE1A;">{{ App::getLocale() == 'kh' ? 'ព្រឹត្តិការណ៍សាលា' : 'School Events' }} </h3>
                        <h1 class="text-white d-none d-md-block text-4-line" style="font-size:2.5rem;font-weight:600;">{{ App::getLocale() == 'kh' ? $data['feature_school_events']->title_kh : $data['feature_school_events']->title_en }} </h1>
                        <h1 class="text-white d-block d-md-none" style="font-size:2rem;font-weight:600;">{{ App::getLocale() == 'kh' ? $data['feature_school_events']->title_kh : $data['feature_school_events']->title_en }} </h1>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <h4 class="text-white text-4-line" style="line-height:32px;">{{ App::getLocale() == 'kh' ? $data['feature_school_events']->introduction_kh : $data['feature_school_events']->introduction_en }}</h4>
                            <div class="mt-5">
                                <a href="{{ url(App::getLocale() == 'en'? 'all-news' :'kh/'.'all-news')}}" class="btn btn-primary btnAll btnAboutUC" alt="display all news catalog">{{ App::getLocale() == 'kh' ? 'អានបន្ថែម' : 'Read more' }} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background: rgb(209,114,37);
background: linear-gradient(90deg, rgba(209,114,37,1) 0%, rgba(255,178,115,1) 100%);padding:5% 0;">
        <div class="container-fluid">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="d-none d-md-block" style="font-size:2.8rem;font-weight:600;color:#fff;max-width:560px;">{{ App::getLocale() == 'kh' ? '10 សាខា និងច្រើនទៀត! យើង​មិន​អាច​ឈប់​បាន។':'10 campuses and more! We are unstoppable.' }} </h1>
                        <h1 class="d-block d-md-none" style="font-size:2rem;font-weight:600;color:#fff;max-width:560px;">{{ App::getLocale() == 'kh' ? '10 សាខា និងច្រើនទៀត! យើង​មិន​អាច​ឈប់​បាន។':'10 campuses and more! We are unstoppable.' }} </h1>
                        <style>
                            #campuseSlide-carousel .owl-dots {
                                text-align: left !important;
                            }
                        </style>
                        <div class="carousel">
                            <div id="campuseSlide-carousel" class="owl-carousel">
                                @foreach($data['campusSlides'] as $key=>$value)
                                    <div class="d-flex align-items-center">
                                        <img style="margin:15px 0;width:100%;" src="{{ asset('public/storage/photos/lazyloading/lazyloading-news.jpg') }}" data-src="{{ $value->image }}" alt="{{ $value->image }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <p class="mt-3 text-white">{{ App::getLocale() == 'kh' ? 'យើងកំពុងកសាងវប្បធម៌នៃឧត្តមភាពសិក្សានៅក្នុងបរិវេណសាលារបស់យើង។ មើលកន្លែងដែលការស្រាវជ្រាវរីកចម្រើន។ ធ្វើជាសាក្សីនៃការច្នៃប្រឌិតនាពេលអនាគត។':'We’re building a culture of academic excellence on our campuses. See us build the school spirit for our community of learners. Witness the innovations of the future.' }} </p> 
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-md-block" style="height:620px;width:100%;">
                            <iframe src="https://www.google.com/maps/d/embed?mid=1ysRHzwk-RaXYpswu95h7U-dwbbIW_rw&ehbc=2E312F" width="100%" height="620px" title="display all aii language centers school maps"></iframe>
                        </div>
                        <div class="d-block d-md-none" style="height:420px;width:100%;">
                            <iframe src="https://www.google.com/maps/d/embed?mid=1ysRHzwk-RaXYpswu95h7U-dwbbIW_rw&ehbc=2E312F" width="100%" height="420px" title="display all aii language centers school maps"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="padding:5% 0;">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h1 class="d-none d-md-block" style="font-size:2.5rem;font-weight:600;">{{ App::getLocale() == 'kh' ? 'កម្មវិធីសិក្សា':'ACADEMIC PROGRAMS' }} </h1>
                        <h1 class="d-block d-md-none" style="font-size:2rem;font-weight:600;">{{ App::getLocale() == 'kh' ? 'កម្មវិធីសិក្សា':'ACADEMIC PROGRAMS' }} </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 style="line-height:32px;">{{ App::getLocale() == 'kh' ? 'យើងលើសពីមជ្ឈមណ្ឌលភាសា! យើងផ្តល់ជូនសិស្សនូវវិធីជាច្រើនដើម្បីរៀនជំនាញថ្មីៗតាមរយៈកម្មវិធីផ្សេងៗ។ ឥឡូវនេះ Aii គឺជាសាលាដ៏ធំបំផុតមួយដែលមានសាខាច្រើនជាង 20 នៅទូទាំងព្រះរាជាណាចក្រកម្ពុជា។':'We are more than a language center! We offer students a variety of ways to learn new skills through various programs. Aii is now one of the biggest schools with more than 20 campuses across the Kingdom of Cambodia.' }} </h4>
                            </div>
                        </div>
                    </div>
                
            <div class="row">
                <div class="col-lg-12 my-5 py-5 ">
                <div class="carousel">
                    <div id="program-carousel" class="owl-carousel">
                        @foreach($data['academics'] as $value)
                        <div>
                            <a href="{{ url(App::getLocale() == 'en'? 'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}" style="display:block;text-decoration:none;">
                                @php 
                                    if($value->slug_en == 'pre-kid-program'){
                                        $str = "style='background-color:#FFD271;color:#333;padding:40px;'";
                                    }
                                    elseif($value->slug_en == 'kid-program'){
                                        $str = "style='background-color:#55B6E1;color:#333;padding:40px;'";
                                    }
                                    elseif($value->slug_en == 'general-english-program'){
                                        $str = "style='background-color:#145E8A;color:#fff;padding:40px;'";
                                    }
                                    elseif($value->slug_en == 'diploma-program'){
                                        $str = "style='background-color:#0B3347;color:#fff;padding:40px;'";
                                    }
                                    elseif($value->slug_en == 'chinese-program'){
                                        $str = "style='background-color:#FFB273;color:#333;padding:40px;'";
                                    }
                                    else{
                                        $str = "style='background-color:#C12525;color:#fff;padding:40px;'";
                                    }
                                    
                                @endphp
                                <div class="program-content">
                                    <div class="program-image">
                                        <img src="{{ asset('public/storage/photos/lazyloading/lazyloading-history.jpg') }}" data-src="{{ $value->thumbnail }}" alt="{{ $value->thumbnail }}">
                                    </div>
                                    <div {!! $str !!} class="program-description">
                                        <h3 class="mb-3">{!! App::getLocale() == 'kh' ? $value->title_kh : $value->title_en !!}</h3>
                                        <p class="text-5-line">{{ App::getLocale() == 'kh' ? $value->introduction_kh : $value->introduction_en }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach 
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')
<!-- Popup -->
<div class="popup" id="popup">
    <?php
    $path = explode('/', $data['popUp'] ? $data['popUp']->image : '');
    $nameImage = $path[count($path) - 1];
    ?>
    <div class="overlay" onclick="closePopUpViaOverlay()"></div>
    <div class="popup_content">
        <a href="{{ $data['popUp'] ? $data['popUp']->url : '' }}">
            <img style="width:100%;" src="{{ asset('public/storage/photos/default/program.jpg') }}" data-src="{{ $data['popUp'] ? $data['popUp']->image : '' }}" alt="{{ $nameImage }}">
        </a>

        <div class="close_btn" onclick="closePopup()">&times;</div>
    </div>
</div>
<input type="hidden" id="popupValue" value="{{ $data['popUp'] }}">

<script>

    //Popup When Reload Page
    window.onload = function() {
        let popup = $('#popupValue').val();
        if (popup) {
            setTimeout(function() {
                $("#popup").addClass("active");
            }, 500)
        }
    }

    function closePopup() {
        $("#popup").removeClass("active");
    }

    function closePopUpViaOverlay() {
        $("#popup").removeClass("active");
    }

</script>

<!-- owl carousel   -->
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/css/animate.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.carousel.min.css') }}">
<!-- owl carousel  -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('plugin/owlcarousel/js/script.js') }}"></script>


@endsection






 
