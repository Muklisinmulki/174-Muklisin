@extends('develop.index')

@section('main-content')
<div class="content">
  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  <div class="content-1">
    <div id="map"></div>
  </div>
  <div class="content-2">
    <form action="{{ route('properti') }}" method="POST">
      @csrf
      <input type="hidden" id="id_user" name="id_user" value="{{ session('id') }}" readonly required>
      <div class="input-box">
        <label>Alamat Lengkap</label>
        <input type="text" id="alamat" name="alamat" required>
      </div>

      <div class="column">
        <div class="input-box">
          <label>Luas</label>
          <input type="number" id="luas" name="luas" required>
        </div>

        <div class="input-box">
          <label>Lebar</label>
          <input type="number" id="lebar" name="lebar" required>
        </div>
      </div>

      <div class="input-box">
        <label>Jumlah Lantai</label>
        <input type="Number" id="jumlah_lantai" name="jumlah_lantai" required>
      </div>

      <div class="input-box">
        <label>Tanggal Jual</label>
        <input type="date" id="tanggal_jual" name="tanggal_jual" required>
      </div>

      <div class="column">
        <div class="input-box">
          <label>Latitude</label>
          <input type="text" name="latitude" id="latitude" readonly required>
        </div>

        <div class="input-box">
          <label>Longtitude</label>
          <input type="text" name="longtitude" id="longtitude" readonly required>
        </div>
      </div>

      <div class="input-box">
        <label>Harga</label>
        <input type="number" placeholder="Rp." id="harga" name="harga" required>
      </div>
      <input type="submit" value="Properti">
    </form>
  </div>
</div>
<div class="tabel">
  <div class="tabel-1">
    <div class="title">
      <h2>Recent Payments</h2>
      <a href="#" class="btn">View All</a>
    </div>
    <table>
      <tr>
        <th>Name</th>
        <th>School</th>
        <th>Amount</th>
        <th>Option</th>
      </tr>
      <tr>
        <td>John Doe</td>
        <td>St. James College</td>
        <td>$120</td>
        <td><a href="" class="btn">View</a></td>
      </tr>
      <tr>
        <td>John Doe</td>
        <td>St. James College</td>
        <td>$120</td>
        <td><a href="" class="btn">View</a></td>
      </tr>
      <!-- Tambahkan baris lainnya sesuai kebutuhan -->
    </table>
  </div>
  <div class="tabel-2">
    <div class="title">
      <h2>New Students</h2>
      <a href="#" class="btn">View All</a>
    </div>
    <table>
      <tr>
        <th>Profile</th>
        <th>Name</th>
        <th>option</th>
      </tr>
      <tr>
        <td><img src="{{ asset('img/user.jpg') }}" alt=""></td>
        <td>John Steve Doe</td>
        <td><i class="fas fa-info-circle"></i></td>
      </tr>
      <tr>
        <td><img src="{{ asset('img/user.jpg') }}" alt=""></td>
        <td>John Steve Doe</td>
        <td><i class="fas fa-info-circle"></i></td>
      </tr>
      <!-- Tambahkan baris lainnya sesuai kebutuhan -->
    </table>
  </div>
</div>
@endsection
