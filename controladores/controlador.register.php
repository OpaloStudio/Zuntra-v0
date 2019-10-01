<script type="text/javascript">

    $(function () {
        $('#datetimepicker4').datetimepicker({
            viewMode: 'years',
            format: 'L'
        });
    });

    function registrar(){

        var nombre = document.getElementById('nombre').value;
        var telefono = document.getElementById('telefono').value;
        var email = document.getElementById('mail').value;
        var cumple = document.getElementById('cumpleaños').value;
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;

        var dia = cumple.substring(3,5);        
        var mes = cumple.substring(0,2);        
        var ano = cumple.substring(6);
        var age = 18;
        
        console.log(nombre);
        console.log(telefono);
        console.log(email);
        console.log(cumple);
        console.log(password);
        console.log(password2);
        console.log("Dia: "+dia);
        console.log("Mes: "+mes);
        console.log("Ano: "+ano);

        var mydate = new Date();
        mydate.setFullYear(ano, mes-1, dia);
        
        var currdate = new Date();
	    currdate.setFullYear(currdate.getFullYear() - age);
	    if ((currdate - mydate) < 0){
	    	alert("Necesitas ser mayor de edad para crear una cuenta");
	    }else{
            if(telefono.length == 10){
    
                if(password == password2){
                    document.getElementById("botonRegistrar").disabled = true;
                    $.ajax({
                        url: "modelos/modelo.registro.php",
                        type: "POST",
                        data: ({
                            nombre:nombre,
                            telefono:telefono,
                            email:email,
                            password:password,
                            cumple:cumple
                        }),
                        success: function(msg) {
                            console.log(msg);
                            switch(msg){
                                case 0:
                                    alert("El correo electrónico que introduciste ya está en uso, intenta con otro.");
                                    document.getElementById("botonRegistrar").disabled = false;
                                break;
                                
                                case 1:
                                    alert("Tu cuenta ha sido registrada exitosamente, ya puedes entrar a tu cuenta. Serás redirigido al inicio de sesión.");
                                    window.location.href = '?page=1&log=firstLog';
                                break;
        
                                case 'default':
                                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                                    document.getElementById("botonRegistrar").disabled = false;
                                    console.log(msg);
                                break;
                            }
                        },
                        dataType: "json"
                    });
                }else{
                    alert('El password que introduciste no coincide.');
                }
            }else{
                alert('El número tiene que ser de 10 dígitos');
            }
        }

        /* window.onbeforeunload = function() {
            return "Dude, are you sure you want to leave? Think of the kittens!";
        } */
    }
</script>
