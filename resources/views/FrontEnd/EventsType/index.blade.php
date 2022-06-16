@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EventsType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EventsType.partials.js')
@endsection
