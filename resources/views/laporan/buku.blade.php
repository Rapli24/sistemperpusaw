<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Buku</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
            margin-bottom: 5px;
        }
        .header .subtitle {
            color: #666;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }
        .text-center {
            text-align: center;
        }
        .badge {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
        }
        .badge-available {
            background-color: #d4edda;
            color: #155724;
        }
        .badge-unavailable {
            background-color: #f8d7da;
            color: #721c24;
        }
        .badge-rented {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Buku Perpustakaan</h1>
        <div class="subtitle">Data Buku Perpustakaan</div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Judul Buku</th>
                <th width="25%">Pengarang</th>
                <th width="25%">Penerbit</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $book)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $book->judul_buku }}</td>
                <td>{{ $book->pengarang }}</td>
                <td>{{ $book->penerbit }}</td>
                <td class="text-center">
                    @if($book->status == 'tersedia')
                        <span class="badge badge-available">Tersedia</span>
                    @elseif($book->status == 'dipinjam')
                        <span class="badge badge-rented">Dipinjam</span>
                    @else
                        <span class="badge badge-unavailable">Tidak Tersedia</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d-m-Y H:i') }} | Total Buku: {{ count($bukus) }}
    </div>
</body>
</html>
