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
    navLinks.forEach(link => link.style.color = "#111");
  } else {
    bodyElement.style.backgroundColor = "#1a1a1a";
    bodyElement.style.color = "#ffffff";
    sectionBawah.style.backgroundColor = "#050505";
    sectionBawah.style.color = "#ffffff";
    logoTeks.style.color = "#ffffff";
    deskripsi.style.color = "#cccccc";
    btnTema.style.backgroundColor = "#ffffff";
    btnTema.style.color = "#1a1a1a";
    btnTema.style.borderColor = "#ffffff";
    navLinks.forEach(link => link.style.color = "#ffffff");
  }
}

function tampilkanToast() {
  let x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(() => { x.className = x.className.replace("show", ""); }, 3000);
}

function tampilkanSnackbar(pesan) {
    let x = document.getElementById("snackbar");
    if (!x) {
        x = document.createElement("div");
        x.id = "snackbar";
        document.body.appendChild(x);
    }
    x.innerText = pesan;
    x.className = "show";
    setTimeout(() => { x.className = x.className.replace("show", ""); }, 3000);
}

// Event: Inisialisasi Mouseover & Mouseout untuk semua kartu produk
function inisialisasiHalaman() {
    const cards = document.querySelectorAll(".product-card");
    cards.forEach(card => {
        card.addEventListener("mouseover", function() {
            this.style.borderColor = "#111";
            this.style.transform = "scale(1.03)";
        });
        card.addEventListener("mouseout", function() {
            this.style.borderColor = "transparent";
            this.style.transform = "scale(1)";
        });
    });
}

// Interaksi pilih produk dan Web Storage (localStorage)
function pilihProduk(namaProduk, harga, gambarSrc) {
    let catalogView = document.getElementById("catalog-view");
    let rentalSection = document.getElementById("rental-section");
    
    if (catalogView && rentalSection) {
        catalogView.style.display = "none";
        rentalSection.style.display = "block";
        document.getElementById("detail-img").src = gambarSrc;
        document.getElementById("detail-harga").innerText = `Rp. ${harga} (${namaProduk})`;
        
        let savedName = localStorage.getItem("NAMA_PENYEWA");
        if (savedName) {
            document.getElementById("rental-nama").value = savedName;
        }
    }
}

function kembaliKeKatalog() {
    document.getElementById("rental-section").style.display = "none";
    document.getElementById("catalog-view").style.display = "block";
}

function pilihDurasi(button, durasi) {
    let buttons = document.querySelectorAll(".duration-btn");
    buttons.forEach(btn => btn.classList.remove("active"));
    button.classList.add("active");
}

// Asynchronous & Promise (Simulasi server)
function simpanDataKeServer(dataTransaksi) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let sukses = true;
            if (sukses) {
                resolve("Transaksi berhasil diproses oleh server!");
            } else {
                reject("Gagal memproses transaksi.");
            }
        }, 1500);
    });
}

// Event Submit Form Penyewaan & Web Storage
function prosesRentNow(event) {
    event.preventDefault();
    let nama = document.getElementById("rental-nama").value;
    let hp = document.getElementById("rental-hp").value;
    let alamat = document.getElementById("rental-alamat").value;

    // Validasi form sewa (Pop-up muncul jika ada yang kosong)
    if (nama.trim() === "" || hp.trim() === "" || alamat.trim() === "") {
        tampilkanSnackbar("Peringatan: Semua kolom data sewa wajib diisi!");
        return;
    }

    let dataSewa = { nama, hp, alamat };
    localStorage.setItem("NAMA_PENYEWA", nama);
    localStorage.setItem("RIWAYAT_SEWA", JSON.stringify(dataSewa));

    simpanDataKeServer(dataSewa)
        .then((response) => {
            tampilkanSnackbar(response);
            setTimeout(() => { kembaliKeKatalog(); }, 1500);
        })
        .catch((error) => {
            tampilkanSnackbar("Error: " + error);
        });
}

// Validasi Form Login / Register
function validasiFormLogin(event) {
    let userField = document.getElementById("user");
    let passField = document.getElementById("pass");
    let user = userField ? userField.value : "";
    let pass = passField ? passField.value : "";
    
    if (user.trim() === "" || pass.trim() === "") {
        event.preventDefault();
        tampilkanSnackbar("Peringatan: Username dan Password tidak boleh kosong!");
    }
}