        // Ambil data dari PHP dan ubah menjadi JavaScript array
        var data = 12;
        
        // Objek untuk memetakan angka bulan ke nama bulan
        var monthNames = {
            '01': 'Januari',
            '02': 'Februari',
            '03': 'Maret',
            '04': 'April',
            '05': 'Mei',
            '06': 'Juni',
            '07': 'Juli',
            '08': 'Agustus',
            '09': 'September',
            '10': 'Oktober',
            '11': 'November',
            '12': 'Desember'
        };

        // Inisialisasi array untuk label bulan dan total kegiatan
        var labels = [];
        var totals = [];
        
        // Loop melalui data dan tambahkan label bulan dan total kegiatan ke dalam array
        data.forEach(function(item) {
            // Ambil angka bulan dari data
            var month = item.bulan.substring(5, 7);
            // Ubah angka bulan menjadi nama bulan
            var monthName = monthNames[month];
            // Gabungkan nama bulan dengan tahun
            var label = monthName + ' ' + item.bulan.substring(0, 4);
            
            labels.push(label);
            totals.push(item.total);
        });
        
        // Membuat grafik menggunakan Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Kegiatan per Bulan',
                    data: totals,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });