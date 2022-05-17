@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('customersagent::modals.modal')
@endsection
@section('script')
    @include('customersagent::partials.js')
@endsection
