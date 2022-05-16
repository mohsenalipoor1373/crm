@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('productaccessories::modals.modal')
@endsection
@section('script')
    @include('productaccessories::partials.js')
@endsection
