@extends('index')

@section('page_title', 'Draft Charts view')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div id="chartArea" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Simple Area</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-line-area" class=""></div>
                </div>
            </div>
        </div>
    </div>
    <?php //echo'<pre>'; print_r($json_data); exit();?>
    <?php

        for($i=0; $i<count($json_data); $i++){
            $temp_date[] = $json_data[$i]['EntryDate'];
            $temp_humidity[] = $json_data[$i]['humidity']!='humidity' ? $json_data[$i]['humidity'] : '';
            $temp_temperature[] = $json_data[$i]['temperature']!='temperature' ? $json_data[$i]['temperature'] : '';
            //$temp_moisture1[] = $json_data[$i]['moisture1']!='moisture' ? $json_data[$i]['moisture1'] : '';
            //$temp_moisture2[] = $json_data[$i]['moisture2']!='solit' ? $json_data[$i]['moisture2'] : '';
            $temp_date_output[] = implode(', ',$temp_date);
            $temp_humidity_output[] = implode(', ',$temp_humidity);
            $temp_temperature_output[] = implode(', ',$temp_temperature);
            //$temp_moisture1_output[] = implode(', ',$temp_moisture1);
            //$temp_moisture2_output[] = implode(', ',$temp_moisture2);
        }
        //echo implode(",\n", $temp_date_output);
    ?>

    <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
    <script>
        // Simple Line Area
        var sLineArea = {
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false,
                }
            },
            // colors: ['#1b55e2', '#888ea8'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Humidity',
                data: [<?php echo implode(" /n", $temp_humidity_output)?>]
            },
            //     {
            //     name: 'series2',
            //     data: [11, 32, 45, 32, 34, 52, 41]
            // }],

            xaxis: {
                type: 'datetime',
                categories: [<?php echo implode(" /n", $temp_date_output)?>],
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#s-line-area"),
            sLineArea
        );

        chart.render();

    </script>
@endsection
