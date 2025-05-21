<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Supir</title>
</head>
<body>
    <h1>Detail Supir: {{ $supir->nama }}</h1>

    <p><strong>No SIM:</strong> {{ $supir->no_sim }}</p>
    <p><strong>Alamat:</strong> {{ $supir->alamat }}</p>
    <p><strong>Telepon:</strong> {{ $supir->telepon }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($supir->tanggal_lahir)->format('d M Y') }}</p>

    <hr>

    <h2>Kendaraan</h2>
    @if ($supir->kendaraan)
        <p><strong>Plat Nomor:</strong> {{ $supir->kendaraan->plat_nomor }}</p>
        <p><strong>Merk:</strong> {{ $supir->kendaraan->merk }}</p>
        <p><strong>Jenis:</strong> {{ $supir->kendaraan->jenis }}</p>
        <p><strong>Tahun:</strong> {{ $supir->kendaraan->tahun }}</p>
    @else
        <p>Supir ini belum memiliki data kendaraan.</p>
    @endif

    <hr>

    <h2>Riwayat Perjalanan</h2>
    @if ($supir->riwayatPerjalanans->count())
        <ul>
            @foreach ($supir->riwayatPerjalanans as $riwayat)
                <li>
                    <strong>{{ $riwayat->tanggal_berangkat }}</strong> - {{ $riwayat->tujuan }}
                    ({{ $riwayat->jam_berangkat }})
                    <br><em>{{ $riwayat->keterangan }}</em>
                </li>
            @endforeach
        </ul>
    @else
        <p>Belum ada riwayat perjalanan.</p>
    @endif
</body>
</html>
