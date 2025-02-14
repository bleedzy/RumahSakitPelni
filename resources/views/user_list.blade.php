@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-4xl line-clamp-2">User List</h1>
@endsection
@section('content')
    <script type="module">
        $(() => {
            $('#DataTable').DataTable({
                serverSide: true,
                responsive: true,
                ajax: '{{ route('user.index') }}',
                columns: [
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
            // make add button
            $('.dt-search').closest('.dt-layout-end').append(`
                <a href="{{ route('user.create') }}">
                    <button class="flex items-center h-[36px] px-4 rounded bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white font-semibold cursor-pointer">Add User</button>
                </a>
            `);
        })
    </script>
    <div class="overflow-auto">
        <div class="px-8 border-gray-500 text-nowrap min-w-min">
            <table id="DataTable" class="row-border">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
