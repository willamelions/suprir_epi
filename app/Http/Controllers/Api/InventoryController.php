<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estoque;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $obraId = $request->query('obra_id');
        $query = Estoque::with(['item', 'obra']);
        if ($obraId) {
            $query->where('obra_id', $obraId);
        }
        return $query->paginate(100);
    }
}
