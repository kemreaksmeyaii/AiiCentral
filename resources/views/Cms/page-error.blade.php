@extends('Cms.master-page')
@section('content')

<style>
    @keyframes zoom-in-zoom-out {
      0% {
        transform: scale(1, 1);
      }
      50% {
        transform: scale(1.1, 1.1);
      }
      100% {
        transform: scale(1, 1);
      }
    }
      h1{
          animation: zoom-in-zoom-out 1s ease infinite;
      }
</style>

    <div class="d-flex justify-content-center mt-5">
        <div class="row my-5">
            <div class="col-lg-12 mb-5">
                <img class="mb-3" data-src="{{ asset('public/storage/photos/home/pageNotFound.png') }}" width="100%">
                <h1 class="text-center my-3">{{ App::getLocale() == 'kh' ? 'រកមិនឃើញទំព័រ':'Page Not Found' }}</h1>
            </div>
        </div>
    </div>
@endsection
