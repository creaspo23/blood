<style>
    .lorem{
        margin-right: -70px !important;
    }
</style>
<div class="dropdown d-inline-block">
    <a type="button" class="btn btn-outline-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="uil-ellipsis-v d-none d-xl-inline-block font-size-1"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end lorem">
        <a class="dropdown-item" href="#" data-bs-toggle="modal"class="align-middle"
            data-bs-target="#myModal-block-DCT-{{ $investigation->id }}">
            {{ __('فحص ال investigation ') }} </a>

        <a class="dropdown-item" href="{{ route('investigationsInvoice', $investigation->id) }}"> <span
                class="align-middle">
                طباعه </span>
        </a>
        <a class="dropdown-item" href="#" data-bs-toggle="modal"class="align-middle"
            data-bs-target="#myModal-block-status-{{ $investigation->id }}">
            {{ __('تغير الحالة') }} </a>
        </a>
    </div>
</div>
<div id="myModal-block-DCT-{{ $investigation->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">{{ __('فحص ال investigation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate
                    action="{{ route('investigations.update', $investigation->id) }}" method="post">
                    <div class="row">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $investigation->id }}">
                        <div class="col-md-12">
                            <div class="mb-3">

                                @foreach ($investigation->tests as $item)
                                    <label for="result"
                                        style="margin-bottom: 10px; margin-top: 10px;">{{ $item->test }}Test</label>
                                    <select name="results[{{ $item->test }}]" class="form-control">
                                        <option value="postive">postive</option>
                                        <option value="negative">negative</option>
                                    </select>
                                @endforeach

                            </div>
                            <!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('save') }}</button>

                </form>
            </div>

        </div>
    </div>
</div>


<div id="myModal-block-status-{{ $investigation->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">{{ __('تغير الحاله') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate
                    action="{{ route('investigationsStatus', $investigation->id) }}" method="post">
                    <div class="row">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $investigation->id }}">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="sat">{{ __('تغير الحالة') }}</label>
                                <select name="status" class="form-control">
                                    <option value="الانتظار">الانتظار</option>
                                    <option value="مكتمل">مكتمل</option>
                                    <option value="ملغي">ملغي</option>
                                </select>
                            </div>

                            <!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('save') }}</button>

                </form>
            </div>

        </div>
    </div>
</div>
