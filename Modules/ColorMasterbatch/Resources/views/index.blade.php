@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('colormasterbatch::modals.modal')
@endsection
@section('script')
    @include('colormasterbatch::partials.js')
@endsection
