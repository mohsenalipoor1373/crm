@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('users::modals.modal')
@endsection
@section('script')
    @include('users::partials.js')
@endsection
