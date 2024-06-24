// time 
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    // var s = today.getSeconds();
    var ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12;
    h = h ? h : 12;
    m = checkTime(m);
    // s = checkTime(s);
    document.getElementById('txt').innerHTML =
        h + ":" + m + ' ' + ampm;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

// order chart
var options2 = {
  series: [{
    name: 'Daily',
    data: [2.15, 3, 1.5, 2, 2.4, 3, 2.4,
      2.8, 1.5, 1.7, 3, 2.50, 3, 2, 2.15, 3, 1.10
    ]
  },
  {
    name: 'Weekly',
    data: [-2.15, -3, -1.5, -2, -2.4, -3, -2.4,
    -2.8, -1.5, -1.7, -3, -2.50, -3, -2, -2.15, -3, -1.10
    ]
  },
  {
    name: 'Monthly',
    data: [-2.25, -2.35, -2.45, -2.55, -2.65, -2.75, -2.85,
    -2.95, -3.00, -3.10, -3.20, -3.25, -3.10, -3.00, -2.95, -2.85, -2.75
    ]
  },
  {
    name: 'Yearly',
    data: [2.25, 2.35, 2.45, 2.55, 2.65, 2.75, 2.85,
    2.95, 3.00, 3.10, 3.20, 3.25, 3.10, 3.00, 2.95, 2.85, 2.75
    ]
  }
  ],
  chart: {
    type: 'bar',
    width: 180,
    height: 120,
    stacked: true,
    toolbar: {
      show: false
    },
  },
  plotOptions: {
    bar: {
      vertical: true,
      columnWidth: '40%',
      barHeight: '80%',
      startingShape: 'rounded',
      endingShape: 'rounded'
    },
  },
  colors: [ CubaAdminConfig.primary , CubaAdminConfig.primary , "#F2F3F7", "#F2F3F7"],
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 0,
  },
  legend: {
    show: false,
  },
  grid: {
    xaxis: {
        offsetX: -2,
      lines: {
        show: false
      }
    },
    yaxis: {
      lines: {
        show: false
      }
    },
  },
  yaxis: {
    min: -5,
    max: 5,
    show: false,
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false,
    },
    
  },
  tooltip: {
    shared: false,
    x: {
          show: false,
      },
      y: {
          show: false,
      },
      z: {
          show: false,
      },
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug',
      'Sep', 'Oct', 'Nov', 'Dec'
    ],
    offsetX: 0,
    offsetY: 0,
    labels: {
      offsetX: 0,
    offsetY: 0,
      show: false
    },
    axisBorder: {
        offsetX: 0,
    offsetY: 0,
      show: false
    },
    axisTicks: {
        offsetX: 0,
    offsetY: 0,
      show: false
    }

  },
  responsive: [{
          breakpoint: 1760,
          options: {
            chart: {
              width: 160,
            }
          },
        },
        {
          breakpoint: 1601,
          options: {
            chart: {
              height: 110,
            }
          },
        },
        {
          breakpoint: 1560,
          options: {
            chart: {
              width: 140,
            }
          },
        },
        {
          breakpoint: 1460,
          options: {
            chart: {
              width: 120,
            }
          },
        },
        {
          breakpoint: 1400,
          options: {
            chart: {
              width: 290,
            }
          },
        },
        {
          breakpoint: 1110,
          options: {
            chart: {
              width: 200,
            }
          },
        },
        {
          breakpoint: 700,
          options: {
            chart: {
              width: 150,
            }
          },
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              width: 220,
            }
          },
        },
        {
          breakpoint: 420,
          options: {
            chart: {
              width: 150,
            }
          },
        },
      ]
};

var chart2 = new ApexCharts(document.querySelector("#orderchart"),
  options2
);

chart2.render();