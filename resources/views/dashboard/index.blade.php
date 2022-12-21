@extends('dashboard.layout.main')

@section('abc')

<div class="row">
    <div class="card col-lg-3 bg-warning shadow mt-3">
        <h2>Wellcome Back, </h2><b style="font-size: 35px; margin-top:-10px">{{ auth()->user()->name }}</b>
    </div>
</div>

@endsection
