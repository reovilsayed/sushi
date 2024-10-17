<x-layout>


    <div class="box_model">
        <div class="dsh_row row">
            <div class="left_chart">
                <div class="dash_body">

                    <div class="chart-title__heading">
                        <div id="chart1" class="chart chart1">
                        </div>
                        <h3 class="chart-title">{{ __('sentence.my_sales') }}</h3>
                    </div>
                </div>
            </div>
            <div class="rt_box">
                <div class="vr_grid_box">
                    <div class="vr_item grn">
                        <i><img src="images/chks.png" alt="" /></i>
                        <h3>{{ __('sentence.today_total_orders') }}</h3>
                        <label>{{ $todaysSale }} €.</label>
                    </div>
                    <div class="vr_item grn">
                        <i><img src="images/chks.png" alt="" /></i>
                        <h3>{{ __('sentence.todays_sale') }}</h3>
                        <label>{{ $orders }} €.</label>
                    </div>
                    <div class="vr_item grn">
                        <i><img src="images/chks.png" alt="" /></i>
                        <h3>{{ __('sentence.last_7_days_sale') }}</h3>
                        <label>{{ $sevensSale }} €.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            function createChart(elementId, type, series, categories, options = {}) {
                const defaultOptions = {
                    chart: {
                        type: type,
                        height: 225,
                        redrawOnParentResize: true,
                        redrawOnWindowResize: true,
                        toolbar: {
                            show: false
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    xaxis: {
                        categories: categories,
                        labels: {
                            show: true,
                            rotate: 0,
                            style: {
                                colors: "#000000",
                                fontSize: "12px",
                                fontFamily: "Cabin, sans-serif",
                                fontWeight: 600,
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            show: true,
                            style: {
                                colors: "#000000",
                                fontSize: "12px",
                                fontFamily: "Cabin, sans-serif",
                                fontWeight: 600,
                            },
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val.toFixed(2) + " €";
                            },
                        },
                    },
                    fill: {
                        opacity: 1,
                        gradient: {
                            shade: "light",
                            type: "vertical",
                            shadeIntensity: 0.5,
                            opacityFrom: 0.7,
                            opacityTo: 0.2,
                        },
                    },
                    responsive: [{
                        breakpoint: 1600,
                        options: {},
                    }],
                };

                new ApexCharts(document.getElementById(elementId), {
                    ...defaultOptions,
                    series: series,
                    ...options
                }).render();
            }

            // Fetch and render the area chart for revenue
            $.ajax({
                url: "/get-chart-data",
                type: "GET",
                success: function(response) {
                    const revenue = response.data.map(item => item.total_profit);
                    const dates = response.data.map(item => item.date);
                    createChart('chart0', 'area', [{
                        name: "Revenue",
                        data: revenue,
                    }], dates);
                },
                error: function(error) {
                    console.log(error);
                },
            });

            // Fetch and render the bar chart for sales and earnings
            $.ajax({
                url: "/get-chart-data-month",
                type: "GET",
                success: function(response) {
                    createChart('chart1', 'bar', [{
                            name: "Vente",
                            data: response.data.sales
                        },
                        {
                            name: "Revenus",
                            data: response.data.profit
                        },
                    ], [
                        "{{ __('sentence.january') }}",
                        "{{ __('sentence.february') }}",
                        "{{ __('sentence.march') }}",
                        "avril",
                        "{{ __('sentence.may') }}",
                        "{{ __('sentence.june') }}",
                        "juillet",
                        "{{ __('sentence.august') }}",
                        "{{ __('sentence.september') }}",
                        "{{ __('sentence.october') }}",
                        "{{ __('sentence.november') }}",
                        "{{ __('sentence.december') }}",
                    ], {
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: "55%",
                                endingShape: "rounded",
                                borderRadius: 12,
                            },
                        },
                        yaxis: {
                            tickAmount: 8,
                            title: {
                                text: "Per Month",
                                style: {
                                    color: "#525050",
                                    fontSize: "20px",
                                    fontFamily: "Cabin, sans-serif",
                                    fontWeight: 600,
                                },
                            },
                        },
                        fill: {
                            colors: ["#008FFB", "#90C1E7", "#D1E3F1"],
                        },
                        legend: {
                            fontSize: "14px",
                            fontFamily: "Cabin, sans-serif",
                            fontWeight: 600,
                            labels: {
                                colors: "#525050",
                            },
                            markers: {
                                fillColors: ["#008FFB", "#90C1E7", "#D1E3F1"],
                                radius: 12,
                            },
                            itemMargin: {
                                horizontal: 30,
                                vertical: 0
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log(error);
                },
            });
        </script>
    @endpush

</x-layout>
