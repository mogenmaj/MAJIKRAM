@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')
    <div class="hero">
        <div class="container-wrap d-flex justify-content-end align-items-end">
            <a href="https://www.youtube.com/watch?v=ism1XqnZJEg"
                class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                <span class="ion-ios-play play"></span>
            </a>
        </div>
        <section class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url(images/bg_1.jpg)">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">MAJIKROOM</h1>
                                <h2>More than a hotel... an experience</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image: url(images/bg_2.jpg)">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">Experience Epic Beauty</h1>
                                <h2>MAJIKROOM Hotel &amp; Resort</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-1 aside-stretch">

                    <form method="GET" action={{ route('search') }} class="booking-form">
                        <div class="row">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Check-in Date</label>
                                        <input type="text" class="form-control checkin_date" placeholder="Check-in date"
                                            name="start_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Check-out Date</label>
                                        <input type="text" class="form-control checkout_date"
                                            placeholder="Check-out date" name="end_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Room Category</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon">
                                                    <span class="ion-ios-arrow-down"></span>
                                                </div>
                                                <select name="category" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option value={{ $category->id }}>{{ $category->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch">
                                    <button type="submit"
                                        class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check
                                            Availability
                                            <small>Best Price Guaranteed!</small></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-wrap">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center pt-4 ftco-animate">
                    <span class="subheading">Available Rooms</span>
                    <h2>Available Rooms</h2>
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


    {{--
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Welcome to MAJIKROOMM Hotel</span>
            <h2 class="mb-4">A New Vision of Luxury Hotel</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
                <div
                  class="icon d-flex align-items-center justify-content-center"
                >
                  <span class="flaticon-reception-bell"></span>
                </div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Friendly Service</h3>
              </div>
            </div>
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services active py-4 d-block text-center">
              <div class="d-flex justify-content-center">
                <div
                  class="icon d-flex align-items-center justify-content-center"
                >
                  <span class="flaticon-serving-dish"></span>
                </div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Get Breakfast</h3>
              </div>
            </div>
          </div>
          <div
            class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate"
          >
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
                <div
                  class="icon d-flex align-items-center justify-content-center"
                >
                  <span class="flaticon-car"></span>
                </div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Transfer Services</h3>
              </div>
            </div>
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
                <div
                  class="icon d-flex align-items-center justify-content-center"
                >
                  <span class="flaticon-spa"></span>
                </div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Suits &amp; SPA</h3>
              </div>
            </div>
          </div>
          <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
                <div
                  class="icon d-flex align-items-center justify-content-center"
                >
                  <span class="ion-ios-bed"></span>
                </div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Cozy Rooms</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light ftco-room">
      <div class="container-fluid px-0">
        <div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">MAJIKROOM Rooms</span>
            <h2 class="mb-4">Hotel Master's Rooms</h2>
          </div>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6">
            <div class="room-wrap">
              <div
                class="img d-flex align-items-center"
                style="background-image: url(images/bg_3.jpg)"
              >
                <div class="text text-center px-4 py-4">
                  <h2>Welcome to <a href="{{route('index')}}">MAJIKROOM</a> Hotel</h2>
                  <p>
                    A small river named Duden flows by their place and supplies
                    it with the necessary regelialia.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="room-wrap d-md-flex">
              <a
                href="#"
                class="img"
                style="background-image: url(images/room-1.jpg)"
              ></a>
              <div class="half left-arrow d-flex align-items-center">
                <div class="text p-4 p-xl-5 text-center">
                  <p class="star mb-0">
                    <span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span>
                  </p>
                  <p class="mb-0">
                    <span class="price mr-1">$220.00</span>
                    <span class="per">per night</span>
                  </p>
                  <h3 class="mb-3"><a href="{{route('rooms')}}">Suite Room</a></h3>
                  <p class="pt-1">
                    <a href="{{route('room-single')}}" class="btn-custom px-3 py-2"
                      >View Room Details
                      <span class="icon-long-arrow-right"></span
                    ></a>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="room-wrap d-md-flex">
              <a
                href="#"
                class="img order-md-last"
                style="background-image: url(images/room-2.jpg)"
              ></a>
              <div class="half right-arrow d-flex align-items-center">
                <div class="text p-4 p-xl-5 text-center">
                  <p class="star mb-0">
                    <span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span>
                  </p>
                  <p class="mb-0">
                    <span class="price mr-1">$150.00</span>
                    <span class="per">per night</span>
                  </p>
                  <h3 class="mb-3"><a href="{{route('rooms')}}">Family Room</a></h3>
                  <p class="pt-1">
                    <a href="{{route('room-single')}}" class="btn-custom px-3 py-2"
                      >View Room Details
                      <span class="icon-long-arrow-right"></span
                    ></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="room-wrap d-md-flex">
              <a
                href="#"
                class="img order-md-last"
                style="background-image: url(images/room-3.jpg)"
              ></a>
              <div class="half right-arrow d-flex align-items-center">
                <div class="text p-4 p-xl-5 text-center">
                  <p class="star mb-0">
                    <span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span>
                  </p>
                  <p class="mb-0">
                    <span class="price mr-1">$200.00</span>
                    <span class="per">per night</span>
                  </p>
                  <h3 class="mb-3"><a href="{{route('rooms')}}">Deluxe Room</a></h3>
                  <p class="pt-1">
                    <a href="{{route('room-single')}}" class="btn-custom px-3 py-2"
                      >View Room Details
                      <span class="icon-long-arrow-right"></span
                    ></a>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="room-wrap d-md-flex">
              <a
                href="#"
                class="img"
                style="background-image: url(images/room-4.jpg)"
              ></a>
              <div class="half left-arrow d-flex align-items-center">
                <div class="text p-4 p-xl-5 text-center">
                  <p class="star mb-0">
                    <span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span>
                  </p>
                  <p class="mb-0">
                    <span class="price mr-1">$180.00</span>
                    <span class="per">per night</span>
                  </p>
                  <h3 class="mb-3"><a href="{{route('rooms')}}">Luxury Room</a></h3>
                  <p class="pt-1">
                    <a href="{{route('room-single')}}" class="btn-custom px-3 py-2"
                      >View Room Details
                      <span class="icon-long-arrow-right"></span
                    ></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="room-wrap d-md-flex">
              <a
                href="#"
                class="img"
                style="background-image: url(images/room-6.jpg)"
              ></a>
              <div class="half left-arrow d-flex align-items-center">
                <div class="text p-4 p-xl-5 text-center">
                  <p class="star mb-0">
                    <span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span
                    ><span class="ion-ios-star"></span>
                  </p>
                  <p class="mb-0">
                    <span class="price mr-1">$120.00</span>
                    <span class="per">per night</span>
                  </p>
                  <h3 class="mb-3"><a href="{{route('rooms')}}">Superior Room</a></h3>
                  <p class="pt-1">
                    <a href="{{route('room-single')}}" class="btn-custom px-3 py-2"
                      >View Room Details
                      <span class="icon-long-arrow-right"></span
                    ></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Testimony</span>
            <h2 class="mb-4">Our Happy Guest Says</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8 ftco-animate">
            <div class="row ftco-animate">
              <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div
                        class="user-img mb-4"
                        style="background-image: url(images/person_1.jpg)"
                      >
                        <span
                          class="quote d-flex align-items-center justify-content-center"
                        >
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="star">
                          <span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span>
                        </p>
                        <p class="mb-4">
                          A small river named Duden flows by their place and
                          supplies it with the necessary regelialia. It is a
                          paradisematic country, in which roasted parts of
                          sentences fly into your mouth.
                        </p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div
                        class="user-img mb-4"
                        style="background-image: url(images/person_2.jpg)"
                      >
                        <span
                          class="quote d-flex align-items-center justify-content-center"
                        >
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="star">
                          <span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span>
                        </p>
                        <p class="mb-4">
                          A small river named Duden flows by their place and
                          supplies it with the necessary regelialia. It is a
                          paradisematic country, in which roasted parts of
                          sentences fly into your mouth.
                        </p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div
                        class="user-img mb-4"
                        style="background-image: url(images/person_3.jpg)"
                      >
                        <span
                          class="quote d-flex align-items-center justify-content-center"
                        >
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="star">
                          <span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span>
                        </p>
                        <p class="mb-4">
                          A small river named Duden flows by their place and
                          supplies it with the necessary regelialia. It is a
                          paradisematic country, in which roasted parts of
                          sentences fly into your mouth.
                        </p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div
                        class="user-img mb-4"
                        style="background-image: url(images/person_1.jpg)"
                      >
                        <span
                          class="quote d-flex align-items-center justify-content-center"
                        >
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="star">
                          <span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span>
                        </p>
                        <p class="mb-4">
                          A small river named Duden flows by their place and
                          supplies it with the necessary regelialia. It is a
                          paradisematic country, in which roasted parts of
                          sentences fly into your mouth.
                        </p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4 pb-5">
                      <div
                        class="user-img mb-4"
                        style="background-image: url(images/person_1.jpg)"
                      >
                        <span
                          class="quote d-flex align-items-center justify-content-center"
                        >
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text text-center">
                        <p class="star">
                          <span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span
                          ><span class="ion-ios-star"></span>
                        </p>
                        <p class="mb-4">
                          A small river named Duden flows by their place and
                          supplies it with the necessary regelialia. It is a
                          paradisematic country, in which roasted parts of
                          sentences fly into your mouth.
                        </p>
                        <p class="name">Nathan Smith</p>
                        <span class="position">Guests</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb px-0">
      <div class="container-fluid px-0">
        <div class="row no-gutters justify-content-end">
          <div class="col-md-12">
            <div
              id="home"
              class="video-hero"
              style="
                height: 800px;
                background-image: url(images/bg_1.jpg);
                background-size: cover;
                background-position: center center;
              "
            >
              <a
                class="player"
                data-property="{videoURL:'https://www.youtube.com/watch?v=ism1XqnZJEg',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"
              ></a>
              <div class="container">
                <div
                  class="row justify-content-start d-flex align-items-end height-text"
                >
                  <div class="col-md-8">
                    <div class="text">
                      <h1>We're Most Recommended Hotel</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section
      class="ftco-section ftco-menu"
      style="background-image: url(images/restaurant-pattern.jpg)"
    > --}}
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Restaurant</span>
                <h2>Restaurant</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img order-md-last" style="background-image: url(images/food1.png)"></div>
                    <div class="desc pr-3 text-md-right">
                        <div class="d-md-flex text align-items-center">
                            <h3 class="order-md-last heading-left">
                                <span>Couscous with tfaya and legumes </span>
                            </h3>
                            <span class="price price-left">85 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              Flavorful couscous with sweet tfaya sauce and veggies                            </p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img order-md-last" style="background-image: url(images/food2.png)"></div>
                    <div class="desc pr-3 text-md-right">
                        <div class="d-md-flex text align-items-center">
                            <h3 class="order-md-last heading-left">
                                <span>Sweet bastilla with chicken</span>
                            </h3>
                            <span class="price price-left">170 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              Moroccan delicacy: Chicken, almonds, and spices in delicate pastry, topped with sugar and cinnamon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img order-md-last" style="background-image: url(images/food3.png)"></div>
                    <div class="desc pr-3 text-md-right">
                        <div class="d-md-flex text align-items-center">
                            <h3 class="order-md-last heading-left">
                                <span>Moroccan chicken tagine with preserved lemons</span>
                            </h3>
                            <span class="price price-left">150 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              A flavorful dish showcasing tender chicken cooked with aromatic spices and preserved lemons
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img order-md-last" style="background-image: url(images/menu-4.jpg)"></div>
                    <div class="desc pr-3 text-md-right">
                        <div class="d-md-flex text align-items-center">
                            <h3 class="order-md-last heading-left">
                                <span>Grilled Beef with potatoes</span>
                            </h3>
                            <span class="price price-left">230 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              Tender beef paired with seasoned potatoes
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/food4.png)"></div>
                    <div class="desc pl-3">
                        <div class="d-md-flex text align-items-center">
                            <h3><span>Grilled Beef with potatoes</span></h3>
                            <span class="price">75 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              Moroccan roasted eggplant dip with tomatoes and spices
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/food5.png)"></div>
                    <div class="desc pl-3">
                        <div class="d-md-flex text align-items-center">
                            <h3><span>Harira</span></h3>
                            <span class="price">40 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              A hearty soup made with tomatoes, lentils, chickpeas, and spices, often enjoyed during Ramadan or as a comforting meal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/food6.png)"></div>
                    <div class="desc pl-3">
                        <div class="d-md-flex text align-items-center">
                            <h3><span>Moroccan Mint Tea</span></h3>
                            <span class="price">55 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              Refreshing green tea infused with fresh mint leaves and sweetened with sugar, often enhanced with hints of orange blossom water
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/food7.png)"></div>
                    <div class="desc pl-3">
                        <div class="d-md-flex text align-items-center">
                            <h3><span>Various Pizzas</span></h3>
                            <span class="price">135 DH</span>
                        </div>
                        <div class="d-block">
                            <p>
                              Enjoy a variety of pizzas with different toppings, from classic pepperoni to vegetarian options, freshly prepared and baked to perfection
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Read Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="" class="block-20" style="background-image: url('images/blog6.png')">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">July 03, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading">
                                <a href="#">Experience the captivating rhythms of Gnawa music at our hotel</a>
                            </h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="" class="block-20" style="background-image: url('images/blog1.png')">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">July 03, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading">
                                <a href="#">An area styled in Moroccan fashion, adorned with luxurious cushions, intricate rugs, and ornate decorations, offers a warm and welcoming space for relaxation and socializing</a>
                            </h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="" class="block-20" style="background-image: url('images/blog3.png')">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">July 03, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading">
                                <a href="#">A cozy oasis amidst Moroccan walls</a>
                            </h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instagram">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Photos</span>
                    <h2><span>Instagram</span></h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-1.jpg" class="insta-img image-popup"
                        style="background-image: url(images/insta1.png)">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-2.jpg" class="insta-img image-popup"
                        style="background-image: url(images/insta2.png)">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-3.jpg" class="insta-img image-popup"
                        style="background-image: url(images/insta3.png)">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-4.jpg" class="insta-img image-popup"
                        style="background-image: url(images/insta4.png)">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-5.jpg" class="insta-img image-popup"
                        style="background-image: url(images/insta5.png)">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
