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
        $orders = Order::simplePaginate(10);
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

        // Attempt to load the Stock model directly
        $stock = Stock::where('menu_id', $menu->id)->first();

        if (!$stock || $stock->quantity < $request->input('quantity')) {
            // If stock is not found or insufficient, return with an error message
            return redirect()->back()->with('error', 'Stock habis atau tidak mencukupi untuk pesanan ini');
        }

        $order = new Order([
            'quantity' => $request->input('quantity'),
            'total_price' => (($menu->harga_menu * $request->input('quantity')) - ($menu->harga_menu * ($promo ? $promo->nilai_potongan : 0))),
        ]);

        $order->menu()->associate($menu);
        $order->promo()->associate($promo);
        $order->user()->associate($user);
        $order->save();

        // Update stock
        $stock->quantity -= $request->input('quantity');
        $stock->save();

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
            'menu_id' => 'required|exists:menus,id',
            'promo_id' => 'exists:promos,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->input('menu_id'));
        $promo = Promo::find($request->input('promo_id'));
        $user = User::find($request->input('user_id'));

        $order->menu()->associate($menu);
        $order->promo()->associate($promo);
        $order->user()->associate($user);

        // Update total_price based on the updated quantity and applicable promo
        $order->quantity = $request->input('quantity');
        $order->total_price = (($menu->harga_menu * $request->input('quantity')) - ($menu->harga_menu * ($promo ? $promo->nilai_potongan : 0)));

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

        return redirect()->route('orders.index')->with('success', 'Order berhasil diupdate');
    }


    public function destroy(Order $order)
    {
        // Get the associated menu and quantity
        $menu = $order->menu;
        $quantity = $order->quantity;

        // Restore the stock
        $stock = Stock::where('menu_id', $menu->id)->first();

        if ($stock) {
            // Update stock quantity by adding back the ordered quantity
            $stock->quantity += $quantity;
            $stock->save();
        } else {
            // Handle the case where the stock is not found
            // You might need to create a stock entry or handle it according to your logic
        }

        // Delete the order
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus dan stok dikembalikan');
    }
}