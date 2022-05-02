@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('permissions::modals.modal')
@endsection
@section('script')
    @include('permissions::partials.js')
@endsection
