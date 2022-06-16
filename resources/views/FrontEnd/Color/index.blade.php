@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Color.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Color.partials.js')
@endsection
