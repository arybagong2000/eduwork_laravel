<script>
let barangData = [
    {
        nama: "TV LED 32\"",
        gambar: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=200&q=80",
        deskripsi: "Televisi LED ukuran 32 inch",
        stock: 10
    },
    {
        nama: "Oreo Coklat 133g",
        gambar: "https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=200&q=80",
        deskripsi: "",
        stock: 55
    }
];

function renderTable() {
    const tbody = document.getElementById('barang-tbody');
    tbody.innerHTML = '';
    barangData.forEach((barang, idx) => {
        tbody.innerHTML += `
            <tr>
                <td>${idx + 1}</td>
                <td>${barang.nama}</td>
                <td>
                    <img src="${barang.gambar}" alt="${barang.nama}" class="img-thumb" onerror="this.src='https://via.placeholder.com/50x50?text=No+Image'">
                </td>
                <td>${barang.deskripsi || ''}</td>
                <td>${barang.stock}</td>
                <td>
                    <button class="btn btn-sm btn-warning text-white" onclick="openModal('edit', ${idx})"> <i class="bi bi-pencil-square"></i> Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="openHapusModal(${idx})"><i class="bi bi-trash"></i>  Hapus</button>
                </td>
            </tr>
        `;
    });
}
//renderTable();

const barangModal = new bootstrap.Modal(document.getElementById('barangModal'));
const hapusModal = new bootstrap.Modal(document.getElementById('hapusModal'));
let hapusIndex = null;

function openModal(mode, index = null) {
    document.getElementById('barangForm').reset();
    ['nama','gambar','stock'].forEach(id => document.getElementById(id).classList.remove('is-invalid'));
    document.getElementById('editIndex').value = '';
    if (mode === 'add') {
        document.getElementById('barangModalLabel').textContent = 'Tambah Barang';
    } else if (mode === 'edit' && index !== null) {
        document.getElementById('barangModalLabel').textContent = 'Edit Barang';
        document.getElementById('editIndex').value = index;
        document.getElementById('nama').value = barangData[index].nama;
        document.getElementById('gambar').value = barangData[index].gambar;
        document.getElementById('deskripsi').value = barangData[index].deskripsi;
        document.getElementById('stock').value = barangData[index].stock;
    }
    barangModal.show();
}

document.getElementById('barangForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let isValid = true;
    const nama = document.getElementById('nama');
    const gambar = document.getElementById('gambar');
    const deskripsi = document.getElementById('deskripsi');
    const stock = document.getElementById('stock');

    // Validasi nama
    if (!nama.value.trim() || nama.value.trim().length > 255) {
        nama.classList.add('is-invalid');
        isValid = false;
    } else {
        nama.classList.remove('is-invalid');
    }

    // Validasi gambar (required dan url)
    try {
        new URL(gambar.value.trim());
        if (!gambar.value.trim()) throw new Error();
        gambar.classList.remove('is-invalid');
    } catch {
        gambar.classList.add('is-invalid');
        isValid = false;
    }

    // Validasi stock (required integer min 0)
    if (
        stock.value === "" ||
        isNaN(stock.value) ||
        !Number.isInteger(Number(stock.value)) ||
        Number(stock.value) < 0
    ) {
        stock.classList.add('is-invalid');
        isValid = false;
    } else {
        stock.classList.remove('is-invalid');
    }

    if (!isValid) return;

    const idx = document.getElementById('editIndex').value;
    const data = {
        nama: nama.value.trim(),
        gambar: gambar.value.trim(),
        deskripsi: deskripsi.value.trim(),
        stock: Number(stock.value)
    };
    if (idx === "") {
        barangData.push(data);
    } else {
        barangData[idx] = data;
    }
    barangModal.hide();
    renderTable();
});

// Hapus barang
function openHapusModal(idx) {
    hapusIndex = idx;
    document.getElementById('hapusNama').textContent = barangData[idx].nama;
    hapusModal.show();
}
document.getElementById('btnHapus').onclick = function() {
    if (hapusIndex !== null) {
        barangData.splice(hapusIndex, 1);
        renderTable();
        hapusModal.hide();
    }
};
</script>