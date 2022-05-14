@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('shift::modals.modal')
@endsection
@section('script')
    @include('shift::partials.js')
@endsection
