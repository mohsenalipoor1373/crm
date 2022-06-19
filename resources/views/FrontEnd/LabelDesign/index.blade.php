@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.LabelDesign.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.LabelDesign.partials.js')
@endsection
