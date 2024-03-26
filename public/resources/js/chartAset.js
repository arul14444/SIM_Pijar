// Data
var canvas = document.getElementById('chartAset');
var tersedia = canvas.getAttribute('data-tersedia');
var tidakTersedia = canvas.getAttribute('data-tidakTersedia');
var rusak = canvas.getAttribute('data-rusak');
var perbaikan = canvas.getAttribute('data-perbaikan');

const apiUrl = 'http://127.0.0.1:8000/get/aset';
var kd_status= '';

document.addEventListener('DOMContentLoaded', () => {
    getDataAset();
})

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
    },
    onClick:async function(event,element){
        const labels = this.data.labels[element[0].index]
        getDataAset(labels);
        this.kd_status = await setKodeStatus(labels);
        console.log(this.kd_status, 'KD STATUS');
    }
};

// Create the chart
var ctx = canvas.getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});


 function  setKodeStatus(kode){
    switch (kode) {
        case 'Tersedia':
            return 'TER';
            break;
        case 'Rusak':
            return 'RSK';
            break;
        case 'Tidak Tersedia':
            return 'TDK';
            break;
        case 'Perbaikan':
            return 'DPR';
            break;
    
        default:
            return '';
            break;
    }
}

function reset() {
    this.kd_status = '';
    getDataAset();
}

// Fetch data from the API endpoint with query parameters
async function getDataAset(labels){
    this.kd_status = await setKodeStatus(labels);
    const queryParams = new URLSearchParams();
    queryParams.set('kd_status',this.kd_status || '' );
    let fullUrl = `${apiUrl}?${queryParams}`;
    fetch(fullUrl)
    .then(response => response.json())
    .then(data => {
    console.log(data);

    const tableBody = document.querySelector('#tabelAset tbody');
    tableBody.innerHTML = ''

    data.forEach((user, index) => {
     
      const row = tableBody.insertRow();

      const cell1 = row.insertCell(0);
      const cell2 = row.insertCell(1);
      const cell3 = row.insertCell(2);
      const cell4 = row.insertCell(3);

      cell1.textContent =  index+1,
      cell2.textContent = user.nama_barang;
      cell3.textContent = user.kode_barang;
      cell4.textContent = user.status;
    });

  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });
}