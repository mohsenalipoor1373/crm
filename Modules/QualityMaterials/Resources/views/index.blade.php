@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('qualitymaterials::modals.modal')
@endsection
@section('script')
    @include('qualitymaterials::partials.js')
@endsection
