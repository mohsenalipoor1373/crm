@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Customers.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Customers.partials.js')
@endsection
