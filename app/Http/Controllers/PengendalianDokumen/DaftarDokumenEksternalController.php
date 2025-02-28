<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use App\Models\PengendalianDokumen\DetailDaftarDokumenEksternal;
use App\Models\PengendalianDokumen\FormDaftarDokumenEksternal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DaftarDokumenEksternalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = FormDaftarDokumenEksternal::query();
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return '
                        <div class="flex gap-1 ml-1">
                            <a href="' . route('01.04.show', encrypt($row->id)) . '" class="text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z"></path></svg>                            </a>
                            <button data-delete-id="' . encrypt($row->id) . '" class="text-red-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path></svg>
                            </button>
                        </div>
                    ';
                })
                ->editColumn('signed_at', function ($row) {
                    return date_create($row->signed_at)->format('d-M-Y');
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-M-Y');
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at == '' ? '-' : $row->updated_at->format('d-M-Y');
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('01.04_daftar_dokumen_eksternal', [
            'pageName' => '01.04 Daftar Dokumen Eksternal'
        ]);
    }

    public function show($encryptedId)
    {
        $id = decrypt($encryptedId);
        $data = FormDaftarDokumenEksternal::with('details')->find($id);
        return view('01.04_show', [
            'pageName' => '01.04 Daftar Dokumen Eksternal',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('01.04_create', [
            'pageName' => '01.04 Daftar Dokumen Eksternal'
        ]);
    }

    public function store(Request $request)
    {
        $errorMsg = '';

        $parentValidator = Validator::make($request->all(), [
            'no_rekaman_dokumen' => 'required|unique:form_daftar_dokumen_eksternals,no_rekaman_dokumen',
            'nama_divisi' => 'required',
            'nama_document_control' => 'required',
            'nama_vice_president' => 'required'
        ]);
        $errorMsg .= $parentValidator->fails() ? implode('<br>', $parentValidator->errors()->all()) . '<br>' : '';

        $childValidationRule = [
            'tanggal' => 'required',
            'no_dokumen' => 'required',
            'nama_dokumen' => 'required',
            'klasifikasi_dokumen' => 'required',
            'penerbit_dokumen' => 'required',
            'tahun_terbit_dokumen' => 'required',
            'status_digunakan' => 'required'
        ];
        $errorMsg .= multiRowFormValidationHelper($request->details, $childValidationRule, 'Dokumen Eksternal');


        // the insertion to database
        if ($errorMsg == '') { // check if there is no error message
            $modifiedParentArray = $request->only('no_rekaman_dokumen', 'nama_divisi', 'nama_document_control', 'nama_vice_president'); // make new array for parent insert
            $modifiedParentArray['created_by'] = Auth::id(); // add created_by field filled with logged in user id
            $modifiedParentArray['updated_at'] = null; // prevent updated_at autofill
            $parentInsert = FormDaftarDokumenEksternal::create($modifiedParentArray); // the insert of the parent form
            $modifiedChildArray = []; // make new array for child form cz we need to add id_form for each
            foreach ($request->details as $value) {
                $value['id_form'] = $parentInsert->id; // add id_form field filled with id of previously inserted parent form
                array_push($modifiedChildArray, $value); // push to the child form new array
            }
            DetailDaftarDokumenEksternal::insert($modifiedChildArray); // executing the batch insert to the child form
            return response()->json(['message' => $parentInsert->id], 200); // finnaly return success response
        }
        // if the above if statement failed return errors
        return response()->json(['errors' => $errorMsg], 422);
    }

    public function edit($id) {}

    public function update($id) {}

    public function destroy($id)
    {
        FormDaftarDokumenEksternal::destroy(decrypt($id));
        return response()->json([], 200);
    }
}
