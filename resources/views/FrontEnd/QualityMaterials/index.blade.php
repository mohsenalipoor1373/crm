@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.QualityMaterials.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.QualityMaterials.partials.js')
@endsection
