<x-layout>


    <div class="dashboard_content ps-0 mt-2">
        <div class="dashboard_content_inner">
                <div class="d-flex justify-content-between mt-1 mb-3">
                    <div style="float"class="mt-2">
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            {{ __('sentence.permission') }}</a>
                    </div>
                </div>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">#</th>
                        <th scope="col">{{ __('sentence.key') }}</th>
                        <th scope="col">{{ __('sentence.status') }}</th>
                        <th scope="col" class="text-center">{{ __('sentence.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $permission)
                       
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>

                            <td>{{ $permission->key }}</td>
                            <td>{{ $permission->status }}</td>

                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="{{ route('permissions.edit', $permission) }}"><i
                                        class="fa fa-edit"></i></a>
                                <x-actions.delete :action="route('permissions.destroy', $permission)" />
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

</x-layout>

