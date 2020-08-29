const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
const flashData = $('.flash-data').data('flashdata');
console.log(flashData);
if (flashData === "Anda Berhasil Masuk") {
    // Swal.fire({
    //     icon: 'success',
    //     title: 'Selamat Datang',
    //     text: 'Anda Berhasil Masuk Sistem Informasi Kepegawaian',
    //     footer: '<a href>PTA Jawa Barat</a>'
    // })
    Toast.fire({
        icon: 'success',
        title: 'Selamat datang di Sistem Informasi Kepegawaian PTA Jawa Barat'
    })
} else if (flashData === "Tambah") {

    Swal.fire({
        icon: 'success',
        title: 'Tambah Data',
        text: 'Data Telah Berhasil Ditambahkan'
    })
} else if (flashData === "Ubah") {
    Swal.fire({
        icon: 'success',
        title: 'Ubah Data',
        text: 'Data Telah Berhasil Diubah'
    })
} else if (flashData === "Hapus") {
    Swal.fire({
        icon: 'success',
        title: 'Hapus Data',
        text: 'Data Telah Berhasil Dihapus'
    })
}