@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.StoresType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.StoresType.partials.js')
@endsection
