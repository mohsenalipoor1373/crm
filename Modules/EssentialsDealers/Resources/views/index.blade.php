@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('essentialsdealers::modals.modal')
@endsection
@section('script')
    @include('essentialsdealers::partials.js')
@endsection
