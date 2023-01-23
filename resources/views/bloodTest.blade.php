@extends('layouts.master')
@section('title')
    فحص الذمرة
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            فحص الذمرة
        @endslot
        @slot('title')
            معمل الفحص
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    @if ($type == 'donation')
                        <h4 class="card-title mb-4">بيانات المتبرع</h4>
                    @elseif($type == 'order')
                        <h4 class="card-title mb-4">بيانات المريض</h4>
                    @elseif($type=='kid')
                    <h4 class="card-title mb-4">بيانات المولود</h4>
                    @elseif($type=='mother')
                    <h4 class="card-title mb-4">بيانات الأم</h4>

                    @endif
                    @if($type=="mother")
                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم العينة</div>
                    {{-- {{dd($case)}} --}}
                        <div class="col-lg-9"> {{ $case->id }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الاسم</div>
                        <div class="col-lg-9"> {{ $case->mothrName->name }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الجنس</div>
                        <div class="col-lg-9"> {{ $case->mothrName->gender }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الميلاد</div>
                        <div class="col-lg-9"> {{ $case->mothrName->birth_date }} </div>
                    </div>
                    @else
                    
                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم العينة</div>
                    {{-- {{dd($case)}} --}}
                        <div class="col-lg-9"> {{ $case->id }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الاسم</div>
                        <div class="col-lg-9"> {{ $case->person->name }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الجنس</div>
                        <div class="col-lg-9"> {{ $case->person->gender }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الميلاد</div>
                        <div class="col-lg-9"> {{ $case->person->birth_date }} </div>
                    </div>
           
                    @endif
                    @if ($type == 'order')
                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold"> الوحدة </div>
                            <div class="col-lg-9"> {{ $case->unit }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold"> التشخيص </div>
                            <div class="col-lg-9"> {{ $case->diagnosis }} </div>
                        </div>
                    @endif

                    @if ($type == 'donation')
                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم الهاتف</div>
                            <div class="col-lg-9"> {{ $case->person->phone }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">العنوان</div>
                            <div class="col-lg-9"> {{ $case->person->address }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">المهنة</div>
                            <div class="col-lg-9"> {{ $case->person->job_title }} </div>
                        </div>
                    @endif

                    {{--                    <div class="row mt-2"> --}}
                    {{--                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">اخر تبرع</div> --}}
                    {{--                        <div class="col-lg-9"> محمد علي محمد </div> --}}
                    {{--                    </div> --}}

                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> فحص الدم </h4>

                    <form method="post" action="{{ route('bloodTest.store') }}">
                        {{-- @if ($type == 'kid') --}}
                        <div class="row">
                            <label class="form-label col-lg-3">الفصيلة</label>
                            <div class="col-lg-9">
                                <select class="form-control select2 @error('name') is-invalid @enderror " dir="rtl"
                                    name="blood_group" id="blood_group" style="width: 100%">
                                    <option></option>
                                    <optgroup label="Positives">
                                        <option {{ $case->person->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option {{ $case->person->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option {{ $case->person->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option {{ $case->person->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                    </optgroup>
                                    <optgroup label="Negatives">
                                        <option {{ $case->person->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option {{ $case->person->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option {{ $case->person->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option {{ $case->person->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                    </optgroup>
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($type[1] == 'mother')
                            <div class="row">
                                <label class="form-label col-lg-3">الفصيلة</label>
                                <div class="col-lg-9">
                                    <select class="form-control select2 @error('name') is-invalid @enderror " dir="rtl"
                                        name="blood_group" id="blood_group" style="width: 100%">
                                        <option></option>
                                        <optgroup label="Positives">
                                            <option {{ $case->mothrName->blood_group == 'A+' ? 'selected' : '' }}>A+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'B+' ? 'selected' : '' }}>B+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'AB+' ? 'selected' : '' }}>AB+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'O+' ? 'selected' : '' }}>O+
                                            </option>
                                        </optgroup>
                                        <optgroup label="Negatives">
                                            <option {{ $case->mothrName->blood_group == 'A-' ? 'selected' : '' }}>A-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'B-' ? 'selected' : '' }}>B-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'AB-' ? 'selected' : '' }}>AB-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'O-' ? 'selected' : '' }}>O-
                                            </option>
                                        </optgroup>
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        {{-- @if ($type == 'kid') --}}
                        <div class="row mt-2">
                            <label class="form-label col-lg-3">Genotype</label>
                            <div class="col-lg-9">
                                <select class="form-control select2 @error('genotype') is-invalid @enderror" dir="rtl"
                                    name="genotype" id="genotype" style="width: 100%">
                                    <option></option>
                                    <optgroup label="Positives">
                                        <option {{ $case->person->blood_group == 'C+' ? 'selected' : '' }}>C+</option>
                                        <option {{ $case->person->blood_group == 'c+' ? 'selected' : '' }}>c+</option>
                                        <option {{ $case->person->blood_group == 'E+' ? 'selected' : '' }}>E+</option>
                                        <option {{ $case->person->blood_group == 'e+' ? 'selected' : '' }}>e+</option>
                                        <option {{ $case->person->blood_group == 'kell+' ? 'selected' : '' }}>kell+</option>
                                    </optgroup>
                                    <optgroup label="Negatives">
                                        <option {{ $case->person->blood_group == 'C-' ? 'selected' : '' }}>C-</option>
                                        <option {{ $case->person->blood_group == 'c-' ? 'selected' : '' }}>c-</option>
                                        <option {{ $case->person->blood_group == 'E-' ? 'selected' : '' }}>E-</option>
                                        <option {{ $case->person->blood_group == 'e-' ? 'selected' : '' }}>e-</option>
                                        <option {{ $case->person->blood_group == 'kell-' ? 'selected' : '' }}>kell-</option>
                                    </optgroup>
                                </select>
                                @error('genotype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($type[1] == 'mother')
                            <div class="row mt-2">
                                <label class="form-label col-lg-3">Genotype</label>
                                <div class="col-lg-9">
                                    <select class="form-control select2 @error('genotype') is-invalid @enderror"
                                        dir="rtl" name="genotype" id="genotype" style="width: 100%">
                                        <option></option>
                                        <optgroup label="Positives">
                                            <option {{ $case->mothrName->blood_group == 'C+' ? 'selected' : '' }}>C+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'c+' ? 'selected' : '' }}>c+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'E+' ? 'selected' : '' }}>E+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'e+' ? 'selected' : '' }}>e+
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'kell+' ? 'selected' : '' }}>kell+
                                            </option>
                                        </optgroup>
                                        <optgroup label="Negatives">
                                            <option {{ $case->mothrName->blood_group == 'C-' ? 'selected' : '' }}>C-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'c-' ? 'selected' : '' }}>c-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'E-' ? 'selected' : '' }}>E-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'e-' ? 'selected' : '' }}>e-
                                            </option>
                                            <option {{ $case->mothrName->blood_group == 'kell-' ? 'selected' : '' }}>kell-
                                            </option>
                                        </optgroup>
                                    </select>
                                    @error('genotype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                      @if($type=="mother") 
                      {{-- {{dd($case->motherBloodTest)}}  --}}

                       <div class="row mt-2">
                        <label class="form-label col-lg-3">HB</label>
                        <div class="col-lg-9">
                            <input class="form-control @error('HB') is-invalid @enderror" dir="rtl"
                                value="{{ $case->motherBloodTest ? $case->motherBloodTest->HB : '' }}" type="number"
                                value="12" name="HB">
                        </div>
                    </div>
                    @error('HB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="row mt-2">
                        <label class="form-label col-lg-3">ملاحظات</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" dir="rtl" name="notes">
                            {{ $case->motherBloodTest ? $case->motherBloodTest->notes : '' }}
                        </textarea>
                        </div>
                    </div>
                      
                      @else
                      <div class="row mt-2">
                        <label class="form-label col-lg-3">HB</label>
                        <div class="col-lg-9">
                            <input class="form-control @error('HB') is-invalid @enderror" dir="rtl"
                                value="{{ $case->bloodTest ? $case->bloodTest->HB : '' }}" type="number"
                                value="12" name="HB">
                        </div>
                    </div>
                    @error('HB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">ملاحظات</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" dir="rtl" name="notes">
                                {{ $case->bloodTest ? $case->bloodTest->notes : '' }}
                            </textarea>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-2">
                            <div class="col-lg-9 offset-3">
                                @csrf
                                @if ($type == 'donation')
                                    <input type="hidden" name="donation_id" value="{{ $case->id }}">
                                @endif
                                @if ($type == 'order')
                                    <input type="hidden" name="order_id" value="{{ $case->id }}">
                                @endif

                                @if ($type == 'polcythemia')
                                    <input type="hidden" name="polycythemias_id" value="{{ $case->id }}">
                                @endif

                                @if ($type == 'kid')
                                    <input type="hidden" name="kid_id" value="{{ $case->id }}">
                                @endif
                                {{-- {{dd($type)}} --}}
                                @if ($type == 'mother')
                                    <input type="hidden" name="mother_id" value="{{ $case->id }}">
                                @endif
                                <button type="submit" class=" btn btn-primary btn-block">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
    @endsection
