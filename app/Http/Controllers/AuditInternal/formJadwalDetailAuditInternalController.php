<?php

namespace App\Http\Controllers\AuditInternal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditInternal\formJadwalDetailAuditInternal;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class formJadwalDetailAuditInternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = formJadwalDetailAuditInternal::all();
        // dd($data);
        if ($request->ajax()) {
            $query = formJadwalDetailAuditInternal::with('user');
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return '
                        <div class="flex gap-1 ml-1">
                            <a href="' . route('03.04.show', encrypt($row->id)) . '" class="text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z"></path></svg>                            </a>
                            <button data-delete-id="' . encrypt($row->id) . '" class="text-red-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path></svg>
                            </button>
                        </div>
                    ';
                })
                ->editColumn('signed_at', function ($row) {
                    return empty($row->signed_at) ? '-' : Carbon::parse($row->signed_at)->format('d-M-Y');
                })
                ->editColumn('document_scan', function ($row) {
                    return empty($row->document_scan) ? '-' : $row->document_scan;
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('03.04_form_jadwal_detail_audit_internal', [
            'pageName' => '03.04 Jadwal Detail Audit Internal'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
