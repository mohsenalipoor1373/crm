@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EventsResult.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EventsResult.partials.js')
@endsection
