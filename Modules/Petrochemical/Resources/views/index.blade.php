@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('petrochemical::modals.modal')
@endsection
@section('script')
    @include('petrochemical::partials.js')
@endsection
