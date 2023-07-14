import Swal from 'sweetalert2';

    function toast(text = "", icon = "success") {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            icon: icon,
            title: text
        });
    }

    function alertDelete() {
        return new Promise((resolve, reject) => {
            Swal.fire({
                title: 'Hapus?',
                text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#616a71',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('confirmed');
                    resolve(true);
                }
            });
        });
    }

export default { toast, alertDelete };