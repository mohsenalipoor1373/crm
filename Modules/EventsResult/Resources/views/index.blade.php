@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('eventsresult::modals.modal')
@endsection
@section('script')
    @include('eventsresult::partials.js')
@endsection
