@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('grade::modals.modal')
@endsection
@section('script')
    @include('grade::partials.js')
@endsection
