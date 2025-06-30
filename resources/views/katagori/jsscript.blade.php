<script>
/*
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
//renderTable();
*/
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
        const row = document.getElementById('row-'+index);
        const cells = row.getElementsByTagName('td');
        
        document.getElementById('kategoriModalLabel').textContent = 'Edit Kategori';
        document.getElementById('editIndex').value = index;
        document.getElementById('nama').value = cells[1].innerText;
        document.getElementById('keterangan').value = cells[2].innerText;
        document.getElementById('status').value = cells[3].innerText;
        document.getElementById('_method').value = 'PUT';
    }
    kategoriModal.show();
}

// Modal Hapus
function openHapusModal(idx) {
    const row = document.getElementById('row-'+idx);
    const cells = row.getElementsByTagName('td');
    hapusIndex = idx;
    document.getElementById('hapusNama').textContent = cells[1].innerText;
    hapusModal.show();
}

function showNotif(type, message) {
    // type: 'success', 'error', 'info', 'warning'
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    });
}

// ADD Kategori
function addCategory(data) {
    $.ajax({
        url: "{{route('katagori.index')}}", // Ganti sesuai endpoint kamu
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            showNotif('success', 'Kategori berhasil ditambahkan!');
            $('#kategoriModal').modal('hide');
        },
        error: function(xhr) {
            let msg = "Gagal menambah kategori. ";
            if (xhr.responseJSON && xhr.responseJSON.message) msg = msg + xhr.responseJSON.message;
            showNotif('error', msg);
        }
    });
}

// EDIT Kategori
function editCategory(id, data) {
    $.ajax({
        url: "{{route('katagori.index')}}/"+id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            showNotif('success', 'Kategori berhasil diupdate!');
            $('#kategoriModal').modal('hide');
        },
        error: function(xhr) {
            let msg = "Gagal mengupdate kategori.";
            if (xhr.responseJSON && xhr.responseJSON.message) msg = msg + xhr.responseJSON.message;
            console.log(msg);
            showNotif('error', msg);
        }
    });
}

// HAPUS Kategori (dengan konfirmasi SweetAlert2)
function deleteCategory(id) {
    Swal.fire({
        title: 'Yakin hapus kategori ini?',
        text: "Aksi ini tidak bisa dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{route('katagori.index')}}/" + id,
                type: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    showNotif('success', 'Kategori berhasil dihapus!');
                    //if (typeof renderKategoriTable === 'function') renderKategoriTable();
                    document.getElementById('row-'+id).remove();
                    $('#hapusModal').modal('hide');
                },
                error: function(xhr) {
                    let msg = "Gagal menghapus kategori.";
                    if (xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                    showNotif('error', msg);
                }
            });
        }
    });
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
        status: status.value,
        _method :_method.value
    };
    if (idx === "") {
        addCategory(data);
    } else {
        editCategory(idx,data);
    }
    kategoriModal.hide(idx,data);
    //renderTable();
});


document.getElementById('btnHapusKategori').onclick = function() {
    if (hapusIndex !== null) {
        deleteCategory(hapusIndex);
    }
};

</script>