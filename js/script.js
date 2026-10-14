
function prosesJelajahi(event) {
  event.preventDefault();
  
  let judul = document.getElementById("judul-utama");
  let desc = document.getElementById("deskripsi");
  
  judul.innerHTML = "Katalog Unit Konsol Siap Disewa!";
  desc.innerHTML = "Silakan login terlebih dahulu untuk melakukan pemesanan unit.";
  
  tampilkanToast();
}

function ubahTema() {
  let bodyElement = document.body;
  let sectionBawah = document.getElementById("section-bawah");
  let logoTeks = document.getElementById("logo-teks");
  let deskripsi = document.getElementById("deskripsi");
  let btnTema = document.getElementById("btn-tema");
  let navLinks = document.querySelectorAll(".nav-link");

  if (bodyElement.style.backgroundColor === "rgb(26, 26, 26)") {
    bodyElement.style.backgroundColor = "#f8f9fa";
    bodyElement.style.color = "#111";
    sectionBawah.style.backgroundColor = "#111111";
    sectionBawah.style.color = "#ffffff";
    logoTeks.style.color = "#000";
    deskripsi.style.color = "#555";
    btnTema.style.backgroundColor = "#fff";
    btnTema.style.color = "#000";
    btnTema.style.borderColor = "#000";
    
    navLinks.forEach(link => {
      link.style.color = "#111";
    });
  } else {

    bodyElement.style.backgroundColor = "#1a1a1a";
    bodyElement.style.color = "#ffffff";
    sectionBawah.style.backgroundColor = "#050505"; // Lebih gelap/pekat di bagian bawah
    sectionBawah.style.color = "#ffffff";
    logoTeks.style.color = "#ffffff";
    deskripsi.style.color = "#cccccc";
    btnTema.style.backgroundColor = "#ffffff";
    btnTema.style.color = "#1a1a1a";
    btnTema.style.borderColor = "#ffffff";
    
    navLinks.forEach(link => {
      link.style.color = "#ffffff";
    });
  }
}


function tampilkanToast() {
  let x = document.getElementById("snackbar");
  x.className = "show";
  
  setTimeout(function() {
    x.className = x.className.replace("show", "");
  }, 3000);
}