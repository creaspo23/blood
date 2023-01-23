<div class="dropdown d-inline-block">
    <a type="button" class="btn btn-outline-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="uil-ellipsis-v d-none d-xl-inline-block font-size-1"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        @if ($polcythemia->status == 'ملغي' || $polcythemia->status == 'مرفوض' || $polcythemia->bloodTest)
            {{-- @if (auth()->user()->employee->unit == 'معمل التجانس') --}}

            <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span class="align-middle">
                    فحص الدم </span></a>
        @else
            <a class="dropdown-item"
                href="{{ url('/tests/' . $test[0] . '/' . $type . '/' . $polcythemia->id) }}"> <span
                    class="align-middle"> فحص الدم </span></a>
        @endif
        @if ($polcythemia->status == 'ملغي' ||
            $polcythemia->status == 'مرفوض' ||
            $polcythemia->doctorTest ||
            $polcythemia->bloodTest == null)
            <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span class="align-middle">
                    فحص الطبيب </span></a>
        @else
            <a class="dropdown-item" href="{{ url('/tests/' . $test[1] . '/' . $type . '/' . $polcythemia->id) }}">
                <span class="align-middle"> فحص الطبيب </span></a>
        @endif
        {{-- @if (auth()->user()->employee->unit == 'معمل السحب') --}}
        @if ($polcythemia->status == 'ملغي' ||
            $polcythemia->status == 'مرفوض' ||
            $polcythemia->bloodWithdraw ||
            $polcythemia->doctorTest == null)
            <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span class="align-middle">
                    سحب الدم </span></a>
        @else
            <a class="dropdown-item" href="{{ url('/withdraw' . '/' . $type . '/' . $polcythemia->id) }}"> <span
                    class="align-middle"> سحب الدم </span></a>
        @endif
        {{-- @endif --}}
        {{-- @if (auth()->user()->employee->unit == 'الوحده الطبية') --}}


        {{-- @endif --}}


        {{-- @endif --}}
        {{-- @if (auth()->user()->employee->unit == 'معمل الفحص') --}}

        {{-- Todo Make edit order ui --}}
        {{-- <a class="dropdown-item" href="{{route("orders.update")}}"> <span class="align-middle">تعديل الطلب </span></a> --}}
        <a class="dropdown-item" href="{{ route('printPolcythemias', $polcythemia->id) }}"> <span class="align-middle">
            طباعه </span>
        </a>
        {{-- @if (auth()->user()->employee->unit == 'الاستقبال' || auth()->user()->employee->unit == 'الادارة') --}}
        @if ($polcythemia->status == 'ملغي' || $polcythemia->status == 'مرفوض' || $polcythemia->status == 'مكتمل')
            <a class="dropdown-item" style="cursor: not-allowed;color: grey" href="#">
                <span class="align-middle">إلغاء التبرع</span>
            </a>
        @else
            <a class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('profile-activate-{{ $polcythemia->id }}').submit();"
                href="#">
                <span class="align-middle">إلغاء التبرع</span>
            </a>
        @endif

        {{-- @endif --}}

        <form id="profile-activate-{{ $polcythemia->id }}" action="{{ route('cancelPolcythemias', $polcythemia->id) }}"
            method="POST">
            @csrf
            @method('put')
        </form>




    </div>
</div>
