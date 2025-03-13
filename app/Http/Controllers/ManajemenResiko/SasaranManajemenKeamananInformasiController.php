<?php

namespace App\Http\Controllers\ManajemenResiko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ManajemenResiko\SasaranManajemenKeamananInformasi;

class SasaranManajemenKeamananInformasiController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $query = SasaranManajemenKeamananInformasi::query();
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return '
                        <div class="flex gap-1 ml-1">
                            <a href="' . route('05.01.show', encrypt($row->id)) . '" class="text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z"></path></svg>                            </a>
                            </a>
                            <button data-delete-id="' . encrypt($row->id) . '" class="text-red-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path></svg>
                            </button>
                        </div>
                    ';
                })
                ->editColumn('signed_at', function ($row) {
                    return optional($row->signed_at)->format('d-M-Y') ?? '-';
                })
                ->editColumn('created_at', function ($row) {
                    return optional($row->created_at)->format('d-M-Y') ?? '-';
                })
                ->editColumn('updated_at', function ($row) {
                    return optional($row->updated_at)->format('d-M-Y') ?? '-';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('06.02_sasaran_manajemen_keamanan_informasi', [
            'pageName' => '05.01 Daftar Peraturan Keamanan Informasi'
        ]);
    }

    // Menampilkan form untuk menambah data
    public function create()
    {
        return view('sasaran.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'tujuan' => 'required',
            'sasaran' => 'required',
            'sumber_data' => 'required',
            'frekuensi_pemantauan_sasaran' => 'required',
            'penanggung_jawab' => 'required',
            'pic_monitoring' => 'required',
        ]);

        SasaranManajemenKeamananInformasi::create($request->all());
        return redirect()->route('sasaran.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan satu data berdasarkan ID
    public function show($id)
    {
        $sasaran = SasaranManajemenKeamananInformasi::findOrFail($id);
        return view('sasaran.show', compact('sasaran'));
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $sasaran = SasaranManajemenKeamananInformasi::findOrFail($id);
        return view('sasaran.edit', compact('sasaran'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required',
            'sasaran' => 'required',
            'sumber_data' => 'required',
            'frekuensi_pemantauan_sasaran' => 'required',
            'penanggung_jawab' => 'required',
            'pic_monitoring' => 'required',
        ]);

        $sasaran = SasaranManajemenKeamananInformasi::findOrFail($id);
        $sasaran->update($request->all());
        return redirect()->route('sasaran.index')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data
    public function destroy($id)
    {
        $sasaran = SasaranManajemenKeamananInformasi::findOrFail($id);
        $sasaran->delete();
        return redirect()->route('sasaran.index')->with('success', 'Data berhasil dihapus');
    }
}
