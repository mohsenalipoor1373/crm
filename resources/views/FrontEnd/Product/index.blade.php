@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Product.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Product.partials.js')
@endsection
