/*=============================================
REVISAR SI EL USUARIO YA ESTA REGISTRADO
=============================================*/
$("#nuevousuario").change(function() {
    
    let usuario = $(this).val();
    // console.log('object');
    let datos = new FormData();
    datos.append("validarUsuario", usuario);
    $.ajax({
        
        url:"utils/usuarios.ajax.php",
        method:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        success:function (respuesta) {
            //  console.log(JSON.parse(respuesta));
            if (respuesta != 'false') {
                
                $("#nuevousuario").parent().after('<div class="alert alert-warning m-2" style="margin:5px" >Este usuario ya existe en la base de datos</div>');
                $("#nuevousuario").val("");
                setTimeout(() => {
                    document.querySelector('.alert').remove();
                }, 3000);
                
            }
        }
    });
    
});