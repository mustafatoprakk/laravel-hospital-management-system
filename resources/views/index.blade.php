@extends('layouts/app')


@section('content')
    <!--Carousel-->
    <div id="carouselExampleSlidesOnly" class="carousel slide mb-5" data-mdb-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/health.jpg" class="d-block w-100" alt="Wild Landscape" />
            </div>
        </div>
    </div>

    <!---->
    <section class="section-padding my-5" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="fs-3">Meet Dr. Carson</p>
                            <span class="text-muted ">
                                Protect yourself and others by wearing masks and washing hands frequently. Outdoor is
                                safer than indoor for gatherings or holding events. People who get sick with Coronavirus
                                disease (COVID-19) will experience mild to moderate symptoms and recover without special
                                treatments.

                                You can feel free to use this CSS template for your medical profession or health care
                                related websites. You can support us a little via PayPal if this template is good and
                                useful for your work.
                            </span>
                        </div>
                        <div class="col-md-6">
                            <img src="images/doctor.jpg" class="img-fluid shadow-2-strong rounded"
                                alt="Palm Springs Road" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
