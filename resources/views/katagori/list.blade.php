<div class="container mt-5">
    <button class="btn btn-orange mb-3" onclick="openModal('add')"><i class="bi bi-plus"></i> Tambah Data</button>
    <table class="table table-bordered">
        <thead class="table-orange text-white">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="kategori-tbody">
            @foreach( $katagori as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{ $v->nama}}</td>
                <td>{{ $v->keterangan || ''}}</td>
                <td><span class="badge bg-orange">{{ $v->status}}</span></td>
                <td>
                    <button class="btn btn-sm btn-warning text-white" onclick="openModal('edit', {{$v->id}})">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="openHapusModal({{$v->id}})">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            <!-- Data diisi oleh JavaScript -->
            @endforeach
            
        </tbody>
    </table>
    {{ $katagori->links() }}
</div>