@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('industrial::modals.modal')
@endsection
@section('script')
    @include('industrial::partials.js')
@endsection
