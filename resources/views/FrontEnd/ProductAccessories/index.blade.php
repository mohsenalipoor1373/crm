@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductAccessories.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductAccessories.partials.js')
@endsection
