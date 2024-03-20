function createChart(canvasId, chartType, labels, data) {
    var ctx = document.getElementById(canvasId).getContext('2d');
    var myChart = new Chart(ctx, {
        type: chartType,
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Kegiatan',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false, 
            aspectRatio: 1 
        }
    });
}

createChart('chartKegiatan', 'bar', labelKegiatan, dataKegiatan);