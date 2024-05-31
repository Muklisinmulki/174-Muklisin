@extends('develop.index')

@section('main-content')
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
        </table>
      </div>
    </div>
@endsection
