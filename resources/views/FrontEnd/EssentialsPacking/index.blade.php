@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EssentialsPacking.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EssentialsPacking.partials.js')
@endsection
