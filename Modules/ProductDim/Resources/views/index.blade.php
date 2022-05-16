@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('productdim::modals.modal')
@endsection
@section('script')
    @include('productdim::partials.js')
@endsection
