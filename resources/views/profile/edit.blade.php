@extends('layouts.app')

@section('title', 'Editar Perfil - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-cyan-300">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors duration-300">Inicio</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li><a href="{{ route('dashboard') }}"
                            class="hover:text-white transition-colors duration-300">Dashboard</a></li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li><a href="{{ route('profile.show') }}" class="hover:text-white transition-colors duration-300">Mi
                            Perfil</a></li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="text-slate-300">Editar</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Editar Perfil</h1>
                <p class="text-slate-300">Actualiza tu información personal</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-500/20 border border-green-500/50 rounded-xl p-4">
                    <div class="flex items-center">
                        <span class="material-icons text-green-400 mr-3">check_circle</span>
                        <p class="text-green-300">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 bg-red-500/20 border border-red-500/50 rounded-xl p-4">
                    <div class="flex items-start">
                        <span class="material-icons text-red-400 mr-3 mt-0.5">error</span>
                        <div>
                            <h4 class="text-red-300 font-semibold mb-2">Por favor corrige los siguientes errores:</h4>
                            <ul class="text-red-300 text-sm space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div
                class="bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-2xl p-6 shadow-2xl">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-400 mb-2">Nombre *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors @error('name') border-red-500/50 @enderror">
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="apellido_paterno" class="block text-sm font-medium text-slate-400 mb-2">Apellido
                                Paterno *</label>
                            <input type="text" id="apellido_paterno" name="apellido_paterno"
                                value="{{ old('apellido_paterno', $user->apellido_paterno) }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors @error('apellido_paterno') border-red-500/50 @enderror">
                            @error('apellido_paterno')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="apellido_materno" class="block text-sm font-medium text-slate-400 mb-2">Apellido
                                Materno *</label>
                            <input type="text" id="apellido_materno" name="apellido_materno"
                                value="{{ old('apellido_materno', $user->apellido_materno) }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors @error('apellido_materno') border-red-500/50 @enderror">
                            @error('apellido_materno')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-400 mb-2">Correo Electrónico
                                *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors @error('email') border-red-500/50 @enderror">
                            @error('email')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-600/50">
                        <a href="{{ route('profile.show') }}"
                            class="inline-flex items-center px-6 py-3 border border-slate-600/50 text-slate-300 text-sm font-semibold rounded-lg hover:bg-slate-700/50 transition-all duration-300">
                            <span class="material-icons text-sm mr-2">arrow_back</span>
                            Cancelar
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 text-white text-sm font-semibold rounded-lg hover:from-cyan-400 hover:to-blue-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30">
                            <span class="material-icons text-sm mr-2">save</span>
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
