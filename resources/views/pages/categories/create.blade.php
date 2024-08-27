<x-layout>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <h3>{{__('sentence.category')}} </h3>
                    <div class="item-content">
                        <div class="mb-3">
                            <label for="inputName1" class="form-label">{{ __('sentence.categoryname') }}</label>
                            <input type="text" class="form-control" id="inputName1" placeholder="Category Name"
                                data-name="name" name="name" autofocus>
                        </div>
                    </div>
                    <div class="item-content mb-3">
                        <label class="control-label">{{ __('sentence.subcategory') }}</label>
                        <select class="form-control select2" name="parent_id">
                            <option value="">{{ __('sentence.select') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="item-content mb-3">
                        <label class="control-label">Category Description </label>
                        <x-form.input name="description"  value=""
                                    style="height: 130px" type="textarea" id="test"  />
                    </div>
                    <!-- Repeater Remove Btn -->
                    <div class="repeater-remove-btn">
                        <button type="submit" class="btn btn-success" style="height: auto;">{{ __('sentence.submit') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger">{{ __('sentence.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
