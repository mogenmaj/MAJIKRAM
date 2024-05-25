@extends('layouts.master')
@section('title')
    Rooms
@endsection

@section('content')
    <div class="hero-wrap" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>About</span>
                        </p>
                        <h1 class="mb-4 bread">Rooms</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-wrap">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center pt-4 ftco-animate">
                    <span class="subheading">Rooms</span>
                    <h2>All Rooms</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                @foreach ($rooms as $index => $room)
                    <div class="col-md-3 d-flex mb-4">
                        <div class="services-wrap services-overlay img align-items-center d-flex"
                            style="background-image: url(images/room-{{ $index + 1 }}.jpg)">
                            <div class="text text-center pb-2">
                                @foreach ($categories as $category)
                                    @if ($category->id == $room->category_id)
                                        <h3 class="mb-0">{{ $category->label }}</h3>
                                    @endif
                                @endforeach
                                <span>{{ $room->price }}</span>
                                <div class="d-flex mt-2 justify-content-center">
                                    <div class="icon">
                                        <a href="#"><span class="ion-ios-arrow-forward"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
