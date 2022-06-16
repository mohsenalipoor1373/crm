@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductIndex.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductIndex.partials.js')
@endsection
