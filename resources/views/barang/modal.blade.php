<!-- Modal -->
<div class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="barangModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="barangForm" novalidate>
      <div class="modal-content">
        <div class="modal-header bg-orange text-white">
          <h5 class="modal-title" id="barangModalLabel">Tambah Barang</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="editIndex" value="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama" maxlength="255" required>
                <div class="invalid-feedback">Nama wajib diisi (maksimal 255 karakter).</div>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">URL Gambar <span class="text-danger">*</span></label>
                <input type="url" class="form-control" id="gambar" required>
                <div class="invalid-feedback">Gambar wajib diisi (harus berupa URL gambar valid).</div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                <input type="number" min="0" class="form-control" id="stock" required>
                <div class="invalid-feedback">Stock wajib diisi dan minimal 0.</div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-orange">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah Anda yakin ingin menghapus barang <strong id="hapusNama"></strong>?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger" id="btnHapus">Hapus</button>
        </div>
    </div>
  </div>
</div>