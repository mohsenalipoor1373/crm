@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('essentialspackingtype::modals.modal')
@endsection
@section('script')
    @include('essentialspackingtype::partials.js')
@endsection
