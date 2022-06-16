@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Material.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Material.partials.js')
@endsection
