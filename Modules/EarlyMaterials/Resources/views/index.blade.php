@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('earlymaterials::modals.modal')
@endsection
@section('script')
    @include('earlymaterials::partials.js')
@endsection
