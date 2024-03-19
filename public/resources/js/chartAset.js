// Data
var canvas = document.getElementById('chartAset')
var tersedia = canvas.getAttribute('data-tersedia')
var tidakTersedia = canvas.getAttribute('data-tidakTersedia')
var rusak = canvas.getAttribute('data-rusak')
var perbaikan = canvas.getAttribute('data-perbaikan')

var data = {
    labels: ['Tersedia', 'Tidak Tersedia', 'Rusak','Perbaikan'],
    datasets: [{
        data: [tersedia, tidakTersedia, rusak, perbaikan],
        backgroundColor: [
            'rgba(54, 162, 235, 0.5)', // Biru
            'rgba(255, 99, 132, 0.5)', // Merah
            'rgba(255, 206, 86, 0.5)', // Kuning
            'rgba(75, 192, 192, 0.5)' // Hijau
        ],
        borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
    }]
};

// Options
var options = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        position: 'bottom'
    }
};

// Create the chart
var ctx = canvas.getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});