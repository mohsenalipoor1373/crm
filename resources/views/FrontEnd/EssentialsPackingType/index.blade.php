@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EssentialsPackingType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EssentialsPackingType.partials.js')
@endsection
