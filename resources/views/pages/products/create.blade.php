{{-- @dd($categories) --}}
<x-layout>
    @push('script')
        <script>
            const addRow = () => {
                const index = $('#priscription-products').children().length
                const row = `<tr  class="table-row">
                            <td>
                                <x-form.input name="option[${index}][name]" label="Option Name" value=""  required/>
                            </td>
                            <td>
                                <x-form.input name="option[${index}][price]" label="Option price" value=""  required/>
                            </td>
                            

                            <td class="text-center">
                                <button type="button"
                                    class="btn btn-danger btn-sm h-auto remove-row" onclick="removeRow(this)"> <i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>`;
                $('#priscription-products').append(row)
                const baseUrl = "{{ env('VITE_API_URI', 'https://pos.sohojware.com') }}";
                const addHeaders = function(xhr) {
                    xhr.setRequestHeader('x-secret-key', "{{ env('PASSWORD') }}");
                };
                $('.products-ajax').select2({
                    ajax: {
                        url: `${baseUrl}/api/products`,

                        processResults: function(data) {
                            // Transforms the top-level key of the response object from 'items' to 'results'
                            return {
                                results: data
                            }
                        },
                        beforeSend: addHeaders
                    }
                });
            }

            const removeRow = (el) => {
                el.closest('tr').remove();
            }
        </script>
    @endpush
    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">{{ __('sentence.productdetails') }}</h6>

                            <div class="row row-cols-1">
                                <x-form.input name="name" wire:model="name" label="Name *" value="" autofocus
                                    required />
                            </div>
                            <div class="row row-cols-1">

                            </div>

                            <div class="row row-cols">
                                <x-form.input name="description" label="Description *" value=""
                                    style="height: 130px" type="textarea" id="test" autofocus />
                            </div>

                            <select class="form-select " aria-label="Default select example" name="category">
                                <option selected>{{ __('sentence.select') }} {{ __('sentence.category') }} </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>


                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h6 class="dash_head">{{ __('sentence.productmade') }} </h6>


                            <div class="row row-cols">
                                <x-form.input name="composition" label="Composition *" value=""
                                    style="height: 130px" type="textarea" id="test" autofocus required/>
                            </div>
                            <div class="row row-cols-1">
                                <x-form.input name="allergenes" wire:model="allergenes" label="Allergenes *"
                                    value="" autofocus required />
                            </div>


                        </div>
                    </div>



                </div>

                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row row-cols-1">
                                <x-form.input name="image" wire:model="image" value="" type="file"
                                    label="Drag image to upload" style="padding:50px;" />
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4 mb-2">
                        <div class="card-body">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            {{__('sentence.optionname')}}
                                        </th>

                                        <th class="text-center w-auto">
                                            {{__('sentence.price')}}
                                        </th>

                                        <th class="text-center ">
                                            {{__('sentence.action')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="priscription-products">


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="10" class="text-end">
                                            <button onclick="addRow()" type="button"
                                                class="btn btn-primary btn-sm h-auto add-row"> <i
                                                    class="fa fa-plus"></i></button>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row row-cols-1">

                                {{-- <x-form.input id="quantity" name="quantity" wire:model="quantity" label="Quantity"
                                    value="" /> --}}
                                <x-form.input id="price" name="price" wire:model="price" label="Price *"
                                    value="" required />

                            </div>
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
