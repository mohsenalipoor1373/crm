@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('roles::modals.modal')
@endsection
@section('script')
    @include('roles::partials.js')
@endsection
