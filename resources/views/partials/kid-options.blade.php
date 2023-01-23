<div class="dropdown d-inline-block">
    <a type="button" class="btn btn-outline-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="uil-ellipsis-v d-none d-xl-inline-block font-size-1"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        {{-- @if ($kid->status == 'ملغي' || $kid->status == 'مرفوض' || $kid->bloodTest) --}}
        {{-- @if (auth()->user()->employee->unit == 'معمل التجانس') --}}

        {{-- <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span class="align-middle">
                    فحص الدم </span></a> --}}
        {{-- @else --}}
        <a class="dropdown-item" href="{{ url('/tests/' . $test[0] . '/' . $type[0] . '/' . $kid->id) }}"> <span
                class="align-middle"> فحص الدم للطفل</span></a>
        {{-- @endif --}}

        {{-- @if ($kid->status == 'ملغي' || $kid->status == 'مرفوض' || $kid->bloodTest) --}}
        {{-- @if (auth()->user()->employee->unit == 'معمل التجانس') --}}

        {{-- <a class="dropdown-item" href="#" style="cursor: not-allowed;color: grey"> <span class="align-middle">
                فحص الدم </span></a> --}}
        {{-- @else --}}
        <a class="dropdown-item" href="{{ url('/tests/' . $test[0] . '/' . $type[1] . '/' . $kid->mother_id) }}"> <span
            class="align-middle"> فحص الدم للأم</span></a>

        {{-- @endif --}}     <a class="dropdown-item" 
         href="#" data-bs-toggle="modal"class="align-middle"
            data-bs-target="#myModal-block-branch-{{ $kid->id }}">
            {{ __('فحص ال ICT ') }} </a>

            <a class="dropdown-item" 
            href="#" data-bs-toggle="modal"class="align-middle"
               data-bs-target="#myModal-block-DCT-{{ $kid->id }}">
               {{ __('فحص ال DCT ') }} </a>
    </div>
</div>


<div id="myModal-block-branch-{{ $kid->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">{{ __('ICTTest') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="{{ route('ict') }}" method="POST">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="kid_id" value="{{ $kid->id }}">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="result">{{ __('ICT-Test') }}</label>
                                <select name="result" class="form-control">
                                    <option value="نعم">نعم</option>
                                    <option value="لا">لا</option>
                                </select>
                                

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('save') }}</button>

                </form>
            </div>

        </div>
    </div>
</div>



<div id="myModal-block-DCT-{{ $kid->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">{{ __('DCTTest') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="{{ route('dct') }}" method="POST">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="kid_id" value="{{ $kid->id }}">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="result">{{ __('DCT-Test') }}</label>
                                <select name="result" class="form-control">
                                    <option value="نعم">نعم</option>
                                    <option value="لا">لا</option>
                                </select>
                                

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('save') }}</button>

                </form>
            </div>

        </div>
    </div>
</div>