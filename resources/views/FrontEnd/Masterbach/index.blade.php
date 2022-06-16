@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.Masterbach.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.Masterbach.partials.js')
@endsection
