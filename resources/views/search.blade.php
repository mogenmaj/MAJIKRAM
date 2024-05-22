@extends('layouts.master')


@section('title')
    Check Availability
@endsection



@section('content')
    <section class="ftco-section bg-light ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">MAJIKROOM Rooms</span>
                    <h2 class="mb-4">Available Rooms </h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    @if ($reservations->count() > 0)
                        @foreach ($reservations as $reservation)
                            <div class="room-wrap d-md-flex">
                                <a href="rooms-single.html" class="img"
                                    style="background-image: url(images/room-1.jpg);"></a>
                                <div class="half left-arrow d-flex align-items-center">
                                    <div class="text p-4 p-xl-5 text-center">
                                        <h3 class="mb-3"><a
                                                href="rooms-single.html">{{ $reservation->rooms[0]->category->label }}</a>
                                        </h3>
                                        <p class="pt-1"><a href="rooms-single.html" class="btn-custom px-3 py-2">View Room
                                                Details
                                                <span class="icon-long-arrow-right"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        No Rooms are available
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
