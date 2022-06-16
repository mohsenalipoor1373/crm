@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.MaterialInventoryTransactionType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.MaterialInventoryTransactionType.partials.js')
@endsection
