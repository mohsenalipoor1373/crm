@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('statecity::modals.modal')
@endsection
@section('script')
    @include('statecity::partials.js')
@endsection
