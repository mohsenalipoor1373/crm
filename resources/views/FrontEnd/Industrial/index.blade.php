@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Industrial.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Industrial.partials.js')
@endsection
