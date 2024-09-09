@php
    $api_key = json_decode($restaurant->api_key, true);
    $printer = json_decode($restaurant->printer, true);

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
                                <x-form.input name="name" wire:model="name" label="{{ __('sentence.title') }} *"
                                    value="{{ $restaurant->name }}" autofocus required />
                            </div>

                            <div class="row row-cols-1  ">
                                <x-form.input name="email" label="Email" label="{{ __('sentence.email') }} *"
                                    value="{{ $restaurant->email }}" autofocus required />
                            </div>
                            <div class="row row-cols-1  ">
                                <x-form.input name="address[address]" wire:model="address"
                                    value="{{ $restaurant->address['address'] }}" label="{{ __('sentence.restaurant_address') }} *" autofocus
                                    required />
                            </div>
                            <div class="row row-cols-2  ">
                                <x-form.input name="address[city]" wire:model="city" label="{ __('sentence.restaurant_city') }}*"
                                    value="{{ $restaurant->address['city'] }}" autofocus required />
                                <x-form.input name="address[post_code]" wire:model="post_code"
                                    label="{{ __('sentence.restaurant_post_code') }}*" value="{{ $restaurant->address['post_code'] }}"
                                    autofocus required />
                            </div>
                            <div class="row row-cols-2  ">

                                <x-form.input name="number" wire:model="number" value="{{ $restaurant->number }}"
                                    label="{{ __('sentence.restaurant_number') }}*" autofocus required />
                            </div>
                            <div class="row row-cols">
                                <x-form.input name="description" label="{{ __('sentence.description') }} *" value=""
                                    style="height: 186px" type="textarea" id="test" autofocus
                                    value="{{ $restaurant->description }}" />
                            </div>
                            <div class="row row-cols-1">
                                <x-form.input name="image" wire:model="image" value="" type="file"
                                    label="{{ __('sentence.image_upload') }}" style="padding:50px;" />
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
                                <x-form.input id="merchantId" name="merchantId" label="{{ __('sentence.merchant_id') }}"
                                    value="{{ @$api_key['merchantId'] }}" required />
                                <x-form.input id="secretKey" name="secretKey" label="{{ __('sentence.secret_key') }}"
                                    value="{{ @$api_key['secretKey'] }}" required />

                                <x-form.input id="key_version" name="key_version" label="{{ __('sentence.key_version') }}"
                                    value="{{ @$api_key['key_version'] }}" required />

                                <div class="d-flex align-items-end">
                                    <x-form.input type="checkbox" id="enable_payment" name="enable_payment"
                                        label="{{ __('sentence.enable_printer') }}" :checked="$restaurant->enable_payment"  value="{{ $restaurant->enable_payment }}" value="1"
                                         />
                                </div>
                            </div>


                            {{-- <button class="btn btn-success" type="submit" style="float: right">
                                <i class="fa fa-save"></i> {{ __('sentence.save') }}
                            </button> --}}
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row row-cols-2">
                                <x-form.input id="sid" name="sid" label="SID"
                                    value="{{ @$printer['sid'] }}" />
                                <x-form.input id="token" name="token" label="TOKEN"
                                    value="{{ @$printer['token'] }}" />

                                <x-form.input id="printer_id" name="printer_id" label="{{ __('sentence.printer_uid') }}  "
                                    value="{{ @$printer['printer_id'] }}" />
                                <x-form.input id="serial_number" name="serial_number" label="{{ __('sentence.serial_number_of_printer') }}"
                                    value="{{ @$printer['serial_number'] }}" />
                                    
                                <div class="d-flex align-items-end">
                                    <x-form.input type="checkbox" id="enable_printer" name="enable_printer"
                                        label="{{ __('sentence.enable_printer') }} " :checked="$restaurant->enable_printer" value="{{ $restaurant->enable_printer }}"
                                        value="1" :checked="$restaurant->enable_printer" />
                                </div>
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
