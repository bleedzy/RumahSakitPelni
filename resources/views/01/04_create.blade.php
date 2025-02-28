@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">01.04 Daftar Dokumen Eksternal</h1>
@endsection
@section('content')
    <div class="px-8 py-2">
        <form id="formParent" action="" method="post" class="flex flex-col gap-2">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Add New Document</div>
                <a href="{{ route('01.04.index') }}" class="ml-auto flex items-center px-4 h-9 bg-gray-500 text-white rounded cursor-pointer">Back</a>
            </div>
            <div id="errorDiv" class="hidden bg-red-700/50 border-2 border-red-700 p-4 rounded text-white">
                <h1 class="text-2xl font-semibold">Validation Error!</h1>
                <p></p>
            </div>
            <div class="flex items-center">
                <label for="inputNoRekamanDokumen" class="w-40 mr-2 leading-5">Nomor Rekaman</label>
                <input required type="text" name="no_rekaman_dokumen" id="inputNoRekamanDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaDivisi" class="w-40 mr-2 leading-5">Nama Divisi</label>
                <input required type="text" name="nama_divisi" id="inputNamaDivisi" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaDocumentControl" class="w-40 mr-2 leading-5">Nama Document Control</label>
                <input required type="text" name="nama_document_control" id="inputNamaDocumentControl" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="inputNamaVicePresident" class="w-40 mr-2 leading-5">Nama Vice President</label>
                <input required type="text" name="nama_vice_president" id="inputNamaVicePresident" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <style>
                .table-style td {
                    text-wrap: nowrap;
                }
            </style>
        </form>
        {{-- detail table --}}
        <div class="mt-2">Daftar Dokumen Eksternal:</div>
        <div class="overflow-x-scroll border-2 border-b-2 rounded bg-white">
            {{-- to make keterangan column not to long --}}
            <style>
                .table-style td:nth-child(8) {
                    max-width: 300px;
                    line-clamp: 2;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
            </style>
            <table id="tableDetail" class="table-style">
                <thead>
                    <tr>
                        <th>#</th>
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
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="10" class="text-start font-normal"><button type="button" data-modal-toggle="modalFormAddDetail" class="px-4 py-1 rounded bg-blue-500 hover:bg-blue-700 text-white cursor-pointer">Add Row</button></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <button id="parentFormSubmitBtn" form="formParent" class="group flex items-center justify-center w-full h-9 bg-blue-500 hover:bg-blue-700 disabled:bg-blue-300 disabled:cursor-progress text-white rounded cursor-pointer">
            <span>Submit</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 animate-spin hidden group-disabled:block">
                <path d="M18.364 5.63604L16.9497 7.05025C15.683 5.7835 13.933 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12H21C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C14.4853 3 16.7353 4.00736 18.364 5.63604Z"></path>
            </svg>
        </button>
    </div>
    <div id="modalFormAddDetail" data-modal-visible="false" class="absolute justify-center items-center top-0 left-0 w-screen h-screen bg-gray-800/20 backdrop-blur-[4px] z-10">
        <form id="formAddDetail" class="flex flex-col w-[calc(100vw-4rem)] max-w-2xl mx-7 gap-2 p-8 bg-white shadow-xl shadow-black/20">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Add New Row</div>
                <button type="button" data-modal-toggle="modalFormDetail" class="ml-auto flex items-center px-4 h-9 bg-gray-500 text-white rounded cursor-pointer">Back</button>
            </div>
            <div class="flex items-center">
                <label for="AddDetailTanggal" class="w-40 mr-2 leading-5">Tanggal</label>
                <input required type="date" name="tanggal" id="AddDetailTanggal" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailNoDokumen" class="w-40 mr-2 leading-5">No Dokumen</label>
                <input required type="text" name="no_dokumen" id="AddDetailNoDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailNamaDokumen" class="w-40 mr-2 leading-5">Nama Dokumen</label>
                <input required type="text" name="nama_dokumen" id="AddDetailNamaDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailKlasifikasiDokumen" class="w-40 mr-2 leading-5">Klasifikasi Dokumen</label>
                <input required type="text" name="klasifikasi_dokumen" id="AddDetailKlasifikasiDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailPenerbitDokumen" class="w-40 mr-2 leading-5">Penerbit Dokumen</label>
                <input required type="text" name="penerbit_dokumen" id="AddDetailPenerbitDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailTahunTerbitDokumen" class="w-40 mr-2 leading-5">Tahun Terbit Dokumen</label>
                <input required type="number" min="1900" max="2099" name="tahun_terbit_dokumen" id="AddDetailTahunTerbit" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailStatusDigunakan" class="w-40 mr-2 leading-5">Status Digunakan</label>
                <input required type="text" name="status_digunakan" id="AddDetailStatusDigunakan" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="AddDetailKeterangan" class="w-40 mr-2 leading-5">Keterangan</label>
                <input required type="text" name="keterangan" id="AddDetailKeterangan" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <button class="h-9 bg-blue-500 hover:bg-blue-700 text-white rounded cursor-pointer">Done</button>
        </form>
    </div>
    <div id="modalFormEditDetail" data-modal-visible="false" class="absolute justify-center items-center top-0 left-0 w-screen h-screen bg-gray-800/20 backdrop-blur-[4px] z-10">
        <form id="formEditDetail" class="flex flex-col w-[calc(100vw-4rem)] max-w-2xl mx-7 gap-2 p-8 bg-white shadow-xl shadow-black/20">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Edit Row</div>
                <button data-modal-toggle="modal" class="ml-auto flex items-center px-4 h-9 bg-gray-500 text-white rounded cursor-pointer">Back</button>
            </div>
            <div class="flex items-center">
                <label for="editDetailTanggal" class="w-40 mr-2 leading-5">Tanggal</label>
                <input required type="date" name="tanggal" id="editDetailTanggal" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailNoDokumen" class="w-40 mr-2 leading-5">No Dokumen</label>
                <input required type="text" name="no_dokumen" id="editDetailNoDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailNamaDokumen" class="w-40 mr-2 leading-5">Nama Dokumen</label>
                <input required type="text" name="nama_dokumen" id="editDetailNamaDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailKlasifikasiDokumen" class="w-40 mr-2 leading-5">Klasifikasi Dokumen</label>
                <input required type="text" name="klasifikasi_dokumen" id="editDetailKlasifikasiDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailPenerbitDokumen" class="w-40 mr-2 leading-5">Penerbit Dokumen</label>
                <input required type="text" name="penerbit_dokumen" id="editDetailPenerbitDokumen" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailTahunTerbitDokumen" class="w-40 mr-2 leading-5">Tahun Terbit Dokumen</label>
                <input required type="number" min="1900" max="2099" name="tahun_terbit_dokumen" id="editDetailTahunTerbit" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailStatusDigunakan" class="w-40 mr-2 leading-5">Status Digunakan</label>
                <input required type="text" name="status_digunakan" id="editDetailStatusDigunakan" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <div class="flex items-center">
                <label for="editDetailKeterangan" class="w-40 mr-2 leading-5">Keterangan</label>
                <input required type="text" name="keterangan" id="editDetailKeterangan" class="py-2 px-3 grow border-2 border-gray-500 rounded">
            </div>
            <button class="h-9 bg-blue-500 hover:bg-blue-700 text-white rounded cursor-pointer">Done</button>
        </form>
    </div>
    <script type="module">
        $(() => {
            let $finalFormData = {};
            $finalFormData['_token'] = '{{ csrf_token() }}';
            $finalFormData['details'] = {};
            let $tableDetail = $('#tableDetail');

            // handle add detail row
            let $modalFormDetail = $('#modalFormAddDetail');
            let $i = 0;
            $('#formAddDetail').on('submit', function(event) {
                event.preventDefault();
                let $formData = new FormData(this);
                let $columns = '';
                $finalFormData['details'][$i] = {};
                $formData.forEach((value, key) => {
                    $finalFormData['details'][$i][key] = value;
                    $columns += '<td>' + value + '</td>';
                })
                $tableDetail.append(`
                <tr id="detailRow` + $i + `">
                    <td class="detailRowNumber"></td>` +
                    $columns +
                    `<td>
                        <button data-detail-edit="` + $i + `" type="button" class="text-blue-700 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path d="M9.24264 18.9967H21V20.9967H3V16.754L12.8995 6.85453L17.1421 11.0972L9.24264 18.9967ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z"></path>
                            </svg>
                        </button>
                        <button data-detail-delete="` + $i + `" type="button" class="text-red-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path>
                            </svg>
                        </button>
                    </td>
                </tr>`);
                this.reset();
                $modalFormDetail.attr('data-modal-visible', 'false');
                $('.detailRowNumber').each(function(index, element) {
                    element.innerHTML = (index + 1) + '.';
                });
                $i += 1;
            });

            // handle edit detail row
            // handle the auto filling
            let $modalFormEditDetail = $('#modalFormEditDetail');
            let $formEditDetail = $('#formEditDetail');
            let $editedId = 0;
            $tableDetail.on('click', '[data-detail-edit]', function() {
                $editedId = $(this).attr('data-detail-edit');
                let $columns = $(this).closest('tr').find('td');
                let $formEditDetailInputs = $formEditDetail.find('input');
                let $i = -1;
                $columns.each(function() {
                    let $element = $(this);
                    // custom logic for other than input
                    // for example if column num 0 is role(admin, user, etc) you need to handle it separately
                    // if($i == 0) {
                    //     switch ($element.text()) {
                    //         case 'admin':
                    //             $('#editRoleAdmin').attr('checked', true);
                    //             break;
                    //         ......and more
                    //         default:
                    //             break;
                    //     }
                    //     return; // skip to next iteration
                    // }
                    $($formEditDetailInputs[$i]).val($element.text());
                    $i++;
                });
                $modalFormEditDetail.attr('data-modal-visible', true);
            });
            // handle the submit
            $formEditDetail.on('submit', function(event) {
                event.preventDefault();
                let $formData = new FormData(this);
                let $detailRowColumns = $('#detailRow' + $editedId).find('td');
                let $i = 1;
                $formData.forEach((value, key) => {
                    $detailRowColumns[$i].innerText = value;
                    $finalFormData['details'][$editedId][key] = value;
                    $i++;
                });
                this.reset();
                $modalFormEditDetail.attr('data-modal-visible', false);
            })

            // handle delete detail row
            $tableDetail.on('click', '[data-detail-delete]', function() {
                let $deleteId = $(this).attr('data-detail-delete');
                Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    heightAuto: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        delete $finalFormData['details'][$deleteId]
                        $('#detailRow' + $deleteId).remove();
                        $('.detailRowNumber').each(function(index, element) {
                            element.innerHTML = (index + 1) + '.';
                        });
                    }
                });
            });

            let $errorDiv = $('#errorDiv');
            // handle parrent submit
            let $parentFormSubmitBtn = $('#parentFormSubmitBtn');
            $('#formParent').on('submit', function(event) {
                event.preventDefault();
                let $formData = new FormData(this);
                $formData.forEach((value, key) => {
                    $finalFormData[key] = value;
                });
                $parentFormSubmitBtn.attr('disabled', '');
                $.ajax({
                    type: "post",
                    url: "{{ route('01.04.store') }}",
                    data: $finalFormData,
                    dataType: "json",
                    success: function(response) {
                        $errorDiv.addClass('hidden');
                        $parentFormSubmitBtn.removeAttr('disabled');
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Validation Error!",
                            heightAuto: false
                        });
                        $errorDiv.removeClass('hidden');
                        $errorDiv.find('p').html(xhr.responseJSON.errors);
                        $parentFormSubmitBtn.removeAttr('disabled');
                    }
                });
            });
        })
    </script>
@endsection
