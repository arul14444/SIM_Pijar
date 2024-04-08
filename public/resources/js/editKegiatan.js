function confirmEdit(uuid) {
    if (confirm('Apakah Anda yakin ingin menyimpan perubahan data kegiatan?')) {
        fetch(`/edit/kegiatan/${uuid}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                nama_kegiatan: document.getElementById('inputNamaKegiatan').value,
                deskripsi: document.getElementById('inputDeskripsi').value,
                lokasi: document.getElementById('inputLokasi').value,
                tanggal: document.getElementById('inputTanggal').value,
                sumber_dana: document.getElementById('sumber_dana').value
            })
        })
        .then(response => response.json())
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    }
}
