@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Grouping.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Grouping.partials.js')
@endsection
