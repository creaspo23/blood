<div class="dropdown d-inline-block">
    <a type="button" class="btn btn-outline-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="uil-ellipsis-v d-none d-xl-inline-block font-size-1"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->

        {{-- @if (auth()->user()->employee->unit == 'معمل التجانس') --}}
        @if ($order->status == 'ملغي' || $order->status == 'مرفوض' || $order->bloodTest)
            <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span class="align-middle">
                    فحص الزمره </span></a>
        @else
            <a class="dropdown-item" href="{{ url('/tests/' . $test[0] . '/' . $type . '/' . $order->id) }}"> <span
                    class="align-middle"> فحص الزمره </span></a>
        @endif
        {{-- @endif --}}


        {{-- @if (auth()->user()->employee->unit == 'الاستقبال' || auth()->user()->employee->unit == 'الادارة') --}}
        @if ($order->status == 'ملغي' || $order->status == 'مرفوض' || $order->status == 'مكتمل')
            <a class="dropdown-item" style="cursor: not-allowed;color: grey" href="#">
                <span class="align-middle">إلغاء الطلب</span>
            </a>
        @else
            <a class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('profile-activate-{{ $order->id }}').submit();"
                href="#">
                <span class="align-middle">إلغاء الطلب</span>
            </a>
        @endif
        <a class="dropdown-item" href="{{ route('print-order', $order->id) }}"> <span class="align-middle">
                طباعه </span>
        </a>
        {{-- @endif --}}
        <form id="profile-activate-{{ $order->id }}" action="{{ route('updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('put')
        </form>

        @if ($order->donation != null &&
            $order->donation->doctorTest &&
            $order->donation->bloodTest &&
            $order->donation->viralTest &&
            $order->bloodTest)
            <a class="dropdown-item" href="{{ route('exchanges', $order->id) }}"> <span class="align-middle"> صرف الدم
                </span></a>
        @elseif($order->status == 'مكتمل')
            <a class="dropdown-item" style="cursor: not-allowed;color: grey" href="#"> <span class="align-middle">
                    صرف الدم
                </span></a>
        @endif

    </div>
</div>
