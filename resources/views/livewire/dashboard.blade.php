<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="pb-5 col-12">
            <div class="pb-5 text-white hero hero-bg-image hero-bg-parallax" style="background-image: url('assets/img/unsplash/andre-benz-1214056-unsplash.jpg');">
              <div class="hero-inner">
                <h2>Welcome, {{Auth::user()->name}}!</h2>
                <p class="lead">Selemat datang, {{Auth::user()->name}} di website event Informatics 24 semoga hari anda menyenangkan 🙀</p>
                @hasrole('User')
                <div class="mt-4">
                    <a href="{{route('order.user')}}" class="mb-2 mr-1 btn btn-outline-white btn-lg btn-icon icon-left"> <i class="mx-1 ion-ios-compose-outline"></i></i>Pilih Menu</a>
                    <a href="{{route('payment.user')}}" class="mb-2 mr-1 btn btn-outline-white btn-lg btn-icon icon-left"> <i class="mx-1 ion-social-usd"></i></i>Pembayaran</a>
                <a href="{{route('payment-confirmed.user')}}" class="mb-2 btn btn-outline-white btn-lg btn-icon icon-left"> <i class="mx-1 ion-android-done"></i></i>Konfirmasi Pembayaran</a>
                </div>
                @endhasrole
              </div>
            </div>
          </div>
    </div>
    <div class=" row" style="display: flex; justify-content: center">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              {{$adminCount}}
            </div>
          </div>
        </div>
      </div>
      @hasrole('Admin')
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Anggota</h4>
            </div>
            <div class="card-body">
              {{$userCount}}
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-list-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Menu</h4>
                </div>
                <div class="card-body">
                {{$menuCount}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-link"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Dokumentasi</h4>
                </div>
                <div class="card-body">
                {{$documentationCount}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Kegiatan Acara</h4>
                </div>
                <div class="card-body">
                {{$timelineCount}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Order Sudah Konfirmasi</h4>
                </div>
                <div class="card-body">
                {{ $orderconfirmedCount}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Order Belum di Konfirmasi</h4>
                </div>
                <div class="card-body">
                    {{$ordernotconfirmedCount}}
                </div>
            </div>
            </div>
        </div>
      @endhasrole
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-credit-card"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Uang Masuk</h4>
            </div>
            <div class="card-body">
                Rp. {{ number_format($moneyinCount, 0, ',', '.') }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-credit-card"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Uang Terkonfirmasi</h4>
            </div>
            <div class="card-body">
                Rp. {{ number_format($moneynowCount, 0, ',', '.') }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-credit-card"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Uang Keluar</h4>
            </div>
            <div class="card-body">
                Rp. {{ number_format($moneyoutCount, 0, ',', '.') }}
            </div>
          </div>
        </div>
      </div>

    </div>
    @hasrole('Admin')
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4>Chart Pembayaran</h4>
            </div>
            <div class="card-body">
              <canvas id="payment"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4>Chart Order</h4>
            </div>
            <div class="card-body">
              <canvas id="order"></canvas>
            </div>
          </div>
        </div>
    </div>
    @endhasrole
    @hasrole('User')
    <div class=" row">
        <div class="mt-2 mb-4 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Status</h4>
                </div>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Kode Pembayaran</th>
                            <th>Pembayaran Atas Nama</th>
                            <th>Nomber Pembayaran</th>
                            <th>Konfirmasi pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($payment as $payment)
                        <tr>
                            <td>
                               {{ $payment->user->name }}
                            </td>
                            <td>
                               {{ $payment->code_payment }}
                            </td>
                            <td>
                               {{ $payment->account_name }}
                            </td>
                            <td>
                               {{ $payment->account_number }}
                            </td>
                            <td>
                                @if ($payment->status == 'pending')
                                <i class="badge badge-warning">pending</i>
                                @elseif($payment->status == 'complete')
                                <i class="badge badge-success">complete</i>
                                @elseif($payment->status == 'canceled')
                                <i class="badge badge-danger">canceled</i>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('show-payment.user',$payment->code_payment) }}" class="btn btn-warning">Show</a>
                                @if ($payment->status == 'complete')
                                <a href="{{route('generate.invoice.user',$payment->code_payment)}}" class="mt-1 btn btn-primary btn-icon icon-left"><i class="fas fa-download"></i>Download Invoice</a>
                                @endif

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Uang keluar</h4>
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Nama User</th>
                            <th>Nominal</th>
                            <th>description</th>

                    </thead>
                    <tbody>

                        @foreach ($moneyouts as $data)
                            <tr>

                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->nominal }}</td>
                                <td>{{ $data->description }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
            </div>

        </div>


    </div>
    @endhasrole


  </section>

  @push('js')
  <script>
    var ctx = document.getElementById("payment").getContext('2d');
    var cty = document.getElementById("order").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
        data: [
            {{$moneyinCount}},
            {{$moneynowCount}},
            {{$moneyoutCount}},
        ],
        backgroundColor: [
            '#ffa426',
            '#fc544b',
            '#6777ef',
        ],
        label: 'Dataset 1'
        }],
        labels: [
        'Uang Masuk',
        'Uang Sekarang',
        'Uang Keluar',
        ],
    },
    options: {
        responsive: true,
        legend: {
        position: 'bottom',
        },
    }
    });
    var myChart = new Chart(cty, {
    type: 'doughnut',
    data: {
        datasets: [{
        data: [
            {{$ordernotconfirmedCount}},
            {{ $orderconfirmedCount}}
        ],
        backgroundColor: [
            '#ffa426',
            '#6777ef',
        ],
        label: 'Dataset 1'
        }],
        labels: [
        'Order Belum Konfirmasi',
        'Order Sudah Konfirmasi',
        ],
    },
    options: {
        responsive: true,
        legend: {
        position: 'bottom',
        },
    }
    });
  </script>
  @endpush
