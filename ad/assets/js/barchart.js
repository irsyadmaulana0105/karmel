    $(function() {
        // Get the data from dataChart.php for barChartSatu
        $.ajax({
            url: 'dataChart.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var areaData = data;
                if ($("#barChartSatu").length) {
                    var barChartSatuCanvas = $("#barChartSatu").get(0).getContext("2d");
                    var barChartSatu = new Chart(barChartSatuCanvas, {
                        type: 'bar',
                        data: areaData,
                        options: options
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        // Get the data from dataChart.php for barChart
        $.ajax({
            url: 'dataChart.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var areaData = data;
                if ($("#barChart").length) {
                    var barChartCanvas = $("#barChart").get(0).getContext("2d");
                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: areaData,
                        options: options
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
