@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('productpacking::modals.modal')
@endsection
@section('script')
    @include('productpacking::partials.js')
@endsection
