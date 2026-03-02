const btnTheme = document.getElementById('btn-theme');
const body = document.body;

if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark-mode');
    btnTheme.innerText = "☀️ Mode Terang";
}

btnTheme.addEventListener('click', function() {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        btnTheme.innerText = "☀️ Mode Terang";
    } else {
        localStorage.removeItem('theme');
        btnTheme.innerText = "🌙 Mode Gelap";
    }
});

function aktifkanTombolBeli() {
    const tombolBeli = document.querySelectorAll('.btn-detail');
    tombolBeli.forEach(button => {
        button.addEventListener('click', function(e) {
            const cardBody = e.target.closest('.card-body');
            const stokElement = cardBody.querySelector('.stok-text');
            
            let stok = parseInt(stokElement.innerText.replace("Stok: ", ""));

            if (stok > 0) {
                stok--;
                stokElement.innerText = "Stok: " + stok;
                const namaBarang = cardBody.querySelector('.card-title').innerText;
                alert("Berhasil membeli " + namaBarang);
            } else {
                alert("Stok Habis!");
                e.target.disabled = true;
                e.target.innerText = "Habis";
            }
        });
    });
}

aktifkanTombolBeli();

let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

updateWishlistCount();

function updateWishlistCount() {
    document.getElementById('wishlist-count').innerText = wishlist.length;
}

function aktifkanTombolWishlist() {
    const tombolWishlist = document.querySelectorAll('.btn-wishlist');
    
    tombolWishlist.forEach(button => {
        const cardBody = button.closest('.card-body');
        const namaBarang = cardBody.querySelector('.card-title').innerText;
        const hargaBarang = cardBody.querySelector('.harga-text').innerText;
        const produkId = generateProdukId(namaBarang);
        
        if (wishlist.some(item => item.id === produkId)) {
            button.classList.add('active');
            button.innerHTML = '❤️ Dari Wishlist';
        }
        
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const cardBody = button.closest('.card-body');
            const namaBarang = cardBody.querySelector('.card-title').innerText;
            const hargaBarang = cardBody.querySelector('.harga-text').innerText;
            const produkId = generateProdukId(namaBarang);
            
            const indexWishlist = wishlist.findIndex(item => item.id === produkId);
            
            if (indexWishlist > -1) {
                wishlist.splice(indexWishlist, 1);
                button.classList.remove('active');
                button.innerHTML = '❤️ Wishlist';
                alert(namaBarang + " dihapus dari wishlist");
            } else {
                wishlist.push({
                    id: produkId,
                    nama: namaBarang,
                    harga: hargaBarang
                });
                button.classList.add('active');
                button.innerHTML = '❤️ Dari Wishlist';
                alert(namaBarang + " ditambahkan ke wishlist");
            }
            
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            updateWishlistCount();
        });
    });
}

function generateProdukId(nama) {
    return nama.toLowerCase().replace(/\s+/g, '-');
}

function tampilkanWishlist() {
    const daftarWishlist = document.getElementById('daftar-wishlist');
    
    if (wishlist.length === 0) {
        daftarWishlist.innerHTML = '<li class="list-group-item">Wishlist Anda masih kosong</li>';
        return;
    }
    
    daftarWishlist.innerHTML = '';
    wishlist.forEach(item => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.innerHTML = `
            <div>
                <h6 class="mb-1">${item.nama}</h6>
                <small class="text-muted">${item.harga}</small>
            </div>
            <button class="btn btn-sm btn-danger" onclick="hapusItemWishlist('${item.id}')">Hapus</button>
        `;
        daftarWishlist.appendChild(listItem);
    });
}

function hapusItemWishlist(produkId) {
    wishlist = wishlist.filter(item => item.id !== produkId);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistCount();
    tampilkanWishlist();
    aktifkanTombolWishlist();
}

function hapuswishlist() {
    if (confirm('Apakah Anda yakin ingin mengosongkan seluruh wishlist?')) {
        wishlist = [];
        localStorage.removeItem('wishlist');
        updateWishlistCount();
        tampilkanWishlist();
        aktifkanTombolWishlist();
        alert('Wishlist telah dikosongkan');
    }
}

aktifkanTombolWishlist();