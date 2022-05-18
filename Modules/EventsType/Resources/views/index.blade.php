@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('eventstype::modals.modal')
@endsection
@section('script')
    @include('eventstype::partials.js')
@endsection
