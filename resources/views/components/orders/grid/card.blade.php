

<div class="card my-3 me-2 custom-fade-in h-100">
    <div class="card-header" style="background-color: #205E61; color: #fff">
        <div class="row position-relative">
            <div class="col-md-8 col-10">
                <h5 class="card-title" style="font-size: 1rem">
                    {{ $order->getShipping('f_name') }} {{ $order->getShipping('l_name') }}
                    <br>
                    {{ $order->restaurent->name ?? ''}}
                </h5>
                <span class="text-white">{{ $restaurant->name ?? '' }}</span>
            </div>
            <div class="col-md-4 col-4 text-right ps-0">
                <span
                    class="badge badge-pill pe-1 {{ $order->status == 'PAID' || $order->status == 'Paid' ? 'bg-success' : 'bg-danger' }}">
                    {{ $order->status }}
                </span>
                {{-- <span class="badge badge-pill pe-1 {{ $order->order_from == 'pos' ? 'bg-success' : 'bg-danger' }}"
                    title="{{ $order->order_from == 'pos' ? 'pos' : 'apps' }}">
                    <i
                        class="{{ $order->order_from == 'pos' ? 'fa-solid fa-cash-register' : 'fa-solid fa-mobile-retro' }} "></i>
                </span> --}}
                <span class="badge badge-pill pe-1 {{ $order->delivered == '1' ? 'bg-success' : 'bg-danger' }}"
                    title="{{ $order->delivered == '1' ? 'delivered' : 'not delivered' }}">
                    <i class="fas fa-car"></i>
                    @if ($order->delivered == 1)
                        <i class="fas fa-check"></i>
                    @else
                        <i class="fas fa-ban"></i>
                    @endif
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-7 col-7">
                <p class="card-text">
                    <strong>{{ __('sentence.total') }}:</strong> {{ Settings::price($order->total) }} <br>
                    <strong>{{ __('sentence.paid') }}:</strong> {{ Settings::price($order->paid) }} <br>
                    @if ($order->discount > 0)
                        <strong>{{ __('sentence.discount') }}:</strong> {{ Settings::price($order->discount ?? 0) }} <br>
                    @endif
                    @if ($order->due > 0)
                        <strong class="text-danger">{{ __('sentence.due') }}:</strong> {{ Settings::price($order->due ?? 0) }}<br>
                    @endif
                    <strong class="text-success fw-bold">{{ __('sentence.order_id') }}: # {{ $order->id }}</strong>
                </p>
            </div>
            <div class="col-md-5 col-5">


                <p class="card-text">
                    <strong>{{ __('sentence.delivery_time') }}:</strong><br>
                    {{ $order->time_option ?? 'unknown' }}
                </p>
                <p class="card-text">
                    <strong>{{ __('sentence.date_&_time') }} :</strong><br>
                    {{ $order->created_at->format('d M, Y h:i A') }}
                </p>
            </div>
            <div class="col-md-12 text-ceter mt-2">
                <div class="btn-group gap-2" role="group">
                    <a class="btn btn-primary btn-sm" title="Invoice" href="{{ route('orders.invoice', $order) }}"><i
                            class="fa fa-eye"></i></a>
                    @if ($order->delivered == 0)
                        <a class="btn btn-primary btn-sm" title="Mark as delivered"
                            href="{{ route('orders.mark.delivered', $order) }}"><i class="fa fa-car"></i><i
                                class="fas fa-check"></i></a>
                    @endif
                    @if ($order->payment_status != 'PAID')
                        <form action="{{ route('mark.pay') }}" method="post" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to mark this order as paid?')">
                            @csrf
                            <input type="hidden" name="orders[]" value="{{ $order->id }}">
                            <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-check"></i> {{ __('sentence.mark_as_paid') }}</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
