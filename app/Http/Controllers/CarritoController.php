<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $items = CartItem::with('curso')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        $total = $items->reduce(function ($carry, CartItem $item) {
            $precio = (float) ($item->curso->precio ?? 0);
            return $carry + ($precio * max(1, (int) $item->quantity));
        }, 0.0);

        return view('usuario-estudiante.carrito.index', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $quantity = (int) ($data['quantity'] ?? 1);
        $item = CartItem::firstOrCreate(
            ['user_id' => Auth::id(), 'curso_id' => $data['curso_id']],
            ['quantity' => 0]
        );
        $item->quantity = max(1, (int) $item->quantity) + $quantity - 1; // ensure min 1
        $item->save();

        return back()->with('success', 'Curso agregado al carrito.');
    }

    public function update(Request $request, CartItem $item)
    {
        abort_unless($item->user_id === Auth::id(), 403);
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $item->update(['quantity' => $data['quantity']]);
        return back()->with('success', 'Cantidad actualizada.');
    }

    public function remove(CartItem $item)
    {
        abort_unless($item->user_id === Auth::id(), 403);
        $item->delete();
        return back()->with('success', 'Eliminado del carrito.');
    }
}


