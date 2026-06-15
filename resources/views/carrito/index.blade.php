@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold text-white mb-6">Tu Carrito</h1>

        @if($items->isEmpty())
            <div class="bg-slate-800/60 border border-slate-700 rounded-xl p-6 text-slate-300">
                No tienes cursos en el carrito.
            </div>
        @else
            <div class="space-y-4">
                @foreach($items as $item)
                    <div class="flex items-center justify-between bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ $item->curso->url_imagen ? asset('storage/'.$item->curso->url_imagen) : asset('images/logos/TCF.png') }}" class="w-16 h-16 object-cover rounded-lg" alt="{{ $item->curso->titulo }}">
                            <div>
                                <div class="text-white font-semibold">{{ $item->curso->titulo }}</div>
                                <div class="text-slate-400 text-sm">${{ number_format($item->curso->precio ?? 0, 2) }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <form method="POST" action="{{ route('carrito.update', $item) }}" class="flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <input type="number" min="1" name="quantity" value="{{ $item->quantity }}" class="w-16 bg-slate-900/60 border border-slate-700 rounded-lg text-white px-2 py-1" />
                                <button class="px-3 py-1 rounded-lg bg-cyan-600 text-white hover:bg-cyan-500">Actualizar</button>
                            </form>
                            <form method="POST" action="{{ route('carrito.remove', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 rounded-lg bg-red-600 text-white hover:bg-red-500">Quitar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex items-center justify-between bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                <div class="text-slate-300">Total</div>
                <div class="text-white font-semibold text-xl">${{ number_format($total, 2) }}</div>
            </div>
        @endif
    </div>
@endsection


