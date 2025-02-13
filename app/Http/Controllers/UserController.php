<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query(); // this is the query that you want to show the data
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return '
                    <div class="flex gap-1 ml-1">
                        <a href="'. route('user.edit', encrypt($row->id)) .'" class="text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M12.8995 6.85453L17.1421 11.0972L7.24264 20.9967H3V16.754L12.8995 6.85453ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z"></path></svg>
                        </a>
                        <a href="'. route('user.delete', encrypt($row->id)) .'" class="text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path></svg>
                        </a>
                    </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user_list', [
            'pageName' => 'User List'
        ]);
    }
}
