{{-- @dd($categories) --}}
<x-layout>
    <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">Product Details</h6>

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
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                
                            </select>


                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h6 class="dash_head">Product made</h6>


                            <div class="row row-cols">
                                <x-form.input name="composition" label="Composition *" value=""
                                    style="height: 130px" type="textarea" id="test" autofocus />
                            </div>
                            <div class="row row-cols-1">
                                <x-form.input name="allergenes" wire:model="allergenes" label="Allergenes *"
                                    value="" autofocus />
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
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row row-cols-2">

                                <x-form.input id="quantity" name="quantity" wire:model="quantity" label="Quantity"
                                    value="" />
                                <x-form.input id="price" name="price" wire:model="price" label="Price *"
                                    value="" required />
                                <x-form.input name="status" wire:model="status" value="" type="select"
                                    label="Status" :options="[0 => 'False', 1 => 'True']" />
                                <x-form.input name="featured" wire:model="featured" value="" type="select"
                                    label="Featured" :options="[0 => 'False', 1 => 'True']" />

                            </div>
                            <button class="btn btn-success" type="submit" style="float: right">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                </div>




            </div>
    </form>

</x-layout>
