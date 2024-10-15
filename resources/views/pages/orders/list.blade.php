<x-layout>
    @push('styles')
        <style>
            @media screen and (max-width:780px) {
                .date-filter {
                    padding: 0;
                }

                .name-phone-field {
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
            }

            .card-title a:hover {
                color: #fff !important
            }

            .widget {
                margin-left: 0 !important;
            }

            @keyframes customFadeIn {
                from {
                    opacity: 0;
                    transform: translate3d(0, -20px, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .custom-fade-in {
                animation: customFadeIn 0.5s ease-in-out;
            }
        </style>
    @endpush

    <div class="dashboard_content ps-0 mt-2">
        <div class="dashboard_content_inner">
            <div class="view_box list_view_box active_view mt-3">
                <div class="all_tab_panel" data-tab-parent="tabgroup1">
                    <div class="tab_panel active">
                        <div class="panel_inner panel_inner_scrollable">
                            <div class="row ">

                                <div class="col-md-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-1">
                                            <div class="widget">
                                                <p>{{ __('sentence.totalorders') }}: {{ $data['total']['count'] }}</p>

                                            </div>
                                        </div>
                                        @if (auth()->user()->role_id == 1)
                                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-1">
                                                <div class="widget">
                                                    <p>{{ __('sentence.total_amount') }}
                                                        {{ Settings::price($data['total']['sum']) }}</p>
                                                </div>
                                            </div>
                                        @endif


                                    </div>

                                </div>
                            </div>
                            <div class="mainData">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs justify-content-end" id="myTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="grid-tab" data-bs-toggle="tab" href="#grid"
                                            role="tab" aria-controls="grid" aria-selected="true"><i
                                                class="fas fa-th"></i></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="list-tab" data-bs-toggle="tab" href="#list"
                                            role="tab" aria-controls="list" aria-selected="false"><i
                                                class="fas fa-list"></i> </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                        aria-labelledby="grid-tab">
                                        <x-orders.grid.deck :orders="$orders" />
                                    </div>
                                    <div class="tab-pane fade" id="list" role="tabpanel"
                                        aria-labelledby="list-tab">
                                        <x-orders.table.list :orders="$orders" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center pt-3">
                {{ $orders->links() }}
            </div>

        </div>
    </div>
    <x-filter :url="auth()->user()->role_id == 3 ? route('resto_orders.index') : route('orders.index')">
        <h6 class="mb-4">{{ __('sentence.search') }}</h6>
        <div class="row g-1">
            <div class="col-md-4">
                <x-form.input type="select" name="search[column]" :value="@request()->search['column']" label="{{ __('sentence.field') }}" :options="[
                    'customer.name' => 'First name',
                    'customer.l_name' => 'Last name',
                    'customer.email' => 'Email',
                    'customer.phone' => 'Phone',
                    // 'restaurant.name' => 'Restaurant Name',
                ]" />
            </div>
            <div class="col-md-8">
                <x-form.input type="text" name="search[query]" :value="@request()->search['query']" label="{{ __('sentence.search') }}" />
            </div>
        </div>
        @if (auth()->user()->role_id == 1)
            <hr>
            <h6 class="mb-4">{{ __('sentence.filter') }}</h6>
            <div class="row row-cols-2 g-1">

                {{-- <x-form.input type="select" name="filter[payment_method]" label="Payment Method" :value="@request()->filter['payment_method']"
                :options="['Cash' => 'Cash', 'Bkash' => 'Bkash', 'Nagad' => 'Nagad', 'Card' => 'Card']" :show_empty_options="true" />

           
            <x-form.input type="select" name="filter[order_from]" label="Order From" :value="@request()->filter['order_from']" :options="['pos' => 'Pos', 'app' => 'App']"
                :show_empty_options="true" /> --}}


                <select class="form-select " aria-label="Default select example" name="restaurant">
                    <option selected value="">{{ __('sentence.selectrestaurant') }}</option>
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}"
                            {{ request()->restaurant == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}
                        </option>
                    @endforeach

                </select>


                <x-form.input type="date" name="date[created_at][from]" label="{{ __('sentence.from') }}" :value="@request()->date['created_at']['from']" />
                <x-form.input type="date" name="date[created_at][to]" label="{{ __('sentence.to') }}" :value="@request()->date['created_at']['to']" />
            </div>
            <hr>
        @endif
        <h6 class="mb-4">Order By</h6>

        <div class="row row-cols-2">

            <x-form.input type="select" name="order[created_at]" label="{{ __('sentence.created_at') }}Created At" :value="@request()->order['created_at']" :options="['asc' => 'Ascending', 'desc' => 'Descending']"
                :show_empty_options="true" />
            <x-form.input type="select" name="order[discount]" label="{{ __('sentence.discount') }}" :value="@request()->order['discount']" :options="['asc' => 'Ascending', 'desc' => 'Descending']"
                :show_empty_options="true" />
            <x-form.input type="select" name="order[paid]" label="{{ __('sentence.paid') }}" :value="@request()->order['paid']" :options="['asc' => 'Ascending', 'desc' => 'Descending']"
                :show_empty_options="true" />
            <x-form.input type="select" name="order[due]" label="{{ __('sentence.due') }}" :value="@request()->order['due']" :options="['asc' => 'Ascending', 'desc' => 'Descending']"
                :show_empty_options="true" />

            <x-form.input type="select" name="order[sub_total]" label="{{ __('sentence.sub_total') }}" :value="@request()->order['sub_total']" :options="['asc' => 'Ascending', 'desc' => 'Descending']"
                :show_empty_options="true" />
            <x-form.input type="select" name="order[total]" label="{{ __('sentence.total') }}" :value="@request()->order['total']" :options="['asc' => 'Ascending', 'desc' => 'Descending']"
                :show_empty_options="true" />

        </div>

    </x-filter>

    @push('script')
        <script>
            // Extract and display data when the modal is shown
            $('#deposite').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var order = button.data('order');
                var modal = $(this);
                modal.find('#orderId').val(order);

            });
        </script>
        <script>
            $(document).ready(function() {
                $('.orderCheckBox').change(function() {
                    if ($(this).is(':checked')) {
                        // If checked, create a hidden input for the selected order
                        createHiddenInput($(this).val());
                    } else {
                        // If unchecked, remove the hidden input for the deselected order
                        removeHiddenInput($(this).val());
                    }
                });

                function createHiddenInput(value) {
                    var hiddenInputsContainer = $('#hiddenInputsContainer');
                    var hiddenInput = $('<input type="hidden" name="orders[]">').val(value);
                    hiddenInputsContainer.append(hiddenInput);
                }

                function removeHiddenInput(value) {
                    var hiddenInputsContainer = $('#hiddenInputsContainer');
                    // Remove the hidden input for the deselected order
                    hiddenInputsContainer.find('input[value="' + value + '"]').remove();
                }
            });
        </script>
    @endpush
</x-layout>
