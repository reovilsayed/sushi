<x-layout>

    <form action="{{ route('permissions.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">{{ __('sentence.permissions') }}</h6>

                            <div class="row">
                                <div class="col-md-8">
                                    <x-form.input name="key" label="{{ __('sentence.key') }} *" value=""
                                        required autofocus />
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">{{ __('sentence.permission') }} *</label>
                                    <select class="form-select " aria-label="Default select example" required
                                        name="permission">
                                        <option selected>{{ __('sentence.select') }}
                                            {{ __('sentence.permission_select') }}
                                        </option>
                                        <option value="Active"> {{ __('sentence.active') }}</option>
                                        <option value="Inactive">{{ __('sentence.inactive') }}</option>
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit" style="float: left">
                                <i class="fa fa-save"></i> {{ __('sentence.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </form>

</x-layout>
