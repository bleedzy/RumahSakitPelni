@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">{{ $pageName }}</h1>
@endsection
@section('content')
    <div class="px-8 py-2">
        <div class="mb-2 flex items-center">
            <div class="text-2xl font-semibold">Details</div>
            <a href="{{ route('01.04.edit', encrypt($data->id)) }}" class="ml-auto flex items-center px-4 h-9 bg-blue-700 text-white rounded cursor-pointer">Edit</a>
            <a href="{{ route('01.04.print', encrypt($data->id)) }}" target="blank" class="ml-2 flex items-center px-4 h-9 bg-yellow-600 text-white rounded cursor-pointer">Print</a>
            <a href="{{ route('01.04.index') }}" class="ml-2 flex items-center px-4 h-9 bg-gray-500 text-white rounded cursor-pointer">Back</a>
        </div>
        {{-- @dd($data->createdBy->toArray()) --}}
        <div class="flex flex-col gap-1 text-lg">
            <div class="flex"><span class="font-medium w-70">No. Rekaman</span>: {{ $data->no_rekaman_dokumen }}</div>
            <div class="flex"><span class="font-medium w-70">Nama Divisi</span>: {{ $data->nama_divisi }}</div>
            <div class="flex"><span class="font-medium w-70">Nama Document Controll</span>: {{ $data->nama_document_control }}</div>
            <div class="flex"><span class="font-medium w-70">Nama Vice President</span>: {{ $data->nama_vice_president }}</div>
            <div class="flex"><span class="font-medium w-70">Signed At</span>: {{ $data->signed_at ?? '-' }}</div>
        </div>
        <div class="mt-2 text-lg font-medium">
            Daftar Dokumen:
        </div>
        <div class="mb-12 overflow-x-scroll border-2 border-b-2 rounded bg-white">
            <style>
                .table-style td {
                    text-wrap: nowrap;
                }

                .table-style td:nth-child(9)>div {
                    /* to make keterangan column (9th column) not to long */
                    width: max-content;
                    max-width: 300px;
                    text-wrap: wrap;
                    overflow: hidden;
                    display: -webkit-box;
                    margin-bottom: 0px;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 3;
                    text-overflow: ellipsis;
                }
            </style>
            <table class="table-style">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>No Dokumen</th>
                        <th class="text-nowrap">Nama Dokumen</th>
                        <th>Klasifikasi Dokumen</th>
                        <th>Penerbit Dokumen</th>
                        <th>Tahun Terbit Dokumen</th>
                        <th>Status Digunakan</th>
                        <th>Keterangan</th>
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
        </div>
    </div>
    <div class="absolute px-2 py-1 bottom-0 bg-white text-sm shadow-lg border-t-lime-200 border-gray-200">
        <div>Document Created By <span class="font-medium underline">{{ $data->createdBy->name }}</span> at <span class="font-medium underline">{{ $data->created_at }}</span></div>
        <div>Last Updated {{ $data->updatedBy ? 'By <span class="font-medium underline">' . $data->updatedBy->name . '</span> at <span class="font-medium underline">' . $data->updated_at . '</span>' : '-' }}</div>
    </div>
@endsection
