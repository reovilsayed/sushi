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

    .img-fluid {
        max-width: 45% !important;
        height: auto !important;
    }

    .price-container {
        position: relative;
        display: inline-block;
    }


    .price {
        opacity: 1;
        visibility: visible;
        position: relative;
        top: 20px;
        transition: top .4s cubic-bezier(0.215, 0.610, 0.355, 1);
    }

    .add-button {
        opacity: 0;
        visibility: hidden;
        position: relative;
        top: 10px;
        transition: top .5s cubic-bezier(0.215, 0.610, 0.355, 1);

    }

    .product-hover:hover .price {
        top: -10px;
        opacity: 0;
        visibility: hidden;
    }


    .product-hover:hover .add-button {
        top: -10px;
        opacity: 1;
        visibility: visible;
    }

    .btn-close {
        background-image: url('data:image/svg+xml,%3csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ffffff"%3e%3cpath d="M14.293 7.293a1 1 0 0 1 1.414 0L19 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414L20.414 12l3.293 3.293a1 1 0 0 1-1.414 1.414L19 13.414l-3.293 3.293a1 1 0 0 1-1.414-1.414L17.586 12l-3.293-3.293a1 1 0 0 1 0-1.414z"/%3e%3c/svg%3e');
        background-size: contain;
        background-position: calc(50% - 10px);
    }

    .btn-close:focus {
        box-shadow: none !important;
    }
</style>
<div class="container">
    <div class="row mb-5">
        <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
            <h2>{{ __('sentence.menu') }}</h2>
            <p>Laissez-vous tenter par…</p>
        </div>
        <div class="col-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($relatedProducts as $groupIndex => $groupProducts)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $groupIndex }}"
                            data-bs-toggle="tab" data-bs-target="#panel-{{ $groupIndex }}" type="button"
                            role="tab" aria-controls="panel-{{ $groupIndex }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $groupProducts['category_name'] }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">
                @foreach ($relatedProducts as $groupIndex => $groupProducts)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="panel-{{ $groupIndex }}"
                        role="tabpanel" aria-labelledby="tab-{{ $groupIndex }}">
                        <div class="row accmp">

                            <div id="carousel-{{ $groupIndex }}" class="carousel slide mt-2" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($groupProducts['products']->chunk(3) as $chunkIndex => $chunkItems)
                                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                            <div class="">
                                                <div class="row">
                                                    @foreach ($chunkItems as $product)
                                                        <div class="col-md-4 text-center">
                                                            <x-viewProduct.product :restaurant="App\Models\Restaurant::find(
                                                                session()->get('restaurent_id'),
                                                            )"
                                                                :product="$product" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carousel-{{ $groupIndex }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carousel-{{ $groupIndex }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>