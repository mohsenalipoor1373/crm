@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('grouping::modals.modal')
@endsection
@section('script')
    @include('grouping::partials.js')
@endsection
