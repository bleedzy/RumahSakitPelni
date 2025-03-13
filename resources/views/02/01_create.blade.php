@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">{{ $pageName }}</h1>
@endsection
@section('content')
    <div class="px-8 py-2">
        <form id="formParent" action="" method="post" class="flex flex-col gap-2">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Add New Document</div>
                <a href="{{ route('02.01.index') }}" class="ml-auto flex items-center px-4 h-9 bg-gray-500 text-white rounded cursor-pointer">Back</a>
            </div>
            <div id="errorDiv" class="hidden bg-red-700/50 border-2 border-red-700 p-4 rounded text-white">
                <h1 class="text-2xl font-semibold">Validation Error!</h1>
                <p></p>
            </div>
            <div class="flex items-center">
                <label for="inputNoRekamanPTK" class="w-40 mr-2 leading-5">Nomor Rekaman PTK</label>
                <input required type="text" name="no_rekaman_ptk" id="inputNoRekamanPTK" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputUnitKerjaPenerbitPTK" class="w-40 mr-2 leading-5">Unit Kerja Penerbit PTK</label>
                <input required type="text" name="unit_kerja_penerbit_ptk" id="inputUnitKerjaPenerbitPTK" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputUnitKerjaPenerimaPTK" class="w-40 mr-2 leading-5">Unit Kerja Penerima PTK</label>
                <input required type="text" name="unit_kerja_penerima_ptk" id="inputUnitKerjaPenerimaPTK" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputRincianTemuan" class="w-40 mr-2 leading-5">Rincian Temuan</label>
                <textarea required name="rincian_temuan" id="inputRincianTemuan" class="py-2 px-3 grow border-2 border-gray-500 rounded"></textarea>
            </div>
            <div class="flex items-center">
                <label for="inputNamaPembuat" class="w-40 mr-2 leading-5">Nama Pembuat</label>
                <input required type="text" name="nama_pembuat" id="inputNamaPembuat" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaPenerima" class="w-40 mr-2 leading-5">Nama Penerima</label>
                <input required type="text" name="nama_penerima" id="inputNamaPenerima" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaVicePresident" class="w-40 mr-2 leading-5">Nama Vice President</label>
                <input required type="text" name="nama_vice_president" id="inputNamaVicePresident" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputIdentifikasiPenyebab" class="w-40 mr-2 leading-5">Identifikasi Penyebab</label>
                <textarea required name="identifikasi_penyebab" id="inputIdentifikasiPenyebab" class="py-2 px-3 grow border-2 border-gray-500 rounded"></textarea>
            </div>
            <div class="flex items-center">
                <label for="inputKoreksiPadaSaatKejadian" class="w-40 mr-2 leading-5">Koreksi Pada Saat Kejadian</label>
                <textarea required name="koreksi_pada_saat_kejadian" id="inputKoreksiPadaSaatKejadian" class="py-2 px-3 grow border-2 border-gray-500 rounded"></textarea>
            </div>
            <div class="flex items-center">
                <label for="inputTindakanKoreksiTotal" class="w-40 mr-2 leading-5">Tindakan Koreksi Total</label>
                <textarea required name="tindakan_koreksi_total" id="inputTindakanKoreksiTotal" class="py-2 px-3 grow border-2 border-gray-500 rounded"></textarea>
            </div>
            <div class="flex items-center">
                <label for="inputTanggalPenyelesaian" class="w-40 mr-2 leading-5">Tanggal Penyelesaian</label>
                <input type="date" name="tanggal_penyelesaian" id="inputTanggalPenyelesaian" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputVerifikasiTindakanPerbaikan" class="w-40 mr-2 leading-5">Verifikasi Tindakan Perbaikan</label>
                <textarea name="verifikasi_tindakan_perbaikan" id="inputVerifikasiTindakanPerbaikan" class="py-2 px-3 grow border-2 border-gray-500 rounded"></textarea>
            </div>
            <div class="flex items-center">
                <label for="inputKeputusan" class="w-40 mr-2 leading-5">Keputusan</label>
                <div class="flex items-center gap-4">
                    <label class="flex items-center">
                        <input type="radio" name="keputusan" value="" class="mr-2" checked> Tolak
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="keputusan" value="1" class="mr-2"> Terima
                    </label>
                </div>
            </div>
            <div class="flex items-center">
                <label for="inputNoPTKBaru" class="w-40 mr-2 leading-5">Nomor PTK Baru</label>
                <input type="text" name="no_ptk_baru" id="inputNoPTKBaru" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaVerifier" class="w-40 mr-2 leading-5">Nama Verifier</label>
                <input type="text" name="nama_verifier" id="inputNamaVerifier" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputTanggalVerifikasi" class="w-40 mr-2 leading-5">Tanggal Verifikasi</label>
                <input type="date" name="tanggal_verifikasi" id="inputTanggalVerifikasi" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputDocumentScan" class="w-40 mr-2 leading-5">Document Scan</label>
                <input type="file" name="document_scan" id="inputDocumentScan" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <style>
                .table-style td {
                    text-wrap: nowrap;
                }
            </style>
        </form>
        <button id="parentFormSubmitBtn" form="formParent" class="mt-2 group flex items-center justify-center w-full h-9 bg-blue-500 hover:bg-blue-700 disabled:bg-blue-300 disabled:cursor-progress text-white rounded cursor-pointer">
            <span>Submit</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 animate-spin hidden group-disabled:block">
                <path d="M18.364 5.63604L16.9497 7.05025C15.683 5.7835 13.933 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12H21C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C14.4853 3 16.7353 4.00736 18.364 5.63604Z"></path>
            </svg>
        </button>
    </div>
@endsection
