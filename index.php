<html>

<head>
  <title>Accident in Bangkok</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </meta>
  <!--CSS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/L.switchBasemap.css" />
  <link href="css/all.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap-switch-button.min.css" />
  <link rel="stylesheet" href="css/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="css/MarkerCluster.Default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/flick/jquery-ui.min.css"
    integrity="sha512-MtKz2LNfSvmYnQR/sOJ4LC+VjqVxjyDNC+HZxbU0QfJGslirAWaJYhGm+YbF8wGTN83pgW5dlSYi3RjT+948rQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--JS-->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="js/bootstrap-switch-button.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="js/L.switchBasemap.js"></script>
  <script src='js/turf.min.js'></script>
  <script src='js/L.Control.Locate.min.js'></script>
  <script src='js/leaflet.ajax.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="https://cdn.rawgit.com/hayeswise/Leaflet.PointInPolygon/v1.0.0/wise-leaflet-pip.js"></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
    integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>

<body id="page-top">
  <div id="district_detail" class="modal fade" style="--bs-modal-width: 400px;">
    <div class="modal-dialog" style="left: 30%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa-solid fa-mountain-sun"></i> รายละเอียด</h5>
          <!-- <button type="button" class="close" data-bs-dismiss="modal">&times;</button> -->
        </div>
        <form name="district_detail_form" id="district_detail_form" method="post">
          <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
            <tr>
              <td class="modal_font"><i class="fa-solid fa-hashtag"></i> รหัสเขต</td>
              <td><input class="textInput modal_font" type="text" id="district_code" name="fire_coor" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-signature"></i> ชื่อเขต</td>
              <td><input class="textInput modal_font" id="district_name" type="text" name="district_name" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-chart-area"></i> พื้นที่ (ตารางกิโลเมตร)</td>
              <td><input class="textInput modal_font float" id="district_area" type="text" name="district_area"
                  readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-person"></i> ประชากรชาย</td>
              <td><input class="textInput modal_font float" id="no_male" type="text" name="no_male" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-person-dress"></i> ประชากรหญิง</td>
              <td><input class="textInput modal_font float" id="no_female" type="text" name="no_female" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-house-chimney"></i> ชุมชน</td>
              <td><input class="textInput modal_font float" id="no_commu" type="text" name="no_commu" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-gopuram"></i> วัด</td>
              <td><input class="textInput modal_font float" id="no_temple" type="text" name="no_temple" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-school"></i> โรงเรียน</td>
              <td><input class="textInput modal_font float" id="no_sch" type="text" name="no_sch" readonly></td>
            </tr>
            <tr>

              <td colspan='2'>
                <div class="d-grid gap-2 md-block"><button type="button" class="btn btn-danger"
                    onclick='accident_button_clicked()'>ข้อมูลการเกิดอุบัติเหตุ</button></div>
              </td>

            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

  <div id="accident_modal" class="modal fade" style="--bs-modal-width: 400px;">
    <div class="modal-dialog" style="top: 50%;left: 30%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa-solid fa-mountain-sun"></i> รายละเอียด</h5>
          <!-- <button type="button" class="close" data-bs-dismiss="modal">&times;</button> -->
        </div>
        <form name="accident_modal_form" id="accident_modal_form" method="post">
          <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
            <tr>
              <td class="modal_font"><i class="fa-solid fa-hashtag"></i> รหัสเขต</td>
              <td><input class="textInput modal_font" type="text" id="district_code" name="fire_coor" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-signature"></i> ชื่อเขต</td>
              <td><input class="textInput modal_font" id="district_name" type="text" name="district_name" readonly></td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-chart-area"></i> พื้นที่ (ตารางกิโลเมตร)</td>
              <td><input class="textInput modal_font float" id="district_area" type="text" name="district_area"
                  readonly></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

  <div id="datetime_modal" class="modal fade" style="--bs-modal-width: 350px;">
    <div class="modal-dialog" style="top: 50%;left: 30%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa-regular fa-calendar-days"></i> เลือกวันที่แสดงข้อมูล</h5>
          <!-- <button type="button" class="close" data-bs-dismiss="modal">&times;</button> -->
        </div>
        <form name="datetime_form" id="datetime_form" method="post">
          <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
            <tr>
              <td class="modal_font"><i class="fa-regular fa-calendar"></i> วันที่เริ่ม</td>
              <td><input class="textInput modal_font datepick" type="text" id="start_date" name="start_date" readonly>
              </td>
            </tr>
            <tr>
              <td class="modal_font"><i class="fa-solid fa-calendar"></i> วันที่สิ้นสุด</td>
              <td><input class="textInput modal_font datepick" type="text" id="to_end_date" name="to_end_date" readonly>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="modal_font">
                <div class="d-grid gap-2 md-block"><button type="button" class="btn btn-primary"
                    onclick='plot_accident_point()'>แสดงข้อมูล</button>
                </div>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-bottom"
    style="padding-bottom: 1px;padding-top: 1px" id="mainNav">
    <div class="container">
      <a class="navbar-brand"><i class="fa-solid fa-car fa-bounce" style="color: #ffac38;"></i> Accident in Bangkok</a>

      <ul class="navbar-nav ms-auto">
        <!-- <li id="nav_toggle_filter" class="nav-item mx-0 mx-lg-1">
          <div class="btn-group dropup">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
              aria-expanded="false">
              เลือกเวลา
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">วันที่เริ่ม: <input class="textInput modal_font" type="text" id="start_date"
                    name="start_date" readonly data-date-ignore-readonly="true" data-date-format="MM/DD/yyyy"></a></li>
              <li><a class="dropdown-item" href="#">วันที่สิ้นสุด: <input class="textInput modal_font" type="text" id="end_date"
                    name="end_date" readonly data-date-ignore-readonly="true" data-date-format="MM/DD/yyyy"></a></li>
            </ul>
          </div>
        </li> -->

        <li id="nav_toggle_filter" class="nav-item mx-0 mx-lg-1">
          <button class="btn font-weight-bold bg-light rounded" type="button" aria-label="Toggle navigation"
            onclick="date_selection_clicked()">
            เลือกวันที่
            <i class="fa-regular fa-calendar-days"></i>
          </button>
        </li>

      </ul>
    </div>
  </nav>

  <div id="map" style="height: 100%"></div>
  <script>
    var map = L.map('map').setView([13.732651122223231, 100.6011199951172], 10);

    // import bangkok district geojson file
    var district_geojson = null;
    $.ajax({
      'async': false,
      'global': false,
      'url': "geojson/Bangkok-districts.geojson",
      'dataType': "json",
      'success': function (data) {
        district_geojson = data;
      }
    });

    /*Current location*/
    var lc = L.control.locate({
      strings: {
        title: "ไปยังตำแหน่งปัจจุบัน"
      }
    })
      .addTo(map);

    function plot_accident_point() {
      $(".marker-cluster").remove()
      $(".district_area_class").remove()

      var form_start_date = document.getElementById('start_date').value
      var form_end_date = document.getElementById('to_end_date').value

      var start_date_day = form_start_date.split('/')[1]
      var start_date_month = form_start_date.split('/')[0]
      var start_date_year = form_start_date.split('/')[2]
      var start_date_time = new Date(start_date_year + '-' + start_date_month + '-' + start_date_day)

      var end_date_day = form_end_date.split('/')[1]
      var end_date_month = form_end_date.split('/')[0]
      var end_date_year = form_end_date.split('/')[2]
      var end_date_time = new Date(end_date_year + '-' + end_date_month + '-' + end_date_day)

      var bkk_district = L.geoJson(district_geojson, {
        onEachFeature: function (feature, layer) {
          layer.setStyle({
            'fillColor': '#0000ff'
          });
          layer.on('mouseover', function () {
            this.setStyle({
              'fillColor': '#ff0000'
            });
            var district_name_show = this.feature['properties']['dname']
            this.bindTooltip(district_name_show, { permanent: true, direction: "center" })
          });
          layer.on('mouseout', function () {
            this.setStyle({
              'fillColor': '#0000ff'
            });
            this.unbindTooltip()
          });

          $.getJSON("data/bkk-accident-itic-2022-2020.json", function (json) {
            var markers = L.markerClusterGroup({ chunkedLoading: true, removeOutsideVisibleBounds: true })
            for (i in json) {
              var date_time_data = new Date(json[i]['start'].split(' ')[0])
              if (start_date_time < date_time_data && end_date_time > date_time_data) {
                var point_latlng = new L.latLng(json[i]['latitude'], json[i]['longitude']);
                markers.addLayer(L.circle(point_latlng))
              }
            }
            map.addLayer(markers)
          })

          layer.on('click', function (e) {
            var district_code = e.sourceTarget.feature['properties']['dcode']
            var district_name = e.sourceTarget.feature['properties']['dname']
            var district_area = e.sourceTarget.feature['properties']['AREA'] * 0.000001
            var district_male = e.sourceTarget.feature['properties']['no_male']
            var district_female = e.sourceTarget.feature['properties']['no_female']
            var district_community = e.sourceTarget.feature['properties']['no_commu']
            var district_temple = e.sourceTarget.feature['properties']['no_temple']
            var district_school = e.sourceTarget.feature['properties']['no_sch']
            var district_coor = layer.getBounds().getCenter()
            var district_lat = district_coor.lat
            var district_lng = district_coor.lng + 0.1
            document.getElementById('district_code').value = district_code
            document.getElementById('district_name').value = district_name
            document.getElementById('district_area').value = district_area
            document.getElementById('no_male').value = district_male
            document.getElementById('no_female').value = district_female
            document.getElementById('no_commu').value = district_community
            document.getElementById('no_temple').value = district_temple
            document.getElementById('no_sch').value = district_school
            map.flyTo([district_lat, district_lng], 12);
            $('#district_detail').modal('show')
            $(".modal-backdrop").hide();
            //$.ajax(... 
          });
        }
      })
      bkk_district.setStyle({ 'className': 'district_area_class' })
      bkk_district.addTo(map)
    }

    /* date select clicked */
    function date_selection_clicked() {
      $('#datetime_modal').modal('show')
    }

    /* On click accident button */
    function accident_button_clicked() {
      $('#district_detail').modal('hide')
      setTimeout(function () {
        $('#accident_modal').modal('show')
        $(".modal-backdrop").hide();
      }, 100);
    }

    /*Basemap switcher*/
    new L.basemapsSwitcher([
      {
        layer: L.tileLayer('//{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
          maxZoom: 20,
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map), //DEFAULT MAP
        icon: 'assets/img/map1.png',
        name: 'Hybrid'
      },
      {
        layer: L.tileLayer('//{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
          maxZoom: 20,
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }),
        icon: 'assets/img/map2.png',
        name: 'Street'
      },
      {
        layer: L.tileLayer('//{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
          maxZoom: 20,
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }),
        icon: 'assets/img/map3.png',
        name: 'Satelite'
      },
    ], { position: 'topright' }).addTo(map);

    /* event when modal was closed */
    $('#district_detail').on('hidden.bs.modal', function () {
      console.log('1')
    })

    $('#accident_modal').on('hidden.bs.modal', function () {
      console.log('2')
    })

    function start_date_setup() {
      $('#start_date').datepicker({
        format: 'mm/dd/yyyy',
        changeYear: true,
        startDate: '01/01/2020',
        autoclose: true,
        onSelect: function (selected) {
          $('#to_end_date').datepicker("option", "minDate", selected);
        },
        beforeShow: function (input, inst) {
          var rect = input.getBoundingClientRect();
          setTimeout(function () {
            inst.dpDiv.css({ top: rect.top - 75, left: rect.left - 450 });
          }, 0);
        },
        onClose: function (selected) {
          $('#start_date').datepicker('disable');
          $('#to_end_date').datepicker('show')
        }
      })
    }

    function end_date_setup() {
      $('#to_end_date').datepicker({
        format: 'mm/dd/yyyy',
        changeYear: true,
        startDate: $('#start_date').val(),
        minDate: $('#start_date').val(),
        autoclose: true,
        onSelect: function (selected) {
          $('#start_date').datepicker("option", "maxDate", selected);
        },
        beforeShow: function (input, inst) {
          var rect = input.getBoundingClientRect();
          setTimeout(function () {
            inst.dpDiv.css({ top: rect.top - 122, left: rect.left - 450 });
          }, 0);
        },
        onClose: function (selected) {
          $('#start_date').datepicker('enable');
        }
      })
    }

    /* time period default */
    document.getElementById("start_date").value = "1/1/2020";
    document.getElementById("to_end_date").value = "1/3/2020";

    start_date_setup()
    end_date_setup()
    plot_accident_point()

  </script>

</body>

</html>