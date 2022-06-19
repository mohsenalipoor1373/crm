@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.LabelDesignVersions.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.LabelDesignVersions.partials.js')
@endsection
