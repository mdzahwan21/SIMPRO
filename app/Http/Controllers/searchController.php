<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// SearchController.php

namespace App\Http\Controllers;

use App\Models\YourModel; // Gantilah YourModel dengan model yang sesuai
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $results = YourModel::where('name', 'LIKE', '%' . $query . '%')
                            ->orWhere('nim', 'LIKE', '%' . $query . '%')
                            ->get();

        return response()->json($results);
    }
}

