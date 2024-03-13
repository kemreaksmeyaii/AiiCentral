@extends('Cms.master-page')
@section('content')
<style>
.bannerSingleArticle{
    position:relative;
    height:800px;
    @media all and (max-width: 991px) {
        height:100%;
    }
}
.bannerSingleArticle img{
    object-fit:cover;
    background-size:cover;
    background-position:right !important;
    width:100%;
    height:100%;
}
.descriptionSingleArticle{
    position:absolute;
    bottom:0;
    left:0;
    right:0;
    padding:120px 0px;
    @media all and (max-width: 992px) {
        position:relative;
        bottom:0;
        left:0;
        right:0;
        padding:40px;
    }
}
</style>

 
    @if($data['category']->slug == 'alumni')       
    <div class="container-fluid bannerContent" style="background:url('{{ asset('public/storage/photos/Home/alumniCen.jpg') }}'); object-position:center top !important;background-position:center !important;">
    @else
    <div class="container-fluid bannerContent" style="background:url('{{ asset('public/storage/photos/Home/aiiforumCen.jpg') }}'); ">
    @endif
        <div class="container desktop-content">
            <div class="inner-desktop-content row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex">
                        <h1 class="fs-1 text-white p-3" style="background-color:#145E8A;">
                            {{ App::getLocale() == 'en' ? $data['category']->name_en :$data['category']->name_kh }}
                        </h1>
                    </div>
                    <div class="bg-white p-3 m-0" style="font-size:1.3rem !important;">
                        {!! App::getLocale() == 'en' ? $data['category']->description_en :$data['category']->description_kh !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mobile-content">
        <div class="inner-mobile-content">
            <div class="d-flex">
                <h1 class="fs-1 text-white p-3" style="background-color:#145E8A;">
                    {{ App::getLocale() == 'en' ? $data['category']->name_en :$data['category']->name_kh }}
                </h1>
            </div>
            <div class="bg-white p-3 m-0" style="font-size:1.3rem !important;">
                {!! App::getLocale() == 'en' ? $data['category']->description_en :$data['category']->description_kh !!}
            </div>
        </div>
    </div>

    <div class="container-xl my-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                @if($data['category']->slug == 'alumni')
                    <div class="row">
                        @foreach ($data['article'] as $key=>$value)
                            <?php
                                $path = explode('/',$value->thumbnail);
                                $nameImage = $path[count($path)-1];
                            ?>
                            <div class="col-12 col-md-6 col-lg-6 px-4 py-3">
                                <div class="row p-3 rounded box shadow-sm" style="background-color:#fff;border:1px solid #eee;">
                                    <div class="col-12">
                                        <div class="d-flex align-items-start justify-content-between pt-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mb-3">
                                                    <img style=" border:2px solid #2B93C8;width:80px;" class="shadow-sm rounded-circle" src="{{ asset('public/storage/photos/lazyloading/lazyloading-aii-forum.jpg') }}"
                                                        data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                                </div>
                                                <div style="margin-left:15px;">
                                                    <h5 class="p-0 m-0" style="font-size:16px;">{{ App::getLocale() == 'en'? $value->title_en : $value->title_kh }}</h5>
                                                    <p class="p-0 m-0 mt-1" style="font-size:18px;font-weight:600;">{{ App::getLocale() == 'en'? $value->introduction_en : $value->introduction_kh }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <i style="font-size:4rem;color:#ddd;" class="fa-solid fa-quote-right"></i>
                                            </div>
                                        </div>
                                        <div style="min-height:160px;">
                                            <p> {!! App::getLocale() == 'en' ? $value->article_editor_en : $value->article_editor_kh !!}</p>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        @foreach ($data['article'] as $key=>$value)
                            <?php
                                $path = explode('/',$value->thumbnail);
                                $nameImage = $path[count($path)-1];
                            ?>
                            <div class="col-12 col-md-6 col-lg-4 px-4 py-3">
                                <div class="row p-3 rounded box shadow-sm" style="background-color:#fff;border:1px solid #eee;">
                                    <div class="mt-3 ">
                                        <div class="col-12 d-flex justify-content-between align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img style=" border:2px solid #2B93C8; width:70px;height:70px;" class="shadow-sm rounded-circle" width="100%" src="{{ asset('public/storage/photos/lazyloading/lazyloading-aii-forum.jpg') }}"
                                                        data-src="{{ $value->thumbnail }}" alt="{{ $nameImage }}">
                                                </div>
                                                <div style="margin-left:15px;">
                                                    <h5 class="p-0 m-0" style="font-size:16px;margin:0;padding:0;">{{ App::getLocale() == 'en'? $value->title_en : $value->title_kh }}</h5>
                                                    <p class="p-0 m-0 mt-1" style="font-size:0.9rem;margin:0;padding:0;">{{ App::getLocale() == 'en'? $value->introduction_en : $value->introduction_kh }}</p>
                                                </div>
                                            </div>
                                            <!-- <div class="d-none d-md-block">
                                                <i style="font-size:4rem;color:#ddd;" class="fa-solid fa-quote-right"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                    <style>
                                        .aiiforum-desc p p{
                                            line-height:22px !important;
                                        }
                                    </style>
                                    <div class="col-12" style="min-height:250px;">
                                        <p class="aiiforum-desc" class="collapse " id="collapseExample" aria-expanded="false"> {!! Str::limit(App::getLocale() == 'en' ? $value->article_editor_en : $value->article_editor_kh, 280);  !!}</p>
                                    </div>
                                    <div class="mt-3">
                                        <a style="diplay:block;text-decoration:none; font-weight:600;"  class="previewIcon" href="#" id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#previewModal">
                                            <div class="d-flex justify-content-between" style="border-top:1px solid #eee;padding-top:12px;">
                                                <span style="color:#aaa;font-weight:400;">{{ App::getLocale() == 'kh' ? 'អានបន្ថែម' : 'Read more' }}</span>
                                                <span style="border-radius:20px;width:30px;height:30px;color:#aaa;display:flex;align-items:center;justify-content:center;"><i class="fa-solid fa-arrow-right"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>    
                            </div>
                        @endforeach
                    </div>
                @endif
                

                
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div style="background: linear-gradient(90deg, rgba(23,84,130,1) 0%, rgba(43,147,200,1) 100%); position:relative;">
                <div class="d-flex justify-content-end" style="position:absolute;right:20px;top:15px;">
                    <a href="#" class="text-white p-0 m-0" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="d-flex align-items-center p-3 px-4">
                    <div id="avatar" class="d-flex justify-content-center" style="margin-right:12px;"></div>
                    <div>
                        @if(App::getLocale() == 'kh')
                            <div id="name_kh" style="padding:0;margin:0;color:#fff;"></div>
                            <div id="title_kh" style="padding:0;margin:0;color:#FFD271;"></div>
                        @else
                            <div id="name_en" style="padding:0;margin:0;color:#fff;"></div>
                            <div id="title_en" style="padding:0;margin:0;color:#FFD271;"></div>
                        @endif
                    </div>
                </div>
                
            </div>
            
            <div class="modal-body">
                @if(App::getLocale() == 'kh')
                    <div id="description_kh"></div>
                @else
                    <div id="description_en"></div>
                @endif
            </div>
        </div>
  </div>
</div>
{{-- edit employee modal end --}}

<script>
    $(function() {
      // edit employee ajax request
      $(document).on('click', '.previewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('preview') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#fname").val(response.id);
            $("#name_en").html(`${response.title_en} `);
            $("#name_kh").html(`${response.title_kh}`);
            $("#title_en").html(`${response.introduction_en}`);
            $("#title_kh").html(`${response.introduction_kh}`);
            $("#description_kh").html(`${response.article_editor_kh}`);
            $("#description_en").html(`${response.article_editor_en}`);
            $("#slug").html(`<p>${response.slug_en}</p>`);
            $("#avatar").html(
              `<img src="${response.thumbnail}" style="margin:15px 0;" width="80px">`);
            console.log(response.id);
          }
        });
      });


    });
  </script>

@endsection

