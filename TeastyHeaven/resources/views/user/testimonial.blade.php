<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">

            @if (isset($rev))
                @if (count($rev) > 0)
                    @foreach ($rev as $rv)
                        <div class="testimonial-item bg-transparent border rounded p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p>{{ $rv->message }}</p>
                            <div class="d-flex align-items-center">
                                   <br>
                                <div class="ps-3">
                                    <br>
                                    <h5 class="mb-1">{{ $rv->name }}</h5>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif


        </div>
    </div>
</div>
