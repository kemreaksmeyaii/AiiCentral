

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
    <div class="container-fluid header-wrapper">
        <div class="container px-4 py-3 d-flex align-items-end ">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4 ">
                    <div>
                        <div class="content-article-header py-5">
                            <div class="text-left text-center">
                                <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                                {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
                                </h1>
                                <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;">{{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}</h3>
                            </div>
             
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl my-3">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-3" style="padding: 0 8% !important;">
                <div style="margin-bottom:60px;">
                    {!! App::getLocale() == 'en' ? $data['category']->description_en : $data['category']->description_kh !!}
                </div>
                <div class="row g-5 d-flex justify-content-center" id="items_container">
                    @foreach ($data['article'] as $key=>$value)
                        <?php
                            $path = explode('/',$value->thumbnail);
                            $nameImage = $path[count($path)-1];
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 d-flex justify-content-between flex-direction-columns" >
                            <div class="box pb-4">
                                <a style="display:block;color:#333;text-decoration:none;" href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-lg-12 py-0 my-0">
                                            <div>
                                                <img style="object-fit:cover;" width="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-school-committee.jpg') }}"
                                                    data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 my-0 py-0">
                                            <div class="mt-4">
                                                <h3 class="mb-1" style="font-size:1.2rem; font-weight:600;line-height:32px;">{{ Str::limit(App::getLocale() == 'en'?$value->title_en : $value->title_kh, 120) }}</h3> 
                                                <p style="line-height:26px;">{{ App::getLocale() == 'kh' ? $value->introduction_kh : $value->introduction_en }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button id="load_more_button" style="outline:0;border:0; background: linear-gradient(90deg, rgba(23,84,130,1) 0%, rgba(43,147,200,1) 100%);color:#fff;" data-page="{{ $data['article']->currentPage() + 1 }}"
                            class="btn btn-primary">{{ App::getLocale() == 'kh' ? 'បង្ហាញបន្ថែម':'Load More' }}</button>
                    </div>
                </div>

                <!-- <nav aria-label="" class="d-flex justify-content-center mt-4">
                    {{ $data['article']->onEachSide(1)->links( "pagination::bootstrap-4") }}
                </nav> -->
            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" 
    crossorigin="anonymous"></script>
    
<script>
    $(document).ready(function() {
            var start = 20;

            $('#load_more_button').click(function() {
                $.ajax({
                    url: "{{ route('load.more') }}",
                    method: "GET",
                    data: {
                        start: start
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#load_more_button').html('{{ App::getLocale() == 'kh' ? 'កំពុងផ្ទុក...':'Loading...' }} ');
                        $('#load_more_button').attr('disabled', true);
                    },
                    success: function(data) {

                        if (data.data.length > 0) {
                            var html = '';
                            for (var i = 0; i < data.data.length; i++) {
                                var languages = '{{ App::getLocale() == 'en' ? 'en' : 'kh' }}';

                                if(languages == 'en'){
                                    language = data.data[i].title_en;
                                    introduction = data.data[i].introduction_en;
                                    slug = 'articles/'+data.data[i].slug_en;
                                }else{
                                    language = data.data[i].title_kh;
                                    introduction = data.data[i].introduction_kh;
                                    slug = 'articles/'+data.data[i].slug_en;
                                }
                                var lazyloading = 'public/storage/photos/lazyloading/lazyloading-school-committee.jpg';
                                html += `
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 d-flex justify-content-between flex-direction-columns" >
                                    <div class="box pb-4">
                                        <a style="display:block;color:#333;text-decoration:none;" href="`+slug+`">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-lg-12 py-0 my-0">
                                                    <div>
                                                        <img style="object-fit:cover;" width="100%" height="100%" src="`+data.data[i].thumbnail+`"
                                                            data-src="`+lazyloading+`" alt="`+data.data[i].thumbnail+`">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-12 my-0 py-0">
                                                    <div class="mt-4">
                                                        <h3 class="mb-1" style="font-size:1.2rem; font-weight:600;line-height:32px;">`+language+`</h3> 
                                                        <p style="line-height:26px;">`+introduction+`</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                `;
                            }

                            //append data with fade in effect
                            
                            $('#items_container').append($(html).hide().fadeIn(500));
                            $('#load_more_button').html('{{ App::getLocale() == 'kh' ? 'បង្ហាញបន្ថែម':'Load More' }}');
                            $('#load_more_button').attr('disabled', false);
                            start = data.next;

                        } else {
                            // $('.ajax_load').show().html('{{ App::getLocale() == 'kh' ? 'មិនមានទិន្នន័យបន្ថែមទៀតទេ':'No More Data Available' }} ');
                            // $('.ajax_load').attr('disabled', true);
                            $('#load_more_button').html('{{ App::getLocale() == 'kh' ? 'មិនមានទិន្នន័យបន្ថែមទៀតទេ':'No More Data Available' }}');
                            $('#load_more_button').attr('disabled', true);
                        }
                    }
                });
            });
    });
</script>

<!-- lazyloading image for javascript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all images with data-src attribute
        var lazyImages = document.querySelectorAll("img[data-src]");

        // Intersection Observer options
        var options = {
            root: null,
            rootMargin: "0px",
            threshold: 0.1
        };

        // Intersection Observer callback
        function handleIntersection(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    // Load the image
                    entry.target.src = entry.target.dataset.src;
                    observer.unobserve(entry.target);
                }
            });
        }

        // Create the Intersection Observer
        var observer = new IntersectionObserver(handleIntersection, options);

        // Observe each lazy-loaded image
        lazyImages.forEach(function(image) {
            observer.observe(image);
        });
    });
</script>