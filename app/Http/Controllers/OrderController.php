<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\ProductCart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {if (auth()->check()) {
        $products = DB::table('products')
            ->join('product_carts', 'product_carts.product_id', '=', 'products.id')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->groupBy('products.id', 'products.productName', 'products.productPrice', 'product_carts.quantity', 'product_carts.id')
            ->select('products.id', 'products.productName', 'products.productPrice', 'product_carts.quantity', 'product_carts.id as product_cart_id', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
            ->where('product_carts.user_id', '=', auth()->user()->id)
            ->get();

        $total_price_cart = Product::join('product_carts', 'product_carts.product_id', '=', 'products.id')
            ->where('product_carts.user_id', '=', auth()->user()->id)
            ->selectRaw('SUM(products.productPrice * product_carts.quantity) AS total_amount')
            ->first()
            ->total_amount;
        $total_money = $total_price_cart;
    } else {
        $products = null;
        $total_price_cart = null;
        $total_money = null;
    }
        return view('website.order', compact('products', 'total_price_cart', 'total_money'));
    }

    public function generateInvoiceNumber()
    {
        $lastOrder_id = DB::table('orders')->max('order_id');
        $nextOrder_id = 'HD' . str_pad(intval(substr($lastOrder_id, 2)) + 1, 5, '0', STR_PAD_LEFT);

        return $nextOrder_id;
    }

    public function confirmPayment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'regex:/^(0|\+84)[3|5|7|8|9][0-9]{8}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
            'fullName' => ['required', 'string', 'max:30'],
            'address' => ['max:255'],
            'note' => ['max:1000'],
        ], [
            'email.regex' => "Gmail không hợp lệ",
            'email.required' => "Gmail không được để trống",
            'email.max' => "gmail không đúng",

            'phone.required' => "số điện thoại không được để trống",
            'phone.regex' => "số điện thoại không hợp lệ",

            'fullName.required' => "Họ và tên không được để trống",
            'fullName.max' => "Họ và tên quá dài",
            'address.max' => "địa chỉ quá dài",
            'note.max' => "ghi chú quá dài",
        ]);

        if ($validator->fails()) {

            if ($validator->errors()->has('phone')) {
                $errors['phone'] = $validator->errors()->first('phone');
            }
            if ($validator->errors()->has('email')) {
                $errors['email'] = $validator->errors()->first('email');
            }

            if ($validator->errors()->has('fullName')) {
                $errors['fullName'] = $validator->errors()->first('fullName');
            }

            return redirect()->route('order')
                ->withErrors($errors)
                ->withInput();
        }

        $order = Order::make([
            'order_id' => $this->generateInvoiceNumber(),
            'user_id' => auth()->user()->id,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'totalMoney' => $request->total_money,
            'user_confirmed' => 0,
            'admin_confirmed' => 0,
        ]);
        $order->save();

        $products = DB::table('products')
            ->join('product_carts', 'product_carts.product_id', '=', 'products.id')
            ->select('products.id as product_id', 'product_carts.quantity', 'product_carts.id as product_cart_id')
            ->where('product_carts.user_id', '=', $order->user_id)
            ->get();

        foreach ($products as $product) {
            $order_detail = Order_detail::make([
                'order_id' => $order->order_id,
                'product_id' => $product->product_id,
                'product_quantity' => $product->quantity,
            ]);
            $order_detail->save();
            $product_cart = ProductCart::find($product->product_cart_id);
            $product_cart->delete();
        }

        // Gửi email xác nhận đơn hàng
        Mail::send('emails.payment_confirm', ['order' => $order], function ($message) use ($order) {
            $message->to($order->email, $order->fullName)
                ->subject('Vui lòng xác nhận đơn hàng!!');
        });

        //cập nhật cart cho user
        $cartItemCount = DB::table('product_carts')
        ->where('user_id', auth()->user()->id)
        ->count();
        session()->put('cart', $cartItemCount);
        
        
        // Trả về view để xác nhận thanh toán
        return redirect()->route("allOrder");
    }

    public function comfirm(Request $request)
    {
        DB::table('orders')
            ->where('order_id', $request->order_id)
            ->update(['user_confirmed' => 1]);
            
        // Gửi email xác nhận đơn hàng
        Mail::send('emails.email_confirm', ['order' => $request], function ($message) use ( $request) {
            $message->to( $request->email,  $request->fullName)
                ->subject('Bạn vừa đặt hàng tại 3TDL Store với mã đơn hàng: #' . $request->order_id);
        });
        
        return redirect()->route('allOrder');
    }
    
    public function cancelOrder(Request $request)
    {
        DB::table('orders')
            ->where('order_id', $request->order_id)
            ->update(['user_confirmed' => 2]);
            

        return redirect()->route('allOrder');
    }

    public function allOrder()
    {
        if (auth()->check()) {
            $orders = DB::table('orders')
                ->where('orders.user_id', '=', auth()->user()->id)
                ->get();

        } else {
            $orders = null;
        }

        return view('website.all_order', compact('orders'));
    }

    public function orderDetail(Request $request)
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

        return view('website.order_detail', compact('order', 'order_products'));
    }

    public function orderLookup()
    {
        $order = null;
        $order_products = null;
        return view('website.order_lookup',compact('order','order_products'));
    }

    public function searchResults(Request $request)
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
        
        return view('website.order_lookup',compact('order','order_products'));
    }

}