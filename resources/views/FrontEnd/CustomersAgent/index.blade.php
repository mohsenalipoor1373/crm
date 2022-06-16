@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.CustomersAgent.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.CustomersAgent.partials.js')
@endsection
