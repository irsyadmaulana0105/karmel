$(function () {
    'use strict';
    
    // Ajax request untuk mendapatkan data dari PHP
    $.ajax({
      url: 'dataChart.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Data berhasil dimuat, sekarang Anda dapat membuat chart dengan menggunakan data ini
        var barData = {
          labels: ["Data 1", "Data 2", "Data 3", "Data 4", "Data 5", "Data 6", "Data 7", "Data 8"],
          datasets: [{
            label: 'jumlah klik',
            data: [
              data.data1,
              data.data2,
              data.data3,
              data.data4,
              data.data5,
              data.data6,
              data.data7,
              data.data8
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
          }]
        };
  
        // Membuat chart menggunakan data yang diperoleh dari PHP
        if ($("#barChart").length) {
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barData,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        }
      },
      error: function(xhr, status, error) {
        // Terjadi kesalahan saat memuat data
        console.error(error);
      }
    });
  });
  