// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var baseUrl = window.location.origin + '/laundrysaya/';
var url = baseUrl + 'index.php/laporanpesanan/chartindex';
var bulan = [];
var total = [];

function convertToRupiah(angka) {
  var rupiah = '';
  var angkarev = angka.toString().split('').reverse().join('');
  for (var i = 0; i < angkarev.length; i++)
    if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
  return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

$.get({
  url: url,
  async: false,
  success: function (res) {
    var data = JSON.parse(res);
    for (var i = 0; i < data.length; i++) {
      bulan.push(data[i].BULAN);
      total.push(data[i].TOTAL);
    }
  }
});

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: bulan,
    datasets: [{
      label: "Pendapatan",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: total
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 10
        },
        maxBarThickness: 40,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: Math.max.apply(null, total),
          maxTicksLimit: 4,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function (value, index, values) {
            return convertToRupiah(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function (tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + convertToRupiah(tooltipItem.yLabel);
        }
      }
    },
  }
});

