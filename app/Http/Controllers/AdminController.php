<?php

namespace App\Http\Controllers;

use App\Constants\UserConfirm;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function index()
    {
        return view('products.admin');
    }

    public function comfirmAdmin(Request $request)
    {
        DB::table('orders')
            ->where('order_id', $request->order_id)
            ->update(['admin_confirmed' => 1]);

        // Gửi email xác nhận đơn hàng
        Mail::send('emails.email_admin_confirm', ['order' => $request], function ($message) use ($request) {
            $message->to($request->email, $request->fullName)
                ->subject('Chúng tôi đã xác nhận với mã đơn hàng: #' . $request->order_id);
        });
        return redirect()->route('allOrderAdmin');
    }

    public function allOrderAdmin()
    {

        $orders = DB::table('orders')
            ->where('orders.user_confirmed', '=', UserConfirm::DaXacNhan)
            ->get();

        return view('layoutProduct.orderLP.all_order_admin', compact('orders'));
    }

    public function orderDetailAdmin(Request $request)
    {

        $order = Order::select('orders.*', 'order_details.product_id', 'order_details.product_quantity')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->where('orders.order_id', $request->order_id)
            ->first();

        $order_products = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->groupBy('order_details.product_id', 'order_details.product_quantity', 'products.productName', 'products.ProductPrice')
            ->select('order_details.product_id', 'order_details.product_quantity', 'products.productName', 'products.ProductPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
            ->where('order_details.order_id', $request->order_id)
            ->get();

        return view('layoutProduct.orderLP.order_detail_admin', compact('order', 'order_products'));
    }

    public function cancelOrderAdmin(Request $request)
    {
        DB::table('orders')
            ->where('order_id', $request->order_id)
            ->update(['admin_confirmed' => 2]);
        // Gửi email xác nhận đơn hàng
        Mail::send('emails.email_admin_cancel', ['order' => $request], function ($message) use ($request) {
            $message->to($request->email, $request->fullName)
                ->subject('Chúng tôi hủy đơn hàng với mã đơn hàng: #' . $request->order_id);
        });

        return redirect()->route('allOrderAdmin');
    }

}