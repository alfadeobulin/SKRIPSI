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
<h1>Member Terdaftar di UMKMku</h1>
<table id="customers">
    <tr>
        <th scope="col">NO</th>
        <th scope="col">NAMA MEMBER</th>   
        <th scope="col">ALAMAT MEMBER</th>
        <th scope="col">NO TELP</th>
    </tr>
    @foreach ($member as $mbr)
    <tr>
        <th scope='row'>{{$loop->iteration}}</th>
        <td>{{$mbr->nama_member}}</td>
        <td>{{$mbr->alamat_member}}</td>
        <td>{{$mbr->nohp_member}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
