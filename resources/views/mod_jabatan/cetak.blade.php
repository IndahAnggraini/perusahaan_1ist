<html>
<head>
    <title>Laporan Data Jabatan</title>
</head>
<body>
    <div class="container">
        <center>
            <h4>Laporan Data Jabatan</h4>
        </center>
        <br/>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                </tr>
            </thead>
            <body>
                @foreach ($tampildata as $baris)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $baris->nm_jabatan }}</td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
</body>
</html>
