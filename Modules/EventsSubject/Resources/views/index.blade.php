@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('eventssubject::modals.modal')
@endsection
@section('script')
    @include('eventssubject::partials.js')
@endsection
