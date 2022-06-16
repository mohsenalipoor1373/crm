@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductType.partials.js')
@endsection
