paypal.Buttons().render('#idpay');


function email() {

    var email = document.getElementById("email").value;
    var repemail = document.getElementById("repitemail").value;
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if (!pattern.test(email)) {
        document.getElementById("a_email").innerHTML = "Email: Error, debes introducir un email valido";
    } else {
        document.getElementById("a_email").innerHTML = "";
    }
}



function validarDNI() {
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var dni = document.getElementById('iden').value;
    var numeros = parseInt(dni.substr(0, 8));
    var tmp = dni.substr(8);
    var letra = tmp.toUpperCase();

    var resto = numeros % 23;

    if (letras[resto] != letra) {
        alert("DNI incorrecto, introduzcalo de nuevo")
    }
}