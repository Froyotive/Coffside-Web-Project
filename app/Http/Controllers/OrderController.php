<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['menu', 'promo', 'user'])->paginate(5);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        $promos = Promo::all();
        $customers = User::where('role', 'customer')->get();

        return view('orders.create', compact('menus', 'promos', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'promo_id' => 'exists:promos,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->input('menu_id'));
        $promo = Promo::find($request->input('promo_id'));
        $user = User::find($request->input('user_id'));

        $order = new Order([
            'quantity' => $request->input('quantity'),
            'total_price' => (($menu->harga_menu * $request->input('quantity')) - ($menu->harga_menu * ($promo ? $promo->nilai_potongan : 0))),
        ]);

        $order->menu()->associate($menu);
        $order->promo()->associate($promo);
        $order->user()->associate($user);
        $order->save();

        // Attempt to load the Stock model directly
        $stock = Stock::where('menu_id', $menu->id)->first();

        if ($stock) {
            // Update stock
            $stock->quantity -= $request->input('quantity');
            $stock->save();
        } else {
            // Handle the case where the stock is not found
            // You might need to create a stock entry or handle it according to your logic
        }

        return redirect()->route('orders.index')->with('success', 'Order berhasil ditambahkan');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $menus = Menu::all();
        $promos = Promo::all();
        $customers = User::where('role', 'customer')->get();

        return view('orders.edit', compact('order', 'menus', 'promos', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            // ... your validation rules ...
        ]);

        // Update the order details
        $menu = $order->menu;
        $promo = $order->promo;

        // Calculate the updated total price based on the new quantity
        $updatedTotalPrice = ($menu->harga_menu - ($promo ? $promo->nilai_potongan : 0)) * $request->input('quantity');

        // Update the order details
        $order->update([
            'menu_id' => $request->input('menu_id'),
            'promo_id' => $request->input('promo_id'),
            'user_id' => $request->input('user_id'),
            'quantity' => $request->input('quantity'),
            'total_price' => $updatedTotalPrice,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbarui');
    }

    public function destroy(Order $order)
    {
        // Delete the order
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus');
    }
}