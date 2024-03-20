// Data
var canvas = document.getElementById('chartAset');
var tersedia = canvas.getAttribute('data-tersedia');
var tidakTersedia = canvas.getAttribute('data-tidakTersedia');
var rusak = canvas.getAttribute('data-rusak');
var perbaikan = canvas.getAttribute('data-perbaikan');

var data = {
    labels: ['Tersedia', 'Tidak Tersedia', 'Rusak', 'Perbaikan'],
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

// Menambahkan event listener untuk menangani klik pada bagian chart
// canvas.addEventListener('click', function(event) {
//     var activeElement = myPieChart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, true)[0];
//     if (activeElement) {
//         var kd_status;
//         switch (activeElement._index) {
//             case 0:
//                 kd_status = 'TER';
//                 break;
//             case 1:
//                 kd_status = 'TDK';
//                 break;
//             case 2:
//                 kd_status = 'RSK';
//                 break;
//             case 3:
//                 kd_status = 'DPR';
//                 break;
//             default:
//                 kd_status = null;
//                 break;
//         }
//         if (kd_status) {
//             // Lakukan permintaan HTTP ke endpoint dengan parameter kd_status
//             var xhr = new XMLHttpRequest();
//             xhr.open('GET', '/dashboard/admin?kd_status=' + kd_status, true);
//             xhr.onload = function() {
//                 if (xhr.status >= 200 && xhr.status < 300) {
//                     // Respons sukses
//                     var data = JSON.parse(xhr.responseText);
//                     console.log(data); // Lakukan sesuatu dengan data yang diterima
//                 } else {
//                     // Respons gagal
//                     console.error('Permintaan gagal. Status: ' + xhr.status);
//                 }
//             };
//             xhr.onerror = function() {
//                 console.error('Terjadi kesalahan saat melakukan permintaan.');
//             };
//             xhr.send();
//         }
//     }
// });
