@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductLabel.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductLabel.partials.js')
@endsection
