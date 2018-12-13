


function ingreso(event) {
    var identificacion = document.getElementById("identificacion").value;
    var clave = document.getElementById("inputPassword").value;
    console.log("Identificacion", identificacion)
    console.log("Contraseña", clave)

    $.ajax({
        type: "GET",
        contentType: "application/json",
        url: "php/conexiones/usuario.php",
        dataType: "json",
        async: false,
        success: function(c) {
            console.log("Success de Usuario", c);
            var clientes = this.getModel("result");
            clientes.setProperty("/clientes/", []);
            console.log("Clientes", clientes);

            for (var i = 0; i < data.length; i++) {
                let status = data[i].client_status;
                clientes.setProperty("/clientes/" + pos, data[i]);
                /*console.log("Status", status);
                if (status == sts) {
                    clientes.setProperty("/clientes/" + pos, data[i]);
                    pos ++
                }*/pos ++
            }
        },
        error: function(request, status, error) {
            console.log("Error");
        }
    });
}
