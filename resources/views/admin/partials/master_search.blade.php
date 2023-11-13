{{-- master search model  --}}
<div class="modal fade" id="master-modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Master Search</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <div class="row" id="container_1">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box" style="cursor: pointer" id="search_by_sr">
                            <span class="info-box-icon bg-info"><i class="fa fa-search"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Search by</span>
                                <span class="info-box-number">School Sr No.</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box" style="cursor: pointer" id="search_by_province">
                            <span class="info-box-icon bg-success"><i class="fa fa-search"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Search by</span>
                                <span class="info-box-number">Province</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box" style="cursor: pointer" id="search_by_district">
                            <span class="info-box-icon bg-dark"><i class="fa fa-search"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Search by</span>
                                <span class="info-box-number">District</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box" style="cursor: pointer" id="search_by_tehsil">
                            <span class="info-box-icon bg-danger"><i class="fa fa-search"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Search by</span>
                                <span class="info-box-number">Tehsil</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row" id="container_2">
                    <div class="content col-12">
                        <div class="container-fluid">

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Search by School Sr No.</h3>

                                    <div class="card-tools">
                                        <a href="javascript:void(0)" class="btn btn-dark back">Back</a>
                                        <a href="" class="btn btn-danger">Reset</a>
                                        <button type="button" id="search_sr" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>School Sr No.</label>
                                                <input type="text" class="form-control" id="sr_no" placeholder="Enter School Sr No.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>School status</label>
                                            <select class="form-control" id="sc_status" style="width: 100%;">
                                              <option value="">Choose Status</option>
                                              <option value="2">Un-Registered</option>
                                              <option value="1">Registered</option>
                                              <option value="3">Under Progress</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Level</label>
                                              <select class="form-control" id="sc_level" style="width: 100%;">
                                                <option value="">Choose Level</option>
                                                <option value="primary">Primary</option>
                                                <option value="middle">Elementary</option>
                                                <option value="secondary">Secondary</option>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Affiliated with</label>
                                              <select class="form-control" id="sc_aff" style="width: 100%;">
                                                <option value="">Choose Affiliated with</option>
                                                <option value="BISE">BISE</option>
                                                <option value="FBISE">FBISE</option>
                                              </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12">
                      <div class="card-body">
                        <table id="sr_table" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SN.</th>
                            <th>School Name</th>
                            <th>School Address</th>
                            <th>Principal Name</th>
                            <th>Principal Phone No.</th>
                            <th>Owner Name</th>
                            <th>Owner Phone No.</th>
                            <th>School Type</th>
                            <th>Affiliated with</th>
                            <th>School Status</th>
                            <th>More Details</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>

                <div class="row" id="container_3">
                    <div class="content col-12">
                        <div class="container-fluid">

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Search by School Province Based</h3>

                                    <div class="card-tools">
                                        <a href="javascript:void(0)" class="btn btn-dark back">Back</a>
                                        <a href="" class="btn btn-danger">Reset</a>
                                        <button type="button" id="search_pr" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Province</label>
                                                    <select class="form-control select2bs4" id="province_search_dropdown" name="province" style="width: 100%;" required>
                                                        <option value="">Choose Province</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>School status</label>
                                            <select class="form-control" id="sc_pr_status" style="width: 100%;">
                                              <option value="">Choose Status</option>
                                              <option value="2">Un-Registered</option>
                                              <option value="1">Registered</option>
                                              <option value="3">Under Progress</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Level</label>
                                              <select class="form-control" id="sc_pr_level" style="width: 100%;">
                                                <option value="">Choose Level</option>
                                                <option value="primary">Primary</option>
                                                <option value="middle">Elementary</option>
                                                <option value="secondary">Secondary</option>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Affiliated with</label>
                                              <select class="form-control" id="sc_pr_aff" style="width: 100%;">
                                                <option value="">Choose Affiliated with</option>
                                                <option value="BISE">BISE</option>
                                                <option value="FBISE">FBISE</option>
                                              </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-12">
                      <div class="card-body">
                        <table id="pr_table" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SN.</th>
                            <th>School Name</th>
                            <th>School Address</th>
                            <th>Principal Name</th>
                            <th>Principal Phone No.</th>
                            <th>Owner Name</th>
                            <th>Owner Phone No.</th>
                            <th>School Type</th>
                            <th>Affiliated with</th>
                            <th>School Status</th>
                            <th>More Details</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>

                <div class="row" id="container_4">
                    <div class="content col-12">
                        <div class="container-fluid">

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Search by School District Based</h3>

                                    <div class="card-tools">
                                        <a href="javascript:void(0)" class="btn btn-dark back">Back</a>
                                        <a href="" class="btn btn-danger">Reset</a>
                                        <button type="button" id="search_dis" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Districts</label>
                                                    <select class="form-control select2bs4" id="district_search_dropdown" name="province" style="width: 100%;" required>
                                                        <option value="">Choose District</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>School status</label>
                                            <select class="form-control" id="sc_ds_status" style="width: 100%;">
                                              <option value="">Choose Status</option>
                                              <option value="2">Un-Registered</option>
                                              <option value="1">Registered</option>
                                              <option value="3">Under Progress</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Level</label>
                                              <select class="form-control" id="sc_ds_level" style="width: 100%;">
                                                <option value="">Choose Level</option>
                                                <option value="primary">Primary</option>
                                                <option value="middle">Elementary</option>
                                                <option value="secondary">Secondary</option>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Affiliated with</label>
                                              <select class="form-control" id="sc_ds_aff" style="width: 100%;">
                                                <option value="">Choose Affiliated with</option>
                                                <option value="BISE">BISE</option>
                                                <option value="FBISE">FBISE</option>
                                              </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-12">
                      <div class="card-body">
                        <table id="ds_table" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SN.</th>
                            <th>School Name</th>
                            <th>School Address</th>
                            <th>Principal Name</th>
                            <th>Principal Phone No.</th>
                            <th>Owner Name</th>
                            <th>Owner Phone No.</th>
                            <th>School Type</th>
                            <th>Affiliated with</th>
                            <th>School Status</th>
                            <th>More Details</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>

                <div class="row" id="container_5">
                    <div class="content col-12">
                        <div class="container-fluid">

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Search by School Tehsil Based</h3>

                                    <div class="card-tools">
                                        <a href="javascript:void(0)" class="btn btn-dark back">Back</a>
                                        <a href="" class="btn btn-danger">Reset</a>
                                        <button type="button" id="search_ts" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Districts</label>
                                                    <select class="form-control select2bs4" id="tehsil_search_dropdown" name="province" style="width: 100%;" required>
                                                        <option value="">Choose Tehsil</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>School status</label>
                                            <select class="form-control" id="sc_ts_status" style="width: 100%;">
                                              <option value="">Choose Status</option>
                                              <option value="2">Un-Registered</option>
                                              <option value="1">Registered</option>
                                              <option value="3">Under Progress</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Level</label>
                                              <select class="form-control" id="sc_ts_level" style="width: 100%;">
                                                <option value="">Choose Level</option>
                                                <option value="primary">Primary</option>
                                                <option value="middle">Elementary</option>
                                                <option value="secondary">Secondary</option>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label>School Affiliated with</label>
                                              <select class="form-control" id="sc_ts_aff" style="width: 100%;">
                                                <option value="">Choose Affiliated with</option>
                                                <option value="BISE">BISE</option>
                                                <option value="FBISE">FBISE</option>
                                              </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-12">
                      <div class="card-body">
                        <table id="ts_table" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SN.</th>
                            <th>School Name</th>
                            <th>School Address</th>
                            <th>Principal Name</th>
                            <th>Principal Phone No.</th>
                            <th>Owner Name</th>
                            <th>Owner Phone No.</th>
                            <th>School Type</th>
                            <th>Affiliated with</th>
                            <th>School Status</th>
                            <th>More Details</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="spinner-grow" role="status" id="search_loader">
                        <span class="sr-only">Loading...</span>
                      </div>
                  </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
