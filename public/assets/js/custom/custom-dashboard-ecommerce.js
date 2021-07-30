/*
-------------------------------------------
    : Custom - Dashboard Ecommerce js :
-------------------------------------------
*/
"use strict";
$(document).ready(function() {
	/* -----  Apex Area Chart ----- */
    var options = {
        chart: {
            height: 265,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
              type: 'x',
              enabled: false,
              autoScaleYaxis: true
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
        },
        colors: ['#1ba4fd', '#ebebf6'],
        series: [{
            name: 'Inward',
            data: [50, 40, 80, 60, 67, 41, 62, 72, 125, 100, 70, 75]
        }, {
            name: 'Outward',
            data: [11, 32, 45, 32, 34, 75, 70, 85, 32, 45, 32, 34]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-area-chart"),
        options
    );
    chart.render();
    /* -- Apex Pie Chart -- */
    var options = {
        chart: {
            type: 'donut',
            width: 250,
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "80%"
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#1ba4fd','#3dcd8b','#ebebf6'],
        series: [60, 45, 25],
        labels: ['Book', 'Clothing', 'Food'],
        legend: {
            show: true,
            position: 'bottom'
        },
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-pie-chart"),
        options
    );        
    chart.render();

    /* -- Orders Country Slider -- */
    $('.orders-country-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="feather icon-chevron-left"></i>',
        nextArrow: '<i class="feather icon-chevron-right"></i>'
    });

    /* -----  Apex Bar Chart ----- */
    var options = {
        chart: {
            height: 300,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '25%',
                endingShape: 'rounded'  
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: ['#1ba4fd', '#ebebf6'],
        series: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58, 40, 62]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 48, 42]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-bar-chart"),
        options
    );
    chart.render();

    /* -----  Apex Line Chart ----- */
    var options = {
        chart: {
            height: 195,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#1ba4fd'],
        series: [{
            data: [50, 60, 40, 60, 67, 61, 62, 82, 103, 84, 54, 65]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 5
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'transparent'
        },
        yaxis: {
            labels: {
                show: false
            },
            min: 0
        },
        xaxis: {
            labels: {
                show: false
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: {
                show: false, 
                color: 'transparent'
            },
            axisTicks: {
                show: false, 
                color: 'transparent'
            }
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-line-chart"),
        options
    );
    chart.render();

});