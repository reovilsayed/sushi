<x-layout>

    <form action="{{ route('slider.update', $slider) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">Slider Image</h6>

                            <div class="row row-cols-2">
                                <x-form.input name="heading" label="{{ __('sentence.slider_heading') }} *" value="{{ $slider->heading }}" />
                                <x-form.input name="heading_end" label="{{ __('sentence.slider_end_heading') }}*"
                                    value="{{ $slider->heading_end }}" />
                                <x-form.input name="heading_ae" label="{{ __('sentence.slider_heading_arabic') }} *"
                                    value="{{ $slider->heading_ae }}" required />
                                <x-form.input name="heading_end_ae" label="{{ __('sentence.slider_heading_end_aradic') }} *"
                                    value="{{ $slider->heading_end_ae }}" />

                                <x-form.input name="title" label="{{ __('sentence.slider_title') }}" value="{{ $slider->title }}" />
                                <x-form.input name="title_ae" label="{{ __('sentence.slider_title_arabic') }} *" value="{{ $slider->title_ae }}" required />
                            </div>
                            
                            <div class="row row-cols-1">
                                <x-form.input name="image" value="{{ $slider->image }}" type="file"
                                    label="{{ __('sentence.slider_image_uplode') }}" style="padding:50px;" />
                            </div>
                            <img class="mb-3" height="300" width="300" src="{{ Storage::url($slider->image) }}"
                                alt="">
                            <button class="btn btn-success" type="submit" style="float: right">
                                <i class="fa fa-save"></i> {{ __('sentence.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </form>

</x-layout>
