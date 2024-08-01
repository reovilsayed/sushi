<x-layout>
    <form action="{{ route('update.restaurant',$restaurant) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="dash_head">Edit Restaurant</h6>
                            <div class="row row-cols-1  ">
                                <x-form.input name="name" wire:model="name" label="Title *" autofocus required value="{{$restaurant->name}}" />
                            </div>
                            <div class="row row-cols">
                                <x-form.input name="description" label="Description *" value="{{$restaurant->description}}"
                                    style="height: 186px" type="textarea" id="test" autofocus  />
                            </div>
                            <div class="row row-cols-1">
                                <x-form.input name="image" wire:model="image" value="{{$restaurant->image}}" type="file"
                                    label="Drag image to upload" style="padding:50px;" />
                            </div>
                            <button class="btn btn-success" type="submit" style="float: right">
                                <i class="fa fa-save"></i> Save
                            </button>

                            <div class="row row-cols-1 tox-editor-container" wire:ignore>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
    </form>


</x-layout>
