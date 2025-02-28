@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">{{ $pageName }}</h1>
@endsection
@section('content')
    <script type="module">
        $(() => {
            // your table
            let $table = $('#DataTable');
            // specified the column of your table
            let $column = [{
                    data: 'no_rekaman_ptk'
                },
                {
                    data: 'tanggal_audit'
                },
                {
                    data: 'nama_auditor'
                },
                {
                    data: 'nama_auditee'
                },
                {
                    data: 'nama_lead_auditor'
                },
                {
                    data: 'tanggal_penyelesaian'
                },
                {
                    data: 'no_ptk_baru'
                },
                {
                    data: 'nama_verifier'
                },
                {
                    data: 'tanggal_verifikasi'
                },
                {
                    data: 'signed_at'
                },
                {
                    data: 'document_scan'
                },
                {
                    data: 'user.name'
                }
            ];

            // initiate DataTable
            $table = $table.DataTable({
                serverSide: true,
                ajax: '{{ route('03.02.index') }}',
                deferLoading: false,
                columns: [{
                    data: "id",
                    visible: false
                }].concat($column.concat([{
                    data: "action",
                    searchable: false,
                    orderable: false
                }]))
            });

            // button for add new document, you may want to change the route inside it
            $('.dt-search').closest('.dt-layout-end').append(`
            <a href="{{ route('03.02.create') }}" class="flex items-center h-9 px-4 rounded bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white font-semibold cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[17px] mr-1"><path d="M11 bc1qpjq2u4vwnyxe3u0flg8hfp3c8mfmd9f38ydu07 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"></path></svg>
                Add New Document
            </a>
            `);

            // button for sort by newest and oldest
            $('.dt-length').closest('.dt-layout-start').append(`
            <button id="sortNewest" class="flex items-center h-9 px-4 rounded bg-gray-200 hover:bg-gray-500 hover:text-white border border-gray-700 font-semibold cursor-pointer">Newest</button>
            <button id="sortOldest" class="flex items-center h-9 px-4 rounded bg-gray-200 hover:bg-gray-500 hover:text-white border border-gray-700 font-semibold cursor-pointer">Oldest</button>
            `);
            $('#sortNewest').on('click', function() {
                $table.order(0, 'desc').draw();
            });
            $('#sortOldest').on('click', function() {
                $table.order(0, 'asc').draw();
            });
            $table.on('order.dt', function() {
                var $order = $table.order();
                var $column = $order[0][0];
                var $direction = $order[0][1];
                if ($column == 0) {
                    if ($direction == 'desc') {
                        $('#sortNewest').addClass('!bg-gray-700 text-white');
                        $('#sortOldest').removeClass('!bg-gray-700 text-white');
                    } else {
                        $('#sortNewest').removeClass('!bg-gray-700 text-white');
                        $('#sortOldest').addClass('!bg-gray-700 text-white');
                    }
                } else {
                    $('#sortNewest').removeClass('!bg-gray-700 text-white');
                    $('#sortOldest').removeClass('!bg-gray-700 text-white');
                }
            });

            // draw the table
            $table.order(0, 'desc').draw();

            // delete function
            $table.on('click', '[data-delete-id]', function() {
                let $idToDelete = $(this).attr('data-delete-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    heightAuto: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Last warning!",
                            icon: "warning",
                            html: 'Type "<span class="font-bold">confirm deletion</span>" to delete',
                            input: "text",
                            inputAttributes: {
                                autocomplete: 'off'
                            },
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Confirm",
                            heightAuto: false
                        }).then((result2) => {
                            if (result2.isConfirmed) {
                                if (result2.value != 'confirm deletion') {
                                    Swal.fire({
                                        title: "Deletion Failed!",
                                        text: "Wrong confirmation text!",
                                        icon: 'error',
                                        heightAuto: false
                                    })
                                } else {
                                    $.ajax({
                                        type: "delete",
                                        url: "{{ route('03.02.destroy', '') }}/" + $idToDelete,
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                        },
                                        success: function(response) {
                                            $table.draw();
                                            Swal.fire({
                                                title: "Deleted!",
                                                text: "Document has been deleted.",
                                                icon: "success",
                                                heightAuto: false
                                            });
                                        },
                                        error: function(response) {
                                            Swal.fire({
                                                title: "Deletion Failed!",
                                                text: response.error ?? 'something wrong',
                                                icon: 'error',
                                                heightAuto: false
                                            })
                                        }
                                    });
                                }
                            }
                        });
                    }
                });
            });
        })
    </script>
    <div class="overflow-auto">
        <div class="px-8 border-gray-500 text-nowrap min-w-min">
            <table id="DataTable" class="row-border">
                <thead>
                    <tr>
                        <th></th>
                        <th>No Rekaman PTK</th>
                        <th>Tanggal Audit</th>
                        <th>Nama Auditor</th>
                        <th>Nama Auditee</th>
                        <th>Nama Lead Auditor</th>
                        <th>Tanggal Penyelesaian</th>
                        <th>No PTK Baru</th>
                        <th>Nama Verifier</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Signed At</th>
                        <th>Document Scan</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>No Rekaman PTK</th>
                        <th>Tanggal Audit</th>
                        <th>Nama Auditor</th>
                        <th>Nama Auditee</th>
                        <th>Nama Lead Auditor</th>
                        <th>Tanggal Penyelesaian</th>
                        <th>No PTK Baru</th>
                        <th>Nama Verifier</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Signed At</th>
                        <th>Document Scan</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
