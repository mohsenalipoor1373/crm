@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('product::modals.modal')
@endsection
@section('script')
    @include('product::partials.js')
@endsection
