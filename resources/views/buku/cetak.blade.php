<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table.static {
            position: relative;
            border: 1px solid #000;
        }
    </style>
    <title>CETAK DATA BUKU</title>
</head>

<body>

    <div class="form-group">
        <h1 align="center"><b>Laporan Data Buku</b></h1>
        <p align="center">Tanggal: <span id="datetime"></span></p>

        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Cover</th>
            </tr>
            @foreach ($bukucetak as $buku)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>
                    <img src="{{ asset('img/'. $buku->cover)}}" alt="" width="50px" height="70px">
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>
<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleString();
    window.print();
</script>

</html>