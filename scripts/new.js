export function sendEmail(){
    Email.send({
      Host : "smtp.gmail.com",
      Username : "grandcare@gmail.com",
      Password : "password",
      To : 'grandcare@gmail.com',
      From : document.getElementById("email").value,
      Subject : "Solicitud de nuevo cuidador",
      Body : "Nombre: " + document.getElementById("name").value + "<br> Apellido: " + document.getElementById("surname").value + "<br> Email: " + document.getElementById("email").value + "<br> Teléfono: " + document.getElementById("phone").value + "<br> Interno: " + document.getElementById("intern").value + "<br> Fecha nac.: " + document.getElementById("birth").value
    }).then(
        message => alert("¡Formulario enviado correctamente!")
    );
}