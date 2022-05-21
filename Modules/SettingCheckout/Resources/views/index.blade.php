@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('settingcheckout::modals.modal')
@endsection
@section('script')
    @include('settingcheckout::partials.js')
@endsection
