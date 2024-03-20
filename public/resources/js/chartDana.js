// Mendapatkan referensi ke elemen canvas
var ctx = document.getElementById('chartSumberDana').getContext('2d');

// Membuat data untuk diagram
var data = {
    labels: ['Pemerintah', 'Kas', 'Iuran', 'Sponsor', 'Donatur'],
    datasets: [{
        data: Object.values(sumberDana), // Mengambil nilai dari objek sumberDana
        backgroundColor: [
            'rgba(54, 162, 235, 0.5)', // Biru
            'rgba(255, 99, 132, 0.5)', // Merah
            'rgba(255, 206, 86, 0.5)', // Kuning
            'rgba(75, 192, 192, 0.5)', // Hijau
            'rgba(153, 102, 255, 0.5)' // Ungu
        ],
        borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
    }]
};

// Opsi untuk diagram
var options = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        position: 'bottom'
    }
};

// Membuat diagram pie
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});
