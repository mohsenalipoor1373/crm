@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.EarlyMaterials.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.EarlyMaterials.partials.js')
@endsection
