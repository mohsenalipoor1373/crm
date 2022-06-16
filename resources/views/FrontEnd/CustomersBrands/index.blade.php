@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.CustomersBrands.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.CustomersBrands.partials.js')
@endsection
