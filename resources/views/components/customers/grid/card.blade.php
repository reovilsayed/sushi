<div class="card">
    <div class="card-header {{ $customer->orders_sum_due > 0 ? 'bg-danger text-light' : 'card-header-color' }}">

        <div class="d-flex justify-content-between">
            <a class=""
                href="{{ route('orders.index', ['search[column]' => 'customer.name', 'search[query]' => $customer->name]) }}">

                <h5>
                    {{ $customer->name }}
                </h5>
            </a>

        </div>

        <a href="tel:{{ $customer->phone }}">
            {{ $customer->phone }}
        </a>


    </div>
    <div class="card-body">
        @if ($customer->email)
            <a href="mailto:{{ $customer->email }}"><strong>Email:</strong> {{ $customer->email }}</a>
        @endif
        <p class="mb-2"><strong>Gender : </strong>{{ $customer->gender }}</p>
        <p class="mb-2"><strong>Address : </strong>{{ $customer->address }}</p>
    </div>
    <div class="card-footer bg-white d-flex justify-content-between align-items-center">

        <div>
            <a class="btn btn-sm btn-primary me-2" href="{{ route('customers.edit', $customer) }}"><i
                    class="fa fa-edit"></i></a>
            <a class="btn btn-sm btn-primary me-2" href="{{ route('customers.show', $customer) }}"><i
                    class="fa fa-eye"></i></a>
            <x-actions.delete :action="route('customers.destroy', $customer)" />
        </div>
        <div>

            <strong class=" {{ $customer->orders_sum_due > 0 ? 'text-danger' : 'text-primary' }}">
                Due : <span>{{ Settings::price($customer->orders_sum_due/100) }}</span> </strong>
        </div>

    </div>
</div>
