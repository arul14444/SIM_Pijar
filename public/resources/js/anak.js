document.getElementById('tambahAnak').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    tambahAnak(formData);
});



function tambahAnak(formData) {
    fetch('/tambah/anak', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let responseMessage = document.getElementById('responseMessage');
        responseMessage.innerText = data.message;
        responseMessage.style.color = 'white';

        if (data.success) {
            document.getElementById('tambahAnak').reset();
            document.getElementById('responseMessage').style.backgroundColor = 'green';
        } else {
            document.getElementById('responseMessage').style.backgroundColor = 'red';
        }
    
        setTimeout(function() {
            responseMessage.innerText = '';
            document.getElementById('responseMessage').style.backgroundColor = 'white';
        }, 3000);
    });
}



function confirmDelete(uuid) {
    if (confirm('Apakah Anda yakin ingin menghapus data?')) {
        fetch(`/anak/delete/${uuid}`, {
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
            }, 3000);
            
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    }
}

// function editData(uuid, formData) {
//     fetch(`/anak/edit/${uuid}`, {
//         method: 'PUT',
//         body: formData,
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         }
//     })
//     .then(response => response.json())
//     .then(data => {
//         let responseMessage = document.getElementById('responseMessage');
//         responseMessage.innerText = data.message;
//         responseMessage.style.color = 'white';

//         if (data.success) {
//             document.getElementById('editAnak').reset();
//             responseMessage.style.backgroundColor = 'green';
//         } else {
//             responseMessage.style.backgroundColor = 'red';
//         }
    
//         setTimeout(function() {
//             responseMessage.innerText = '';
//             responseMessage.style.backgroundColor = 'white';
//         }, 3000);
//     })
//     .catch(error => {
//         console.error('Terjadi kesalahan:', error);
//         alert('Terjadi kesalahan: ' + error.message);
//     });
// }


