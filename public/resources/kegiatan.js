document.getElementById('tambahKegiatan').addEventListener('submit', function(event) {
    event.preventDefault();
    fetch('/tambah/kegiatan', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        let responseMessage = document.getElementById('responseMessage');
        responseMessage.innerText = data.message;
        responseMessage.style.color = 'white';

        if (data.success) {
            document.getElementById('tambahKegiatan').reset();
            document.getElementById('responseMessage').style.backgroundColor = 'green';
        } else {
            document.getElementById('responseMessage').style.backgroundColor = 'red';
        }
    
        // Set timeout untuk menghilangkan pesan setelah 3 detik
        setTimeout(function() {
            responseMessage.innerText = '';
            document.getElementById('responseMessage').style.backgroundColor = 'white';
        }, 3000);
    })
});



