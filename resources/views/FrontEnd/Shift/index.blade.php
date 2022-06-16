@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Shift.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Shift.partials.js')
@endsection
