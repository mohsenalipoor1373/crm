@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.PrintingHouse.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.PrintingHouse.partials.js')
@endsection
