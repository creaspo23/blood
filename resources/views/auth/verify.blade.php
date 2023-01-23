@extends('layouts.master-without-nav')
@section('title')
    تاكيد البريد الالكتروني
@endsection
@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('index') }}" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
    </div>
    <div class="account-pages my-5  pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>
                        <a href="{{ url('index') }}" class="mb-5 d-block auth-logo">
                            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="22"
                                class="logo logo-dark">
                            <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="22"
                                class="logo logo-light">
                        </a>
                        <div class="card">
                            <div class="card-header">{{ __('قم بتاكيد البريد الالكتروني') }}</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('تم ارسال رابط التاكيد الى عنوان بريدك الالكتروني') }}
                                    </div>
                                @endif

                                {{ __('قبل المتابعة, يرجى زيارة بريدك الالكتروني للحصول على رابط التاكيد') }}
                                {{ __('اذا لم تجد رسالة التاكيد') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">{{ __('اضغط هنا لاعادة ارسال الرابط') }}</button>.
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Crafted with
                                <i class="mdi mdi-heart text-danger"></i>
                                by Athrib
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>
    </div>
@endsection
