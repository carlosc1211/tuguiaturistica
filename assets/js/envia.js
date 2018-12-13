function enviar(){
    // Mustro un mensaje que se esta enviando la data
    document.getElementById("mensaje").innerHTML = "<h3 style=color:red>Enviando Datos.... Por Favor Espere!<h3/>";
                      
    var ElementoRemover= document.getElementById('BotonSend'); // Quito el Boton Enviar
    //ElementoRemover.remove;
    ElementoRemover.removeAttributeNode;
    padre = ElementoRemover.parentNode;
    padre.removeChild(ElementoRemover);
   
    // envio del formulario
    formulario.action='contacto_new.php'; // Defino el action
    formulario.method='post'; // Defino el metodo de envio
    formulario.submit(); // Envio los datos
}