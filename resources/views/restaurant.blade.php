@extends('layouts.master')
@section('title')
    Restaurant
@endsection

@section('content')
    <div class="hero-wrap" style="background-image: url('images/restauu.png');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('index') }}">Home</a></span>
                            <span>Restaurant</span></p>
                        <h1 class="mb-4 bread">"Experience a unique dining delight"</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-menu" style="background-image: url(images/restaurant-pattern.jpg);">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Restaurant</span>
                    <h2>The ideal balance between an exotic venue and a perfect cooking
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last" style="background-image: url(images/food1.png);"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
<<<<<<< HEAD
                                <h3 class="order-md-last heading-left"><span>Couscous with tfaya and legumes</span></h3>
=======
                                <h3 class="order-md-last heading-left"><span>Couscous</span></h3>
>>>>>>> ee545897cfa05acaa4dd67dcdabc5b4058e55ce4
                                <span class="price price-left">85 DH</span>
                            </div>
                            <div class="d-block">
                                <p> Flavorful couscous with sweet tfaya sauce and veggies</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last" style="background-image: url(images/food2.png);"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Sweet bastilla with chicken</span></h3>
                                <span class="price price-left">170 DH</span>
                            </div>
                            <div class="d-block">
                                <p>Moroccan delicacy: Chicken, almonds, and spices in delicate pastry, topped with sugar and cinnamon</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last" style="background-image: url(images/food3.png);"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Moroccan chicken tagine with preserved lemons</span></h3>
                                <span class="price price-left">150 DH</span>
                            </div>
                            <div class="d-block">
                                <p>A flavorful dish showcasing tender chicken cooked with aromatic spices and preserved lemons</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last" style="background-image: url(images/menu-4.jpg);"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Grilled Beef with potatoes</span></h3>
                                <span class="price price-left">230 DH</span>
                            </div>
                            <div class="d-block">
                                <p> Tender beef paired with seasoned potatoes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(images/food4.png);"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Zaalouk</span></h3>
                                <span class="price">75 DH</span>
                            </div>
                            <div class="d-block">
                                <p>Moroccan roasted eggplant dip with tomatoes and spices</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(images/food5.png);"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Harira</span></h3>
                                <span class="price">40 DH</span>
                            </div>
                            <div class="d-block">
                                <p>A hearty soup made with tomatoes, lentils, chickpeas, and spices, often enjoyed during Ramadan or as a comforting meal</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(images/food6.png);"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Moroccan Mint Tea</span></h3>
                                <span class="price">55 DH</span>
                            </div>
                            <div class="d-block">
                                <p>Refreshing green tea infused with fresh mint leaves and sweetened with sugar, often enhanced with hints of orange blossom water</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(images/food7.png);"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Various Pizzas </span></h3>
                                <span class="price">135 DH</span>
                            </div>
                            <div class="d-block">
                                <p>Enjoy a variety of pizzas with different toppings, from classic pepperoni to vegetarian options, freshly prepared and baked to perfection</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">MAJIKROOM</h2>
                        <p>MAJIKROOM Hotel is committed to providing an exceptional experience for its guests, blending
                            comfort, hospitality, and convenience. Our rooms are equipped with modern facilities to ensure a
                            pleasant stay. Located in the heart of the city, MAJIKROOM offers easy access to local
                            attractions. Book now for an unforgettable experience.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Useful Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Rooms</a></li>
                            <li><a href="#" class="py-2 d-block">Amenities</a></li>
                            <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Career</a></li>
                            <li><a href="#" class="py-2 d-block">About Us</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Km 4, route d'Amizmiz
                                    Marrakech, Maroc</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+212 651
                                            53 69 25</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@majikroom.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                                  </div>
            </div>
        </div>
    </footer>
@endsection
