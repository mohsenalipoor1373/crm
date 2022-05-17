@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('customers::modals.modal')
@endsection
@section('script')
    @include('customers::partials.js')
@endsection
