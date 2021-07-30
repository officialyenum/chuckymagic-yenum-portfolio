/*
----------------------------------------------
    : Custom - Dashboard CRM js :
----------------------------------------------
*/
"use strict";
$(document).ready(function() {    
    
    /* -----  Apex Line1 Chart ----- */
    var options = {
        chart: {
            height: 150,
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
            width: 4
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
        document.querySelector("#apex-line-chart1"),
        options
    );
    chart.render();

    /* -----  Apex Line2 Chart ----- */
    var options = {
        chart: {
            height: 150,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#3dcd8b'],
        series: [{
            data: [50, 60, 40, 60, 67, 61, 62, 82, 103, 84, 54, 65]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 4
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
        document.querySelector("#apex-line-chart2"),
        options
    );
    chart.render();

    /* -----  Apex Line3 Chart ----- */
    var options = {
        chart: {
            height: 150,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#b8d1e1'],
        series: [{
            data: [50, 60, 40, 60, 67, 61, 62, 82, 103, 84, 54, 65]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 4
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
        document.querySelector("#apex-line-chart3"),
        options
    );
    chart.render();

    /* -- Apex Circle Chart -- */
    var options = {
      series: [86, 74, 55, 93],
      chart: {
      height: 300,
      type: 'radialBar',
    },
    plotOptions: {
      radialBar: {
        offsetY: 0,
        startAngle: 0,
        endAngle: 270,
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
    labels: ['Proposed', 'Active', 'Process', 'On Hold'],
    legend: {
      show: true,
      floating: true,
      fontSize: '16px',
      position: 'left',
      offsetX: 0,
      offsetY: 0,
      labels: {
        useSeriesColors: true,
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
            show: false
        }
      }
    }]
    };

    var chart = new ApexCharts(document.querySelector("#apex-circle-chart"), options);
    chart.render();

    /* -- Apex Horizontal Bar Chart -- */
    var options = {
        chart: {
          type: 'bar',
          height: 285,
          toolbar: {
            show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#1ba4fd', '#3dcd8b'],
        series: [{
          data: [44, 55, 41, 64, 22, 43, 21]
        }, {
          data: [53, 32, 33, 52, 13, 44, 32]
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },  
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        }, 
        legend: {
            show: false
        },
        plotOptions: {
          bar: {
            horizontal: true,
            dataLabels: {
              position: 'top',
            },
          }
        },
        xaxis: {
            categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#apex-horizontal-bar-chart"), options);
        chart.render();

    /* -- User Slider -- */
    $('.user-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="ri-arrow-left-s-line"></i>',
        nextArrow: '<i class="ri-arrow-right-s-line"></i>'
    });

});