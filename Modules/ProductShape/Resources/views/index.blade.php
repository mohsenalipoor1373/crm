@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('productshape::modals.modal')
@endsection
@section('script')
    @include('productshape::partials.js')
@endsection
