<div class="container">
    <div class="row mb-5">
        <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
            <h2>{{ __('sentence.menu') }}</h2>
            <p>Laissez-vous tenter par…</p>
        </div>
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="accompagnements-tab" data-bs-toggle="tab"
                        data-bs-target="#accompagnements" type="button" role="tab" aria-controls="home"
                        aria-selected="true">ACCOMPAGNEMENTS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="deserts-tab" data-bs-toggle="tab" data-bs-target="#deserts"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">DESSERTS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="boissons-tab" data-bs-toggle="tab" data-bs-target="#boissons"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">BOISSONS</button>
                </li>
            </ul>


            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="accompagnements" role="tabpanel" aria-labelledby="-tab">
                    <div class="row accmp">
                        {{-- <div id="accompanimentsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://via.placeholder.com/1200x500?text=First+Slide"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/1200x500?text=Second+Slide"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/1200x500?text=Third+Slide"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div> --}}


                        <div id="productCarousel" class="carousel slide mt-2" style="margin-bottom: .5rem !important;" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+1"
                                                    alt="Product 1">
                                                <h5 class="mt-3">Product 1</h5>
                                                <p>$19.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+2"
                                                    alt="Product 2">
                                                <h5 class="mt-3">Product 2</h5>
                                                <p>$29.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+3"
                                                    alt="Product 3">
                                                <h5 class="mt-3">Product 3</h5>
                                                <p>$39.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+4"
                                                    alt="Product 4">
                                                <h5 class="mt-3">Product 4</h5>
                                                <p>$49.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+5"
                                                    alt="Product 5">
                                                <h5 class="mt-3">Product 5</h5>
                                                <p>$59.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+6"
                                                    alt="Product 6">
                                                <h5 class="mt-3">Product 6</h5>
                                                <p>$69.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" style="color: black" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

                <style>
                    .nav-tabs .nav-item.show .nav-link,
                    .nav-tabs .nav-link.active {
                        color: #e4d4bf !important;
                        background-color: var(--sec-color);
                        border-color: var(--sec-color);
                    }

                    .nav-link {
                        color: var(--sec-color);
                    }

                    .nav-tabs {
                        --bs-nav-tabs-border-width: var(--bs-border-width);
                        --bs-nav-tabs-border-color: var(--sec-color);
                        --bs-nav-tabs-border-radius: var(--bs-border-radius);
                        --bs-nav-tabs-link-hover-border-color: var(--sec-color);
                        --bs-nav-tabs-link-active-color: var(--bs-emphasis-color);
                        --bs-nav-tabs-link-active-bg: var(--bs-body-bg);
                        --bs-nav-tabs-link-active-border-color: var(--bs-border-color) var(--bs-border-color) var(--bs-body-bg);
                        border-bottom: var(--bs-nav-tabs-border-width) solid var(--bs-nav-tabs-border-color);
                    }

                    .deserts-icon-sm {
                        height: 200px;
                        width: 100px;
                    }
                </style>

                <div class="tab-pane fade show" id="deserts" role="tabpanel" aria-labelledby="-tab">
                    <div class="row accmp">

                        <!-- First Product Card Slider -->
                        <div id="productCarousel1" class="carousel slide mt-2 mb-2" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+1"
                                                    alt="Product 1">
                                                <h5 class="mt-3">Product 1</h5>
                                                <p>$19.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+2"
                                                    alt="Product 2">
                                                <h5 class="mt-3">Product 2</h5>
                                                <p>$29.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+3"
                                                    alt="Product 3">
                                                <h5 class="mt-3">Product 3</h5>
                                                <p>$39.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+4"
                                                    alt="Product 4">
                                                <h5 class="mt-3">Product 4</h5>
                                                <p>$49.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+5"
                                                    alt="Product 5">
                                                <h5 class="mt-3">Product 5</h5>
                                                <p>$59.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+6"
                                                    alt="Product 6">
                                                <h5 class="mt-3">Product 6</h5>
                                                <p>$69.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel1"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel1"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- Bootstrap JS -->
                    </div>
                </div>



                <div class="tab-pane fade show" id="boissons" role="tabpanel" aria-labelledby="-tab">
                    <div class="row accmp">

                        <!-- Second Product Card Slider -->
                        <div id="productCarousel2" class="carousel slide mt-2 mb-2" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+7"
                                                    alt="Product 7">
                                                <h5 class="mt-3">Product 7</h5>
                                                <p>$19.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+8"
                                                    alt="Product 8">
                                                <h5 class="mt-3">Product 8</h5>
                                                <p>$29.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+9"
                                                    alt="Product 9">
                                                <h5 class="mt-3">Product 9</h5>
                                                <p>$39.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+10"
                                                    alt="Product 10">
                                                <h5 class="mt-3">Product 10</h5>
                                                <p>$49.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+11"
                                                    alt="Product 11">
                                                <h5 class="mt-3">Product 11</h5>
                                                <p>$59.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="product-card">
                                                <img src="https://via.placeholder.com/300x200?text=Product+12"
                                                    alt="Product 12">
                                                <h5 class="mt-3">Product 12</h5>
                                                <p>$69.99</p>
                                                <button class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel2"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel2"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
