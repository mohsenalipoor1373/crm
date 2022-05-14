@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('material::modals.modal')
@endsection
@section('script')
    @include('material::partials.js')
@endsection
