@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Users.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Users.partials.js')
@endsection
