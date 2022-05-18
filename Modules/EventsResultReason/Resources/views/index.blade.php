@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('eventsresultreason::modals.modal')
@endsection
@section('script')
    @include('eventsresultreason::partials.js')
@endsection
