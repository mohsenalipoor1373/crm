@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('productindex::modals.modal')
@endsection
@section('script')
    @include('productindex::partials.js')
@endsection
