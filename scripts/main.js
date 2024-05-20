let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll  = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

var swiper = new Swiper(".home-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  loop:true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


let loadMoreBtn = document.querySelector('.helpers .load-more .btn');
let currentItem = 3;

loadMoreBtn.onclick = () => {
  let boxes = [...document.querySelectorAll('.helpers .box-container .box')];
  for(let i = currentItem; i < currentItem + 3; i++){
    boxes[i].style.display = 'inline-block';
  };
  currentItem += 3;
  if(currentItem >= boxes.length){
    loadMoreBtn.style.display = 'none';
  }
}

function sendEmail(){
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