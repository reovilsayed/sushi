<x-user>
    @push('css')
        <style>
            :root {
                --primary-color: #e4d4bf;
                --sec-color: #ff883e;
            }

            #option-select:focus {
                box-shadow: none !important;
                outline: none !important;
            }

            .selectpicker {
                border: 1px solid var(--accent-color);
                background-color: color-mix(var(--background-color), transparent 50%);
                border-radius: 0;
            }

            .selectpicker:focus {
                border: 1px solid var(--accent-color) !important;
            }

            .sushibtn {
                color: var(--primary-color);
                background-color: transparent;
                border: 1px solid var(--accent-color);
                padding: 10px 20px 10px 20px;
                font-size: 18px;
            }

            .sushibtn:hover {
                color: var(--primary-color);
                background-color: var(--accent-color);
                padding: 10px 20px 10px 20px;
                font-size: 18px;
            }

            .sidept {
                background-color: transparent;
                height: 100%;
            }

            .pbtn {
                background-color: transparent;
                padding: 5px;
                border-radius: 0px;
                color: #fff;
            }

            .decrease-btn {
                border: none;
            }

            .increase-btn {
                border: none;
            }

            input[type='text'] {
                width: 50px;
                height: 100%;
                padding-left: 20px;
                border: none;
                background-color: transparent;
                color: #fff;
            }
        </style>
    @endpush
    <br><br><br>
    <!-- product  Section -->
    <section id="about" class="about section bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-5 d-flex" style="justify-content: center;">
                            <div class="" style="width: 250px; height: 250px;">
                                <div style="position: relative;">
                                    <img style="width: 250px; height: 250px; object-fit: cover;"
                                        src="{{ $product->image ? $product->image : asset('niko/image/restaurant.jpg') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <h2 class="mb-3" style="color: var(--sec-color); font-size: 2rem;">{{ $product->name }}
                            </h2>
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <div class="d-flex ">
                                    <h2 class="col-md-2" id="product-price">{{ number_format($product->price, 2) }}€
                                    </h2>

                                    @if ($productOption->count() !== 0)
                                        <div class="col-md-6 ms-2">
                                            <select class="form-select selectpicker  mb-3 text-colour" name="option_id"
                                                id="option-select" required>
                                                @foreach ($productOption as $option)
                                                    <option value="{{ $option->id }}"
                                                        data-price="{{ $option->option_price }}">
                                                        {{ $option->option_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="restaurent_id" value="{{ $restaurant->id }}">
                                <button type="submit" class="sushibtn mt-3"
                                    style="">{{ __('sentence.addtocart') }}</button>
                            </form>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <p class="text-center txtmob">COMPOSITION</p>

                                    <p>{{ $product->composition }}</p>

                                    {{-- <div class="row border-bottom-1">
                                        <div class="col-6 d-flex align-items-center">
                                            <p style="padding: 0px!important; margin:0px;">Salmon</p>
                                        </div>

                                        <div class="col-6">
                                            <div class="d-flex justify-content-center">
                                                <div class="sidept">
                                                    <button class="btn pbtn decrease-btn"
                                                        data-item="freez_saumon">-</button>
                                                </div>
                                                <div class="" style="width: 50px">
                                                    <input type="text" value="0" id="freez_saumon"
                                                        disabled="">
                                                </div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn"
                                                        data-item="freez_saumon">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row border-bottom-1">
                                        <div class="col-6 d-flex align-items-center">
                                            <p style="padding: 0px!important; margin:0px;">Tuna</p>
                                        </div>

                                        <div class="col-6">
                                            <div class="d-flex justify-content-center">
                                                <div class="sidept">
                                                    <button class="btn pbtn decrease-btn"
                                                        data-item="freez_thon">-</button>
                                                </div>

                                                <div class="" style="width: 50px">
                                                    <input type="text" value="0" id="freez_thon" disabled="">
                                                </div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn"
                                                        data-item="freez_thon">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row border-bottom-1">
                                        <div class="col-6 d-flex align-items-center">
                                            <p style="padding: 0px!important; margin:0px;">Shrimp</p>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex justify-content-center">
                                                <div class="sidept">
                                                    <button class="btn pbtn decrease-btn"
                                                        data-item="freez_crevette">-</button>
                                                </div>
                                                <div class="" style="width: 50px">
                                                    <input type="text" value="0" id="freez_crevette"
                                                        disabled="">
                                                </div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn"
                                                        data-item="freez_crevette">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row border-bottom-1">
                                        <div class="col-6 d-flex align-items-center">
                                            <p style="padding: 0px!important; margin:0px;">Chicken</p>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex justify-content-center">
                                                <div class="sidept">
                                                    <button class="btn pbtn decrease-btn"
                                                        data-item="freez_poulet">-</button>
                                                </div>
                                                <div class="" style="width: 50px">
                                                    <input type="text" value="0" id="freez_poulet"
                                                        disabled="">
                                                </div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn"
                                                        data-item="freez_poulet">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-6" style="border-left: 1px solid var(--primary-color);">
                                    <p class="text-center txtmob">ALLERGENS</p>
                                    <p class="text-center txtmob">egg, sesame, wheat</p>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <p class="text-left" style="font-size: 0.8rem;">{{ $product->text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            document.getElementById('option-select').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const price = selectedOption.getAttribute('data-price');

                if (price) {
                    document.getElementById('product-price').textContent = parseFloat(price).toFixed(2) + '€';
                } else {
                    // Fallback to the original product price if no option is selected
                    document.getElementById('product-price').textContent = '{{ number_format($product->price, 2) }}€';
                }
            });
        </script>
    @endpush
</x-user>
