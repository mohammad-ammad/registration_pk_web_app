@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$sc_count}}</h3>
  
                  <p>Total Schools</p>
                </div>
                <div class="icon">
                  <i class="fa fa-university"></i>
                </div>
                <a href="{{route('admin.dashboard',['tehsil' => '6', 'province' => '1'])}}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$sc_re_count}}</h3>
  
                  <p>REGISTERED</p>
                </div>
                <div class="icon">
                  <i class="fa fa-registered"></i>
                </div>
                <a href="{{ route('admin.dashboard', ['tehsil' => '6', 'province' => '1','query' => 'registered']) }}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$sc_ure_count}}</h3>
  
                  <p>UN-REGISTERED</p>
                </div>
                <div class="icon">
                  <i class="fa fa-exclamation"></i>
                </div>
                <a href="{{ route('admin.dashboard', ['tehsil' => '6', 'province' => '1','query' => 'unregistered']) }}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$sc_up_count}}</h3>
  
                  <p>UNDER PROCESS</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list-alt"></i>
                </div>
                <a href="{{ route('admin.dashboard', ['tehsil' => '6', 'province' => '1','query' => 'underprocess']) }}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tehsil based Schools</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Select Tehsil</label>
                      <select class="form-control select2bs4" id="tehsil_dropdown" name="" style="width: 100%;" required>
                        <option value="">Choose Tehsil</option>
                        @foreach ($tehsils as $tehsil)
                            <option value="{{$tehsil->tehsil_id}}" {{ $tehsil->tehsil_id == $tehsil_query  ? 'selected' : '' }}>{{$tehsil->tehsil_name}}</option>
                        @endforeach
                      </select>
                    </div>
              </div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Provinces based Schools</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Select Province</label>
                        <select class="form-control select2bs4" id="province_dropdown" name="" style="width: 100%;" required>
                          <option value="">Choose Province</option>
                          @foreach ($provinces as $province)
                              <option value="{{$province->province_id}}" {{ $province->province_id == $province_query  ? 'selected' : '' }}>{{$province->province_name}}</option>
                          @endforeach
                        </select>
                      </div>
                </div>
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest Schools</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN.</th>
                  <th>School Name</th>
                  <th>School Address</th>
                  <th>Principal Name</th>
                  <th>Principal No</th>
                  <th>Owner Name</th>
                  <th>School City</th>
                  <th>School Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($schools as $school)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        {{$school->school_name}}({{$school->sc_br_name}})
                      </td>
                      <td>{{$school->sc_br_address}}</td>
                      <td>{{$school->principal_name}}</td>
                      <td>{{$school->principal_phone}}</td>
                      <td>{{$school->owner_name}}</td>
                      <td>{{$school->city_name}}</td>
                      <td style="background-color: @if($school->status_name === "UnRegistered") rgb(254, 171, 171) @elseif($school->status_name === "Registered") #90EE90 @elseif($school->status_name === "UnderProcess") #FFFF33 @endif">{{$school->status_name}}</td>
                    </tr>
                @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>

      <!-- /.content -->
@endsection

@section('scripts')
      <script src="{{asset('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/jszip/jszip.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/chart.js/Chart.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/select2/js/select2.full.min.js')}}"></script>
      <script>
        $(function () {
          const currentURL = new URL(window.location.href);
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });

           //Initialize Select2 Elements
           $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })

          var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
          var primaryLabelTehsil = 'Primary School: ' + {{$tehsil_school_primary}};
          var secondaryLabelTehsil = 'Secondary School: ' + {{$tehsil_school_secondary}};
          var middleLabelTehsil = 'Elementary School: ' + {{$tehsil_school_middle}};
          var donutData = {
            labels: [
                primaryLabelTehsil,
                secondaryLabelTehsil,
                middleLabelTehsil,
            ],
            datasets: [
              {
                data: [{{$tehsil_school_primary}},{{$tehsil_school_secondary}},{{$tehsil_school_middle}}],
                backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
              }
            ]
          }
          var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
          })

          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var primaryLabelCity = 'Primary School: ' + {{$province_school_primary}};
          var secondaryLabelCity = 'Secondary School: ' + {{$province_school_secondary}};
          var middleLabelCity = 'Elementary School: ' + {{$province_school_middle}};
          var pieData = {
            labels: [
              primaryLabelCity,
              secondaryLabelCity,
              middleLabelCity,
            ],
            datasets: [
              {
                data: [{{$province_school_primary}},{{$province_school_secondary}},{{$province_school_middle}}],
                backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
              }
            ]
          }
          var pieOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          // custom logic
          $('#tehsil_dropdown').change(function() {
            const tehsil_id = $('#tehsil_dropdown').val();
            currentURL.searchParams.set('tehsil', tehsil_id);
            const updatedURL = currentURL.toString();
            window.location.href = updatedURL;
          });

          $('#province_dropdown').change(function() {
            const province_id = $('#province_dropdown').val();
            currentURL.searchParams.set('province', province_id);
            const updatedURL = currentURL.toString();
            window.location.href = updatedURL;
          });
        });

      </script>
@endsection