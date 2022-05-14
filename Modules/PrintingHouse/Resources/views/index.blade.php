@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('printinghouse::modals.modal')
@endsection
@section('script')
    @include('printinghouse::partials.js')
@endsection
