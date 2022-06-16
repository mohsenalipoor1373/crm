@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.SettingCompany.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.SettingCompany.partials.js')
@endsection
