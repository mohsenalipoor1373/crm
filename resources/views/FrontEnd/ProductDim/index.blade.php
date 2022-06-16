@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductDim.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductDim.partials.js')
@endsection
