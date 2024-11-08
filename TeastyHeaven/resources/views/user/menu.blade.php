<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Popular</small>
                            <h6 class="mt-n1 mb-0">Breakfast</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Special</small>
                            <h6 class="mt-n1 mb-0">Launch</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Lovely</small>
                            <h6 class="mt-n1 mb-0">Dinner</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">

                        @if (isset($breakfast))
                            @if (count($breakfast) > 0)
                                @foreach ($breakfast as $bf)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="itemimage/{{ $bf->image }}"
                                                alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $bf->name }}</span>
                                                    <span class="text-primary">{{ $bf->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $bf->desc }}</small>
                                                <form action="{{url('addcart',$bf->id)}}" method="POST">
                                                    @csrf
                                                    <div class="d-flex flex-row-reverse">
                                                        
                                                        <input class="btn btn-primary " type="submit" value="Add To Cart" style="background-color: #FEA116">&nbsp;
                                                        <input class="" type="number" name="qty" id="qty" min="1" placeholder="Qty" style="width: 70px; height: 37px; outline-color:rgb(248, 173, 12)" required>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">

                        @if (isset($lanch))
                            @if (count($lanch) > 0)
                                @foreach ($lanch as $ln)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="itemimage/{{ $ln->image }}"
                                                alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $ln->name }}</span>
                                                    <span class="text-primary">{{ $ln->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $ln->desc }}</small>
                                                <form action="{{url('addcart',$bf->id)}}" method="POST">
                                                    @csrf
                                                    <div class="d-flex flex-row-reverse">
                                                        
                                                        <input class="btn btn-primary " type="submit" value="Add To Cart" style="background-color: #FEA116">&nbsp;
                                                        <input class="" type="number" name="qty" id="qty" min="1" placeholder="Qty" style="width: 70px; height: 37px; outline-color:rgb(248, 173, 12)" required>

                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">

                        @if (isset($dinner))
                            @if (count($dinner) > 0)
                                @foreach ($dinner as $dn)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="itemimage/{{ $dn->image }}"
                                                alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $dn->name }}</span>
                                                    <span class="text-primary">{{ $dn->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $dn->desc }}</small>
                                                <form action="{{url('addcart',$bf->id)}}" method="POST">
                                                    @csrf
                                                    <div class="d-flex flex-row-reverse">
                                                        
                                                        <input class="btn btn-primary " type="submit" value="Add To Cart" style="background-color: #FEA116">&nbsp;
                                                        <input class="" type="number" name="qty" id="qty" min="1" placeholder="Qty" style="width: 70px; height: 37px; outline-color:rgb(248, 173, 12)" required>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
