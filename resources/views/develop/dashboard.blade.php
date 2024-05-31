@extends('develop.index')

@section('main-content')

  <div class="cards">
    <div class="card">
      <div class="card-content">
        <div class="number">1233</div>
        <div class="card-name">Client</div>
      </div>
      <div class="icon-box">
        <i class="fas fa-user-tie"></i>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="number">80</div>
        <div class="card-name">Properti</div>
      </div>
      <div class="icon-box">
        <i class="fas fa-house"></i>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="number">Rp.100.000</div>
        <div class="card-name">Income</div>
      </div>
      <div class="icon-box">
        <i class="fas fa-dollar-sign"></i>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="number">Rp.70.000</div>
        <div class="card-name">Profit</div>
      </div>
      <div class="icon-box">
        <i class="fas fa-chart-line"></i>
      </div>
    </div>
  </div>
<div class="charts">
  <div class="charts-card">
    <p class="chart-title">Top 5 products</p>
    <div id="bar-chart"></div>
  </div>

  <div class="charts-card">
    <p class="chart-title">Purchase and Sales Orders</p>
    <div id="area-chart"></div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js"></script>
@endsection