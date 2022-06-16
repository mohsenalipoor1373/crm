@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Permissions.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Permissions.partials.js')
@endsection
