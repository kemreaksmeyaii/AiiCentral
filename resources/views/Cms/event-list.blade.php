@extends('Cms.master-page')
@section('content')
    <div class="container-xl">
        <h2 class="text-center fw-bold mt-lg-5 mt-2 color-dark-purple">
            {{App::getLocale() == 'en'?'Our Achievement':' ប្រវត្តិជោគជ័យ'}}
        </h2>
    </div>
    <div class="container-xl my-lg-5 my-4 p-md-5 p-3 bg-white">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- blog -->
                    @foreach ($data as $key=>$value )
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$key}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                {{App::getLocale() == 'en'?$value->title_en:$value->title_kh}}
                                </button>
                            </h2>
                            <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {!! App::getLocale() == 'en'?$value->description_en:$value->description_kh!!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- blog -->
                </div>
                <nav aria-label="" class="d-flex justify-content-center">
                    {{ $data->links( "pagination::bootstrap-4") }}
                </nav>
            </div>
        </div>
    </div>
@endsection
