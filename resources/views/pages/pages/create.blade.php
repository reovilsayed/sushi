<x-layout>
    @push('styles')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    @endpush

    <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">

            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body ">
                        <h6 class="dash_head">{{ __('sentence.addpage') }}</h6>
                        <div class="row row-cols-1">
                            <x-form.input name="title" wire:model="name" label="Title" autofocus />
                            <x-form.input name="title_ae" wire:model="name_ae" label="Title Arabic*" autofocus required />
                        </div>
                        <div class="row row-cols px-2">
                            <label class="mb-3" for=""> {{ __('sentence.body') }}</label>
                            <textarea name="body" id="summernote" cols="30" rows="10"></textarea>
                           
                            <label class="mb-3 mt-3" for=""> {{ __('sentence.body_arabic') }}</label>
                            <textarea name="body_ae" id="summernote007" cols="30" rows="10"></textarea>
                        </div>
                        <button class="btn btn-success mt-3" type="submit" style="float: right">
                            <i class="fa fa-save"></i> {{ __('sentence.save') }}
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 150, // Set the height of the editor
                    placeholder: 'Write your content here...'
                });
            });
            
            $(document).ready(function() {
                $('#summernote007').summernote({
                    height: 150, // Set the height of the editor
                    placeholder: 'Write your content here...'
                });
            });
        </script>
    @endpush
</x-layout>
