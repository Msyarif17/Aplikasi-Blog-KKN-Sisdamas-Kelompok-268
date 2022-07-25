@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 d-flex">
            <div class="my-auto">
                <h1>{{$title!=null ? $title:'Judul'}}</h1>
                <p>{{$content !=null ? $content:'Deskripsi'}}</p>
            </div>
            
        </div>
        <div class="col-6 p-5 pr-0">
            <img src="{{asset('image/banner-1.png')}}" alt="" class="img-fluid rounded ">
        </div>
    </div>
    <div class="row" style="background-color: #39b54a; border-top-left-radius: 20px;border-top-right-radius: 20px;">
        <div class="col-6 text-center text-capitalize mx-auto py-3 text-light font-weight-bold">
            kegiatan terbaru
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel loop">
                {{-- @foreach ($events as $event) --}}
                <div class="w-75">
                    <div class="card mb-3">
                        <img src="{{asset('image/banner-1.png')}}" alt="" class="img-fluid card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">test</h5>
                            <p class="card-text">test</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="w-75">
                    <div class="card mb-3">
                        <img src="{{asset('image/banner-1.png')}}" alt="" class="img-fluid card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">test</h5>
                            <p class="card-text">test</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="w-75">
                    <div class="card mb-3">
                        <img src="{{asset('image/banner-1.png')}}" alt="" class="img-fluid card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">test</h5>
                            <p class="card-text">test</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="w-75">
                    <div class="card mb-3">
                        <img src="{{asset('image/banner-1.png')}}" alt="" class="img-fluid card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">test</h5>
                            <p class="card-text">test</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
    
        $(".owl-carousel").owlCarousel();
        $('.loop').owlCarousel({
            center: true,
            items:2,
            loop:true,
            margin:10,
            responsive:{
                600:{
                    items:4
                }
            }
        });
    

    </script> 
@endpush