const apiUrlPendengaran = 'http://127.0.0.1:8000/get/pendengaran-anak';
var myChart;

function getUuid() {
    var selectedOption = document.getElementById("inputAnak").value;
    console.log(selectedOption);
    return selectedOption; // Mengembalikan nilai yang dipilih
}

document.addEventListener('DOMContentLoaded', () => {
    const selectAnak = document.getElementById('inputAnak');

    selectAnak.addEventListener('change', () => {
        getData();
    });
    getData();

})

async function getData(){
    const uuid = getUuid(); // Mendapatkan nilai UUID
    const fullUrlPendengaran = `${apiUrlPendengaran}/${uuid}`; // Membuat URL lengkap dengan UUID

    try {
        const response = await fetch(fullUrlPendengaran);
        const data = await response.json();
        console.log(data, 'res data');
        // Data yang diperoleh dari API siap untuk digunakan
        // Memproses data untuk dibuat menjadi line chart
        processDataForChart(data);
        processDataForTable(data);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
function processDataForTable(data){
    const tableBody = document.querySelector('#tabelRiwayat tbody');
    tableBody.innerHTML = '';
    data.forEach((user, index) => {
     
        const row = tableBody.insertRow();
      
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        const cell3 = row.insertCell(2);
        const cell4 = row.insertCell(3);
      
        cell1.textContent = user.tgl_pemeriksaan;
        cell2.textContent = user.kemampuan_kanan
        cell3.textContent = user.kemampuan_kiri;
        cell4.textContent = user.kemampuan_binaural;
      });
}
function processDataForChart(data) {
    // Memproses data untuk line chart
    var labels = ''; // Label untuk sumbu x (tgl_pemeriksaan)
    var kemampuanKanan = ''; // Data untuk garis kemampuan kanan
    var kemampuanKiri = ''; // Data untuk garis kemampuan kiri
    var kemampuanBinaural = ''; // Data untuk garis kemampuan binaural

    if (data.length > 0) {
        labels = [];
        kemampuanKanan = [];
        kemampuanKiri = [];
        kemampuanBinaural = [];
    
        // Loop through each element in the data array
        data.forEach(item => {
            labels.push(item.tgl_pemeriksaan);
            kemampuanKanan.push(item.kemampuan_kanan);
            kemampuanKiri.push(item.kemampuan_kiri);
            kemampuanBinaural.push(item.kemampuan_binaural);
        });
    }
    

    if (myChart){
        myChart.destroy();
    }

    // Memanggil fungsi untuk membuat line chart dengan data yang diproses
    createLineChart(labels, kemampuanKanan, kemampuanKiri, kemampuanBinaural);
}

function createLineChart(labels, dataKanan, dataKiri, dataBinaural) {
    var ctx = document.getElementById('chartPendengaran').getContext('2d');
    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels, // Label sumbu x (tgl_pemeriksaan)
            datasets: [{
                label: 'Kemampuan Dengar Kanan',
                data: dataKanan,
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Kemampuan Dengar Kiri',
                data: dataKiri,
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Kemampuan Dengar Binaural',
                data: dataBinaural,
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 2,
                fill: false
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
    myChart.update();
}
