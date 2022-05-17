@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('customersbrands::modals.modal')
@endsection
@section('script')
    @include('customersbrands::partials.js')
@endsection
