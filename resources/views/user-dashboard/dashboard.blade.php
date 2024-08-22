<x-user>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    @endpush
    <br><br><br>
    <!-- Contact Section -->
    <section id="contact" class="contact section bg-transparent">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Your Order</h2>
            <p>Thank You for Joinig Us</p>
            <div class="col-md-12 mt-4">
                <div class="">
                    <a href="{{ route('user.update.profile') }}" class="btn btn-profile">Profile</a>
                </div>
            </div>
        </div>
        {{-- the table  --}}

        @if ($orders->count() > 0)
            <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-colour">Your Order Table</h2>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart_table  table-responsive">
                            <thead class="table_head text-dark">
                                <th style="padding-left:20px;">{{ __('sentence.index') }}</th>
                                <th>{{ __('sentence.order') }}</th>
                                <th>{{ __('sentence.time') }}</th>
                                <th>{{ __('sentence.paid') }}</th>
                                <th class="text-center">invoice</th>
                            </thead>
                            <tbody class="table_body">
                                @foreach ($orders as $key => $order)
                                    <tr class="">
                                        <td class="py-3" style="padding-left:20px;">{{ $key + 1 }}</td>
                                        <td class="">{{ $order->id }}</td>
                                        <td class="">{{ $order->created_at->format('d M, Y h:i A') }}</td>
                                        <td class="">{{ $order->total }}€</td>
                                        <td class="text-center">
                                            <a href="{{ route('invoice', $order) }}"
                                                class="btn btn-invoice ">Invoice</a>
                                            <!-- Positioned to the right -->
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-12 mt-4">
                    <div class="d-flex justify-content-end">
                        
                        {{ $orders->onEachSide(1)->links() }}
                    </div>
                </div>
    
            </div>
    
           
        @else
            <div class="container " data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-colour text-center fst-italic">Please place order to view Orders</h2>
            </div>
        @endif

        <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12 mt-4">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('logout') }}" method="post" id="logout-form" class="php-email-form">
                        @csrf
                        <button type="submit"
                            class="d-xl-block user-logout-button">{{ __('sentence.logout') }}</button>
                    </form>
                </div>
            </div>

        </div>



    </section><!-- /Contact Section -->
    <br><br>
</x-user>
