<x-layout>

    <x-products.createOrEdit :product="$product" :generics="$generics" :categories="$categories" :suppliers="$suppliers"
        :units="$units" />
    {{-- <livewire:product-create-or-edit :product="$product" :edit="false" /> --}}
    @push('script')
        {{-- <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 100,
                placeholder: 'Enter your description',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script> --}}
        <script>
            $(document).ready(function() {
                $('#price').on('input', function() {
                    let price = $(this).val();
                    let trade_price = price * 0.88;
                    $('#trade_price').val(trade_price.toFixed(2));
                });
            });
        </script>
    @endpush
</x-layout>
