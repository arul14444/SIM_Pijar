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

    // Mendapatkan elemen dengan ID "responseMessage"
    var responseMessage = document.getElementById("responseMessage");

    // Mengatur warna teks menjadi putih
    responseMessage.style.color = 'white';

    // Membuat fungsi untuk reset timeout
    function resetTimeout() {
        // Menghapus timeout yang ada
        clearTimeout(timeoutId);
        // Menjadwalkan ulang timeout
        timeoutId = setTimeout(function() {
            // Menghapus teks pesan
            responseMessage.innerText = '';
            // Mengatur warna latar belakang kembali ke putih
            responseMessage.style.backgroundColor = 'white';
        }, 4000);
    }

    // Memulai observer untuk memantau perubahan pada class responseMessage
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class' && mutation.target === responseMessage) {
                // Jika terjadi perubahan pada class responseMessage, reset timeout
                resetTimeout();
            }
        });
    });

    // Konfigurasi observer
    var config = { attributes: true, subtree: false };

    // Mulai observer dengan mengamati responseMessage
    observer.observe(responseMessage, config);

    // Set timeout ID
    var timeoutId = setTimeout(function() {
        // Menghapus teks pesan
        responseMessage.innerText = '';
        // Mengatur warna latar belakang kembali ke putih
        responseMessage.style.backgroundColor = 'white';
    }, 5000);
});
