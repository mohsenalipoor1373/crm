@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductPacking.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductPacking.partials.js')
@endsection
