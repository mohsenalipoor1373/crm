@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EventsResultReason.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EventsResultReason.partials.js')
@endsection
