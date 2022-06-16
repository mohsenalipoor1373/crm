@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.LabelInventoryTransactionType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.LabelInventoryTransactionType.partials.js')
@endsection
