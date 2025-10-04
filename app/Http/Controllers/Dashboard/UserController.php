<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        $search = $request->get('q', '');

        $query = User::query();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $users = $query->limit(10)->get(['id', 'name as text']);

        return response()->json([
            'results' => $users
        ]);
    }
}
