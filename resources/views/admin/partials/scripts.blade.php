<!-- jQuery -->
<script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/assets/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('/assets/plugins/toastr/toastr.min.js') }}"></script>

<script>
    @if (session('error'))
        toastr.error($('#error-message').val());
    @endif

    @if (session('success'))
        toastr.success($('#success-message').val());
    @endif

    //   master search

    $(function () {
      let container_1 = $("#container_1");
      let container_2 = $("#container_2");
      let container_3 = $("#container_3");
      let container_4 = $("#container_4");
      let container_5 = $("#container_5");
      let back = $(".back");
      let searchBySr = $("#search_by_sr");
      let searchByProvince = $("#search_by_province");
      let searchByDistrict = $("#search_by_district");
      let searchByTehsil = $("#search_by_tehsil");
      let search_loader = $("#search_loader");

      container_2.hide();
      container_3.hide();
      container_4.hide();
      container_5.hide();
      search_loader.hide();

      searchBySr.on("click", function () {
            container_1.hide();
            container_2.show();
      });

      searchByProvince.on("click", function () {
            container_1.hide();
            container_3.show();
            loadProvinces();
      });

      searchByDistrict.on("click", function () {
            container_1.hide();
            container_4.show();
            loadDistricts()
      });

      searchByTehsil.on("click", function () {
            container_1.hide();
            container_5.show();
            loadTehsil();
      });

      back.on('click', function(){
            container_1.show();
            container_2.hide();
            container_3.hide();
            container_4.hide();
            container_5.hide();
      })

      $("#search_sr").on('click', function(){
            search_loader.show();

            let sr = $("#sr_no").val().toUpperCase();
            let sc_status = $("#sc_status").val();
            let sc_level = $("#sc_level").val();
            let sc_af = $("#sc_aff").val();

            $.ajax({
            url: `/admin/dashboard/master/search/sr/ajax?sr=${sr}&sc_level=${sc_level}&sc_status=${sc_status}&sc_af=${sc_af}`,
            type: 'GET',
            success: function (data) {
                $("#sr_table tbody").empty();
                $.each(data, function(index, school) {
                  $("#sr_table tbody").append(`
                        <tr>
                              <td>${school.sc_br_emi_no}</td>
                              <td>${school.sc_br_name}</td>
                              <td>${school.sc_br_address}</td>
                              <td>${school.principal_name}</td>
                              <td>${school.principal_phone}</td>
                              <td>${school.owner_name}</td>
                              <td>${school.owner_phone}</td>
                              <td>${school.sc_br_type}</td>
                              <td>${school.sc_br_affiliated}</td>
                              <td style="background-color:${school.status_name === "UnRegistered" ? 'rgb(254, 171, 171)' : school.status_name === "Registered" ? '#90EE90' : school.status_name === "UnderProcess" ? '#FFFF33' : ''}">${school.status_name}</td>
                              <td>
                              <a href="/admin/school/${school.sc_br_id}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-eye"></i>
                              </a>  
                              </td>
                        </tr>
                  `);
                })
                search_loader.hide();
            },
            error: function (error) {
                console.error('Error:', error);
                search_loader.hide();
                // Handle the error
            }
        });
      })

      $("#search_pr").on('click', function(){
            search_loader.show();
            let pr = $("#province_search_dropdown").val();
            let sc_status = $("#sc_pr_status").val();
            let sc_level = $("#sc_pr_level").val();
            let sc_af = $("#sc_pr_aff").val();

            $.ajax({
            url: `/admin/dashboard/master/search/pr/ajax?pr=${pr}&sc_level=${sc_level}&sc_status=${sc_status}&sc_af=${sc_af}`,
            type: 'GET',
            success: function (data) {
                $("#pr_table tbody").empty();
                $.each(data, function(index, school) {
                  $("#pr_table tbody").append(`
                        <tr>
                              <td>${school.sc_br_emi_no}</td>
                              <td>${school.sc_br_name}</td>
                              <td>${school.sc_br_address}</td>
                              <td>${school.principal_name}</td>
                              <td>${school.principal_phone}</td>
                              <td>${school.owner_name}</td>
                              <td>${school.owner_phone}</td>
                              <td>${school.sc_br_type}</td>
                              <td>${school.sc_br_affiliated}</td>
                              <td style="background-color:${school.status_name === "UnRegistered" ? 'rgb(254, 171, 171)' : school.status_name === "Registered" ? '#90EE90' : school.status_name === "UnderProcess" ? '#FFFF33' : ''}">${school.status_name}</td>
                              <td>
                              <a href="/admin/school/${school.sc_br_id}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-eye"></i>
                              </a>  
                              </td>
                        </tr>
                  `);
                })
                search_loader.hide();
            },
            error: function (error) {
                console.error('Error:', error);
                search_loader.hide();
                // Handle the error
            }
        });
      })

      $("#search_dis").on('click', function(){
            search_loader.show();
            let ds = $("#district_search_dropdown").val();
            let sc_status = $("#sc_ds_status").val();
            let sc_level = $("#sc_ds_level").val();
            let sc_af = $("#sc_ds_aff").val();

            $.ajax({
            url: `/admin/dashboard/master/search/ds/ajax?ds=${ds}&sc_level=${sc_level}&sc_status=${sc_status}&sc_af=${sc_af}`,
            type: 'GET',
            success: function (data) {
                $("#ds_table tbody").empty();
                $.each(data, function(index, school) {
                  $("#ds_table tbody").append(`
                        <tr>
                              <td>${school.sc_br_emi_no}</td>
                              <td>${school.sc_br_name}</td>
                              <td>${school.sc_br_address}</td>
                              <td>${school.principal_name}</td>
                              <td>${school.principal_phone}</td>
                              <td>${school.owner_name}</td>
                              <td>${school.owner_phone}</td>
                              <td>${school.sc_br_type}</td>
                              <td>${school.sc_br_affiliated}</td>
                              <td style="background-color:${school.status_name === "UnRegistered" ? 'rgb(254, 171, 171)' : school.status_name === "Registered" ? '#90EE90' : school.status_name === "UnderProcess" ? '#FFFF33' : ''}">${school.status_name}</td>
                              <td>
                              <a href="/admin/school/${school.sc_br_id}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-eye"></i>
                              </a>  
                              </td>
                        </tr>
                  `);
                })
                search_loader.hide();
            },
            error: function (error) {
                console.error('Error:', error);
                search_loader.hide();
                // Handle the error
            }
        });
      })

      $("#search_ts").on('click', function(){
            search_loader.show();
            let ts = $("#tehsil_search_dropdown").val();
            let sc_status = $("#sc_ts_status").val();
            let sc_level = $("#sc_ts_level").val();
            let sc_af = $("#sc_ts_aff").val();

            $.ajax({
            url: `/admin/dashboard/master/search/ds/ajax?ts=${ts}&sc_level=${sc_level}&sc_status=${sc_status}&sc_af=${sc_af}`,
            type: 'GET',
            success: function (data) {
                $("#ts_table tbody").empty();
                $.each(data, function(index, school) {
                  $("#ts_table tbody").append(`
                        <tr>
                              <td>${school.sc_br_emi_no}</td>
                              <td>${school.sc_br_name}</td>
                              <td>${school.sc_br_address}</td>
                              <td>${school.principal_name}</td>
                              <td>${school.principal_phone}</td>
                              <td>${school.owner_name}</td>
                              <td>${school.owner_phone}</td>
                              <td>${school.sc_br_type}</td>
                              <td>${school.sc_br_affiliated}</td>
                              <td style="background-color:${school.status_name === "UnRegistered" ? 'rgb(254, 171, 171)' : school.status_name === "Registered" ? '#90EE90' : school.status_name === "UnderProcess" ? '#FFFF33' : ''}">${school.status_name}</td>
                              <td>
                              <a href="/admin/school/${school.sc_br_id}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-eye"></i>
                              </a>  
                              </td>
                        </tr>
                  `);
                })
                search_loader.hide();
            },
            error: function (error) {
                console.error('Error:', error);
                search_loader.hide();
                // Handle the error
            }
        });
      })

      function loadProvinces(){
            $.ajax({
            url: `/admin/dashboard/master/search/province/list/ajax`,
            type: 'GET',
            success: function (data) {
                $('#province_search_dropdown').empty();
                        $('#province_search_dropdown').append($("<option></option>")
                              .attr("value", "")
                              .text("Choose Province"));
                        $.each(data, function(index, data) {
                              $('#province_search_dropdown').append($("<option></option>")
                                    .attr("value", data.province_id)
                                    .text(data.province_name));
                              });
            },
            error: function (error) {
                console.error('Error:', error);
                // Handle the error
            }
        });
      }

      function loadDistricts(){
            $.ajax({
            url: `/admin/dashboard/master/search/district/list/ajax`,
            type: 'GET',
            success: function (data) {
                $('#district_search_dropdown').empty();
                        $('#district_search_dropdown').append($("<option></option>")
                              .attr("value", "")
                              .text("Choose District"));
                        $.each(data, function(index, data) {
                              $('#district_search_dropdown').append($("<option></option>")
                                    .attr("value", data.district_id)
                                    .text(data.district_name));
                              });
            },
            error: function (error) {
                console.error('Error:', error);
                // Handle the error
            }
        });
      }

      function loadTehsil(){
            $.ajax({
            url: `/admin/dashboard/master/search/tehsil/list/ajax`,
            type: 'GET',
            success: function (data) {
                $('#tehsil_search_dropdown').empty();
                        $('#tehsil_search_dropdown').append($("<option></option>")
                              .attr("value", "")
                              .text("Choose Tehsil"));
                        $.each(data, function(index, data) {
                              $('#tehsil_search_dropdown').append($("<option></option>")
                                    .attr("value", data.tehsil_id)
                                    .text(data.tehsil_name));
                              });
            },
            error: function (error) {
                console.error('Error:', error);
                // Handle the error
            }
        });
      }

    });
</script>
@yield('scripts')

</body>

</html>
