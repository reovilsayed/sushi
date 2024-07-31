<x-user>
    <br><br><br>    
    <x-user.about />
    <section id="menu" class="menu section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div><!-- End Section Title -->

        <div class="container isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-container">
                        <hr>
                        <div class="category">
                            <button class="category-button">Category 1</button>
                            <div class="subcategory-container">
                                <hr>
                                <div class="subcategory">
                                    <a href="#this" class="subcategory-button">Subcategory 1.1</a>
                                </div>
                                <hr>
                                <div class="subcategory">
                                    <button class="subcategory-button">Subcategory 1.2</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="menu-header" data-aos="fade-up" data-aos-delay="200">
                            <a id="this"  href="" class="text-colour h4">Sub category here</a>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="isotope-container" data-aos="fade-up" data-aos-delay="200">
                                <div class="col-lg-12 menu-item isotope-item ">
                                    <img src="{{ asset('niko/assets/img/menu/lobster-bisque.jpg') }}" class="menu-img"
                                        alt="">
                                    <div class="menu-content">
                                        <a href="#">Lobster Bisque</a><span>$5.95</span>
                                    </div>
                                    <div class="menu-ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </div>
                                </div><!-- Menu Item -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </section>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categoryButtons = document.querySelectorAll('.category-button');
                const subcategoryButtons = document.querySelectorAll('.subcategory-button');

                categoryButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const subcategoryContainer = this.nextElementSibling;
                        if (subcategoryContainer.style.display === 'block') {
                            subcategoryContainer.style.display = 'none';
                        } else {
                            subcategoryContainer.style.display = 'block';
                        }
                    });
                });

            });
        </script>
    @endpush
</x-user>
