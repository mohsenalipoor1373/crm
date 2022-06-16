@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.LabelType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.LabelType.partials.js')
@endsection
