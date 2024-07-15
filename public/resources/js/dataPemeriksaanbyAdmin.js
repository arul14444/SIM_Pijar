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
    const fullUrlPendengaran = uuid ? `${apiUrlPendengaran}/${uuid}` : `${apiUrlPendengaran}`; // Membuat URL lengkap dengan UUID jika uuid tidak null, jika null maka menggunakan apiUrlPendengaran saja

    try {
        const response = await fetch(fullUrlPendengaran);
        const data = await response.json();
        console.log(data, 'res data');

        processDataForTable(data);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
async function processDataForTable(data){
    const tableBody = document.querySelector('#tabelRiwayat tbody');
    tableBody.innerHTML = '';
    data.forEach((user, index) => {
        const row = tableBody.insertRow();
      
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        const cell3 = row.insertCell(2);
        const cell4 = row.insertCell(3);
        const cell5 = row.insertCell(4); 
        const cell6 = row.insertCell(5); 
        const cell7 = row.insertCell(6); 

        cell1.textContent = user.nama_lengkap;
        cell2.textContent = user.tgl_pemeriksaan;
        cell3.textContent = user.kemampuan_kiri;
        cell4.textContent = user.kemampuan_kanan;
        cell5.textContent = user.kemampuan_binaural;

        // Tampilkan tautan file hasil test
        const fileLink = document.createElement('a');
        fileLink.href = 'http://127.0.0.1:8000/' + user.path_file_hasil_test; // Menggunakan appUrl yang telah ditetapkan sebelumnya
        fileLink.target = "_blank"; // Buka tautan di tab baru
        fileLink.textContent = user.nama_file_hasil_test; // Menampilkan tautan
        cell6.appendChild(fileLink);
        cell6.style.display = "table-cell"
        
        // Buat tombol edit
        const editButton = document.createElement('button');

        editButton.innerHTML = '<i class="fa-regular fa-pen-to-square ml-2"></i>';
        editButton.title = 'Edit'; // Add tooltip text for edit button
        editButton.classList.add('btn', 'btn-primary', 'mr-2');
        editButton.addEventListener('click', () => editRow(user)); // Ganti editRow dengan fungsi yang sesuai
        
        // Buat tombol delete
        const deleteButton = document.createElement('button');
        deleteButton.style.marginLeft= '5px';
        deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
        deleteButton.title = 'Delete'; // Add tooltip text for delete button
        deleteButton.classList.add('btn', 'btn-danger',);
        deleteButton.addEventListener('click', () => confirmDelete(user.uuid)); // Ganti confirmDelete dengan fungsi yang sesuai
        
        // Buat elemen spasi
        const spacer = document.createElement('span');
        spacer.textContent = ' ';

        var actionButton = document.createElement('div');
            actionButton.classList.add("d-flex");
            actionButton.classList.add("justify-content-center");
            actionButton.classList.add("align-items-center");

        console.log(editButton);

        actionButton.appendChild(editButton);
        actionButton.appendChild(deleteButton);


        // console.log(actionButton);

        
        // Masukkan tombol dan elemen spasi ke dalam sel
        cell7.appendChild(actionButton);
        // cell7.appendChild(deleteButton);
    })
    
    new simpleDatatables.DataTable('#tabelRiwayat');;
}





function editRow(user) {
    // Fungsi yang akan dijalankan saat tombol edit diklik
    // Lakukan operasi pengeditan sesuai kebutuhan, misalnya:
    // Redirect ke halaman edit dengan menggunakan UUID user
    window.location.href = `/hasil-pemeriksaan-pendengaran/edit/${user.uuid}`;
}

function confirmDelete(uuid) {
    // Fungsi konfirmasi penghapusan
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        // Jika user menekan OK, lakukan penghapusan dengan mengirimkan permintaan HTTP DELETE
        fetch(`/hasil-pemeriksaan-pendengaran/delete/${uuid}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal menghapus data');
            }
            // Jika berhasil, tampilkan respons JSON
            return response.json();
        })
        .then(data => {
            let responseMessage = document.getElementById('responseMessage');
            responseMessage.innerText = data.message;
            responseMessage.style.color = 'white';
    
            if (data.success) {
                document.getElementById('responseMessage').style.backgroundColor = '#d1e7de';
                responseMessage.style.color = '#135435';
            } else {
                responseMessage.style.color = '#842129';
                document.getElementById('responseMessage').style.backgroundColor = '#f8d7db';
            }
    
            setTimeout(function() {
                responseMessage.innerText = '';
                responseMessage.style.backgroundColor = 'white';
                location.reload(); 
            }, 2000);
            
        })
        .catch(error => {
            console.error('Error:', error);
            // Tampilkan pesan kesalahan jika terjadi masalah saat menghapus data
            alert('Terjadi kesalahan saat menghapus data.');
        });
    }
}




