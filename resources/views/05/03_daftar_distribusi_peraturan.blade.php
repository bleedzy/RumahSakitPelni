@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 style="font-weight: bold; font-size: 2.5em;">05.03 Daftar Distribusi Peraturan</h1>
@endsection
@section('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>

<table>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">No Peraturan</th>
        <th scope="col">Judul Peraturan</th>
        <th scope="col">Unit Kerja</th>
        <th scope="col">Tanggal Menerima</th>
        <th scope="col">TTD Penerima</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
</table>
@endsection