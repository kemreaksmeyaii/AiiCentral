@extends('Cms.master-page')
@section('content')
    <div class="container-xl">
        <h2 class="text-center fw-bold mt-lg-5 mt-2 color-dark-purple">Articles</h2>
    </div>
    <div class="container-xl my-lg-5 my-4 p-md-5 p-3 bg-white">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    @foreach ($data as $key=>$value)
                        <div class="col-lg-4 col-md-4 col-sm-6 cardv1 mb-3">
                            <div class="card border-1">
                                <a href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}">
                                    <div class="card-header p-0" style="height: 200px;">
                                        <img src="{{ asset($value->thumbnail) }}" alt="" class="card-img-top img-overlay">
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <a href="javascript:;" class="news-category d-block float-start">
                                                <span class="badge text-white bg-primary text-capitalize"><i class="fa-solid fa-tag"></i> Other</span>
                                            </a>
                                            <small class="text-secondary text-capitalize px-3" style="font-size: 12px;">{{$value->created_at->format('D-M-Y')}}</small>
                                        </div>
                                        <a href="{{ url(App::getLocale() == 'en'?'articles/'.$value->slug_en :'kh/articles/'.$value->slug_en)}}" class="news-link">{{ Str::limit(App::getLocale() == 'en'?$value->title_en : $value->title_kh, 50) }}</a> <br>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- end article -->
                    @endforeach
                </div>
                <nav aria-label="" class="d-flex justify-content-center">
                    {{ $data->links( "pagination::bootstrap-4") }}
                </nav>
            </div>
        </div>
    </div>
@endsection

