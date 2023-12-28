<?php
// app/Http/Controllers/PurchaseController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Returndetails;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{

public function create()
{
return view('Admin.purchase.insert_Purchase');
}

public function store(Request $request)
{
$validator = Validator::make($request->all(), [
'payment_method' => 'required',
'sup_ID' => 'required',
'extra_expenses' => 'required',
'total' => 'required',
'amount_paid' => 'required',
'purchase_details' => 'required|array|min:1',
'purchase_details.*.pro_id' => 'required',
'purchase_details.*.quantity' => 'required',
'purchase_details.*.total_cost' => 'required',
// أضف باقي الحقول هنا
]);

if ($validator->fails()) {
return redirect()->back()->withErrors($validator)->withInput();
}

$purchase = Purchase::create([
'payment_method' => $request->input('payment_method'),
'sup_ID' => $request->input('sup_ID'),
'extra_expenses' => $request->input('extra_expenses'),
'total' => $request->input('total'),
'amount_paid' => $request->input('amount_paid'),
// أضف باقي الحقول هنا
]);

// احفظ تفاصيل المشتريات
$purchaseDetails = $request->input('purchase_details');
foreach ($purchaseDetails as $detail) {
PurchaseDetail::create([
'purch_id' => $purchase->purch_ID,
'pro_id' => $detail['pro_id'],
'quantity' => $detail['quantity'],
'total_cost' => $detail['total_cost'],
// أضف باقي الحقول هنا
]);
}

return redirect()->route('admin.purchases.index')->with('success', 'تم إضافة المشتريات بنجاح.');
}



public function return()
{
// صفحة استعادة المشتريات
return view('Admin.purchase.Returndetails');
}

public function processReturn(Request $request): \Illuminate\Http\RedirectResponse
{
// معالجة طلب الاسترجاع وتحديث الكميات والمبالغ
$validator = Validator::make($request->all(), [
'purchase_details_id' => 'required',
'return_date' => 'required',
'quantity_returned' => 'required',
'amount_returned' => 'required',
// أضف باقي الحقول هنا
]);

if ($validator->fails()) {
return redirect()->back()->withErrors($validator)->withInput();
}

// اكمل معالجة الاسترجاع حسب حاجتك

return redirect()->route('admin.purchases.index')->with('success', 'تم استعادة المشتريات بنجاح.');
}
}
