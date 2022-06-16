@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Roles.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Roles.partials.js')
@endsection
