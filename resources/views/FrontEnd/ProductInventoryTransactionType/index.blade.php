@extends('layouts.main')
@section('content')
    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.ProductInventoryTransactionType.modals.modal')
@endsection
@section('script')
    @include('FrontEnd.ProductInventoryTransactionType.partials.js')
@endsection
