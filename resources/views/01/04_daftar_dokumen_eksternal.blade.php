@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 class="font-bold text-3xl line-clamp-2">01.04 Daftar Dokumen Eksternal</h1>
@endsection
@section('content')
    <div class="overflow-auto">
        <div class="px-8 border-gray-500 text-nowrap min-w-min">
            <table id="example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="module">
        $(() => {
            $('#example').DataTable({
                serverSide: true,
                responsive: true,
                
            });

            // make add button
            $('.dt-search').closest('.dt-layout-end').append(`
                <a href="{{ '< - put your url here - >' }}">
                    <button class="flex items-center h-[36px] px-4 rounded bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white font-semibold cursor-pointer">Add User</button>
                </a>
            `);
        })
    </script>
@endsection
