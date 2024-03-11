window.addEventListener('alert',(event)=>{
    let data=event.detail
    const Toast = Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 300000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        iconHtml: data.icon,
        title: data.title,
        position: data.position,
        width:'550px',
        grow:'row',
        customClass: {
            icon: 'alert-icon',
            title: 'alert-title',
            popup: 'alert-popup',
        },
    });
})
