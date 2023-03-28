<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor as Vendor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function getVendor($count)
    {
        return DB::table('vendors')->join('products', 'vendors.id', 'products.vendor_id')->limit(5)->orderBy('vendors.created_at', 'desc')->orderBy('products.created_at', 'desc')->groupBy('vendors.id')->select('vendor.*', 'product.*')->take($count)->get();
    }

    public function getVendorWeek($count)
    {
        $start = Carbon::now()->startOfWeek();
        $end = Carbon::now()->endOfWeek();
        return DB::table('orders')->select('vendor_id', DB::raw('count(*) as order_count'))->whereBetween('created_at', [$start, $end])->groupBy('vendor_id')->orderByDesc('order_count')->limit($count)->get();
    }
}
