@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EssentialsDealers.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EssentialsDealers.partials.js')
@endsection
