@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('settingcompany::modals.modal')
@endsection
@section('script')
    @include('settingcompany::partials.js')
@endsection
