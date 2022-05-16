@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('essentialspacking::modals.modal')
@endsection
@section('script')
    @include('essentialspacking::partials.js')
@endsection
