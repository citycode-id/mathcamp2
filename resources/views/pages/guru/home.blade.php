@extends('layouts.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12">
        <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p>Silahakan gunakan menu Topik disamping untuk mengakses topik yang tersedia.</p>
    </div>
  </div>
  <!--Row-->
</div>
@endsection

@push('js-lib')
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
@endpush

@push('js')
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
@endpush
