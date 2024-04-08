window.addEventListener('DOMContentLoaded', event => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});

// Mendapatkan elemen dengan ID "responseMessage"
var responseMessage = document.getElementById("responseMessage");

// Mengatur warna teks menjadi putih
responseMessage.style.color = 'white';

// Mengatur penundaan selama 2 detik sebelum mengubah kembali pesan
setTimeout(function() {
    // Menghapus teks pesan
    responseMessage.innerText = '';
    // Mengatur warna latar belakang kembali ke putih
    responseMessage.style.backgroundColor = 'white';
}, 3000);



