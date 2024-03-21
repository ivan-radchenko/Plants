window.addEventListener('alert',(event)=>{
    let data=event.detail
    const Toast = Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
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
