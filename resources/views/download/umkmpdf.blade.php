<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<h1>Usaha Terdaftar di UMKMku</h1>
<table id="customers">
    <tr>
        <th scope="col">NO</th>
        <th scope="col">NAMA USAHA</th>   
        <th scope="col">ALAMAT USAHA</th>
        <th scope="col">KETERANGAN</th>
        <th scope="col">NAMA PEMILIK</th>
    </tr>
    @foreach ($umkm as $ukm)
    <tr>
        <th scope='row'>{{$loop->iteration}}</th>
        <td>{{$ukm->nama_ush}}</td>
        <td>{{$ukm->alamat_ush}}</td>
        <td>{{$ukm->ket_ush}}</td>
        <td>{{$ukm->nama_member}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
