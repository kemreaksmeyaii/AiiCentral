@extends('Cms.master-page')

@section('content')
    
    <div class="container-fluid header-wrapper">
        <div class="container px-4 py-3 d-flex align-items-end h-100">
            <div class="row d-flex justify-content-center w-100">
                <div class="col-xl-12 px-0 px-lg-4">
                    <div class="py-5">
                        <div class="pt-2 text-center">
                            <h1 class="d-none d-md-block fw-bold text-white" style="font-size:48px;">
                                {{App::getLocale() == "en"?'Contact Us':'ទំនាក់ទំនង មកពួកយើង'}}
                            </h1>
                            <h3 class="d-block d-md-none fw-bold text-white" style="font-size:38px;">{{App::getLocale() == "en"?'Contact Us':'ទំនាក់ទំនង មកពួកយើង'}}</h3>
                        </div>
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl p-md-5 p-3">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ysRHzwk-RaXYpswu95h7U-dwbbIW_rw&ehbc=2E312F" width="100%" height="550"></iframe>
                <div class="row mt-3 g-4">
                    <div class="col-lg-6">
                        <div class="text-center px-3 shadow-sm  d-flex justify-content-center align-items-center" style="border:1px solid #eee;min-height:150px;">
                            <p><b> {{App::getLocale() == "en"?'Tel':'ទូរស័ព្ទលេខ'}}</b> <br>
                                @foreach ($data['phone'] as $key=>$value)
                                    {{App::getLocale() == "en"?$value->value_en:$value->value_kh}}
                                @endforeach
                            </p>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center px-3 shadow-sm  d-flex justify-content-center align-items-center" style="border:1px solid #eee;min-height:150px;">
                            <p><b> {{App::getLocale() == "en"?'Email':'សារអេឡិចត្រូនិក'}}</b> <br>
                                @foreach ($data['email'] as $key=>$value)
                                    <a href="mailto:{{$value->value_en}}">{{$value->value_en}}</a><br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div style="min-height:150px;border:1px solid #eee;" class="text-center px-3 shadow-sm d-flex justify-content-center align-items-center">
                            <p><b> {{App::getLocale() == "en"?'Website':'គេហទំព័រ'}}</b> <br>
                                @foreach ($data['website'] as $key=>$value)
                                    <a href="{{$value->value_en}}" target="_blank">{{$value->value_en}}</a><br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div style="min-height:150px;border:1px solid #eee;" class="text-center px-3 shadow-sm d-flex justify-content-center align-items-center">
                            <p><b> {{App::getLocale() == "en"?'Follow Us':'តាមដានពួកយើង'}}</b> <br>
                                @foreach ($data['socailMedia'] as $key=>$value)
                                    @if($value->key == 'facebook')
                                    <a href="{{$value->value_en}}" target="_blank"><img src="{{$value->image}}" style="width: 30px;" alt="icon"></a>
                                    @endif

                                    @if($value->key == 'youtube')
                                    <a href="{{$value->value_en}}" target="_blank"><img src="{{$value->image}}" style="width: 30px;" alt="icon"></a>
                                    @endif

                                    @if($value->key == 'linkedin')
                                    <a href="{{$value->value_en}}" target="_blank"><img src="{{$value->image}}" style="width: 30px;" alt="icon"></a>
                                    @endif

                                    @if($value->key == 'tiktok')
                                    <a href="{{$value->value_en}}" target="_blank"><img src="{{$value->image}}" style="width: 30px;" alt="icon"></a>
                                    @endif

                                    @if($value->key == 'instagram')
                                    <a href="{{$value->value_en}}" target="_blank"><img src="{{$value->image}}" style="width: 30px;" alt="icon"></a>
                                    @endif

                                    @if($value->key == 'telegram')
                                    <a href="{{$value->value_en}}" target="_blank"><img src="{{$value->image}}" style="width: 30px;" alt="icon"></a>
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div style="min-height:150px;border:1px solid #eee;"  class="text-center px-3 shadow-sm d-flex justify-content-center align-items-center">
                            <p><b> {{App::getLocale() == "en"?'Address':'អាសយដ្ឋាន'}}</b> <br>
                            {{App::getLocale() == "en"? $data['contentMap']->value_en:$data['contentMap']->value_kh}}</p>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
@endsection
