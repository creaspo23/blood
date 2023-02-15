<div class="dropdown d-inline-block">
    <a type="button" class="btn btn-outline-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="uil-ellipsis-v d-none d-xl-inline-block font-size-1"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        {{-- //Todo revers fresh blood   --}}
        @if ($donation->order->fresh == 0)
            {{-- {{dd($donation->order->fresh)}} --}}

            @if ($donation->status == 'ملغي' || $donation->status == 'مرفوض' || $donation->bloodTest)
                {{-- @if (auth()->user()->employee->unit == 'معمل التجانس') --}}

                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        فحص الدم </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/tests/' . $test[0] . '/' . $type . '/' . $donation->id) }}">
                    <span class="align-middle"> فحص الدم </span></a>
            @endif
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->doctorTest ||
                    $donation->bloodTest == null)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        فحص الطبيب </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/tests/' . $test[1] . '/' . $type . '/' . $donation->id) }}">
                    <span class="align-middle"> فحص الطبيب </span></a>
            @endif
            {{-- @if (auth()->user()->employee->unit == 'معمل السحب') --}}
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->bloodWithdraw ||
                    $donation->doctorTest == null)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        سحب الدم </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/withdraw' . '/' . $type . '/' . $donation->id) }}"> <span
                        class="align-middle"> سحب الدم </span></a>
            @endif
            {{-- @endif --}}
            {{-- @if (auth()->user()->employee->unit == 'الوحده الطبية') --}}


            {{-- @endif --}}


            {{-- @endif --}}
            {{-- @if (auth()->user()->employee->unit == 'معمل الفحص') --}}
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->viralTest ||
                    $donation->bloodWithdraw == null)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        فحص الفيروسي </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/tests/' . $test[2] . '/' . $type . '/' . $donation->id) }}">
                    <span class="align-middle"> فحص الفيروسي </span></a>
            @endif
            {{-- @endif --}}
            {{-- @if (auth()->user()->employee->unit == 'معمل المشتقات') --}}
            @php
                $x = \App\Models\Derivative::where('blood_withdraw_id', $donation->bloodWithdraw->id ?? null)->pluck('blood_withdraw_id');
            @endphp
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->viralTest == null ||
                    $donation->bloodWithdraw == null ||
                    $x->contains($donation->bloodWithdraw->id))
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        المشتقات </span></a>
                {{-- @endif --}}
            @else
                <a class="dropdown-item" href="{{ url('/derivatives' . '/' . $donation->id) }}"> <span
                        class="align-middle">
                        المشتقات </span></a>
            @endif

            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->bloodWithdraw == null ||
                    $donation->viralTest == null ||
                    $x->contains($donation->bloodWithdraw->id) == null ||
                    $donation->homogeneites)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        التجانس </span></a>
                {{-- @endif --}}
            @else
                <a class="dropdown-item" href="{{ url('/homogeneity' . '/' . $donation->id) }}"> <span
                        class="align-middle">
                        التجانس </span></a>
            @endif



            {{-- Todo Make edit order ui --}}
            {{-- <a class="dropdown-item" href="{{route("orders.update")}}"> <span class="align-middle">تعديل الطلب </span></a> --}}
            {{-- @if (auth()->user()->employee->unit == 'الاستقبال' || auth()->user()->employee->unit == 'الادارة') --}}
            @if ($donation->status == 'ملغي' || $donation->status == 'مرفوض')
                <a class="dropdown-item" style="cursor: not-allowed;color: grey" href="#">
                    <span class="align-middle">إلغاء التبرع</span>
                </a>
            @else
                <a class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('profile-activate-{{ $donation->id }}').submit();"
                    href="#">
                    <span class="align-middle">إلغاء التبرع</span>
                </a>
            @endif

        @endif

        <form id="profile-activate-{{ $donation->id }}" action="{{ route('cancelDonation', $donation->id) }}"
            method="POST">
            @csrf
            @method('put')
        </form>


        {{-- @endif --}}
        @if ($donation->order->fresh == 1)

            <!-- item-->
            {{-- //Todo revers fresh blood   --}}
            @if ($donation->status == 'ملغي' || $donation->status == 'مرفوض' || $donation->bloodTest)
                {{-- @if (auth()->user()->employee->unit == 'معمل التجانس') --}}

                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        فحص الدم </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/tests/' . $test[0] . '/' . $type . '/' . $donation->id) }}">
                    <span class="align-middle"> فحص الدم </span></a>
            @endif
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->doctorTest ||
                    $donation->bloodTest == null)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        فحص الطبيب </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/tests/' . $test[1] . '/' . $type . '/' . $donation->id) }}">
                    <span class="align-middle"> فحص الطبيب </span></a>
            @endif
            {{-- @if (auth()->user()->employee->unit == 'معمل السحب') --}}
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->viralTest ||
                    $donation->bloodWithdraw ||
                    $donation->doctorTest == null)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        فحص الفيروسي </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/tests/' . $test[2] . '/' . $type . '/' . $donation->id) }}">
                    <span class="align-middle"> فحص الفيروسي </span></a>
            @endif
            {{-- @endif --}}
            {{-- @if (auth()->user()->employee->unit == 'الوحده الطبية') --}}


            {{-- @endif --}}


            {{-- @endif --}}
            {{-- @if (auth()->user()->employee->unit == 'معمل الفحص') --}}
            {{-- @endif --}}
            @if (
                $donation->status == 'ملغي' ||
                    $donation->status == 'مرفوض' ||
                    $donation->bloodWithdraw ||
                    $donation->doctorTest == null ||
                    $donation->viralTest == null)
                <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span
                        class="align-middle">
                        سحب الدم </span></a>
            @else
                <a class="dropdown-item" href="{{ url('/withdraw' . '/' . $type . '/' . $donation->id) }}"> <span
                        class="align-middle"> سحب الدم </span></a>
            @endif



            {{-- Todo Make edit order ui --}}
            {{-- <a class="dropdown-item" href="{{route("orders.update")}}"> <span class="align-middle">تعديل الطلب </span></a> --}}
            {{-- @if (auth()->user()->employee->unit == 'الاستقبال' || auth()->user()->employee->unit == 'الادارة') --}}
            @if ($donation->status == 'ملغي' || $donation->status == 'مرفوض')
                <a class="dropdown-item" style="cursor: not-allowed;color: grey" href="#">
                    <span class="align-middle">إلغاء التبرع</span>
                </a>
            @else
                <a class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('profile-activate-{{ $donation->id }}').submit();"
                    href="#">
                    <span class="align-middle">إلغاء التبرع</span>
                </a>
            @endif

        @endif

        <form id="profile-activate-{{ $donation->id }}" action="{{ route('cancelDonation', $donation->id) }}"
            method="POST">
            @csrf
            @method('put')
        </form>

        {{-- @endif --}}


    </div>
</div>
