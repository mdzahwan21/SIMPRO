// modal.js

document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen tombol yang akan membuka modal
    const openModalButton = document.getElementById('openModalButton');

    // Ambil elemen modal
    const modal = document.getElementById('cek-IRS');

    // Tambahkan event listener untuk membuka modal ketika tombol diklik
    openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Tambahkan event listener untuk menutup modal
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Fungsi untuk menutup modal jika tombol close diklik
    const closeButton = modal.querySelector('.absolute.top-3.right-2.5');
    closeButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
});
