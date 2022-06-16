@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ColorMasterbatch.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ColorMasterbatch.partials.js')
@endsection
