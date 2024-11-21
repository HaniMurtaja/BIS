<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Dompdf\Dompdf;

class OrderController extends Controller
{
   
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'payment_details' => 'required|string', 
            'cart' => 'required|array', 
        ]);

        
        $order = Order::create([
            'user_name' => $validated['name'],
            'address' => $validated['address'],
            'payment_details' => $validated['payment_details'],
        ]);

       
        foreach ($validated['cart'] as $cartItem) {
            $product = Product::find($cartItem['id']);
            $order->products()->attach($product, ['quantity' => $cartItem['quantity']]);
        }

        
        return response()->json(['message' => 'Order completed successfully', 'order_id' => $order->id]);
    }
    
   
    public function generateInvoice($orderId)
{
    $order = Order::with('products')->find($orderId);

    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }

    // Generate PDF using Dompdf
    $mpdf = new Dompdf();
    $html = view('invoice', compact('order'))->render();  
    $mpdf->loadHtml($html);
    $mpdf->render();
    
    // Stream the PDF to the browser
    return $mpdf->stream('invoice.pdf');
}

}
