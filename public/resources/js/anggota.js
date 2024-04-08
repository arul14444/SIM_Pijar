document.getElementById('tambahAnggota').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    tambahAnggota(formData);
});

function tambahAnggota(formData) {
    fetch('/tambah/anggota', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let responseMessage = document.getElementById('responseMessage');
        responseMessage.innerText = data.message;
        responseMessage.style.color = 'white';

        if (data.success) {
            document.getElementById('tambahAnggota').reset();
            document.getElementById('responseMessage').style.backgroundColor = '#d1e7de';
            responseMessage.style.color = '#135435';
        } else {
            responseMessage.style.color = '#842129';
            document.getElementById('responseMessage').style.backgroundColor = '#f8d7db';
        }
    
        setTimeout(function() {
            responseMessage.innerText = '';
            document.getElementById('responseMessage').style.backgroundColor = 'white';
        }, 3000);
    });
}



function confirmDelete(uuid) {

    if (confirm('Apakah Anda yakin ingin menghapus data anggota?')) {
        fetch(`/anggota/delete/${uuid}`, {
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
            console.error('Terjadi kesalahan:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    }
}



