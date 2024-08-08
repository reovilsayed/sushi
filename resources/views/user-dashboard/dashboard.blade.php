<x-user>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    @endpush
    <br><br><br>
    <!-- Contact Section -->
    <section id="contact" class="contact section ">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-md-8 ">
                    <h3 class="text-colour mb-3" data-aos="fade-up" data-aos-delay="200">Update your name</h3>
                    <form method="POST" action="{{ route('user.update.name') }}" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control capitalize-first"
                                    placeholder="Your Name" required value="{{ ucfirst(auth()->user()->name) }}">
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="last_name" class="form-control capitalize-first"
                                    placeholder="Your Name" required value="{{ ucfirst(auth()->user()->last_name) }}">
                            </div>

                            <div class="col-md-10">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="" value="{{ auth()->user()->email }}" disabled>

                            </div>



                            <div class="col-md-12 text-start">
                                <button type="submit">Update</button>
                            </div>
                            <div class="d-flex gap-3 ">
                                <p class="fst-italic">forgot password?</p>
                                <a href="{{ route('password.request') }}">click here</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 ">
                    <h3 class="text-colour mb-3" data-aos="fade-up" data-aos-delay="200">Update your Password</h3>
                    <form method="POST" action="{{ route('user.update.password') }}" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <input type="password" name="current_password" class="form-control"
                                    placeholder="Current Password" required="">
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required="">
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm Password" required="">
                            </div>

                            <div class="col-md-12 text-start">
                                <button type="submit">Update</button>
                            </div>
                        </div>
                    </form>

                   

                </div>
            </div>
        </div>
        {{-- the table  --}}

        <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="cart_table  table-responsive">
                        <thead class="table_head text-dark">
                            <th style="padding-left:20px;">index</th>
                            <th>oder</th>
                            <th>time</th>
                            <th>paid</th>
                        </thead>
                        <tbody class="table_body">

                            @foreach ($orders as $key => $order)
                                <tr class="">
                                    <td class="py-3" style="padding-left:20px;">{{ $key + 1 }}</td>
                                    <td class="">{{ $order->id }} </td>
                                    <td class="">{{ $order->created_at->format('d M, Y h:i A') }}</td>
                                    <td class="">{{ $order->total }}€ </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="d-flex gap-3">
                    <h4 class="text-colour">logout</h4>
                    <form action="{{ route('logout') }}" method="post" id="logout-form" class="php-email-form">
                        @csrf
                        <button type="submit" class="d-xl-block user-logout-button">LogOut</button>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
</x-user>
