@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.StateCity.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.StateCity.partials.js')
@endsection
