<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProducts;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

use Exception;

class OrderController extends Controller
{
    public function showAllOrders()
    {
        try {
            $orders = Order::orderBy('created_at', 'desc')->get();
            return view('admin.orders.show_all', compact('orders'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function newOrder(Request $request)
    {
        try {

            $productIds = $request->input('products');
            $productIdsArray = explode(',', $productIds);
            $gst = $request->gst;
            $products = Product::whereIn('id', $productIdsArray)->get();

            $foundProductIds = $products->pluck('id')->toArray();

            $missingProductIds = array_diff($productIdsArray, $foundProductIds);

            if (!empty($missingProductIds)) {
                $missingProducts = implode(', ', $missingProductIds);
                $errorMessage = "Products with IDs $missingProducts not found.";
                return response()->json(['error' => $errorMessage], 404);
            }

            $totalPrice = $products->sum('price');

            $order = new Order();
            $order->price_amount = $totalPrice;
            $order->gst_percentage = $gst;
            $order->save();

            foreach ($products as $product) {
                $new_order_product = new OrderProducts();
                $new_order_product->order_id = $order->id;
                $new_order_product->product_id = $product->id;
                $new_order_product->save();
            }

            return response()->json(['success' => "Order placed successfully"]);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function viewOrder($order_id)
    {
        try {
            $order = Order::where('order_id', $order_id)->first();
            if (!$order) {
                return redirect()->back()->with('error', 'Order not found.');
            }
            return view('admin.orders.view', compact('order'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
