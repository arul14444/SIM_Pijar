document.getElementById('tambahAnggota').addEventListener('submit', function(event) {
    event.preventDefault();
    fetch('/tambah/anggota', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        let responseMessage = document.getElementById('responseMessage');
        responseMessage.innerText = data.message;
        responseMessage.style.color = 'white';

        if (data.success) {
            document.getElementById('tambahTanggota').reset();
            document.getElementById('responseMessage').style.backgroundColor = 'green';
        } else {
            document.getElementById('responseMessage').style.backgroundColor = 'red';
        }
        setTimeout(function() {
            responseMessage.innerText = '';
            document.getElementById('responseMessage').style.backgroundColor = 'white';
        }, 3000);
    })
});



