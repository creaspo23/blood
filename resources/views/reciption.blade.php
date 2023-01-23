@extends('layouts.master')
@section('title') لوحة التحكم @endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') الرئيسية @endslot
        @slot('title') لوحة التحكم @endslot
    @endcomponent

    


@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>

@endsection
