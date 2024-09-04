@php
    $api_key = json_decode($restaurant->api_key, true);

@endphp

<x-layout>
    <form action="{{ route('update.restaurant', $restaurant) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">{{ __('sentence.addrestaurant') }}</h6>
                            <div class="row row-cols-1  ">
                                <x-form.input name="name" wire:model="name" label="Title *"
                                    value="{{ $restaurant->name }}" autofocus required />
                            </div>

                            <div class="row row-cols-1  ">
                                <x-form.input name="email" label="Email" label="Email *"
                                    value="{{ $restaurant->email }}" autofocus required />
                            </div>
                            <div class="row row-cols-1  ">
                                <x-form.input name="address[address]" wire:model="address"
                                    value="{{ $restaurant->address['address'] }}" label="Restaurant Address *" autofocus
                                    required />
                            </div>
                            <div class="row row-cols-2  ">
                                <x-form.input name="address[city]" wire:model="city" label="Restaurant City*"
                                    value="{{ $restaurant->address['city'] }}" autofocus required />
                                <x-form.input name="address[post_code]" wire:model="post_code"
                                    label="Restaurant Post Code*" value="{{ $restaurant->address['post_code'] }}"
                                    autofocus required />
                            </div>
                            <div class="row row-cols-2  ">

                                <x-form.input name="number" wire:model="number" value="{{ $restaurant->number }}"
                                    label="Restaurant Number*" autofocus required />
                            </div>
                            <div class="row row-cols">
                                <x-form.input name="description" label="Description *" value=""
                                    style="height: 186px" type="textarea" id="test" autofocus
                                    value="{{ $restaurant->description }}" />
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
                                {{-- <x-form.input id="longitude" name="address[longitude]" value="{{$restaurant->address['longitude']}}" wire:model="longitude"
                                    label="Longitude" required />
                                <x-form.input id="latitude" name="address[latitude]" value="{{$restaurant->address['latitude']}}" wire:model="latitude"
                                    label="Latitude"  required /> --}}
                                <x-form.input id="merchantId" name="merchantId" label="Merchant Id"
                                    value="{{ $api_key['merchantId'] }}" required />
                                <x-form.input id="secretKey" name="secretKey" label="Secret Key"
                                    value="{{ $api_key['secretKey'] }}" required />
                            </div>
                            <x-form.input id="key_version" name="key_version" label="Key Version"
                                value="{{ $restaurant->key_version }}" required />
                            {{-- <button class="btn btn-success" type="submit" style="float: right">
                                <i class="fa fa-save"></i> {{ __('sentence.save') }}
                            </button> --}}
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row row-cols-1">
                                <x-form.input id="sid" name="sid" label="SID"
                                    value="{{ $restaurant->sid }}" required />
                                <x-form.input id="token" name="token" label="TOKEN"
                                    value="{{ $restaurant->token }}" required />

                                <x-form.input id="printer_id" name="printer_id" label="Printer Uid "
                                    value="{{ $restaurant->printer_id }}" required />
                                <x-form.input id="serial_number" name="serial_number" label="Serial number of printer"
                                    value="{{ $restaurant->serial_number }}" required />
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
