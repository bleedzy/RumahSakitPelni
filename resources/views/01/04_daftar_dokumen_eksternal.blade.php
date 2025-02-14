@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">01.04 Daftar Dokumen Eksternal</h1>
@endsection
@section('content')
    <script type="module">
        $(() => {
            // your table
            let $table = $('#DataTable');
            // specified the column of your table
            let $column = [{
                    data: 'no_rekaman_dokumen',
                },
                {
                    data: 'nama_divisi'
                },
                {
                    data: 'nama_document_control'
                },
                {
                    data: "signed_at"
                },
                {
                    data: 'created_at'
                },
                {
                    data: "updated_at"
                }
            ];

            // initiate DataTable
            $table = $table.DataTable({
                serverSide: true,
                ajax: '{{ route('01.04.index') }}',
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
                <a href="{{ route('01.04.create') }}">
                    <button class="flex items-center h-[36px] px-4 rounded bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white font-semibold cursor-pointer">Add New Document</button>
                </a>
           `);

            // button for sort by newest and oldest
            $('.dt-length').closest('.dt-layout-start').append(`
                <button id="sortNewest" class="flex items-center h-[36px] px-4 rounded bg-gray-200 hover:bg-gray-500 hover:text-white border border-gray-700 font-semibold cursor-pointer">Newest</button>
                <button id="sortOldest" class="flex items-center h-[36px] px-4 rounded bg-gray-200 hover:bg-gray-500 hover:text-white border border-gray-700 font-semibold cursor-pointer">Oldest</button>
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
                                        url: "{{ route('01.04.destroy', '') }}/" + $idToDelete,
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
            })
        })
    </script>
    <div class="overflow-auto">
        <div class="px-8 border-gray-500 text-nowrap min-w-min">
            <table id="DataTable" class="row-border">
                <thead>
                    <tr>
                        <th></th>
                        <th>No Rekaman</th>
                        <th>Nama Divisi</th>
                        <th>Nama Document Control</th>
                        <th>Signed At</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>No Rekaman</th>
                        <th>Nama Divisi</th>
                        <th>Nama Document Control</th>
                        <th>Signed At</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
