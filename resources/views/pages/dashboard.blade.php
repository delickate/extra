@extends('layouts.app')

@section('content')



    <section class="main_warp">
        <div class="container">
            <div class="form-group text-white text-center">
                <!-- <div class="page_title">Welcome back, {{ auth()->user()->name }}</div> -->
                <p>This page shows an overview for your account summary.</p>
            </div>
            {{ Widget::run('shelterhomeKpis') }}
            <!-- @widget('shelterhomeKpis') -->
        </div>
        <section class="map_area">
            <div class="map" id="map_canvas" style="height:550px; border: 1px solid #CCC;">
            </div>
            <!-- <div class="map">
                <img src="images/map.png" alt="" class="img-fluid" />
            </div> -->
            <div class="col-md-4">
                <div class="card" style="z-index: 999;">
                    <div class="card-header bg-white">
                        <h4 class="card-title mb-0 ml-5">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('filter') }}" class="filter_form">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="">Date From</label>
                                    <div class="input-group">
                                        <input readonly autocomplete="off" value="{{ old('from') }}" type="text" name="from" class="form-control datepicker" placeholder="">
                                        <span class="input_icon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="">Date To</label>
                                    <div class="input-group">
                                        <input readonly autocomplete="off" value="{{ old('to') }}" type="text" name="to" class="form-control datepicker" placeholder="">
                                        <span class="input_icon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="">Select District</label>
                                    <select class="form-control" id="district" name="district">
                                        <option value="all">All</option>
                                        @foreach($districts as $d)
                                        <option {{ old("district") == $d->id  ? "selected" : "" }} value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="">Select Panahgah</label>
                                    <select class="form-control" id="panahgah" name="panahgah">
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="">Select User type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="all" {{ old("type") == 'all'  ? "selected" : "" }}>All</option>
                                        <option value="1" {{ old("type") == '1'  ? "selected" : "" }}>Inspector</option>
                                        <option value="2" {{ old("type") == '2'  ? "selected" : "" }}>Citizen</option>
                                    </select>
                                </div>
                                
                                <div class="col-sm-12 form-group mt-3">
                                    <button type="submit" class="btn btn-danger btn-block">Search</button>
                                </div>


                                <!-- Quick Filters -->
                                <div class="card-header bg-white" style="width: 100%;margin-top: 15px;">
                                    <h4 class="card-title mb-0  ">Quick Filter</h4>
                                </div>
                                <div class="col-sm-12 form-group " id="filter" style="margin-top: 20px;">
                                    <div class="form-check-inline" >
                                        <label class="form-check-label">
                                            <input  {{ old('filter') == 1 ? 'checked' : '' }} name="pg" type="radio" value="1"> All
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input {{ old('filter') == 2 ? 'checked' : '' }} name="pg" type="radio" value="2@"> Noncompliant({{ @$nonCompliant}})
                                        </label>
                                    </div>
                                    <div class="form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input {{ old('filter') == 3 ? 'checked' : '' }} name="pg" type="radio" value="3"> Compliant ({{ @$compliant}})
                                        </label>
                                    </div>
                                </div>
                                <!-- Quick Filters -->


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<!-- <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin=""></script> -->
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

<script type="text/javascript">
    // Global declarations here
    var map;
    var map_zoom_level = 6;
    var map_center_latitude = 31.1704;
    var map_center_longitude = 72.7097;

    $(document).ready(function() {
        var p = '<?php  echo old("panahgah") ?? 0 ; ?>';
        if(p != 0){
            $.ajax({
            url: "{{ route('panahgah') }}",
            type: "POST",
            data: {
                district_id: $("#district option:selected").val()
            },
            success: function(data) {
                $('#panahgah').empty();
                if(data.shelterhomes.length > 0){
                    var selected = ( p  == 'all' ? 'selected' : '');
                        $('#panahgah').append(`<option ${selected} value="all">All</option>`);
                    }
                $.each(data.shelterhomes, function(index, shelterhome) {
                    var selected = (shelterhome.id == p  ? 'selected' : '');
                    $('#panahgah').append(
                        `<option
                            value='${shelterhome.id}'
                            ${selected}
                        >
                            ${shelterhome.name}
                         </option>`
                    );
                })
            }
        })
        }


        $('#filter').on('change', function(e) {
            var filter_type = e.target.value;
            let href = 'shfilter?';
            href += 'filter=' + filter_type;
            document.location.href = href;

        });

        $('#district').on('change', function(e) {
            var district_id = e.target.value;
            if(district_id == 'all') return false;
            $.ajax({
                url: "{{ route('panahgah') }}",
                type: "POST",
                data: {
                    district_id: district_id
                },
                success: function(data) {
                    $('#panahgah').empty();
                    if(data.shelterhomes.length > 0){
                        $('#panahgah').append('<option value="all">All</option>');
                    }
                    $.each(data.shelterhomes, function(index, shelterhome) {
                        $('#panahgah').append('<option  value="' + shelterhome.id + '">' + shelterhome.name + '</option>');
                    })
                }
            })
        });

        // Initilalize map with map_options : Array()
        map = L.map(
            'map_canvas', {
                center: new L.LatLng(map_center_latitude, map_center_longitude),
                zoom: map_zoom_level,
                layers: []
            }
        );

        // Defining tile layer to be added into map
        var greyscale_layer = new L.TileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', // tile from openstreetmap (tiles from other sources can be added too)
            {
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
                maxZoom: 20
            }
        );

        // Adding tile layer to map
        greyscale_layer.addTo(map); // to show selected in layers group icon

        /* Adding multiple layer(s) to map */
        var satellite_layer = new L.TileLayer(
            'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 20
            }
        );

        var baseLayers = {
            "Grayscale": greyscale_layer,
            "Satellite": satellite_layer
        };

        L.control.layers(baseLayers).addTo(map);
        /* Adding multiple layers to map */


        // Adding markers to map
        var sample_markers = {!! json_encode($markers) !!};
        console.log(sample_markers);

        // defining custom icon to show
        var myIcon = L.icon({
            iconUrl: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
            iconSize: [35, 30]
        });

        // drawing markers
        var marker;
        for (var i = 0; i < sample_markers.length; ++i) {

            myIcon = L.icon({
                iconUrl: `http://maps.google.com/mapfiles/ms/icons/${sample_markers[i].pinColor}-dot.png`,
                iconSize: [35, 30]
            });

            marker = L.marker(
                [sample_markers[i].lat, sample_markers[i].lng], {
                    icon: myIcon
                }
            );

            // defining marker content
            var marker_content = '';
            if (sample_markers[i].type == 'feedback') {

                marker_content = `
                    <strong>Panahgah Name</strong> : ${sample_markers[i].name} <br />
                   <strong>No of Beds</strong> : ${sample_markers[i].beds} <br />
                   <strong>No of Occupied Beds</strong> : ${sample_markers[i].occupied_beds} <br />
                   <strong>Last Visit Date</strong> : ${sample_markers[i].last_visit_date} <br />

                   <a target='_blank' href="complaints/${sample_markers[i].id}">View Complaints/Feedback</a>

            `;
            } else {
                marker_content = `

                   <strong>Panahgah Name</strong> : ${sample_markers[i].name} <br />
                   <strong>No of Beds</strong> : ${sample_markers[i].beds} <br />
                   <strong>No of Occupied Beds</strong> : ${sample_markers[i].occupied_beds} <br />
                   <strong>Last Visit Date</strong> : ${sample_markers[i].last_visit_date} <br />

                    <a target='_blank' href="complaints/${sample_markers[i].id}">View Complaints/Feedback</a>


                   `;

            }


            // binding marker popup
            marker.bindPopup(marker_content);

            // assigning marker to map
            marker.addTo(map);

        } //ends-for
    });
</script>

@endsection