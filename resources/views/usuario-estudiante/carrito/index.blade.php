@extends('layouts.app')

@section('title', 'Mi Carrito - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-cyan-300/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute top-40 left-40 w-80 h-80 bg-emerald-300/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Matrix Rain Background -->
    <canvas id="matrix-canvas" class="absolute inset-0 w-full h-full pointer-events-none opacity-10 z-0"></canvas>

    <!-- CRT scanlines overlay -->
    <div class="crt-overlay absolute inset-0 pointer-events-none z-0"></div>

    <!-- Main Content -->
    <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 z-20">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-cyan-400 hover:text-cyan-300 transition-colors duration-300 flex items-center">
                    <span class="material-icons text-sm mr-1">home</span>
                    Inicio
                </a>
                <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                <a href="{{ route('usuario-estudiante') }}" class="text-cyan-400 hover:text-cyan-300 transition-colors duration-300">Dashboard</a>
                <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                <span class="text-gray-300">Mi Carrito</span>
            </div>
        </nav>

        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Mi <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-400">Carrito</span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Revisa tus cursos seleccionados y procede con tu compra.
            </p>
        </div>

        @if($items->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="relative mb-8">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-purple-500/20 rounded-full blur-2xl"></div>
                    <div class="relative w-32 h-32 bg-gradient-to-br from-slate-800 to-slate-700 rounded-full flex items-center justify-center mx-auto border border-slate-600/50">
                        <span class="material-icons text-cyan-400 text-6xl">shopping_cart</span>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Tu carrito está vacío</h3>
                <p class="text-gray-400 mb-8 max-w-md mx-auto">
                    Explora nuestro catálogo de cursos y añade los que más te interesen.
                </p>
                <a href="{{ route('usuario.cursos.catalogo') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-500 hover:to-purple-500 text-white font-semibold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30">
                    <span class="material-icons text-sm">explore</span>
                    Explorar Cursos
                </a>
            </div>
        @else
            <!-- Cart Items -->
            <div class="space-y-6 mb-8">
                @foreach($items as $item)
                    <div class="group tilt-card reveal bg-white/10 backdrop-blur-lg border border-slate-300/20 rounded-2xl p-6 shadow-[0_8px_32px_rgba(0,0,0,0.3)] hover:bg-white/15 transition-all duration-500 hover:scale-[1.02] hover:shadow-[0_12px_40px_rgba(0,0,0,0.4)]">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                            <!-- Course Info -->
                            <div class="flex items-center gap-6">
                                <!-- Course Image -->
                                <div class="relative w-24 h-24 rounded-xl overflow-hidden bg-gradient-to-br from-slate-800 to-slate-700 border border-slate-600/50">
                                    @if($item->curso->url_imagen)
                                        <img src="{{ Storage::url($item->curso->url_imagen) }}"
                                             alt="{{ $item->curso->titulo }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="material-icons text-slate-400 text-3xl">school</span>
                                        </div>
                                    @endif
                                    <!-- Category Badge -->
                                    <div class="absolute -top-2 -right-2">
                                        <span class="bg-gradient-to-r from-cyan-500 to-purple-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                            {{ $item->curso->categoria->nombre ?? 'Curso' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Course Details -->
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors duration-300">
                                        {{ $item->curso->titulo }}
                                    </h3>
                                    <p class="text-gray-400 text-sm mb-3 line-clamp-2">
                                        {{ $item->curso->descripcion }}
                                    </p>

                                    <!-- Course Meta -->
                                    <div class="flex items-center gap-4 text-sm text-gray-500">
                                        @if($item->curso->duracion_horas)
                                            <span class="flex items-center gap-1">
                                                <span class="material-icons text-xs">schedule</span>
                                                {{ $item->curso->duracion_horas }}h
                                            </span>
                                        @endif
                                        @if($item->curso->nivel_dificultad)
                                            <span class="flex items-center gap-1">
                                                <span class="material-icons text-xs">trending_up</span>
                                                {{ ucfirst($item->curso->nivel_dificultad) }}
                                            </span>
                                        @endif
                                        @if($item->curso->creador)
                                            <span class="flex items-center gap-1">
                                                <span class="material-icons text-xs">person</span>
                                                {{ $item->curso->creador->name }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Price and Actions -->
                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                <!-- Price -->
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-white mb-1">
                                        @if($item->curso->precio > 0)
                                            ${{ number_format($item->curso->precio, 2) }} MXN
                                        @else
                                            <span class="text-green-400">Gratis</span>
                                        @endif
                                    </div>
                                    @if($item->quantity > 1)
                                        <div class="text-sm text-gray-400">
                                            Total: ${{ number_format($item->curso->precio * $item->quantity, 2) }} MXN
                                        </div>
                                    @endif
                                </div>

                                <!-- Quantity and Actions -->
                                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                                    <!-- Quantity Update -->
                                    <form method="POST" action="{{ route('carrito.update', $item) }}" class="flex items-center gap-2 flex-1 sm:flex-initial">
                                        @csrf
                                        @method('PUT')
                                        <label class="text-xs text-gray-400 sm:hidden">Cantidad:</label>
                                        <div class="relative flex items-center gap-2">
                                            <button type="button"
                                                    onclick="decrementQuantity(this)"
                                                    class="w-8 h-8 bg-slate-700/50 hover:bg-slate-600 border border-slate-600/50 rounded-lg text-white flex items-center justify-center transition-all duration-300 hover:scale-110">
                                                <span class="material-icons text-sm">remove</span>
                                            </button>
                                            <input type="number"
                                                   min="1"
                                                   name="quantity"
                                                   value="{{ $item->quantity }}"
                                                   class="w-16 sm:w-20 bg-slate-800/60 border border-slate-600/50 rounded-lg text-white px-2 py-2 text-center focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-300 text-sm font-semibold" />
                                            <button type="button"
                                                    onclick="incrementQuantity(this)"
                                                    class="w-8 h-8 bg-slate-700/50 hover:bg-slate-600 border border-slate-600/50 rounded-lg text-white flex items-center justify-center transition-all duration-300 hover:scale-110">
                                                <span class="material-icons text-sm">add</span>
                                            </button>
                                        </div>
                                        <button type="submit"
                                                class="px-3 sm:px-4 py-2 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30 flex items-center gap-1 text-sm">
                                            <span class="material-icons text-sm">update</span>
                                            <span class="hidden sm:inline">Actualizar</span>
                                        </button>
                                    </form>

                                    <!-- Remove Button -->
                                    <form method="POST" action="{{ route('carrito.remove', $item) }}" class="flex-1 sm:flex-initial">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full sm:w-auto px-3 sm:px-4 py-2 bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-500 hover:to-pink-500 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-red-400/30 flex items-center justify-center gap-1 text-sm">
                                            <span class="material-icons text-sm">delete</span>
                                            <span>Quitar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total and Checkout -->
            <div class="cyber-panel">
                <div class="cyber-grid"></div>

                <!-- Resumen del pedido -->
                <div class="cyber-section">
                    <h3 class="glitch-title">
                        <div class="badge-cyber">
                            <span class="material-icons text-cyan-400 text-xl">receipt_long</span>
                        </div>
                        Resumen del Pedido
                    </h3>
                    <div class="space-y-4 cyber-card">
                        <div class="flex justify-between items-center py-2 tracking-tight">
                            <div class="flex items-center gap-2">
                                <span class="material-icons text-gray-400 text-sm">shopping_bag</span>
                                <span class="text-gray-300 font-medium">Subtotal ({{ $items->count() }} {{ $items->count() === 1 ? 'curso' : 'cursos' }})</span>
                            </div>
                            <span class="text-white font-bold text-lg">${{ number_format($total, 2) }} MXN</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-t border-slate-600/30 tracking-tight">
                            <div class="flex items-center gap-2">
                                <span class="material-icons text-gray-400 text-sm">percent</span>
                                <span class="text-gray-300 font-medium">Impuestos</span>
                            </div>
                            <span class="text-gray-400 font-semibold">$0.00 MXN</span>
                        </div>
                    </div>
                </div>

                <!-- Total -->
                <div class="cyber-total">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2">
                            <span class="material-icons text-cyan-400 text-xl">payments</span>
                            <span class="text-gray-200 text-xl font-semibold">Total a pagar</span>
                        </div>
                        <div class="text-right">
                            <span class="text-4xl md:text-5xl font-bold text-white block leading-tight">
                                ${{ number_format($total, 2) }}
                            </span>
                            <span class="text-sm text-gray-400 font-medium">MXN</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-3 pt-3 border-t border-cyan-500/20">
                        <span class="material-icons text-green-400 text-sm">check_circle</span>
                        <p class="text-xs text-gray-300">
                            Precio final incluye todos los cursos • Sin cargos adicionales
                        </p>
                    </div>
                </div>

                <!-- Checkout Buttons -->
                <div class="relative space-y-5 z-10">
                    <!-- Botones de pago -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-base font-semibold text-white flex items-center gap-2">
                                <div class="w-7 h-7 bg-gradient-to-br from-purple-500/30 to-pink-500/30 rounded-md flex items-center justify-center">
                                    <span class="material-icons text-purple-300 text-base">payment</span>
                                </div>
                                Métodos de Pago
                            </h4>
                            <span class="text-xs text-gray-400 font-medium">Selecciona tu método</span>
                        </div>

                        <!-- Contenedor PayPal Button -->
                        <div class="relative bg-gradient-to-br from-slate-800/50 via-slate-700/50 to-slate-800/50 rounded-xl p-4 border border-slate-500/50 hover:border-blue-500/70 transition-all duration-500 group shadow-xl hover:shadow-2xl hover:shadow-blue-500/30 overflow-hidden backdrop-blur-sm">
                            <!-- Efecto de brillo en hover -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-blue-500/10 to-blue-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 -translate-x-full group-hover:translate-x-full"></div>

                            <!-- Header con icono y badge -->
                            <div class="relative flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="relative">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500/30 to-blue-600/30 rounded-lg flex items-center justify-center group-hover:from-blue-500/40 group-hover:to-blue-600/40 transition-all duration-300 shadow-lg group-hover:shadow-blue-500/50 group-hover:scale-110">
                                            <svg class="w-6 h-6 text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.337 7.1-9.74 7.1H8.354c-.24 0-.47.112-.61.303l-4.65 6.9a.641.641 0 0 0-.017.724l1.6 2.373zm.49-3.678.51.761h9.08c4.007 0 6.79-1.583 7.644-5.566.36-1.752.174-3.203-.55-4.276-.883-1.33-2.43-1.93-4.576-1.93H6.248L4.195 17.66z"/>
                                            </svg>
                                        </div>
                                        <!-- Punto de notificación -->
                                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-slate-900 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <label class="text-base font-semibold text-white block leading-tight">PayPal</label>
                                        <p class="text-[11px] text-gray-400 mt-0.5">Método de pago rápido</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <div class="flex items-center gap-1 px-2.5 py-0.5 bg-green-500/20 border border-green-500/30 rounded-full">
                                        <span class="material-icons text-green-400 text-xs">verified</span>
                                        <span class="text-xs font-bold text-green-400">Seguro</span>
                                    </div>
                                    <span class="text-[10px] text-gray-500 font-medium">SSL Encriptado</span>
                                </div>
                            </div>

                            <!-- Contenedor de botones PayPal -->
                            <div class="relative">
                                <div id="paypal-button-container" class="min-h-[48px] flex items-center justify-center bg-gradient-to-br from-white/20 to-white/10 rounded-lg p-2.5 border border-slate-500/40 group-hover:border-blue-500/60 transition-all duration-300 shadow-lg backdrop-blur-md">
                                    <!-- Botón temporal mientras carga PayPal -->
                                    <button type="button"
                                            id="paypal-loading-button"
                                            disabled
                                            class="w-full px-4 py-2.5 bg-gradient-to-r from-blue-600 via-blue-700 to-blue-600 text-white text-sm font-semibold rounded-md opacity-90 cursor-not-allowed flex items-center justify-center gap-2 shadow-md">
                                        <span class="material-icons text-sm animate-spin">refresh</span>
                                        <span class="text-xs font-medium uppercase tracking-wide">Inicializando</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Información adicional -->
                            <div class="mt-4 pt-4 border-t border-slate-600/30">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex items-center gap-2 text-xs text-gray-400">
                                        <span class="material-icons text-blue-400 text-sm">info</span>
                                        <p class="leading-relaxed">Paga con tu cuenta PayPal o tarjeta de crédito/débito</p>
                                    </div>
                                </div>

                                <!-- Métodos de pago aceptados -->
                                <div class="mt-3 flex items-center gap-2 flex-wrap">
                                    <span class="text-[10px] text-gray-400 font-medium">Aceptamos:</span>
                                    <div class="flex items-center gap-1.5">
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">PayPal</span>
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">Visa</span>
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">MC</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Botón Stripe -->
                        <div class="relative bg-gradient-to-br from-slate-800/50 via-slate-700/50 to-slate-800/50 rounded-xl p-4 border border-slate-500/50 hover:border-emerald-500/70 transition-all duration-500 group shadow-xl hover:shadow-2xl hover:shadow-emerald-500/30 overflow-hidden backdrop-blur-sm">
                            <!-- Efecto de brillo en hover -->
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/0 via-emerald-500/10 to-emerald-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 -translate-x-full group-hover:translate-x-full"></div>

                            <!-- Header con icono y badge -->
                            <div class="relative flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="relative">
                                        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500/30 to-green-600/30 rounded-lg flex items-center justify-center group-hover:from-emerald-500/40 group-hover:to-green-600/40 transition-all duration-300 shadow-lg group-hover:shadow-emerald-500/50 group-hover:scale-110">
                                            <span class="material-icons text-emerald-400 text-2xl">credit_card</span>
                                        </div>
                                        <!-- Punto de notificación -->
                                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-slate-900 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <label class="text-base font-semibold text-white block leading-tight">Tarjeta de Crédito/Débito</label>
                                        <p class="text-[11px] text-gray-400 mt-0.5">Pago directo con tarjeta</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <div class="flex items-center gap-1 px-2.5 py-0.5 bg-green-500/20 border border-green-500/30 rounded-full">
                                        <span class="material-icons text-green-400 text-xs">verified</span>
                                        <span class="text-xs font-bold text-green-400">Seguro</span>
                                    </div>
                                    <span class="text-[10px] text-gray-500 font-medium">SSL Encriptado</span>
                                </div>
                            </div>

                            <!-- Botón de pago -->
                            <div class="relative">
                                <button type="button"
                                        onclick="openStripeModal()"
                                        class="w-full px-4 py-3 bg-gradient-to-r from-emerald-600 via-green-600 to-emerald-600 hover:from-emerald-500 hover:via-green-500 hover:to-emerald-500 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-[1.01] hover:shadow-lg hover:shadow-emerald-400/30 flex items-center justify-center gap-2 text-sm shadow-md">
                                    <span class="material-icons text-base">lock</span>
                                    <span class="tracking-wide uppercase text-xs">Pagar con Tarjeta</span>
                                    <span class="material-icons text-base">arrow_forward</span>
                                </button>
                            </div>

                            <!-- Información adicional -->
                            <div class="mt-4 pt-4 border-t border-slate-600/30">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex items-center gap-2 text-xs text-gray-400">
                                        <span class="material-icons text-emerald-400 text-sm">info</span>
                                        <p class="leading-relaxed">Serás redirigido a Stripe para completar tu pago de forma segura</p>
                                    </div>
                                </div>

                                <!-- Métodos de pago aceptados -->
                                <div class="mt-3 flex items-center gap-2 flex-wrap">
                                    <span class="text-[10px] text-gray-400 font-medium">Aceptamos:</span>
                                    <div class="flex items-center gap-1.5">
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">Visa</span>
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">Mastercard</span>
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">Amex</span>
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-semibold text-gray-200 backdrop-blur-sm">+Más</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Botón Seguir Comprando -->
                    <div class="relative pt-4 border-t border-slate-500/40">
                        <a href="{{ route('usuario.cursos.catalogo') }}"
                           class="block w-full px-4 py-2.5 bg-gradient-to-r from-slate-700/60 to-slate-600/60 hover:from-slate-600/70 hover:to-slate-500/70 border border-slate-500/50 hover:border-slate-400/60 text-white font-medium rounded-lg transition-all duration-300 hover:scale-[1.01] hover:shadow-lg flex items-center justify-center gap-2 shadow-md text-sm uppercase tracking-wide">
                            <span class="material-icons text-base">add_shopping_cart</span>
                            <span>Seguir Comprando</span>
                            <span class="material-icons text-base">arrow_forward</span>
                        </a>
                    </div>

                    <!-- Información de seguridad -->
                    <div class="relative pt-5 mt-5 border-t-2 border-slate-500/40">
                        <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 rounded-xl p-4 border border-green-500/20">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                                    <span class="material-icons text-green-400 text-xl">security</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-white mb-1">Pago 100% Seguro</p>
                                    <p class="text-xs text-gray-300 leading-relaxed">Tu información está protegida con encriptación SSL. Todos los pagos son procesados de forma segura por PayPal y Stripe.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>

<!-- Modal para Pago con Stripe -->
<div id="stripe-payment-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-2xl border border-slate-600/50 max-w-lg w-full animate-scale-in max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b border-slate-600/50 sticky top-0 bg-gradient-to-br from-slate-800 to-slate-900 z-10">
            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="material-icons text-emerald-400">credit_card</span>
                Pago con Tarjeta
            </h3>
            <button onclick="closeStripeModal()"
                    class="text-gray-400 hover:text-white transition-colors duration-300 p-1 rounded-lg hover:bg-slate-700/50">
                <span class="material-icons">close</span>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <!-- Resumen del pedido -->
            <div class="mb-6 p-4 bg-slate-900/50 rounded-xl border border-slate-600/30">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-400 text-sm">Total a pagar</span>
                    <span class="text-2xl font-bold text-white">${{ number_format($total ?? 0, 2) }} MXN</span>
                </div>
                <p class="text-xs text-gray-500">{{ $items->count() ?? 0 }} {{ ($items->count() ?? 0) === 1 ? 'curso' : 'cursos' }}</p>
            </div>

            <!-- Formulario Stripe -->
            <form method="POST" action="{{ route('payment.create-link') }}" id="payment-form">
                @csrf
                <div class="space-y-4">
                    <div class="text-center mb-4">
                        <p class="text-sm text-gray-400">
                            Serás redirigido a Stripe para completar tu pago de forma segura
                        </p>
                    </div>

            <!-- Información adicional -->
            <div class="bg-gradient-to-r from-cyan-500/10 to-emerald-500/10 border border-cyan-500/30 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-10 h-10 bg-cyan-500/20 rounded-full flex items-center justify-center">
                        <span class="material-icons text-cyan-400 text-xl">shield</span>
                    </div>
                    <div class="text-sm text-gray-300 flex-1">
                        <p class="font-semibold mb-1 text-white">Pago 100% Seguro</p>
                        <p class="text-gray-400 leading-relaxed">Stripe procesa tu pago de forma segura con encriptación SSL. No almacenamos información de tu tarjeta en nuestros servidores.</p>
                    </div>
                </div>
            </div>

            <!-- Métodos de pago aceptados -->
            <div class="flex items-center justify-center gap-2 pt-2">
                <span class="text-xs text-gray-500">Aceptamos:</span>
                <div class="flex items-center gap-1">
                    <span class="text-xs font-semibold text-gray-400">Visa</span>
                    <span class="text-gray-600">•</span>
                    <span class="text-xs font-semibold text-gray-400">Mastercard</span>
                    <span class="text-gray-600">•</span>
                    <span class="text-xs font-semibold text-gray-400">Amex</span>
                </div>
            </div>

                    <!-- Botones del modal -->
                    <div class="flex gap-3 pt-4">
                        <button type="button"
                                onclick="closeStripeModal()"
                                class="flex-1 px-4 py-3 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-lg transition-all duration-300">
                            Cancelar
                        </button>
                        <button type="submit"
                                id="payment-button"
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-500 hover:to-green-500 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                            <span id="submit-stripe-text">
                                <span class="material-icons text-sm">lock</span>
                                Pagar ${{ number_format($total ?? 0, 2) }}
                            </span>
                            <span id="submit-stripe-loading" class="hidden">
                                <span class="material-icons text-sm animate-spin">refresh</span>
                                Procesando...
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Información de seguridad -->
            <div class="mt-6 pt-4 border-t border-slate-600/50">
                <div class="flex items-start gap-2 text-xs text-gray-500">
                    <span class="material-icons text-sm text-green-400">lock</span>
                    <p>Tu información está protegida por Stripe. Todos los pagos son procesados de forma segura y encriptada.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/carrito-index.css') }}">
@endpush

@push('scripts')
<script>
    // Pasar datos de PHP a JavaScript
    window.PAYPAL_CREATE_ORDER_URL = @json(route('paypal.create-order'));
    window.PAYPAL_CAPTURE_URL = @json(route('paypal.capture'));
    window.PAYPAL_SUCCESS_URL = @json(route('usuario.cursos.adquiridos'));
</script>
<!-- PayPal JS SDK -->
<script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=MXN&locale=es_MX&intent=capture"></script>
<script src="{{ asset('js/carrito/carrito-index.js') }}"></script>
@endpush


