document.getElementById('tambahDonatur').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    tambahDonatur(formData);
});

function tambahDonatur(formData) {
    fetch('/tambah/donatur', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let responseMessage = document.getElementById('responseMessage');
        responseMessage.innerText = data.message;
        responseMessage.style.color = 'white';

        if (data.success) {
            document.getElementById('tambahDonatur').reset();
            document.getElementById('responseMessage').style.backgroundColor = 'green';
        } else {
            document.getElementById('responseMessage').style.backgroundColor = 'red';
        }
    
        setTimeout(function() {
            responseMessage.innerText = '';
            document.getElementById('responseMessage').style.backgroundColor = 'white';
        }, 2000);
    });
}



function confirmDelete(uuid) {
    var name = document.getElementById('hapusData').getAttribute('data-name');
    if (confirm('Apakah Anda yakin ingin menghapus data donatur '+name+'?')) {
        fetch(`/donatur/delete/${uuid}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            let responseMessage = document.getElementById('responseMessage');
            responseMessage.innerText = data.message;
            responseMessage.style.color = 'white';
    
            if (data.success) {
                responseMessage.style.backgroundColor = 'green';
            } else {
                responseMessage.style.backgroundColor = 'red';
            }
    
            setTimeout(function() {
                responseMessage.innerText = '';
                responseMessage.style.backgroundColor = 'white';
                location.reload(); 
            }, 2000);
            
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    }
}



