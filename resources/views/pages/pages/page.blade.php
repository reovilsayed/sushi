@php
    $permissionActive = App\Models\Permission::where('key', 'pages')->where('status', 'Active')->first();
@endphp

@if ($permissionActive)
    <div style="width: 100%; height: 100vh; overflow: hidden;">
        <video src="{{ asset('images/dubai.mp4') }}" autoplay loop muted
            style="width: 100%; height: 100%; object-fit: cover;"></video>
    </div>
@else
    <x-user>
        <br> <br> <br>
        <!-- Contact Section -->
        <section id="contact" class="contact section " style="background: transparent; ">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $data->title }}</h2>

            </div><!-- End Section Title -->



            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="card" style="background: transparent; border-color: var(--accent-color)">
                    <div class="card-body p-5" style="color: #fff">
                        {!! $data->body !!}
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->
    </x-user>
@endif
