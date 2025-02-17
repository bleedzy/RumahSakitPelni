@extends('layouts.app')
@section('sidebar')
    <x-side-bar pageName="{{ $pageName }}"></x-side-bar>
@endsection
@section('header')
    <h1 style="font-weight: bold; font-size: 2.5em;">05.01 Daftar Peraturan Keamanan Informasi</h1>
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
    a.button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #b0b0b0;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    a.button:hover {
        background-color: #909090;
    }
</style>

<table>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Peraturan</th>
        <th scope="col">Status</th>
        <th scope="col">PIC</th>
        <th scope="col">Batas Waktu</th>
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
        <td>
            <a href="{{--{{ route('daftar_pemenuhan_peraturan.detail', $item->id) }}--}}" class="button">Detail</a>
        </td>
      </tr>
    </tbody>
</table>
@endsection