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
                    <h3>Create Category</h3>
                    <div class="item-content">
                        <div class="mb-3">
                            <label for="inputName1" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="inputName1" placeholder="Categorie Name"
                                data-name="name" name="name">
                        </div>
                    </div>
                    <div class="item-content mb-3">
                        <label class="control-label">Categories</label>
                        <select class="form-control select2" name="parent_id">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <!-- Repeater Remove Btn -->
                    <div class="repeater-remove-btn">
                        <button type="submit" class="btn btn-success" style="height: auto;">Submit</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancle</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
