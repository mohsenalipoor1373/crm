@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EventsSubject.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EventsSubject.partials.js')
@endsection
