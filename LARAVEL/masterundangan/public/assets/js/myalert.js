  const setting_success = $('.setting_success').data('setting_success');
  const setting_failed = $('.setting_failed').data('setting_failed');

  const logout_success = $('.logout_success').data('logout_success');
  const login_success = $('.login_success').data('login_success');
  const login_failed = $('.login_failed').data('login_failed');

  const message_profile = $('.message_profile').data('message_profile');
  
  const message = $('.message').data('message');
  
  if(setting_success){
    Swal.fire({
        title: 'Success',
        text: setting_success,
        type: 'success',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  }

  if(setting_failed){
    Swal.fire({
        title: 'Failed',
        html: setting_failed,
        type: 'error',
        showConfirmButton: true,
      })
  }

  if(logout_success){
    Swal.fire({
        title: 'Success',
        text: 'Logout Successfully',
        type: 'success',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  }

  if(login_success){
    Swal.fire({
        title: 'Success',
        text: 'Login Successfully',
        type: 'success',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  }

  if(login_failed){
    Swal.fire({
        title: 'Alert',
        text: 'Incorrect username or password',
        type: 'error',
        showConfirmButton: true,
      })
  }

  if(message_profile){
    Swal.fire({
        title: 'Success',
        text: message_profile,
        type: 'success',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  }

  if(message){
    Swal.fire({
        title: ' ',
        html: message,
        type: 'success',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
  }

  function deleteConfirm(href,name){
    Swal.fire({
      title: 'Confirmation',
      html: 'Are you sure to delete <b>'+name+'</b> ?',
      type: 'question',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: true,
      confirmButtonText:'Yes, Sure!',
      cancelButtonText:'No, Cancel'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
  }

  function popUpConfirm(href,name,text){
    Swal.fire({
      title: 'Confirmation',
      html: 'Are you sure to '+text+' <b>'+name+'</b> ?',
      type: 'question',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: true,
      confirmButtonText:'Yes, Sure!',
      cancelButtonText:'No, Cancel'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
  }