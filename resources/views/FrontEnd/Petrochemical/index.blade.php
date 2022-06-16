@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Petrochemical.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Petrochemical.partials.js')
@endsection
