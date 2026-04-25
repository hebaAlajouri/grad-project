<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

public function store(Request $request)
{
    $data = $request->all();

    $data['created_by'] = auth()->id(); // 🔥 هون الحل

    Coupon::create($data);

    return redirect()->route('coupons.index');
}
public function edit($id)
{
    $coupon = Coupon::findOrFail($id);
    return view('admin.coupons.edit', compact('coupon'));
}

public function update(Request $request, $id)
{
    Coupon::findOrFail($id)->update($request->all());
    return redirect()->route('coupons.index');
}
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return back();
    }
}