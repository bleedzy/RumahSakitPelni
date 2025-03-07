<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageName }}</title>
    @vite('resources/css/app.css')
</head>
<style>
    @media print {
        @page {
            size: 297mm 210mm;
            margin: 20mm 25mm 20mm 25mm;
        }

        .no-print {
            display: none;
        }
    }

    .font-times-new-roman {
        font-family: 'Times New Roman', Times, serif;
    }

    .font-arial {
        font-family: Arial, Helvetica, sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid;
    }

    .arial-table-style td,
    .arial-table-style th {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        padding-left: 8px;
        padding-right: 8px;
    }

    .arial-table-style th {
        background: #dddddd;
    }

    .arial-table-style td:nth-child(2),
    .arial-table-style td:nth-child(3) {
        text-wrap: nowrap;
    }
</style>

<body class="w-[1000px]">
    <div class="no-print absolute flex p-2 text-white right-0 gap-2">
        <button onclick="window.print()" class="px-4 h-9 rounded bg-yellow-600 cursor-pointer">print</button>
        <a href="{{ route('01.04.show', encrypt($data->id)) }}" class="flex px-4 h-9 rounded bg-gray-500 items-center">back</a>
    </div>
    <div class="flex w-full justify-center font-times-new-roman">
        <table>
            <tr>
                <td class="p-2">
                    <img src="{{ asset('images/rumahsakitpelni_logo.png') }}" class="w-30">
                </td>
                <td class="px-6 py-2">
                    <h1 class="font-semibold text-center">
                        PT. RUMAH SAKIT PELNI
                    </h1>
                    <div class="text-center text-sm leading-4">
                        <div class="text-nowrap">Jl Aipda K.S Tubun, No,92 – 94, Jakarta Barat 11410</div>
                        <div>021 – 5306901 / 021-5484809</div>
                        <div>sekper@rspelni.co.id</div>
                    </div>
                </td>
                <td>
                    <div class="flex flex-col">
                        <div class="flex pl-2 pr-4 py-1 text-sm text-nowrap border-b">
                            <div class="w-30">No. Dokumen</div>: RSP.SMKI.FM.01.04
                        </div>
                        <div class="flex pl-2 pr-4 py-1 text-sm text-nowrap border-b">
                            <div class="w-30">No. Revisi</div>: 00
                        </div>
                        <div class="flex pl-2 pr-4 py-1 text-sm text-nowrap">
                            <div class="w-30">Tanggal Berlaku</div>: 02 September 2030
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="font-arial mt-3 leading-5">
        <div><span class="font-bold">NO REKAMAN DOKUMEN:</span> {{ $data->no_rekaman_dokumen }}</div>
        <div><span class="font-bold">NAMA DIVISI:</span> {{ $data->nama_divisi }}</div>
    </div>
    <table class="arial-table-style mt-4">
        <thead>
            <tr>
                <th>NO.</th>
                <th>TANGGAL</th>
                <th>NO. DOKUMEN</th>
                <th>JUDUL DOKUMEN</th>
                <th>KLASIFIKASI</th>
                <th>PENERBIT DOKUMEN</th>
                <th>TAHUN TERBIT</th>
                <th>STATUS DIGUNAKAN</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->details as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->no_dokumen }}</td>
                    <td>{{ $item->nama_dokumen }}</td>
                    <td>{{ $item->klasifikasi_dokumen }}</td>
                    <td>{{ $item->penerbit_dokumen }}</td>
                    <td>{{ $item->tahun_terbit_dokumen }}</td>
                    <td>{{ $item->status_digunakan }}</td>
                    <td>
                        <div>{{ $item->keterangan }}</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <div class="mt-5 flex flex-col w-full items-center font-arial">
        <div class="flex">Jakarta Barat, {{ $data->signed_at ? Carbon::parse($data->signed_at)->translatedFormat('d F Y') : '………………………………...' }}</div>
        <table class="text-center">
            <tr>
                <td class="w-72">Dibuat Oleh,<br>Document Control</td>
                <td class="w-72">Disetujui Oleh,<br>Vice President (MR)</td>
            </tr>
            <tr>
                <td class="h-24"></td>
                <td class="h-24"></td>
            </tr>
            <tr>
                <td>( {{ $data->nama_document_control }} )</td>
                <td>( {{ $data->nama_vice_president }} )</td>
            </tr>
        </table>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        window.print();

    })
</script>

</html>
