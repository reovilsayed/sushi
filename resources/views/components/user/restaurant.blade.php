<section id="chefs" class="chefs section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Restaurants</h2>
        <p>Discover amazing restaurants with exceptional cuisine and a delightful atmosphere.</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach ($restaurants as $restaurant)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <a href="{{route('restaurant.menu',$restaurant->slug)}}">
                    <div class="member">
                        <img src="{{ asset('niko/image/restaurant.jpg') }} " class="img-fluid" alt="">
                        <div class="member-info">

                            <div class="member-info-content">
                                <h4>{{$restaurant->name}}</h4>
                                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi tenetur inventore
                                    dignissimos velit incidunt sint magnam aspernatur a culpa aperiam!</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- End Team Member -->
            @endforeach

            


        </div>

    </div>

</section>
