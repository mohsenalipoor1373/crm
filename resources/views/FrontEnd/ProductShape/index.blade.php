@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductShape.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductShape.partials.js')
@endsection
