/*
-------------------------------------------
    : Custom - Dashboard Hospital js :
-------------------------------------------
*/
"use strict";
$(document).ready(function() {    
    /* -- Apex Line 1 Chart -- */
    var options = {        
        chart: {
          height: 100,
          type: 'line',
          toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        series: [{
          name: 'Likes',
          data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
          width: 3,
          curve: 'smooth'
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
            type: 'datetime',
            categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
            axisBorder: {
                show: false, 
                color: 'transparent'
            },
            axisTicks: {
                show: false, 
                color: 'transparent'
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientFromColors: [ '#1ba4fd'],
                gradientToColors: [ '#3dcd8b'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
        },
        markers: {
            size: 2,
            colors: ["#ffb129"],
            strokeColors: "#fff",
            strokeWidth: 1,
            hover: {
                size: 4,
            }
        },
    };
    var chart = new ApexCharts(document.querySelector("#apex-line-chart1"), options);
    chart.render();
    /* -- Apex Line 2 Chart -- */
    var options = {        
        chart: {
          height: 100,
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
          name: 'Likes',
          data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
          width: 3,
          curve: 'smooth'
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
            type: 'datetime',
            categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
            axisBorder: {
                show: false, 
                color: 'transparent'
            },
            axisTicks: {
                show: false, 
                color: 'transparent'
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientFromColors: [ '#1ba4fd'],
                gradientToColors: [ '#e75c62'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
        },
        markers: {
            size: 2,
            colors: ["#ffb129"],
            strokeColors: "#fff",
            strokeWidth: 1,
            hover: {
                size: 4,
            }
        },
    };
    var chart = new ApexCharts(document.querySelector("#apex-line-chart2"), options);
    chart.render();
    /* -- Apex Line 3 Chart -- */
    var options = {        
        chart: {
            height: 100,
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
          name: 'Likes',
          data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
          width: 3,
          curve: 'smooth'
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
            type: 'datetime',
            categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
            axisBorder: {
                show: false, 
                color: 'transparent'
            },
            axisTicks: {
                show: false, 
                color: 'transparent'
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientFromColors: [ '#1ba4fd'],
                gradientToColors: [ '#ffb129'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
        },
        markers: {
            size: 2,
            colors: ["#ffb129"],
            strokeColors: "#fff",
            strokeWidth: 1,
            hover: {
                size: 4,
            }
        },
    };
    var chart = new ApexCharts(document.querySelector("#apex-line-chart3"), options);
    chart.render();
    /* -- Apex Line Data Chart -- */
    var options = {        
        chart: {
            height: 330,
            type: 'line',
            dropShadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 0.2
            },
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#1ba4fd', '#3dcd8b'],
        series: [
            {
                name: "New - 2013",
                data: [28, 29, 33, 36, 32, 32, 33]
            },
            {
                name: "Recover - 2013",
                data: [12, 11, 14, 18, 17, 13, 13]
            }
        ],
        dataLabels: {
            enabled: true,
        },
        stroke: {
            width: 4,
            curve: 'smooth'
        },
        yaxis: {
            min: 5,
            max: 40
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
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
        markers: {
            size: 1
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
    };
    var chart = new ApexCharts(document.querySelector("#apex-line-data-chart"), options);
    chart.render();
    /* -- Apex Stacked Chart -- */
    var options = {        
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          }
        },
        colors: ['#1ba4fd', '#3dcd8b', '#ffb129', '#b8d1e1'],
        series: [{
          name: 'New',
          data: [44, 55, 41, 67, 22, 43]
        }, {
          name: 'Test',
          data: [13, 23, 20, 8, 13, 27]
        }, {
          name: 'OPD',
          data: [11, 17, 15, 15, 21, 14]
        }, {
          name: 'ICU',
          data: [21, 7, 25, 13, 22, 8]
        }],
        plotOptions: {
          bar: {
            horizontal: false,
          },
        },
        xaxis: {
          type: 'datetime',
          categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
            '01/05/2011 GMT', '01/06/2011 GMT'
          ],
        },
        legend: {
          position: 'bottom',
        },
        fill: {
          opacity: 1
        }
    };
    var chart = new ApexCharts(document.querySelector("#apex-stacked-chart"), options);
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
    /* -- Apex Circle Chart -- */
    var options = {
        series: [86, 74, 55, 93],
        chart: {
            height: 220,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                offsetY: 20,
                offsetX: 0,
                startAngle: 0,
                endAngle: 360,
                hollow: {
                  margin: 5,
                  size: '30%',
                  background: 'transparent',
                  image: undefined,
                },
                dataLabels: {
                  name: {
                    show: false,
                  },
                  value: {
                    show: false,
                  }
                }
            }
        },
        colors: ['#1ba4fd', '#3dcd8b', '#ffb129', '#b8d1e1'],
        labels: ['Happy', 'Satisfy', 'Sad', 'Angry'],
        legend: {
                show: true,
                floating: false,
                fontSize: '13px',
                position: 'right',
                offsetX: 0,
                offsetY: 50,
                labels: {
                useSeriesColors: false,
            },
            markers: {
                size: 0
            },
            formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
            },
            itemMargin: {
                horizontal: 3,
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false,
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#apex-circle-chart"), options);
    chart.render();
});