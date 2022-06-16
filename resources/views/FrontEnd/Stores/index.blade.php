@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Stores.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Stores.partials.js')
@endsection
