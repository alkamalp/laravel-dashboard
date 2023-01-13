<h2>Daftar Produk</h2>
<tr>
    <th>ID</th>
    <th>Nama Produk</th>
    <th>Harga Produk</th>
</tr>
@foreach($produk as $data)
<tr>
    <td>{{$data->id_produk}}</td>
    <td>{{$data->nama_produk}}</td>
    <td>{{$data->hargajual_produk}}</td>
</tr>
@endforeach