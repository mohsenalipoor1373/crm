@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.SettingCheckout.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.SettingCheckout.partials.js')
@endsection
