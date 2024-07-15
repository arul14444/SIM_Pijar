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
        if (uuid) {
            const response = await fetch(fullUrlPendengaran);
            const data = await response.json();
            console.log(data, 'res data');

            processDataForTable(data);
        } else {
            const data = null;
            processDataForTable(data);
        }
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
        const cell5 = row.insertCell(4); // Tambahkan sel untuk tautan file
        const cell6 = row.insertCell(5); // Tambahkan sel untuk tombol aksi
      
        cell1.textContent = user.tgl_pemeriksaan;
        cell2.textContent = user.kemampuan_kanan;
        cell3.textContent = user.kemampuan_kiri;
        cell4.textContent = user.kemampuan_binaural;

        // Tampilkan tautan file hasil test
        const fileLink = document.createElement('a');
        fileLink.href = 'http://127.0.0.1:8000/' + user.path_file_hasil_test; // Menggunakan appUrl yang telah ditetapkan sebelumnya
        fileLink.target = "_blank"; // Buka tautan di tab baru
        fileLink.textContent = user.nama_file_hasil_test; // Menampilkan tautan
        cell5.appendChild(fileLink);
        
        // Buat tombol edit
        const editButton = document.createElement('button');
        editButton.innerHTML = '<i class="fa-regular fa-pen-to-square"></i>';
        editButton.classList.add('btn', 'btn-primary', 'mr-2');
        editButton.addEventListener('click', () => editRow(user)); // Ganti editRow dengan fungsi yang sesuai
        
        // Buat tombol delete
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
        deleteButton.classList.add('btn', 'btn-danger');
        deleteButton.addEventListener('click', () => confirmDelete(user.uuid)); // Ganti confirmDelete dengan fungsi yang sesuai
        
        // Buat elemen spasi
        const spacer = document.createElement('span');
        spacer.textContent = ' ';
        
        // Masukkan tombol dan elemen spasi ke dalam sel
        cell6.appendChild(editButton);
        cell6.appendChild(deleteButton);
    });
    new simpleDatatables.DataTable('#tabelRiwayat');

}





function editRow(user) {
    // Fungsi yang akan dijalankan saat tombol edit diklik
    // Lakukan operasi pengeditan sesuai kebutuhan, misalnya:
    // Redirect ke halaman edit dengan menggunakan UUID user
    window.location.href = `/hasil-pemeriksaan/edit/${user.uuid}`;
}

function confirmDelete(uuid) {
    // Fungsi konfirmasi penghapusan
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        // Jika user menekan OK, lakukan penghapusan dengan mengirimkan permintaan HTTP DELETE
        fetch(`/hasil-pemeriksaan/delete/${uuid}`, {
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



