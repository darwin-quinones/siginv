
    function Success() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Guardado exitosamente',
            showConfirmButton: false,
            timer: 3000
          })
    }

    function error(){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'No se pudo guardar',
            showConfirmButton: false,
            timer: 3000
          })
    }
    function ErrorEdit(){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'No se pudo editar',
            showConfirmButton: false,
            timer: 3000
          })
    }

    function FillData() {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Por favor llene los campos ',
            showConfirmButton: false,
            timer: 1000
        })
    }

    function Edit() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Actualizado exitosamente',
            showConfirmButton: false,
            timer: 3000
        })

    }

    function Delete(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Eliminado exitosamente',
            showConfirmButton: false,
            timer: 3000
        })
    }
    function ErrorDelete(){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'No se pudo borrar',
            showConfirmButton: false,
            timer: 3000
          })
    }

    function Existe(){
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'EL DATO YA EXISTE',
            showConfirmButton: false,
            timer: 2000
        })
    }


   


    