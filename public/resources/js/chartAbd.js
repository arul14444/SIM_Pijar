// Data
var canvas = document.getElementById('chartKepemilikan')
var punya = canvas.getAttribute('data-punya')
var tidakPunya = canvas.getAttribute('data-tidakPunya')

var data = {
    labels: ['Memiliki ABD', 'Tidak Memiliki ABD'],
    datasets: [{
        data: [punya, tidakPunya],
        backgroundColor: [
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 99, 132, 0.5)'
        ],
        borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)'
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