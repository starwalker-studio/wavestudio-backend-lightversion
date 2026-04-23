<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\product\WavestoreProduct;
use Illuminate\Http\Request;

class WavestoreProductController extends Controller
{
    public function productIndex(Request $request)
    {
        $perPage = (int) $request->input('perPage', 10);

        $query = WavestoreProduct::with('brand')->orderBy('id_brand', 'asc');

        $filters = $request->only([
            'id_brand',
            'in_stock',
            'min_price',
            'max_price',
        ]);

        self::filterQuery($query, $filters);

        $paginator = $query->paginate($perPage);

        return response()->json($paginator);
    }

    private static function filterQuery($query, $filters)
    {
        if (isset($filters['in_stock'])) {
            $query->where('in_stock', $filters['in_stock']);
        }

        if (!empty($filters['id_brand'])) {
            $query->whereIn('id_brand', $filters['id_brand']);
        }

        if (!empty($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }

        if (!empty($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
    }
}
