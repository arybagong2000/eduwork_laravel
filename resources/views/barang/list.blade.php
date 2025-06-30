<div class="container mt-5">
    <a href="{{route('barang.create')}}" class="btn btn-orange mb-3"><i class="bi bi-plus"></i> Tambah Data</a>
    <table class="table table-bordered">
        <thead class="table-orange text-white">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="barang-tbody">
            @foreach( $barang as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{ $v->nama}}</td>
                <td>
                    <img src="{{ $v->gambar}}" alt="{{ $v->nama}}" class="img-thumb" onerror="this.src='https://via.placeholder.com/50x50?text=No+Image'">
                </td>
                <td>{{ $v->deskripsi || ''}}</td>
                <td>{{ $v->stock}}</td>
                <td>
                    <a href="{{route('barang.edit',$v->id)}}" class="btn btn-sm btn-warning text-white"> <i class="bi bi-pencil-square"></i> Edit</a>
                    <button class="btn btn-sm btn-danger" onclick="openHapusModal({{$v->id}})"><i class="bi bi-trash"></i>  Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $barang->links() }}
</div>