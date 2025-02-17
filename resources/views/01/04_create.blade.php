@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">01.04 Daftar Dokumen Eksternal</h1>
@endsection
@section('content')
    <div class="px-8 py-2">
        <form action="" method="post" class="flex flex-col gap-2">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Add New Document</div>
                <a href="{{ route('01.04.index') }}" class="ml-auto flex items-center px-4 h-9 bg-gray-500 text-white rounded cursor-pointer">Back</a>
            </div>
            <div class="flex items-center">
                <label for="inputNomorRekaman" class="w-40">Nomor Rekaman</label>
                <input type="text" name="nomor_rekaman_dokumen" id="inputNomorRekaman" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaDivisi" class="w-40">Nama Divisi</label>
                <input type="text" name="nama_divisi" id="inputNamaDivisi" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaDocumentControl" class="w-40">Nama Document Control</label>
                <input type="text" name="nama_document_control" id="inputNamaDocumentControl" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaVicePresident" class="w-40">Nama Vice President</label>
                <input type="text" name="nama_vice_president" id="inputNamaVicePresident" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <style>
                .table-style td {
                    text-wrap: nowrap;
                }
            </style>
            <div class="overflow-x-scroll border-2 border-b-2 rounded bg-white">
                <table class="table-style">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Dokumen</th>
                            <th class="text-nowrap">Nama Dokumen</th>
                            <th>Klasifikasi Dokumen</th>
                            <th>Penerbit Dokumen</th>
                            <th>Tahun Terbit</th>
                            <th>Status Digunakan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>22-Feb-2022</td>
                            <td>SRT-14671</td>
                            <td>Test Nama Dokumen</td>
                            <td>Test Klasifikasi</td>
                            <td>Penerbitnya dia</td>
                            <td>2022</td>
                            <td>Masih Digunakan</td>
                            <td>
                                <div class="line-clamp-2 w-40 text-wrap">
                                    mau diisi apa ini cik woilah, lorem ipsum kah?
                                </div>
                            </td>
                            <td>
                                <button class="text-blue-700 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M9.24264 18.9967H21V20.9967H3V16.754L12.8995 6.85453L17.1421 11.0972L9.24264 18.9967ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-500 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>22-Feb-2022</td>
                            <td>SRT-14671</td>
                            <td>Test Nama Dokumen</td>
                            <td>Test Klasifikasi</td>
                            <td>Penerbitnya dia</td>
                            <td>2022</td>
                            <td>Masih Digunakan</td>
                            <td>
                                <div class="line-clamp-2 w-40 text-wrap">
                                    mau diisi apa ini cik woilah, lorem ipsum kah?
                                </div>
                            </td>
                            <td>
                                <button type="button" class="text-blue-700 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M9.24264 18.9967H21V20.9967H3V16.754L12.8995 6.85453L17.1421 11.0972L9.24264 18.9967ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z"></path>
                                    </svg>
                                </button>
                                <button type="button" class="text-red-500 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="9" class="text-start font-normal"><button type="button" class="px-4 py-1 rounded bg-blue-500 hover:bg-blue-700 text-white cursor-pointer">Add Row</button></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
    <style>
        @keyframes opacity-anim{
            from {
                opacity: 0;
            }
        }
        @keyframes delay-dnone{
            from {
                display: grid !important;
            }
        }
        [data-modal-visible]{
            opacity: 0;
            display: grid;
            transition: all 300ms;
        }
        [data-modal-visible="false"] {
            display: none;
            animation: delay-dnone 5000ms;
        }
        [data-modal-visible="true"] {
            display: grid;
            opacity: 1;
            animation: opacity-anim 200ms;
        }
    </style>
    <button data-modal-toggle="modal">
        <div>tes</div>
    </button>
    <div id="modal" data-modal-visible="false" class="absolute justify-center items-center top-0 left-0 w-screen h-screen bg-gray-800/20 backdrop-blur-[4px] z-10">
        <div class="bg-white">test</div>
    </div>
    <script type="module">
        $(() => {
            $('[data-modal-toggle]').on('click', function(event) {
                let $modal = $('#' + $(this).attr('data-modal-toggle'));
                $modal.attr('data-modal-visible', (_, attr) => (attr == 'false' ? 'true' : 'false'));
            })

            $('[data-modal-visible]').on('click', function (event) {
                if(event.target == this){
                    $(this).attr('data-modal-visible', 'false')
                }
            })
        })
    </script>
@endsection
