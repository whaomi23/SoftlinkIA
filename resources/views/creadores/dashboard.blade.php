@extends('layouts.app')

@section('title', 'Dashboard Creador - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 py-6 sm:py-8">
            <!-- Breadcrumb -->
            <nav class="mb-6 sm:mb-8">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 rounded-xl blur-sm">
                    </div>
                    <div
                        class="relative bg-slate-800/60 backdrop-blur-sm border border-slate-700/50 rounded-xl px-4 sm:px-6 py-3 sm:py-4 shadow-lg">
                        <ol class="flex items-center space-x-2 sm:space-x-3 text-sm">
                            <li>
                                <a href="{{ route('home') }}"
                                    class="group flex items-center text-purple-400 hover:text-purple-300 transition-all duration-300 font-medium">
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                        <span class="material-icons text-sm sm:text-base relative mr-1 sm:mr-2">home</span>
                                    </div>
                                    <span class="relative">Inicio</span>
                                </a>
                            </li>
                            <li class="flex items-center">
                                <div class="relative">
                                    <div
                                        class="absolute -inset-1 bg-gradient-to-r from-slate-500/20 to-slate-400/20 rounded-full blur opacity-50">
                                    </div>
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-slate-400 relative" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </li>
                            <li class="flex items-center">
                                <div class="relative">
                                    <div
                                        class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg blur opacity-50">
                                    </div>
                                    <div class="relative flex items-center text-purple-300 font-medium">
                                        <span class="material-icons text-sm sm:text-base mr-1 sm:mr-2">create</span>
                                        <span class="relative">Panel Creador</span>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

            <!-- Mensajes de sesión -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-900/40 border border-green-500/50 rounded-xl text-green-200 flex items-center">
                    <span class="material-icons text-green-400 mr-3">check_circle</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-900/40 border border-red-500/50 rounded-xl text-red-200 flex items-center">
                    <span class="material-icons text-red-400 mr-3">error</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Welcome Card para Creador -->
            <div
                class="relative bg-gradient-to-r from-purple-800/90 to-indigo-700/90 backdrop-blur-sm border border-purple-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-indigo-500/5"></div>
                <div class="relative flex flex-col items-center text-center sm:text-left sm:flex-row sm:justify-between">
                    <div class="flex flex-col items-center sm:flex-row sm:items-center mb-4 sm:mb-6 lg:mb-0">
                        <div class="relative mb-3 sm:mb-0 sm:mr-6">
                            <div
                                class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl lg:rounded-2xl blur-lg">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-purple-500/20 to-indigo-500/20 p-3 sm:p-4 rounded-lg sm:rounded-xl lg:rounded-2xl border border-purple-400/30">
                                <span class="material-icons text-purple-400 text-2xl sm:text-3xl lg:text-4xl">create</span>
                            </div>
                        </div>
                        <div class="text-center sm:text-left">
                            <h1 class="text-xl sm:text-2xl lg:text-3xl xl:text-4xl font-bold text-white mb-2 leading-tight">
                                ¡Bienvenido, {{ Auth::user()->nombreCompleto }}!</h1>
                            <p class="text-slate-300 text-sm sm:text-base lg:text-lg mb-3 sm:mb-0">Panel de Creador de
                                Contenido - Gestiona tus cursos y artículos educativos</p>
                            <div
                                class="flex items-center justify-center sm:justify-start text-xs sm:text-sm text-slate-400">
                                <span
                                    class="material-icons text-purple-400 mr-1 sm:mr-2 text-sm sm:text-base">verified</span>
                                <span>Creador desde: {{ Auth::user()->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid para Creador - Cursos -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-6 sm:mb-8">
                <!-- Total Cursos -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-purple-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Mis Cursos</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $totalCursos ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-purple-500/20 text-purple-400 border border-purple-500/30">
                                    <span class="material-icons text-xs mr-1">school</span>
                                    <span class="hidden sm:inline">Total creados</span>
                                    <span class="sm:hidden">Total</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-purple-500/20 to-indigo-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-purple-400/30">
                                <span class="material-icons text-purple-400 text-lg sm:text-xl lg:text-2xl">school</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cursos Activos -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-green-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Cursos Activos</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $cursosActivos ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400 border border-green-500/30">
                                    <span class="material-icons text-xs mr-1">check_circle</span>
                                    <span class="hidden sm:inline">Aprobados</span>
                                    <span class="sm:hidden">OK</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-green-500/20 to-emerald-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-green-400/30">
                                <span
                                    class="material-icons text-green-400 text-lg sm:text-xl lg:text-2xl">check_circle</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cursos Pendientes -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-yellow-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-yellow-500/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Pendientes</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $cursosPendientes ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400 border border-yellow-500/30">
                                    <span class="material-icons text-xs mr-1">schedule</span>
                                    <span class="hidden sm:inline">En revisión</span>
                                    <span class="sm:hidden">Pend.</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-yellow-500/20 to-orange-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-yellow-400/30">
                                <span class="material-icons text-yellow-400 text-lg sm:text-xl lg:text-2xl">schedule</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Acciones Rápidas -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-blue-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Acciones</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">+</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400 border border-blue-500/30">
                                    <span class="material-icons text-xs mr-1">add</span>
                                    <span class="hidden sm:inline">Crear curso</span>
                                    <span class="sm:hidden">Nuevo</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-blue-500/20 to-cyan-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-blue-400/30">
                                <span class="material-icons text-blue-400 text-lg sm:text-xl lg:text-2xl">add_circle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid para Creador - Artículos -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-6 sm:mb-8">
                <!-- Total Artículos -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-indigo-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Mis Artículos</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $totalArticulos ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-indigo-500/20 text-indigo-400 border border-indigo-500/30">
                                    <span class="material-icons text-xs mr-1">article</span>
                                    <span class="hidden sm:inline">Total creados</span>
                                    <span class="sm:hidden">Total</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-indigo-500/20 to-purple-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-indigo-400/30">
                                <span class="material-icons text-indigo-400 text-lg sm:text-xl lg:text-2xl">article</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artículos Publicados -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Publicados</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $articulosPublicados ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                    <span class="material-icons text-xs mr-1">visibility</span>
                                    <span class="hidden sm:inline">En línea</span>
                                    <span class="sm:hidden">OK</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-emerald-500/20 to-green-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-emerald-500/20 to-green-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-emerald-400/30">
                                <span
                                    class="material-icons text-emerald-400 text-lg sm:text-xl lg:text-2xl">visibility</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artículos Borrador -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-orange-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Borradores</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $articulosBorrador ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-orange-500/20 text-orange-400 border border-orange-500/30">
                                    <span class="material-icons text-xs mr-1">edit</span>
                                    <span class="hidden sm:inline">En edición</span>
                                    <span class="sm:hidden">Edit.</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-orange-500/20 to-red-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-orange-400/30">
                                <span class="material-icons text-orange-400 text-lg sm:text-xl lg:text-2xl">edit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artículos Archivados -->
                <div
                    class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-slate-500/50 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-slate-500/5 to-gray-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1 mb-2 sm:mb-0">
                            <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Archivados</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">
                                {{ $articulosArchivados ?? '0' }}</p>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-slate-500/20 text-slate-400 border border-slate-500/30">
                                    <span class="material-icons text-xs mr-1">archive</span>
                                    <span class="hidden sm:inline">Guardados</span>
                                    <span class="sm:hidden">Arch.</span>
                                </span>
                            </div>
                        </div>
                        <div class="relative self-end sm:self-auto">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-slate-500/20 to-gray-500/20 rounded-lg sm:rounded-xl blur">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-slate-500/20 to-gray-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-slate-400/30">
                                <span class="material-icons text-slate-400 text-lg sm:text-xl lg:text-2xl">archive</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acciones Rápidas -->
            <div
                class="relative bg-gradient-to-r from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-indigo-500/5"></div>
                <div class="relative">
                    <h2
                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-center text-white mb-4 sm:mb-6 lg:mb-8 flex items-center justify-center gap-2 sm:gap-3">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur-lg">
                            </div>
                            <span
                                class="material-icons text-purple-400 text-2xl sm:text-3xl lg:text-4xl relative">bolt</span>
                        </div>
                        <span class="hidden sm:inline">Acciones Rápidas</span>
                        <span class="sm:hidden">Acciones</span>
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-2 sm:gap-3 lg:gap-4 xl:gap-6">
                        <a href="{{ route('creador.cursos.create') }}"
                            class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-green-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur">
                                </div>
                                <span
                                    class="material-icons text-green-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">add_circle</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold relative">Crear Curso</span>
                        </a>

                        <a href="{{ route('creador.cursos.index') }}"
                            class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-blue-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg sm:rounded-xl blur">
                                </div>
                                <span
                                    class="material-icons text-blue-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">school</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold relative">Mis Cursos</span>
                        </a>

                        <a href="{{ route('cursos.catalogo') }}"
                            class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-purple-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur">
                                </div>
                                <span
                                    class="material-icons text-purple-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">library_books</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold relative">Explorar</span>
                        </a>

                        <a href="{{ route('profile.show') }}"
                            class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-amber-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 rounded-lg sm:rounded-xl blur">
                                </div>
                                <span
                                    class="material-icons text-amber-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">person</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold relative">Mi Perfil</span>
                        </a>

                        <button onclick="openCreateModal()"
                            class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-indigo-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-lg sm:rounded-xl blur">
                                </div>
                                <span
                                    class="material-icons text-indigo-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">add_circle</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold relative">Crear Artículo</span>
                        </button>

                        <a href="{{ route('creador.articulos.index') }}"
                            class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-emerald-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-emerald-500/20 to-green-500/20 rounded-lg sm:rounded-xl blur">
                                </div>
                                <span
                                    class="material-icons text-emerald-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">article</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold relative">Mis Artículos</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cursos Recientes -->
            @if(isset($cursosRecientes) && $cursosRecientes->count() > 0)
                <div
                    class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden mb-6 sm:mb-8">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5"></div>
                    <div class="relative">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-3 sm:mb-4 lg:mb-6 flex items-center">
                            <div class="relative mr-2 sm:mr-3">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg blur">
                                </div>
                                <span
                                    class="material-icons text-purple-400 text-lg sm:text-xl lg:text-2xl relative">history</span>
                            </div>
                            <span class="hidden sm:inline">Cursos Recientes</span>
                            <span class="sm:hidden">Recientes</span>
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($cursosRecientes as $curso)
                                <div
                                    class="bg-slate-700/50 border border-slate-600/50 rounded-lg p-4 hover:bg-slate-700/70 transition-colors">
                                    <div class="flex items-start justify-between mb-2">
                                        <h3 class="text-white font-semibold text-sm">{{ $curso->titulo }}</h3>
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $curso->activo ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' }}">
                                            {{ $curso->activo ? 'Activo' : 'Pendiente' }}
                                        </span>
                                    </div>
                                    <p class="text-slate-400 text-xs mb-2">{{ Str::limit($curso->descripcion, 80) }}</p>
                                    <div class="flex items-center justify-between text-xs text-slate-500">
                                        <span>{{ $curso->categoria->nombre ?? 'Sin categoría' }}</span>
                                        <span>{{ $curso->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Artículos Recientes -->
            @if(isset($articulosRecientes) && $articulosRecientes->count() > 0)
                <div
                    class="relative bg-gradient-to-br from-slate-900/95 to-slate-800/95 backdrop-blur-sm border border-slate-700/50 rounded-xl lg:rounded-2xl p-5 lg:p-8 shadow-2xl overflow-hidden mb-10">
                    <!-- Fondo decorativo -->
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-indigo-600/10 via-purple-600/10 to-pink-600/10 opacity-70">
                    </div>

                    <div class="relative">
                        <!-- Título -->
                        <h2 class="text-xl lg:text-3xl font-extrabold text-white mb-6 flex items-center">
                            <div class="relative mr-3">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500/30 to-purple-500/30 rounded-xl blur-sm">
                                </div>
                                <span class="material-icons text-indigo-400 text-2xl relative">article</span>
                            </div>
                            <span>Artículos Recientes</span>
                        </h2>

                        <!-- Grid responsive -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($articulosRecientes as $articulo)
                                @php
                                    // Lógica para obtener imagen
                                    $cardImg = $articulo->url_imagen
                                        ? Storage::url($articulo->url_imagen)
                                        : $articulo->url_imagen_banner;
                                @endphp

                                <a href="{{ route('creador.articulos.show', $articulo->id) }}"
                                    class="group bg-slate-800/60 border border-slate-700/50 rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col">

                                    <!-- Imagen de portada -->
                                    @if($cardImg)
                                        <div class="h-40 sm:h-44 md:h-36 lg:h-40 overflow-hidden">
                                            <img src="{{ $cardImg }}" alt="{{ $articulo->titulo }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        </div>
                                    @else
                                        <!-- Fallback si no hay imagen -->
                                        <div
                                            class="h-40 sm:h-44 md:h-36 lg:h-40 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 flex items-center justify-center">
                                            <span
                                                class="material-icons text-5xl text-indigo-400/50 group-hover:scale-110 transition-transform">description</span>
                                        </div>
                                    @endif

                                    <!-- Contenido -->
                                    <div class="flex-1 p-5 flex flex-col">
                                        <!-- Encabezado -->
                                        <div class="flex items-start justify-between mb-3">
                                            <h3
                                                class="text-white font-semibold text-base line-clamp-2 group-hover:text-indigo-300 transition-colors">
                                                {{ $articulo->titulo }}
                                            </h3>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium tracking-wide
                                            @if($articulo->status === 'publicado') bg-emerald-500/20 text-emerald-400 border border-emerald-500/30
                                            @elseif($articulo->status === 'borrador') bg-orange-500/20 text-orange-400 border border-orange-500/30
                                            @else bg-slate-500/20 text-slate-400 border border-slate-500/30 @endif">
                                                {{ ucfirst($articulo->status) }}
                                            </span>
                                        </div>

                                        <!-- Subtítulo -->
                                        <p class="text-slate-400 text-sm mb-3 line-clamp-3">
                                            {{ Str::limit($articulo->subtitulo ?? $articulo->contenido, 100) }}
                                        </p>

                                        <!-- Footer -->
                                        <div
                                            class="mt-auto flex items-center justify-between text-xs text-slate-500 border-t border-slate-700/50 pt-3">
                                            <span
                                                class="truncate max-w-[140px]">{{ $articulo->categoria ? Str::limit($articulo->categoria, 25) : 'Sin categoría' }}</span>
                                            <span class="text-slate-400">{{ $articulo->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif



            <!-- Estadísticas por Categoría -->
            @if(isset($cursosPorCategoria) && $cursosPorCategoria->count() > 0)
                <div
                    class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5"></div>
                    <div class="relative">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-3 sm:mb-4 lg:mb-6 flex items-center">
                            <div class="relative mr-2 sm:mr-3">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-lg blur">
                                </div>
                                <span
                                    class="material-icons text-indigo-400 text-lg sm:text-xl lg:text-2xl relative">category</span>
                            </div>
                            Cursos por Categoría
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($cursosPorCategoria as $categoria => $cantidad)
                                <div class="bg-slate-700/50 border border-slate-600/50 rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white mb-1">{{ $cantidad }}</div>
                                    <div class="text-slate-400 text-sm">{{ $categoria }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </main>
    </div>

    <!-- Incluir el modal de crear artículo -->
    @include('admin.articulos.components.modals.articulo-create')

    @push('scripts')
        <script src="{{ asset('js/articulos/summernote-config.js') }}"></script>
        <script src="{{ asset('js/articulos/articulos-admin.js') }}"></script>
    @endpush

@endsection