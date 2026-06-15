@extends('KIBI.layouts.auth')

@section('title', 'Editar Perfil - KIBI Educación')

@section('content')
<div class="min-h-[60vh] bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Breadcrumbs -->
        <nav class="mb-4 text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-slate-500">
                <li><a href="{{ route('soluciones.kibi') }}" class="hover:text-slate-700">Inicio</a></li>
                <li class="material-icons text-xs">chevron_right</li>
                <li><a href="{{ route('kibi.dashboard') }}" class="hover:text-slate-700">Dashboard</a></li>
                <li class="material-icons text-xs">chevron_right</li>
                <li><a href="{{ route('kibi.profile.show') }}" class="hover:text-slate-700">Mi Perfil</a></li>
                <li class="material-icons text-xs">chevron_right</li>
                <li class="text-slate-700 font-medium" aria-current="page">Editar</li>
            </ol>
        </nav>
        <!-- Header card -->
        <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm mb-8">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 via-blue-500/10 to-indigo-500/10"></div>
            <div class="relative p-6 md:p-8 flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">Editar perfil</h1>
                    <p class="text-slate-600">Actualiza tus datos y contraseña</p>
                </div>
                <a href="{{ route('kibi.profile.show') }}" class="mt-4 md:mt-0 inline-flex items-center h-10 px-4 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition">
                    <span class="material-icons text-base mr-2">arrow_back</span>
                    Volver a Mi Perfil
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Datos de la cuenta -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-slate-900">Datos de la cuenta</h2>
                    <span class="text-xs text-slate-500">Los cambios se guardan al presionar “Guardar cambios”.</span>
                </div>
                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 text-red-700 text-sm p-3">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-700 text-sm p-3">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="redirect_to" value="kibi.profile.show" />
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-slate-600 mb-1" for="name">Nombre</label>
                            <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full rounded-xl border border-slate-200 focus:border-slate-300 focus:ring-0"/>
                            @error('name')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-slate-600 mb-1" for="apellido_paterno">Apellido Paterno</label>
                            <input id="apellido_paterno" type="text" name="apellido_paterno" value="{{ old('apellido_paterno', Auth::user()->apellido_paterno) }}" class="w-full rounded-xl border border-slate-200 focus:border-slate-300 focus:ring-0"/>
                            @error('apellido_paterno')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-slate-600 mb-1" for="apellido_materno">Apellido Materno</label>
                            <input id="apellido_materno" type="text" name="apellido_materno" value="{{ old('apellido_materno', Auth::user()->apellido_materno) }}" class="w-full rounded-xl border border-slate-200 focus:border-slate-300 focus:ring-0"/>
                            @error('apellido_materno')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-slate-600 mb-1" for="email">Correo</label>
                            <div class="relative">
                                <input id="email" type="email" value="{{ Auth::user()->email }}" disabled readonly aria-disabled="true" class="w-full rounded-xl border border-slate-200 bg-slate-50 text-slate-500 cursor-not-allowed pl-9"/>
                                <span class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-base">lock</span>
                            </div>
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}" />
                        </div>
                    </div>
                    <div class="pt-2">
                        <button class="px-4 py-2 rounded-xl bg-slate-900 text-white hover:bg-slate-800 transition">Guardar cambios</button>
                        <a href="{{ route('kibi.profile.show') }}" class="ml-2 px-4 py-2 rounded-xl bg-white border border-slate-200 hover:border-slate-300 text-slate-700 hover:text-slate-900 transition">Cancelar</a>
                    </div>
                </form>
            </div>

            <!-- Actualizar contraseña -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm" id="password">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-slate-900">Actualizar contraseña</h2>
                    <span class="text-xs text-slate-500">Usa 8+ caracteres, incluye números y símbolos.</span>
                </div>
                @if (session('password_status'))
                    <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-700 text-sm p-3">
                        {{ session('password_status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="redirect_to" value="kibi.profile.show" />
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-slate-600 mb-1" for="current_password">Contraseña actual</label>
                            <input id="current_password" type="password" name="current_password" class="w-full rounded-xl border border-slate-200 focus:border-slate-300 focus:ring-0"/>
                            @error('current_password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-slate-600 mb-1" for="password">Nueva contraseña</label>
                            <input id="password" type="password" name="password" class="w-full rounded-xl border border-slate-200 focus:border-slate-300 focus:ring-0"/>
                            @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm text-slate-600 mb-1" for="password_confirmation">Confirmar nueva contraseña</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="w-full rounded-xl border border-slate-200 focus:border-slate-300 focus:ring-0"/>
                        </div>
                    </div>
                    <div class="pt-2">
                        <button class="px-4 py-2 rounded-xl bg-white border border-slate-200 hover:border-slate-300 text-slate-700 hover:text-slate-900 transition">Actualizar contraseña</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection


