<x-layout>
    <form action="{{ route('store.restaurant') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">{{__('sentence.addrestaurant')}}</h6>
                            <div class="row row-cols-1  ">
                                <x-form.input name="name" wire:model="name" label="Title *" autofocus required />
                            </div>

                            <div class="row row-cols-1  ">
                                <x-form.input name="email" label="Email" label="Email *" autofocus required />
                            </div>
                            <div class="row row-cols-1  ">
                                <x-form.input name="address[address]" wire:model="address" label="Restaurant Address *"
                                    autofocus required />
                            </div>
                            <div class="row row-cols-2  ">
                                <x-form.input name="address[city]" wire:model="city" label="Restaurant City*" autofocus
                                    required />
                                <x-form.input name="address[post_code]" wire:model="post_code"
                                    label="Restaurant Post Code*" autofocus required />
                            </div>
                            <div class="row row-cols-2  ">
                                <x-form.input name="address[zip_code]" wire:model="zip" label="Restaurant Zip Code*"
                                    autofocus required />
                                <x-form.input name="number" wire:model="number" label="Restaurant Number*" autofocus
                                    required />
                            </div>
                            <div class="row row-cols">
                                <x-form.input name="description" label="Description *" value=""
                                    style="height: 186px" type="textarea" id="test" autofocus />
                            </div>
                            <div class="row row-cols-1">
                                <x-form.input name="image" wire:model="image" value="" type="file"
                                    label="Drag image to upload" style="padding:50px;" />
                            </div>

                            <div class="row row-cols-1 tox-editor-container" wire:ignore>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row row-cols-2">

                                <x-form.input id="longitude" name="address[longitude]" wire:model="longitude"
                                    label="Longitude" value="" required />
                                <x-form.input id="latitude" name="address[latitude]" wire:model="latitude"
                                    label="Latitude" value="" required />
                            </div>
                            <button class="btn btn-success" type="submit" style="float: right">
                                <i class="fa fa-save"></i> {{__('sentence.save')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
