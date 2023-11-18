window.addEventListener("closeModel", event => {
    $(".closeModal").remove();
    $('.modal-backdrop').remove();
});


//Success Message Dialog 

window.addEventListener('MSGSuccessfull', event => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Section Inserted Successfully'
      })
});


window.addEventListener('MSGSuccessfullupdate', event => {
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
      title: 'Section Updated Successfully'
    })
});



window.addEventListener('Swal:DeletedRecord', event => {
  Swal.fire({
    title: 'Are you sure you want to delete this section: ' + event.detail[0].section_name + '?',
    text: event.detail[0].title,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      Livewire.dispatch('RecordDeleted',{section_id: event.detail[0].id});
      Swal.fire(
        'Deleted!:',
        'Your file has been deleted.',
        'success'
      )
      console.log(event.detail);
    }
  })
});


