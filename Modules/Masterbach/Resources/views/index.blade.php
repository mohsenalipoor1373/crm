@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('masterbach::modals.modal')
@endsection
@section('script')
    @include('masterbach::partials.js')
@endsection
