<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
</head>
<body>
    <table >
        <tr>
            <td colspan="20" style="text-align:center;">
                <h1>
                    <strong>
                        FORMAT PENDATAAN PHBS KECAMATAN CULAMEGA
                    </strong>
                </h1>
            </td>
        </tr>
        <tr>
            <td colspan="20" style="text-align:left;">
                <h1>DESA :</h1>
            </td>
        </tr>
        <tr>
            <td colspan="20" style="text-align:left;">
                <h1>DUSUN/POSYANDU :</h1>
            </td>
        </tr>
        <tr>
            <td colspan="20" style="text-align:left;">
                <h1>RT :</h1>
            </td>
        </tr>
        <tr>
            
            <td rowspan="3" style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">
                <h1>NO. URUT </h1>
            </td>
            <td rowspan="3" style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">
                <h1>NO URUT KK </h1>
            </td>
            <td rowspan="3" style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">
                <h1>NAMA KK </h1>
            </td>
            <td colspan="15" style="border: 1px solid black;text-align:center;">
                <strong>
                    <h1>INDIKATOR PERILAKU HIDUP BERSIH DAN SEHAT (PHBS)</h1>
                </strong>
            </td>
            <td colspan="2" style="border: 1px solid black;text-align:center;">
                <h1>Hasil</h1>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;text-align:center;" colspan="2">PERSALINAN </td>
            <td style="border: 1px solid black;text-align:center;" colspan="4">MEMBERI ASI-EKSLUSIF </td>
            <td style="border: 1px solid black;text-align:center;" colspan="2">MENIMBANG</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">MENGGUNAKAN AIR BERSIH </td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">MENCUCI TANGAN DENGAN AIR BERSIH DAN SABUN</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">MENGGUNAKAN JAMBAN SEHAT</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">MEMBERANTAS JENTIK DI RUMAH</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">MAKAN BUAH DAN SAYUR SETIAP HARI</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">MELAKUKAN AKTIVITAS FISIK SETIAP HARI</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">TIDAK MEROKOK DI DALAM RUMAH</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">RUMAH TANGGA SEHAT</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);" rowspan="2">RUMAH TANGGA TIDAK SEHAT</td>

        </tr>
        <tr>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">Ada Ibu Bersalin</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">Bersalin di nakes</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">bayi < 6 bln</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">ASI saja </td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">jumlah bayi 6-12 bln</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">bayi 6-12 bln Lulus ASI Ekslusif</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">ada Bayi dan Balita</td>
            <td style="border: 1px solid black;text-align:center;writing-mode: vertical-rl;transform: rotate(180deg);">ditimbang</td>
        </tr>
        <tr>
            <td style="background:silver;border: 1px solid black;text-align:center;" ></td>
            <td style="background:silver;border: 1px solid black;text-align:center;" ></td>
            <td style="background:silver;border: 1px solid black;text-align:center;" ></td>
                @php
                    $range = range(1,17);
                @endphp
            @foreach ($range as $item)
                <td style="background:silver;border: 1px solid black;text-align:center;" >
                    <strong>{{ $item }}</strong>
                </td>
            @endforeach
        </tr>
        {{-- DATA  --}}
        @foreach ($monitoring as $m)
            <tr>
                <td style="border: 1px solid black;text-align:center;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid black;text-align:center;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid black;text-align:left;">{{ $m->nama_kepala_keluarga }}</td>
                @for ($j = 1; $j <= 17; $j++)
                    @php
                        $questionKey = "pertanyaan_phbs_{$j}";
                        $value = $m->$questionKey ?? '-';  // Use '-' if value is null
                    @endphp
                    @if ( $value != '-')
                        <td style="border: 1px solid black;text-align:center;">{{ $value }} </td>
                    @else
                        <td style="border: 1px solid black;text-align:center;">-</td>
                    @endif
                @endfor
            </tr>
        @endforeach
    </table>
</body>
</html>