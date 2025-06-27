<script>
let kategoriData = [
    { nama: "Elektronik", keterangan: "Barang elektronik", status: "aktif" },
    { nama: "Makanan", keterangan: "Kategori makanan & minuman", status: "aktif" }
];

function renderTable() {
    const tbody = document.getElementById('kategori-tbody');
    tbody.innerHTML = '';
    kategoriData.forEach((kat, idx) => {
        tbody.innerHTML += `
            <tr>
                <td>${idx + 1}</td>
                <td>${kat.nama}</td>
                <td>${kat.keterangan || ''}</td>
                <td><span class="badge bg-orange">${kat.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-warning text-white" onclick="openModal('edit', ${idx})">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="openHapusModal(${idx})">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </td>
            </tr>
        `;
    });
}
renderTable();

const kategoriModal = new bootstrap.Modal(document.getElementById('kategoriModal'));
const hapusModal = new bootstrap.Modal(document.getElementById('hapusModal'));
let hapusIndex = null;

function openModal(mode, index = null) {
    document.getElementById('kategoriForm').reset();
    document.getElementById('nama').classList.remove('is-invalid');
    document.getElementById('status').classList.remove('is-invalid');
    document.getElementById('editIndex').value = '';
    if (mode === 'add') {
        document.getElementById('kategoriModalLabel').textContent = 'Tambah Kategori';
    } else if (mode === 'edit' && index !== null) {
        document.getElementById('kategoriModalLabel').textContent = 'Edit Kategori';
        document.getElementById('editIndex').value = index;
        document.getElementById('nama').value = kategoriData[index].nama;
        document.getElementById('keterangan').value = kategoriData[index].keterangan;
        document.getElementById('status').value = kategoriData[index].status;
    }
    kategoriModal.show();
}

document.getElementById('kategoriForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let isValid = true;
    const nama = document.getElementById('nama');
    const keterangan = document.getElementById('keterangan');
    const status = document.getElementById('status');
    // Validasi nama
    if (!nama.value.trim() || nama.value.trim().length > 255) {
        nama.classList.add('is-invalid');
        isValid = false;
    } else {
        nama.classList.remove('is-invalid');
    }
    // Validasi status
    if (!status.value) {
        status.classList.add('is-invalid');
        isValid = false;
    } else {
        status.classList.remove('is-invalid');
    }
    if (!isValid) return;

    const idx = document.getElementById('editIndex').value;
    const data = {
        nama: nama.value.trim(),
        keterangan: keterangan.value.trim(),
        status: status.value
    };
    if (idx === "") {
        kategoriData.push(data);
    } else {
        kategoriData[idx] = data;
    }
    kategoriModal.hide();
    renderTable();
});

// Modal Hapus
function openHapusModal(idx) {
    hapusIndex = idx;
    document.getElementById('hapusNama').textContent = kategoriData[idx].nama;
    hapusModal.show();
}
document.getElementById('btnHapusKategori').onclick = function() {
    if (hapusIndex !== null) {
        kategoriData.splice(hapusIndex, 1);
        renderTable();
        hapusModal.hide();
    }
};
</script>