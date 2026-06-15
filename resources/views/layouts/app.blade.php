<!DOCTYPE html>
<html lang="es" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SoftLinkIA - Software, AI and Digital Solutions')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logos/SoftLinkIA.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logos/SoftLinkIA.ico') }}">

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Summernote Lite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Estilos para resolver conflictos de Summernote con Tailwind -->
    <style>
        /* Fix para modales de Summernote */
        .note-modal {
            z-index: 9999 !important;
        }
        
        .note-modal-backdrop {
            z-index: 9998 !important;
        }
        
        /* Asegurar que los modales de Summernote estén por encima de todo */
        .note-editor .note-modal {
            z-index: 10000 !important;
        }
        
        /* Fix para el modal de insertar imagen */
        .note-image-dialog {
            z-index: 10001 !important;
        }
        
        .note-image-dialog .modal-dialog {
            z-index: 10002 !important;
        }
        
        /* Asegurar que los botones del modal funcionen */
        .note-image-dialog button {
            cursor: pointer !important;
        }
        
        /* Fix para el backdrop del modal */
        .note-image-dialog .modal-backdrop {
            z-index: 10000 !important;
        }
        
        /* Estilos específicos para el modal de imagen */
        .note-image-dialog .modal-content {
            background: white !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
        }
        
        .note-image-dialog .modal-header {
            background: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
        
        .note-image-dialog .modal-body {
            padding: 20px !important;
        }
        
        .note-image-dialog .modal-footer {
            background: #f8f9fa !important;
            border-top: 1px solid #dee2e6 !important;
        }
        
        /* Fix para botones del modal */
        .note-image-dialog .btn {
            padding: 8px 16px !important;
            border-radius: 4px !important;
            border: 1px solid #ccc !important;
            background: #fff !important;
            color: #333 !important;
            cursor: pointer !important;
        }
        
        .note-image-dialog .btn-primary {
            background: #007bff !important;
            border-color: #007bff !important;
            color: white !important;
        }
        
        .note-image-dialog .btn-primary:hover {
            background: #0056b3 !important;
            border-color: #0056b3 !important;
        }
        
        /* Fix para inputs del modal */
        .note-image-dialog input[type="text"],
        .note-image-dialog input[type="file"] {
            width: 100% !important;
            padding: 8px 12px !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            font-size: 14px !important;
        }
        
        /* Fix para labels del modal */
        .note-image-dialog label {
            display: block !important;
            margin-bottom: 5px !important;
            font-weight: 500 !important;
            color: #333 !important;
        }
        
        /* Asegurar que el modal sea clickeable */
        .note-image-dialog * {
            pointer-events: auto !important;
        }
        
        /* Fix para el botón de cerrar */
        .note-image-dialog .close {
            background: none !important;
            border: none !important;
            font-size: 24px !important;
            font-weight: bold !important;
            color: #aaa !important;
            cursor: pointer !important;
        }
        
        .note-image-dialog .close:hover {
            color: #000 !important;
        }
    </style>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #1b1b18;
        }

        .dark body {
            background-color: #0a0a0a;
            color: #ffffff;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #1e40af 100%);
        }

        .gradient-bg-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        }

        .tech-gradient {
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 50%, #6366f1 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
            background: rgba(30, 58, 138, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
            border-color: rgba(59, 130, 246, 0.5);
        }

        .swiper-pagination-bullet {
            background: #3b82f6 !important;
        }

        .swiper-pagination-bullet-active {
            background: #0ea5e9 !important;
        }

        /* Asegurar que el navbar no tenga bordes */
        #navbar {
            border-bottom: none !important;
            border: none !important;
        }

        .glass-effect {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .text-gradient {
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .border-gradient {
            border: 2px solid transparent;
            background: linear-gradient(135deg, #0ea5e9, #3b82f6) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
        }

        /* Floating Action Button Styles */
        #floating-menu {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* FAB Menu Animation */
        #fab-menu {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* FAB Button Hover Effects */
        #fab-main:hover {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        /* FAB Menu Items Animation */
        #fab-menu .group\/item {
            transition: all 0.2s ease-in-out;
        }

        #fab-menu .group\/item:hover {
            transform: translateX(4px);
        }

        /* Responsive FAB */
        @media (max-width: 640px) {
            #floating-menu {
                bottom: 0.75rem;
                right: 0.75rem;
            }

            #fab-main {
                width: 2.5rem;
                height: 2.5rem;
            }

            #fab-menu {
                min-width: 240px;
            }
        }

        /* Dark mode enhancements */
        .dark #fab-menu {
            backdrop-filter: blur(20px);
        }

        /* Accessibility improvements */
        #fab-main:focus {
            outline: 2px solid #06b6d4;
            outline-offset: 2px;
        }

        /* Smooth transitions for all FAB elements */
        #fab-main * {
            transition: all 0.3s ease;
        }

        /* Student Sidebar Styles - macOS Inspired */
        .student-sidebar {
            width: 60px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 40;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.2), 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .student-sidebar::before {
            display: none;
        }

        .student-sidebar.open {
            width: 240px;
        }

        /* Dark mode support */
        .dark .student-sidebar {
            background: rgba(30, 30, 30, 0.8);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.05), 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .sidebar-header {
            width: 100%;
            margin-bottom: 20px;
            padding: 0 12px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            position: relative;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            color: #1d1d1f;
            font-weight: 600;
            font-size: 16px;
            opacity: 0;
            white-space: nowrap;
            transition: opacity 0.3s ease;
            letter-spacing: -0.3px;
        }

        .dark .logo {
            color: #f5f5f7;
        }

        .student-sidebar.open .logo {
            opacity: 1;
        }

        .logo-icon {
            width: 28px;
            height: 28px;
            margin-right: 12px;
            border-radius: 6px;
            padding: 2px;
            background: rgba(0, 0, 0, 0.05);
        }

        .dark .logo-icon {
            background: rgba(255, 255, 255, 0.1);
        }

        .logo-text {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: -0.3px;
        }

        .toggle-btn {
            width: 28px;
            height: 28px;
            border: none;
            background: rgba(0, 0, 0, 0.05);
            color: #1d1d1f;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            backdrop-filter: blur(10px);
            font-size: 16px;
        }

        .dark .toggle-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #f5f5f7;
        }

        .toggle-btn:hover {
            background: rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        .dark .toggle-btn:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .student-sidebar.open .toggle-btn {
            transform: rotate(180deg);
        }

        .sidebar-nav {
            flex: 1;
            width: 100%;
        }

        .menu-items {
            width: 100%;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            margin: 4px 8px;
            color: #1d1d1f;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            position: relative;
            font-size: 14px;
            font-weight: 500;
            overflow: hidden;
            white-space: nowrap;
        }

        .dark .menu-item {
            color: #f5f5f7;
        }

        .menu-item:hover {
            background: rgba(0, 0, 0, 0.05);
            color: #007AFF;
            transform: translateX(2px);
        }

        .dark .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #0A84FF;
        }

        .menu-item.active {
            background: rgba(0, 122, 255, 0.1);
            color: #007AFF;
        }

        .dark .menu-item.active {
            background: rgba(10, 132, 255, 0.15);
            color: #0A84FF;
        }

        .menu-link {
            display: flex;
            align-items: center;
            width: 100%;
            color: inherit;
            text-decoration: none;
        }

        .menu-item:hover::before {
            opacity: 1;
        }

        .menu-item:hover {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2), transparent);
            color: #ffffff;
            cursor: pointer;
            border-left: 3px solid #3b82f6;
            transform: translateX(8px) scale(1.05);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.25), 0 0 20px rgba(59, 130, 246, 0.1);
        }

        .menu-item.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.3), transparent);
            color: #ffffff;
            border-left: 3px solid #3b82f6;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
        }

        .menu-item.active::before {
            opacity: 1;
        }

        .sidebar-nav {
            flex: 1;
            width: 100%;
            position: relative;
            z-index: 10;
        }

        .menu-items {
            width: 100%;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            margin: 6px 0;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            background: rgba(30, 58, 138, 0.3);
            border-left: 3px solid transparent;
            border-radius: 0 16px 16px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .menu-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(147, 51, 234, 0.1), rgba(236, 72, 153, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .menu-item .flex-shrink-0 {
            margin-right: 12px;
            transition: all 0.2s ease;
            position: relative;
            z-index: 5;
        }

        .menu-item .flex-shrink-0 div {
            transition: all 0.2s ease;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-item .flex-shrink-0 span {
            font-size: 18px;
            color: inherit;
        }

        .menu-text {
            opacity: 0;
            transition: opacity 0.3s ease;
            font-weight: 500;
            flex: 1;
            position: relative;
            z-index: 5;
        }

        .student-sidebar.open .menu-text {
            opacity: 1;
        }

        .separator {
            height: 1px;
            width: 80%;
            background: rgba(0, 0, 0, 0.1);
            margin: 16px auto;
            opacity: 0.5;
            list-style: none;
        }

        .dark .separator {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-footer {
            z-index: 5;
        }

        .cart-badge {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: auto;
            min-width: 18px;
            text-align: center;
            box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
            position: relative;
            z-index: 5;
        }

        .main-content.with-sidebar {
            margin-left: 60px;
            transition: margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .student-sidebar.open ~ .main-content.with-sidebar {
            margin-left: 240px;
        }

        .content-wrapper {
            padding-top: 0; /* Remove padding to eliminate black bar */
            min-height: 100vh;
        }

        /* Responsive adjustments for sidebar */
        /* Lightning Flash Animation */
        @keyframes lightning {
            0% {
                filter: brightness(1) drop-shadow(0 0 0px rgba(255, 255, 255, 0));
                transform: rotate(0deg) translateX(0px);
            }
            10% {
                filter: brightness(2) drop-shadow(0 0 5px rgba(255, 255, 255, 0.8));
                transform: rotate(-15deg) translateX(-3px);
            }
            20% {
                filter: brightness(1.5) drop-shadow(0 0 10px rgba(255, 255, 255, 0.6));
                transform: rotate(10deg) translateX(2px);
            }
            30% {
                filter: brightness(2.5) drop-shadow(0 0 15px rgba(255, 255, 255, 1));
                transform: rotate(-20deg) translateX(-5px);
            }
            40% {
                filter: brightness(1) drop-shadow(0 0 0px rgba(255, 255, 255, 0));
                transform: rotate(5deg) translateX(1px);
            }
            50% {
                filter: brightness(1) drop-shadow(0 0 0px rgba(255, 255, 255, 0));
                transform: rotate(0deg) translateX(0px);
            }
            60% {
                filter: brightness(2) drop-shadow(0 0 8px rgba(255, 255, 255, 0.7));
                transform: rotate(-12deg) translateX(-4px);
            }
            70% {
                filter: brightness(1.8) drop-shadow(0 0 12px rgba(255, 255, 255, 0.9));
                transform: rotate(8deg) translateX(3px);
            }
            80% {
                filter: brightness(1) drop-shadow(0 0 0px rgba(255, 255, 255, 0));
                transform: rotate(-3deg) translateX(-1px);
            }
            100% {
                filter: brightness(1) drop-shadow(0 0 0px rgba(255, 255, 255, 0));
                transform: rotate(0deg) translateX(0px);
            }
        }

        .lightning-icon {
            animation: lightning 4s ease-in-out infinite;
        }

        /* Disable sidebar icon rotation/movement */
        .student-sidebar .lightning-icon {
            animation: none !important;
            transform: none !important;
        }

        /* Shimmer Animation */
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        @media (max-width: 768px) {
            .student-sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .student-sidebar.open {
                width: 280px;
                transform: translateX(0);
            }

            .main-content.with-sidebar {
                margin-left: 0;
            }

            .student-sidebar.open ~ .main-content.with-sidebar {
                margin-left: 0;
            }

            .toggle-btn {
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 70;
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 8px;
                padding: 8px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(20px);
            }

            .dark .toggle-btn {
                background-color: rgba(30, 30, 30, 0.9);
            }
        }

        /* Floating Auth Button Styles */
        #floating-auth {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive Auth FAB */
        @media (max-width: 640px) {
            #floating-auth {
                bottom: 0.75rem;
                right: 0.75rem;
            }

            #auth-fab-main {
                width: 2.75rem;
                height: 2.75rem;
            }

            #auth-fab-menu {
                min-width: 14rem;
                max-height: 60vh;
            }
        }
    </style>

    @yield('styles')
</head>

<body class="bg-gray-100 text-gray-900 dark:bg-slate-900 dark:text-white transition-colors duration-300">
    <!-- Navigation -->
    <nav id="navbar"
        class="relative z-50 transition-all duration-300 bg-white dark:bg-slate-900 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center items-center h-16 relative">
                <!-- Logo (positioned absolutely to the left) -->
                <div class="absolute left-0 flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logos/SoftLinkIA.ico') }}" alt="SoftLinkIA" class="w-8 h-8 mr-2">
                        <span class="text-xl font-bold text-gradient">SoftLinkIA</span>
                    </a>
                </div>

                <!-- Sidebar Toggle Button (Only for student users) -->
                @auth
                    @if(optional(Auth::user())->tipo_usuario_id && in_array((int) Auth::user()->tipo_usuario_id, [3,4], true))
                        <div class="absolute -left-10 flex-shrink-0">
                            <button id="navbar-sidebar-toggle" class="flex items-center justify-center w-9 h-9 bg-white/20 dark:bg-slate-800/20 backdrop-blur-sm border border-gray-200/30 dark:border-slate-600/30 rounded-lg shadow-sm hover:bg-white/30 dark:hover:bg-slate-800/30 hover:border-gray-300/50 dark:hover:border-slate-500/50 transition-all duration-300 hover:scale-105">
                                <span class="material-icons text-gray-700 dark:text-slate-300 text-lg">menu</span>
                            </button>
                        </div>
                    @endif
                @endauth


                <!-- Desktop Menu (centered) -->
                <div class="hidden md:block md:pr-40 lg:pr-56 xl:pr-64">
                    <div class="flex items-baseline space-x-6">
                        @guest
                        <!-- Menú público para usuarios no autenticados -->
                        <a href="{{ route('home') }}"
                            class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Inicio</a>

                        <!-- Servicios Mega Menu -->
                        <div class="relative group">
                            <button id="services-trigger"
                                class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium transition-colors flex items-center">
                                Servicios
                                <span
                                    class="material-icons text-sm ml-1 transition-transform group-hover:rotate-180">expand_more</span>
                            </button>
                            <!-- Mega Menu Card -->
                            <div id="services-panel"
                                class="fixed left-1/2 top-16 transform -translate-x-1/2 mt-2 w-[800px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[1000] pointer-events-auto">
                                <div
                                    class="glass-effect rounded-2xl p-6 shadow-2xl border border-blue-500/20 backdrop-blur-xl bg-gradient-to-br from-slate-900/95 to-slate-800/95">
                                    <!-- Header -->
                                    <div class="text-center mb-4">
                                        <h3 class="text-lg font-bold text-white mb-2">Nuestros Servicios</h3>
                                        <div
                                            class="w-16 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto rounded-full">
                                        </div>
                                    </div>

                                    <!-- Services Grid -->
                                    <div class="grid grid-cols-3 gap-3">
                                        <a href="{{ route('servicios.consultoria-ti') }}"
                                            class="group/item p-3 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 hover:border-cyan-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/20">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="material-icons text-cyan-400 mr-2 text-lg group-hover/item:scale-110 transition-transform">psychology</span>
                                                <span class="text-white font-semibold text-xs">Consultoría TI</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed">Asesoramiento estratégico
                                            </p>
                                        </a>

                                        <a href="{{ route('servicios.ciberseguridad') }}"
                                            class="group/item p-3 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 hover:border-cyan-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/20">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="material-icons text-cyan-400 mr-2 text-lg group-hover/item:scale-110 transition-transform">security</span>
                                                <span class="text-white font-semibold text-xs">Ciberseguridad</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed">Protección integral</p>
                                        </a>

                                        <a href="{{ route('servicios.auditorias') }}"
                                            class="group/item p-3 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 hover:border-cyan-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/20">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="material-icons text-cyan-400 mr-2 text-lg group-hover/item:scale-110 transition-transform">fact_check</span>
                                                <span class="text-white font-semibold text-xs">Auditorías</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed">Evaluación de sistemas</p>
                                        </a>

                                        <a href="{{ route('servicios.soluciones-saas') }}"
                                            class="group/item p-3 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 hover:border-cyan-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/20">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="material-icons text-cyan-400 mr-2 text-lg group-hover/item:scale-110 transition-transform">cloud</span>
                                                <span class="text-white font-semibold text-xs">Soluciones SaaS</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed">Software como servicio</p>
                                        </a>

                                        <a href="{{ route('servicios.reingenieria') }}"
                                            class="group/item p-3 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 hover:border-cyan-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/20">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="material-icons text-cyan-400 mr-2 text-lg group-hover/item:scale-110 transition-transform">engineering</span>
                                                <span class="text-white font-semibold text-xs">Reingeniería</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed">Optimización de procesos
                                            </p>
                                        </a>

                                        <a href="{{ route('servicios.soluciones-medida') }}"
                                            class="group/item p-3 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 hover:border-cyan-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/20">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="material-icons text-cyan-400 mr-2 text-lg group-hover/item:scale-110 transition-transform">build</span>
                                                <span class="text-white font-semibold text-xs">Soluciones a
                                                    Medida</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed">Desarrollo personalizado
                                            </p>
                                        </a>
                                    </div>

                                    <!-- Footer -->
                                    <div class="mt-4 pt-3 border-t border-blue-500/20 text-center">
                                        <p class="text-slate-400 text-xs mb-2">¿Necesitas ayuda para elegir?</p>
                                        <a href="{{ route('contacto') }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-cyan-500 to-blue-500 text-white text-xs font-semibold rounded-lg hover:from-cyan-400 hover:to-blue-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30">
                                            <span class="material-icons text-sm mr-1">chat</span>
                                            Consultar Ahora
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('sobre-nosotros') }}"
                            class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Sobre
                            Nosotros</a>

                        <!-- Soluciones Dropdown -->
                        <div class="relative group">
                            <button id="solutions-trigger"
                                class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium transition-colors flex items-center">
                                Soluciones
                                <span
                                    class="material-icons text-sm ml-1 transition-transform group-hover:rotate-180">expand_more</span>
                            </button>
                            <!-- Mega Menu Card -->
                            <div id="solutions-panel"
                                class="fixed left-1/2 top-16 transform -translate-x-1/2 mt-2 w-[600px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[1000] pointer-events-auto">
                                <div
                                    class="glass-effect rounded-2xl p-6 shadow-2xl border border-green-500/20 backdrop-blur-xl bg-gradient-to-br from-slate-900/95 to-slate-800/95">
                                    <!-- Header -->
                                    <div class="text-center mb-4">
                                        <h3 class="text-lg font-bold text-white mb-2">Nuestras Soluciones</h3>
                                        <div
                                            class="w-16 h-1 bg-gradient-to-r from-green-400 to-teal-500 mx-auto rounded-full">
                                        </div>
                                    </div>

                                    <!-- Solutions Grid -->
                                    <div class="grid grid-cols-2 gap-3">
                                        <a href="{{ route('soluciones.kibi') }}"
                                            class="group/item p-4 rounded-xl bg-gradient-to-br from-green-500/10 to-teal-500/10 border border-green-500/20 hover:border-teal-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-teal-400/20">
                                            <div class="flex items-center mb-2">
                                                <span
                                                    class="material-icons text-teal-400 mr-3 text-xl group-hover/item:scale-110 transition-transform">analytics</span>
                                                <span class="text-white font-semibold text-sm">KIBI</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed mb-2">Business Intelligence
                                                y análisis de datos avanzado</p>
                                            <div class="flex items-center text-xs text-teal-300">
                                                <span class="material-icons text-xs mr-1">trending_up</span>
                                                <span>Análisis Inteligente</span>
                                            </div>
                                        </a>

                                        <a href="{{ route('soluciones.track-safe') }}"
                                            class="group/item p-4 rounded-xl bg-gradient-to-br from-green-500/10 to-teal-500/10 border border-green-500/20 hover:border-teal-400/40 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-teal-400/20">
                                            <div class="flex items-center mb-2">
                                                <span
                                                    class="material-icons text-teal-400 mr-3 text-xl group-hover/item:scale-110 transition-transform">security</span>
                                                <span class="text-white font-semibold text-sm">Track Safe</span>
                                            </div>
                                            <p class="text-slate-300 text-xs leading-relaxed mb-2">Monitoreo y seguridad
                                                integral para activos</p>
                                            <div class="flex items-center text-xs text-teal-300">
                                                <span class="material-icons text-xs mr-1">shield</span>
                                                <span>Protección Total</span>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Footer -->
                                    <div class="mt-4 pt-3 border-t border-green-500/20 text-center">
                                        <p class="text-slate-400 text-xs mb-2">¿Quieres conocer más sobre nuestras
                                            soluciones?</p>
                                        <a href="{{ route('contacto') }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-green-500 to-teal-500 text-white text-xs font-semibold rounded-lg hover:from-green-400 hover:to-teal-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-teal-400/30">
                                            <span class="material-icons text-sm mr-1">chat</span>
                                            Consultar Ahora
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('contacto') }}"
                            class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Contacto</a>
                        @endguest
                    </div>
                </div>
                <!-- Right controls: Menu + Auth + Theme toggle -->
                <div class="absolute right-0 top-1/2 -translate-y-1/2 hidden md:block">
                    <div class="flex items-center space-x-3 lg:space-x-4">
                        @php
                            $userRole = Auth::check() ? strtolower(trim(optional(Auth::user()->tipoUsuario)->nombre ?? '')) : '';
                            $isAdmin = Auth::check() && in_array($userRole, ['admin', 'administrador']);
                            $isCreador = Auth::check() && in_array($userRole, ['creador']);
                        @endphp

                        @auth

                            @if($isAdmin)
                                <!-- Botón Dashboard para usuarios admin -->
                                <a href="{{ route('dashboard') }}"
                                    class="unified-btn-primary inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 text-white hover:from-cyan-400 hover:to-blue-400 border-2 border-cyan-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30">
                                    <span class="material-icons text-sm mr-1">dashboard</span>
                                    Dashboard
                                </a>
                            @else
                                <!-- Botones para usuarios tipo 2 -->
                                <a href="{{ route('cursos.catalogo') }}"
                                    class="unified-btn-primary inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 text-white hover:from-cyan-400 hover:to-blue-400 border-2 border-cyan-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30">
                                    <span class="material-icons text-sm mr-1">school</span>
                                    Ver Cursos
                                </a>
                                <a href="{{ route('articulos.catalogo') }}"
                                    class="unified-btn-secondary inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-lg border-2 border-purple-400 text-purple-400 hover:bg-purple-500/10 backdrop-blur-sm transition-all duration-300 hover:scale-105">
                                    <span class="material-icons text-sm mr-1">article</span>
                                    Publicaciones
                                </a>
                                @if(optional(Auth::user())->tipo_usuario_id && in_array((int) Auth::user()->tipo_usuario_id, [3,4], true))
                                    @php
                                        $cartCount = null;
                                        try {
                                            $cartCount = \App\Models\CartItem::where('user_id', Auth::id())->count();
                                        } catch (\Throwable $e) {
                                            $cartCount = session('carrito_count') ?? (is_array(session('carrito')) ? count(session('carrito')) : (is_array(session('cart.items')) ? count(session('cart.items')) : 0));
                                        }
                                    @endphp
                                    <div class="relative group/cart" @if(is_null($cartCount)) style="pointer-events:none;opacity:.6" @endif>
                                    <button id="cart-menu-trigger"
                                        class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl border-2 border-cyan-400/60 text-cyan-300 hover:text-white hover:bg-cyan-500/20 hover:border-cyan-400 transition-all duration-300 hover:scale-105">
                                        <span class="material-icons text-lg">shopping_cart</span>
                                        @if(!is_null($cartCount) && $cartCount > 0)
                                            <span class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-pink-500 text-white text-[10px] font-bold flex items-center justify-center shadow-lg">{{ $cartCount }}</span>
                                        @endif
                                    </button>

                                    <!-- Cart Dropdown Panel -->
                                    <div id="cart-menu-panel"
                                        class="absolute right-0 top-12 mt-2 w-[480px] max-h-[75vh] overflow-auto opacity-0 invisible group-hover/cart:opacity-100 group-hover/cart:visible transition-all duration-300 z-[1000] pointer-events-auto">
                                        <div class="bg-slate-900/95 backdrop-blur-xl border border-slate-700/60 rounded-2xl shadow-2xl overflow-hidden">
                                            <!-- Header -->
                                            <div class="px-6 py-4 border-b border-slate-700/50 flex items-center justify-between bg-gradient-to-r from-slate-800/50 to-slate-700/50">
                                                <div class="flex items-center gap-3">
                                                    <span class="material-icons text-cyan-400 text-lg">shopping_cart</span>
                                                    <h4 class="text-white font-bold text-lg">Mi Carrito</h4>
                                                    @if(!is_null($cartCount) && $cartCount > 0)
                                                        <span class="bg-cyan-500 text-white px-2 py-1 rounded-full text-xs font-bold">{{ $cartCount }}</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('carrito.index') }}" class="text-cyan-300 text-sm hover:text-cyan-200 font-medium flex items-center gap-1">
                                                    <span class="material-icons text-sm">visibility</span>
                                                    Ver todo
                                                </a>
                                            </div>

                                            <!-- Cart Items Grid -->
                                            <div class="p-4">
                                                @php
                                                    $miniItems = collect([]);
                                                    if(!is_null($cartCount)){
                                                        try { $miniItems = \App\Models\CartItem::with('curso')->where('user_id', Auth::id())->latest()->take(6)->get(); } catch (\Throwable $e) { $miniItems = collect([]); }
                                                    }
                                                @endphp

                                                @if($miniItems->count() > 0)
                                                    <!-- Grid Layout for Cards -->
                                                    <div class="grid grid-cols-1 gap-3 mb-4">
                                                        @foreach($miniItems as $it)
                                                            <div class="group cart-dropdown-card bg-gradient-to-r from-slate-800/60 to-slate-700/60 border border-slate-600/40 rounded-xl p-4 hover:from-slate-700/60 hover:to-slate-600/60 hover:border-cyan-500/40 transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:shadow-cyan-400/20">
                                                                <div class="flex items-center gap-4">
                                                                    <!-- Course Image -->
                                                                    <div class="relative w-16 h-16 rounded-lg overflow-hidden bg-gradient-to-br from-slate-700 to-slate-600 border border-slate-500/50 flex-shrink-0">
                                                                        @if($it->curso->url_imagen)
                                                                            <img src="{{ Storage::url($it->curso->url_imagen) }}"
                                                                                 alt="{{ $it->curso->titulo }}"
                                                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                                                        @else
                                                                            <div class="w-full h-full flex items-center justify-center">
                                                                                <span class="material-icons text-slate-400 text-2xl">school</span>
                                                                            </div>
                                                                        @endif
                                                                        <!-- Quantity Badge -->
                                                                        @if($it->quantity > 1)
                                                                            <div class="absolute -top-1 -right-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-1.5 py-0.5 rounded-full text-xs font-bold">
                                                                                x{{ $it->quantity }}
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <!-- Course Info -->
                                                                    <div class="flex-1 min-w-0">
                                                                        <h5 class="text-white font-semibold text-sm mb-1 line-clamp-1 group-hover:text-cyan-300 transition-colors duration-300">
                                                                            {{ $it->curso->titulo }}
                                                                        </h5>
                                                                        <div class="flex items-center gap-3 text-xs text-gray-400 mb-2">
                                                                            @if($it->curso->categoria)
                                                                                <span class="bg-slate-600/50 px-2 py-0.5 rounded-full">{{ $it->curso->categoria->nombre }}</span>
                                                                            @endif
                                                                            @if($it->curso->duracion_horas)
                                                                                <span class="flex items-center gap-1">
                                                                                    <span class="material-icons text-xs">schedule</span>
                                                                                    {{ $it->curso->duracion_horas }}h
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="flex items-center justify-between">
                                                                            <div class="text-cyan-400 font-bold text-sm">
                                                                                @if($it->curso->precio > 0)
                                                                                    ${{ number_format((float) $it->curso->precio, 2) }}
                                                                                    @if($it->quantity > 1)
                                                                                        <span class="text-gray-400">×{{ $it->quantity }} = ${{ number_format((float) $it->curso->precio * $it->quantity, 2) }}</span>
                                                                                    @endif
                                                                                @else
                                                                                    <span class="text-green-400">Gratis</span>
                                                                                @endif
                                                                            </div>

                                                                            <!-- Remove Button -->
                                                                            <form method="POST" action="{{ route('carrito.remove', $it) }}" class="inline">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                        class="text-red-400 hover:text-red-300 hover:bg-red-500/10 p-1 rounded-lg transition-all duration-300 group/remove"
                                                                                        title="Quitar del carrito">
                                                                                    <span class="material-icons text-sm group-hover/remove:scale-110 transition-transform duration-300">delete</span>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Total Summary -->
                                                    @php
                                                        $subtotal = $miniItems->reduce(function ($carry, $item) {
                                                            return $carry + (($item->curso->precio ?? 0) * $item->quantity);
                                                        }, 0);
                                                    @endphp
                                                    <div class="bg-gradient-to-r from-slate-700/50 to-slate-600/50 border border-slate-600/50 rounded-xl p-3 mb-4">
                                                        <div class="flex items-center justify-between">
                                                            <span class="text-gray-300 text-sm font-medium">Subtotal ({{ $miniItems->count() }} {{ $miniItems->count() === 1 ? 'curso' : 'cursos' }})</span>
                                                            <span class="text-white font-bold text-lg">${{ number_format($subtotal, 2) }}</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <!-- Empty State -->
                                                    <div class="text-center py-8">
                                                        <div class="w-16 h-16 bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                                            <span class="material-icons text-slate-400 text-3xl">shopping_cart</span>
                                                        </div>
                                                        <p class="text-slate-400 text-sm mb-4">Tu carrito está vacío</p>
                                                        <a href="{{ route('usuario.cursos.catalogo') }}"
                                                           class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white text-sm font-semibold rounded-lg transition-all duration-300 hover:scale-105">
                                                            <span class="material-icons text-sm">explore</span>
                                                            Explorar Cursos
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Footer Actions -->
                                            @if($miniItems->count() > 0)
                                                <div class="px-6 py-4 border-t border-slate-700/50 bg-gradient-to-r from-slate-800/50 to-slate-700/50">
                                                    <div class="flex items-center justify-between gap-3">
                                                        <a href="{{ route('usuario.cursos.catalogo') }}"
                                                           class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-slate-600 to-slate-500 hover:from-slate-500 hover:to-slate-400 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                                            <span class="material-icons text-sm">add_shopping_cart</span>
                                                            Seguir Comprando
                                                        </a>
                                                        <form method="POST" action="{{ route('payment.create-link') }}" class="inline" id="dropdown-payment-form">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-500 hover:to-green-500 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-emerald-400/30"
                                                                    id="dropdown-payment-button">
                                                                <span class="material-icons text-sm">payment</span>
                                                                Pagar con Stripe
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif


                            <!-- Professional Profile Context Menu -->
                            <div class="relative group">
                                <button id="profile-menu-trigger"
                                    class="flex items-center space-x-3 p-2 rounded-xl hover:bg-slate-800/50 transition-all duration-300 group">
                                    <!-- Avatar with initials -->
                                    <div class="relative">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->apellido_paterno ?? '', 0, 1)) }}
                                        </div>
                                        <!-- Online status indicator -->
                                        <div
                                            class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-500 border-2 border-slate-900 rounded-full">
                                        </div>
                                    </div>

                                    <!-- User info -->
                                    <div class="text-left">
                                        <p
                                            class="text-sm font-semibold text-white group-hover:text-cyan-300 transition-colors">
                                            {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno ?? '' }}
                                        </p>
                                        <p class="text-xs text-slate-400 group-hover:text-slate-300 transition-colors">
                                            {{ optional(Auth::user()->tipoUsuario)->nombre ?? 'Usuario' }}
                                        </p>
                                    </div>

                                    <!-- Dropdown arrow -->
                                    <span
                                        class="material-icons text-slate-400 text-sm transition-transform group-hover:rotate-180">expand_more</span>
                                </button>

                                <!-- Profile Menu Panel -->
                                <div id="profile-menu-panel"
                                    class="absolute right-0 top-14 mt-2 w-80 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[1000] pointer-events-auto">
                                    <div
                                        class="bg-slate-900/95 backdrop-blur-xl border border-slate-700/60 rounded-2xl shadow-2xl overflow-hidden">
                                        <!-- Animated background -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-blue-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>

                                        <div class="relative p-6">
                                            <!-- Header Section -->
                                            <div class="flex items-center space-x-4 mb-6 pb-4 border-b border-slate-700/50">
                                                <div
                                                    class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->apellido_paterno ?? '', 0, 1)) }}
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-bold text-white">{{ Auth::user()->name }}
                                                        {{ Auth::user()->apellido_paterno ?? '' }}
                                                    </h3>
                                                    <p class="text-sm text-slate-400">{{ Auth::user()->email }}</p>
                                                    <div class="flex items-center mt-1">
                                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                                        <span class="text-xs text-green-400 font-medium">En línea</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Quick Actions -->
                                            <div class="mb-6">
                                                <h4
                                                    class="text-sm font-semibold text-slate-300 mb-3 uppercase tracking-wide">
                                                    Acciones Rápidas</h4>
                                                <div class="space-y-2">
                                                    <a href="{{ route('profile.show') }}"
                                                        class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                        <span
                                                            class="material-icons text-cyan-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">person</span>
                                                        <div>
                                                            <span class="text-white font-medium text-sm">Mi Perfil</span>
                                                            <p class="text-slate-400 text-xs">Ver y editar perfil</p>
                                                        </div>
                                                        <span
                                                            class="ml-auto material-icons text-slate-400 text-sm group-hover/item:text-cyan-400 transition-colors">arrow_forward_ios</span>
                                                    </a>

                                                    @if($isAdmin)
                                                        <a href="{{ route('dashboard') }}"
                                                            class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                            <span
                                                                class="material-icons text-blue-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">dashboard</span>
                                                            <div>
                                                                <span class="text-white font-medium text-sm">Dashboard</span>
                                                                <p class="text-slate-400 text-xs">Panel administrativo</p>
                                                            </div>
                                                            <span
                                                                class="ml-auto material-icons text-slate-400 text-sm group-hover/item:text-blue-400 transition-colors">arrow_forward_ios</span>
                                                        </a>
                                                    @elseif($isCreador)
                                                        <a href="{{ route('creador.dashboard') }}"
                                                            class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                            <span
                                                                class="material-icons text-blue-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">dashboard</span>
                                                            <div>
                                                                <span class="text-white font-medium text-sm">Dashboard</span>
                                                                <p class="text-slate-400 text-xs">Panel de creador</p>
                                                            </div>
                                                            <span
                                                                class="ml-auto material-icons text-slate-400 text-sm group-hover/item:text-blue-400 transition-colors">arrow_forward_ios</span>
                                                        </a>
                                                        
                                                        <a href="{{ route('creador.cursos.index') }}"
                                                            class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                            <span
                                                                class="material-icons text-green-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">school</span>
                                                            <div>
                                                                <span class="text-white font-medium text-sm">Mis Cursos</span>
                                                                <p class="text-slate-400 text-xs">Gestionar mis cursos</p>
                                                            </div>
                                                            <span
                                                                class="ml-auto material-icons text-slate-400 text-sm group-hover/item:text-green-400 transition-colors">arrow_forward_ios</span>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('cursos.catalogo') }}"
                                                            class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                            <span
                                                                class="material-icons text-green-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">school</span>
                                                            <div>
                                                                <span class="text-white font-medium text-sm">Mis Cursos</span>
                                                                <p class="text-slate-400 text-xs">Ver cursos disponibles</p>
                                                            </div>
                                                            <span
                                                                class="ml-auto material-icons text-slate-400 text-sm group-hover/item:text-green-400 transition-colors">arrow_forward_ios</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- More Options (Collapsible) - Solo para administradores -->
                                            @if($isAdmin)
                                            <div class="mb-6">
                                                <button id="expand-menu-trigger"
                                                    class="flex items-center justify-between w-full p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="material-icons text-purple-400 mr-3 text-lg">more_horiz</span>
                                                        <span class="text-white font-medium text-sm">Más Opciones</span>
                                                    </div>
                                                    <span id="expand-menu-arrow"
                                                        class="material-icons text-slate-400 text-sm transition-transform">expand_more</span>
                                                </button>

                                                <div id="expand-menu-content" class="hidden mt-2 space-y-2">
                                                    <a href="{{ route('profile.edit') }}"
                                                        class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                        <span
                                                            class="material-icons text-orange-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">edit</span>
                                                        <div>
                                                            <span class="text-white font-medium text-sm">Editar
                                                                Perfil</span>
                                                            <p class="text-slate-400 text-xs">Modificar información</p>
                                                        </div>
                                                    </a>

                                                    <a href="#"
                                                        class="group/item flex items-center p-3 rounded-xl hover:bg-slate-800/50 transition-all duration-300 hover:scale-105">
                                                        <span
                                                            class="material-icons text-yellow-400 mr-3 text-lg group-hover/item:scale-110 transition-transform">settings</span>
                                                        <div>
                                                            <span
                                                                class="text-white font-medium text-sm">Configuración</span>
                                                            <p class="text-slate-400 text-xs">Preferencias del sistema</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

                                            <!-- Account Section -->
                                            <div class="pt-4 border-t border-slate-700/50">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full group/item flex items-center p-3 text-sm text-red-400 hover:bg-red-500/10 rounded-xl transition-all duration-300 hover:scale-105 border border-transparent hover:border-red-500/30">
                                                        <span
                                                            class="material-icons mr-3 text-xl group-hover/item:scale-110 transition-transform">logout</span>
                                                        <span
                                                            class="font-semibold group-hover/item:text-red-300 transition-colors">Cerrar
                                                            Sesión</span>
                                                        <span
                                                            class="ml-auto material-icons text-slate-400 text-sm group-hover/item:text-red-400 transition-colors">arrow_forward_ios</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menú desplegable para usuarios autenticados (derecha) -->
                        @endauth
                        @guest
                            <!-- Botones Auth en Header (solo escritorio) -->
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-lg border-2 border-blue-400 text-blue-300 hover:text-white hover:bg-blue-500/20 transition-all duration-300 hover:scale-105">
                                <span class="material-icons text-sm mr-1">login</span>
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-lg bg-gradient-to-r from-green-500 to-emerald-500 text-white hover:from-green-400 hover:to-emerald-400 transition-all duration-300 hover:scale-105 border-2 border-emerald-400">
                                <span class="material-icons text-sm mr-1">person_add</span>
                                Registrarse
                            </a>
                        @endguest
                        <div class="h-6 w-px bg-slate-300/40 dark:bg-slate-600/50"></div>
                        <button id="theme-toggle"
                            class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium transition-colors flex items-center">
                            <span id="theme-icon" class="material-icons text-sm">dark_mode</span>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden absolute right-0 flex items-center space-x-2">
                    @auth
                        @if(!$isAdmin && optional(Auth::user())->tipo_usuario_id && in_array((int) Auth::user()->tipo_usuario_id, [3,4], true))
                            <!-- Cart icon for students only -->
                            @php
                                $cartCount = null;
                                if(optional(Auth::user())->tipo_usuario_id && in_array((int) Auth::user()->tipo_usuario_id, [3,4], true)){
                                    try {
                                        $cartCount = \App\Models\CartItem::where('user_id', Auth::id())->count();
                                    } catch (\Throwable $e) {
                                        $cartCount = session('carrito_count') ?? (is_array(session('carrito')) ? count(session('carrito')) : (is_array(session('cart.items')) ? count(session('cart.items')) : 0));
                                    }
                                }
                            @endphp
                            <a @if(Route::has('carrito.index')) href="{{ route('carrito.index') }}" @else href="{{ url('/carrito') }}" @endif
                                class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl border-2 border-cyan-400/60 text-cyan-300 hover:text-white hover:bg-cyan-500/20 hover:border-cyan-400 transition-all duration-300 hover:scale-105">
                                <span class="material-icons text-lg">shopping_cart</span>
                                @if(!is_null($cartCount) && $cartCount > 0)
                                    <span class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-pink-500 text-white text-[10px] font-bold flex items-center justify-center shadow-lg">{{ $cartCount }}</span>
                                @endif
                            </a>
                        @endif
                    @endauth

                    <!-- Botón de cambio de tema móvil -->
                    <button id="theme-toggle-mobile"
                        class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 focus:outline-none">
                        <span id="theme-icon-mobile" class="material-icons">dark_mode</span>
                    </button>

                    <!-- Botón de menú (oculto en páginas de autenticación) -->
                    @if(!request()->routeIs('login') && !request()->routeIs('register'))
                    <button id="mobile-menu-button"
                        class="text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 focus:outline-none">
                        <span class="material-icons">menu</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Mobile menu (animated blue gradient) -->
        @if(!request()->routeIs('login') && !request()->routeIs('register'))
        <div id="mobile-menu"
            class="hidden md:hidden fixed top-16 right-2 left-auto w-80 sm:w-96 z-[2000] border border-blue-500/20 rounded-xl shadow-2xl max-h-[calc(100vh-4rem)] overflow-y-auto">
            <div
                class="relative overflow-hidden bg-gradient-to-br from-blue-950/95 via-slate-900/95 to-blue-900/95 backdrop-blur-xl rounded-xl">
                <!-- Animated decor -->
                <div class="pointer-events-none absolute inset-0">
                    <div class="absolute -top-10 -left-10 w-56 h-56 bg-cyan-500/15 rounded-full blur-3xl animate-pulse">
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-72 h-72 bg-blue-500/15 rounded-full blur-3xl animate-pulse"
                        style="animation-delay: .8s"></div>
                </div>

                <div class="px-4 py-4 space-y-2 relative">
                    @if(request()->routeIs('dashboard') || request()->routeIs('usuarios.*') || request()->routeIs('admin.cursos.*') || request()->routeIs('admin.articulos.*') || request()->routeIs('certificados.*') || request()->routeIs('cursos.ver') || request()->routeIs('articulos.catalogo') || request()->routeIs('articulos.ver') || request()->routeIs('cursos.catalogo'))
                        @if($isAdmin)
                            <!-- Menú administrativo móvil simplificado - Solo información del usuario -->
                        @else
                            <!-- Menú móvil para usuarios tipo 2 - Solo mostrar las opciones de abajo -->
                        @endif
                    @else
                        <!-- Menú normal móvil cuando NO está en dashboard -->
                        @if($isAdmin)
                            <!-- Menú completo para administradores -->
                            <a href="{{ route('home') }}"
                                class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:text-cyan-300 hover:bg-white/5">
                                <span class="flex items-center gap-3">
                                    <span class="material-icons text-cyan-400">home</span>
                                    <span>Inicio</span>
                                </span>
                            </a>
                            <a href="{{ route('sobre-nosotros') }}"
                                class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:text-cyan-300 hover:bg-white/5">
                                <span class="flex items-center gap-3">
                                    <span class="material-icons text-cyan-400">groups</span>
                                    <span>Sobre Nosotros</span>
                                </span>
                            </a>
                        @else
                            <!-- Menú simplificado para estudiantes - Sin opciones adicionales -->
                        @endif
                    @endif

                    @if(!request()->routeIs('dashboard') && !request()->routeIs('usuarios.*') && !request()->routeIs('admin.cursos.*') && !request()->routeIs('admin.articulos.*') && !request()->routeIs('certificados.*') && !request()->routeIs('cursos.ver') && !request()->routeIs('articulos.catalogo') && !request()->routeIs('articulos.ver') && !request()->routeIs('cursos.catalogo'))
                        @if($isAdmin)
                            <!-- Servicios collapsible - Solo mostrar para administradores -->
                        <div class="border border-white/10 rounded-xl overflow-hidden">
                            <button id="mobile-services-toggle"
                                class="w-full flex items-center justify-between px-3 py-3 text-left text-white font-medium hover:bg-white/5">
                                <span class="flex items-center gap-3">
                                    <span class="material-icons text-cyan-400">miscellaneous_services</span>
                                    <span>Servicios</span>
                                </span>
                                <span id="mobile-services-chevron"
                                    class="material-icons text-sm transition-transform">expand_more</span>
                            </button>
                            <div id="mobile-services-content" class="hidden pb-2">
                                <div class="pl-3 space-y-1">
                                    <a href="{{ route('servicios.consultoria-ti') }}"
                                        class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                        <span class="flex items-center gap-3">
                                            <span class="material-icons text-cyan-400">psychology</span>
                                            <span>Consultoría TI</span>
                                        </span>
                                    </a>
                                    <a href="{{ route('servicios.ciberseguridad') }}"
                                        class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                        <span class="flex items-center gap-3">
                                            <span class="material-icons text-cyan-400">security</span>
                                            <span>Ciberseguridad</span>
                                        </span>
                                    </a>
                                    <a href="{{ route('servicios.auditorias') }}"
                                        class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                        <span class="flex items-center gap-3">
                                            <span class="material-icons text-cyan-400">fact_check</span>
                                            <span>Auditorías</span>
                                        </span>
                                    </a>
                                    <a href="{{ route('servicios.soluciones-saas') }}"
                                        class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                        <span class="flex items-center gap-3">
                                            <span class="material-icons text-cyan-400">cloud</span>
                                            <span>Soluciones SaaS</span>
                                        </span>
                                    </a>
                                    <a href="{{ route('servicios.reingenieria') }}"
                                        class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                        <span class="flex items-center gap-3">
                                            <span class="material-icons text-cyan-400">engineering</span>
                                            <span>Reingeniería</span>
                                        </span>
                                    </a>
                                    <a href="{{ route('servicios.soluciones-medida') }}"
                                        class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                        <span class="flex items-center gap-3">
                                            <span class="material-icons text-cyan-400">build</span>
                                            <span>Soluciones a Medida</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                            <!-- Soluciones collapsible - Solo mostrar para administradores -->
                            <div class="border border-white/10 rounded-xl overflow-hidden">
                                <button id="mobile-solutions-toggle"
                                    class="w-full flex items-center justify-between px-3 py-3 text-left text-white font-medium hover:bg-white/5">
                                    <span class="flex items-center gap-3">
                                        <span class="material-icons text-cyan-400">widgets</span>
                                        <span>Soluciones</span>
                                    </span>
                                    <span id="mobile-solutions-chevron"
                                        class="material-icons text-sm transition-transform">expand_more</span>
                                </button>
                                <div id="mobile-solutions-content" class="hidden pb-2">
                                    <div class="pl-3 space-y-1">
                                        <a href="{{ route('soluciones.kibi') }}"
                                            class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                            <span class="flex items-center gap-3">
                                                <span class="material-icons text-cyan-400">analytics</span>
                                                <span>KIBI</span>
                                            </span>
                                        </a>
                                        <a href="{{ route('soluciones.track-safe') }}"
                                            class="block px-3 py-2 text-slate-200 hover:text-cyan-300 hover:bg-white/5 rounded-lg text-sm">
                                            <span class="flex items-center gap-3">
                                                <span class="material-icons text-cyan-400">security</span>
                                                <span>Track Safe</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('contacto') }}"
                                class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:text-cyan-300 hover:bg-white/5">
                                <span class="flex items-center gap-3">
                                    <span class="material-icons text-cyan-400">support_agent</span>
                                    <span>Contacto</span>
                                </span>
                            </a>
                        @endif
                    @endif

                    <!-- Mobile Auth Links -->
                    <div class="pt-3 border-t border-white/10">
                        @auth
                            <div class="space-y-3">
                                <!-- Enhanced Professional Profile Info -->
                                <div
                                    class="relative flex items-center space-x-4 p-5 bg-gradient-to-r from-slate-800/60 via-cyan-900/20 to-blue-900/60 rounded-2xl mb-4 border border-slate-600/40 shadow-xl">
                                    <!-- Animated Background -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-blue-500/10 to-purple-500/10 rounded-2xl opacity-0 hover:opacity-100 transition-opacity duration-500">
                                    </div>

                                    <div class="relative">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full blur-md opacity-60 animate-pulse">
                                        </div>
                                        <div
                                            class="relative w-16 h-16 bg-gradient-to-br from-cyan-500 via-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-xl ring-4 ring-white/20">
                                            <span class="text-white font-bold text-xl drop-shadow-sm">
                                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->apellido_paterno, 0, 1)) }}
                                            </span>
                                        </div>
                                        <div
                                            class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full border-3 border-slate-800 shadow-lg animate-pulse">
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-white font-bold text-lg truncate bg-gradient-to-r from-white to-cyan-100 bg-clip-text text-transparent">
                                            {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }}
                                        </h4>
                                        <p class="text-slate-300 text-sm truncate font-medium">{{ Auth::user()->email }}</p>
                                        @if(Auth::user()->tipoUsuario)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-cyan-500/30 to-blue-500/30 text-cyan-200 border border-cyan-400/50 mt-2">
                                                <span class="w-2 h-2 bg-cyan-400 rounded-full mr-2 animate-pulse"></span>
                                                {{ Auth::user()->tipoUsuario->nombre }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Enhanced Quick Actions -->
                                <div class="space-y-2">
                                    @if($isAdmin)
                                        <!-- Quick Actions eliminadas para administradores en vista móvil -->
                                    @elseif($isCreador)
                                        <!-- Quick Actions para creadores -->
                                        <a href="{{ route('creador.dashboard') }}"
                                           class="flex-1 text-center inline-flex items-center justify-center gap-3 px-4 py-4 rounded-xl bg-gradient-to-r from-purple-600/20 to-indigo-600/20 border border-purple-500/50 text-purple-300 hover:bg-gradient-to-r hover:from-purple-600/30 hover:to-indigo-600/30 hover:text-purple-200 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-500/20">
                                            <span class="material-icons text-lg">dashboard</span>
                                            <span class="font-semibold">Dashboard</span>
                                        </a>
                                        
                                        <a href="{{ route('creador.cursos.index') }}"
                                           class="flex-1 text-center inline-flex items-center justify-center gap-3 px-4 py-4 rounded-xl bg-gradient-to-r from-green-600/20 to-emerald-600/20 border border-green-500/50 text-green-300 hover:bg-gradient-to-r hover:from-green-600/30 hover:to-emerald-600/30 hover:text-green-200 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-green-500/20">
                                            <span class="material-icons text-lg">school</span>
                                            <span class="font-semibold">Mis Cursos</span>
                                        </a>
                                    @else
                                        <!-- Quick Actions eliminadas para estudiantes en vista móvil -->
                                    @endif
                                    <form method="POST" action="{{ route('logout') }}" class="flex">
                                        @csrf
                                        <button type="submit"
                                            class="flex-1 text-center inline-flex items-center justify-center gap-3 px-4 py-4 rounded-xl border border-red-500/50 text-red-300 hover:bg-gradient-to-r hover:from-red-500/20 hover:to-pink-500/20 hover:text-red-200 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-red-500/20">
                                            <span class="material-icons text-lg">logout</span>
                                            <span class="font-semibold">Cerrar sesión</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth

                        @guest
                            <!-- Botones de autenticación para usuarios no autenticados -->
                            <div class="space-y-3">
                                <!-- Botón Iniciar Sesión -->
                                <a href="{{ route('login') }}"
                                    class="group relative flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-br from-blue-600/90 via-cyan-600/90 to-blue-700/90 border border-blue-400/50 text-white hover:from-blue-500 hover:via-cyan-500 hover:to-blue-600 hover:border-blue-300/70 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/30 backdrop-blur-sm overflow-hidden">
                                    <!-- Efecto de brillo animado -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/15 to-transparent -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>

                                    <!-- Ícono con efecto de rotación -->
                                    <div class="relative w-6 h-6 bg-white/20 rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:rotate-12">
                                        <span class="material-icons text-white text-sm group-hover:scale-110 transition-transform duration-300">login</span>
                                    </div>

                                    <!-- Texto con gradiente -->
                                    <div class="relative flex-1">
                                        <span class="font-semibold text-sm bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent group-hover:from-blue-50 group-hover:to-white transition-all duration-300">
                                            Iniciar Sesión
                                        </span>
                                    </div>

                                    <!-- Flecha animada -->
                                    <div class="relative">
                                        <span class="material-icons text-white/70 text-xs group-hover:text-white group-hover:translate-x-1 transition-all duration-300">arrow_forward</span>
                                    </div>
                                </a>

                                <!-- Botón Registrarse -->
                                <a href="{{ route('register') }}"
                                    class="group relative flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-br from-emerald-600/90 via-green-600/90 to-teal-700/90 border border-emerald-400/50 text-white hover:from-emerald-500 hover:via-green-500 hover:to-teal-600 hover:border-emerald-300/70 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-emerald-500/30 backdrop-blur-sm overflow-hidden">
                                    <!-- Efecto de brillo animado -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/15 to-transparent -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>

                                    <!-- Ícono con efecto de rotación -->
                                    <div class="relative w-6 h-6 bg-white/20 rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:rotate-12">
                                        <span class="material-icons text-white text-sm group-hover:scale-110 transition-transform duration-300">person_add</span>
                                    </div>

                                    <!-- Texto con gradiente -->
                                    <div class="relative flex-1">
                                        <span class="font-semibold text-sm bg-gradient-to-r from-white to-emerald-100 bg-clip-text text-transparent group-hover:from-emerald-50 group-hover:to-white transition-all duration-300">
                                            Registrarse
                                        </span>
                                    </div>

                                    <!-- Flecha animada -->
                                    <div class="relative">
                                        <span class="material-icons text-white/70 text-xs group-hover:text-white group-hover:translate-x-1 transition-all duration-300">arrow_forward</span>
                                    </div>
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        @endif
    </nav>

    <!-- Student Sidebar (Only for student users) -->
    @auth
        @if(optional(Auth::user())->tipo_usuario_id && in_array((int) Auth::user()->tipo_usuario_id, [3,4], true))
            <div class="student-sidebar" id="studentSidebar">
                <!-- Logo and Toggle -->
                <div class="sidebar-header">
                    <div class="logo-container">
                        <div class="logo">
                            <img src="{{ asset('images/logos/SoftLinkIA.ico') }}" alt="SoftLinkIA" class="logo-icon">
                            <span class="logo-text">SoftLinkIA</span>
                        </div>
                        <button class="toggle-btn" id="sidebarToggle">
                            <span class="material-icons">menu</span>
                        </button>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="sidebar-nav">
                    <ul class="menu-items">
                        <!-- Inicio -->
                        <li class="menu-item {{ request()->routeIs('usuario-estudiante') ? 'active' : '' }}">
                            <a href="{{ route('usuario-estudiante') }}" class="menu-link">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-8 h-8">
                                        <span class="material-icons text-white text-xl drop-shadow-xl filter brightness-110 lightning-icon">home</span>
                                    </div>
                                </div>
                                <span class="menu-text">Inicio</span>
                            </a>
                        </li>

                        <!-- Mis Cursos -->
                        <li class="menu-item {{ request()->routeIs('usuario.cursos.adquiridos') ? 'active' : '' }}">
                            <a href="{{ route('usuario.cursos.adquiridos') }}" class="menu-link">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-8 h-8">
                                        <span class="material-icons text-white text-xl drop-shadow-xl filter brightness-110 lightning-icon">school</span>
                                    </div>
                                </div>
                                <span class="menu-text">Mis Cursos</span>
                            </a>
                        </li>

                        <!-- Catálogo de Cursos -->
                        <li class="menu-item {{ request()->routeIs('usuario.cursos.catalogo') ? 'active' : '' }}">
                            <a href="{{ route('usuario.cursos.catalogo') }}" class="menu-link">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-8 h-8">
                                        <span class="material-icons text-white text-xl drop-shadow-xl filter brightness-110 lightning-icon">library_books</span>
                                    </div>
                                </div>
                                <span class="menu-text">Catálogo</span>
                            </a>
                        </li>

                        <!-- Separador -->
                        <li class="separator"></li>

                        <!-- Carrito -->
                        <li class="menu-item {{ request()->routeIs('carrito.index') ? 'active' : '' }}">
                            <a href="{{ route('carrito.index') }}" class="menu-link">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-8 h-8">
                                        <span class="material-icons text-white text-xl drop-shadow-xl filter brightness-110 lightning-icon">shopping_cart</span>
                                    </div>
                                </div>
                                <span class="menu-text">Carrito</span>
                                @php
                                    $cartCount = null;
                                    try {
                                        $cartCount = \App\Models\CartItem::where('user_id', Auth::id())->count();
                                    } catch (\Throwable $e) {
                                        $cartCount = 0;
                                    }
                                @endphp
                                @if($cartCount > 0)
                                    <span class="cart-badge">{{ $cartCount }}</span>
                                @endif
                            </a>
                        </li>

                        <!-- Perfil -->
                        <li class="menu-item {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                            <a href="{{ route('profile.show') }}" class="menu-link">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-8 h-8">
                                        <span class="material-icons text-white text-xl drop-shadow-xl filter brightness-110 lightning-icon">person</span>
                                    </div>
                                </div>
                                <span class="menu-text">Mi Perfil</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
    @endauth

    <!-- Main Content -->
    <main class="main-content {{ optional(Auth::user())->tipo_usuario_id && in_array((int) Auth::user()->tipo_usuario_id, [3,4], true) ? 'with-sidebar' : '' }} relative z-30">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- Floating Authentication Button (Only for guests) -->
    @guest
        <div id="floating-auth" class="fixed bottom-20 right-4 z-[60] md:hidden">
            <!-- Main Auth FAB Button -->
            <button id="auth-fab-main"
                class="group relative w-12 h-12 bg-gradient-to-br from-green-500/70 via-emerald-500/70 to-teal-600/70 backdrop-blur-sm rounded-full shadow-lg hover:shadow-green-500/20 transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-green-500/30">
                <!-- Animated Background -->
                <div
                    class="absolute inset-0 bg-gradient-to-br from-green-400/40 to-emerald-500/40 rounded-full blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <!-- Icon Container -->
                <div class="relative flex items-center justify-center w-full h-full">
                    <span id="auth-fab-icon"
                        class="material-icons text-white/90 text-xl transition-transform duration-300 group-hover:scale-110">person</span>
                </div>

                <!-- Pulse Animation -->
                <div
                    class="absolute inset-0 rounded-full bg-gradient-to-br from-green-500/30 to-emerald-500/30 animate-ping opacity-10">
                </div>
            </button>

            <!-- Auth Menu -->
            <div id="auth-fab-menu"
                class="absolute bottom-14 right-0 opacity-0 invisible transition-all duration-300 transform scale-95 translate-y-4">
                <div class="relative">
                    <!-- Menu Background -->
                    <div
                        class="absolute inset-0 bg-white/80 dark:bg-slate-900/80 backdrop-blur-lg rounded-xl shadow-lg border border-white/20 dark:border-slate-700/40">
                    </div>

                    <!-- Menu Content -->
                    <div class="relative p-4 space-y-3 min-w-[240px]">
                        <!-- Header -->
                        <div class="text-center pb-3 border-b border-slate-200/30 dark:border-slate-700/30">
                            <h3
                                class="text-sm font-bold text-slate-700/90 dark:text-slate-300/90 bg-gradient-to-r from-green-600/90 to-emerald-600/90 dark:from-green-400/90 dark:to-emerald-400/90 bg-clip-text text-transparent">
                                🔐 Acceso
                            </h3>
                            <p class="text-xs text-slate-500/70 dark:text-slate-400/70 mt-1">Inicia sesión o regístrate</p>
                        </div>

                        <!-- Auth Options -->
                        <div class="space-y-2">
                            <!-- Login Button -->
                            <a href="{{ route('login') }}"
                                class="group/item flex items-center p-3 rounded-lg bg-gradient-to-r from-blue-50/60 to-cyan-50/60 dark:from-blue-900/20 dark:to-cyan-900/20 hover:from-blue-100/80 hover:to-cyan-100/80 dark:hover:from-blue-800/30 dark:hover:to-cyan-800/30 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/20 border border-blue-200/40 dark:border-blue-700/30 backdrop-blur-sm">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-blue-500/80 to-cyan-600/80 rounded-lg flex items-center justify-center mr-3 group-hover/item:scale-110 transition-transform duration-300">
                                    <span class="material-icons text-white/90 text-lg">login</span>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="text-sm font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                        Iniciar Sesión
                                    </div>
                                    <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Accede a tu cuenta</div>
                                </div>
                                <span
                                    class="material-icons text-slate-400/60 text-sm group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                            </a>

                            <!-- Register Button -->
                            <a href="{{ route('register') }}"
                                class="group/item flex items-center p-3 rounded-lg bg-gradient-to-r from-green-50/60 to-emerald-50/60 dark:from-green-900/20 dark:to-emerald-900/20 hover:from-green-100/80 hover:to-emerald-100/80 dark:hover:from-green-800/30 dark:hover:to-emerald-800/30 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/20 border border-green-200/40 dark:border-green-700/30 backdrop-blur-sm">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-green-500/80 to-emerald-600/80 rounded-lg flex items-center justify-center mr-3 group-hover/item:scale-110 transition-transform duration-300">
                                    <span class="material-icons text-white/90 text-lg">person_add</span>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="text-sm font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                        Registrarse
                                    </div>
                                    <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Crear nueva cuenta</div>
                                </div>
                                <span
                                    class="material-icons text-slate-400/60 text-sm group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                            </a>
                        </div>

                        <!-- Footer -->
                        <div class="pt-2 border-t border-slate-200/30 dark:border-slate-700/30 text-center">
                            <p class="text-xs text-slate-500/70 dark:text-slate-400/70">
                                💡 Acceso rápido y seguro
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    <!-- Floating Action Button with Quick Links -->
    @auth
    <div id="floating-menu" class="fixed bottom-4 right-4 z-[60]">
        <!-- Main FAB Button -->
        <button id="fab-main"
            class="group relative w-10 h-10 bg-gradient-to-br from-cyan-500/60 via-blue-500/60 to-purple-600/60 backdrop-blur-sm rounded-full shadow-lg hover:shadow-cyan-500/20 transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-cyan-500/30">
            <!-- Animated Background -->
            <div
                class="absolute inset-0 bg-gradient-to-br from-cyan-400/40 to-blue-500/40 rounded-full blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>

            <!-- Icon Container -->
            <div class="relative flex items-center justify-center w-full h-full">
                <span id="fab-icon"
                    class="material-icons text-white/90 text-lg transition-transform duration-300 group-hover:rotate-45">add</span>
            </div>

            <!-- Pulse Animation -->
            <div
                class="absolute inset-0 rounded-full bg-gradient-to-br from-cyan-500/30 to-blue-500/30 animate-ping opacity-10">
            </div>
        </button>

        <!-- Quick Links Menu -->
        <div id="fab-menu"
            class="absolute bottom-12 right-0 opacity-0 invisible transition-all duration-300 transform scale-95 translate-y-4">
            <div class="relative">
                <!-- Menu Background -->
                <div
                    class="absolute inset-0 bg-white/70 dark:bg-slate-900/70 backdrop-blur-lg rounded-xl shadow-lg border border-white/10 dark:border-slate-700/30">
                </div>

                <!-- Menu Content -->
                <div class="relative p-3 space-y-3 min-w-[280px] max-h-[70vh] overflow-y-auto">
                    @if(request()->routeIs('home'))
                        <!-- Header -->
                        <div class="text-center pb-2 border-b border-slate-200/30 dark:border-slate-700/30">
                            <h3
                                class="text-xs font-bold text-slate-700/80 dark:text-slate-300/80 bg-gradient-to-r from-cyan-600/80 to-blue-600/80 dark:from-cyan-400/80 dark:to-blue-400/80 bg-clip-text text-transparent">
                                🚀 Navegación Rápida
                            </h3>
                        </div>

                        <!-- Level 1: Navegación Principal -->
                        <div class="space-y-2">
                        <!-- Inicio -->
                        <a href="{{ route('home') }}"
                            class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-blue-50/40 to-cyan-50/40 dark:from-blue-900/10 dark:to-cyan-900/10 hover:from-blue-100/60 hover:to-cyan-100/60 dark:hover:from-blue-800/20 dark:hover:to-cyan-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/10 border border-blue-200/30 dark:border-blue-700/20 backdrop-blur-sm">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-500/70 to-cyan-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                <span class="material-icons text-white/90 text-sm">home</span>
                            </div>
                            <div class="flex-1">
                                <div
                                    class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                    Inicio
                                </div>
                                <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Página principal</div>
                            </div>
                            <span
                                class="material-icons text-slate-400/60 text-xs group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                        </a>

                        <!-- Sobre Nosotros -->
                        <a href="{{ route('sobre-nosotros') }}"
                            class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-green-50/40 to-emerald-50/40 dark:from-green-900/10 dark:to-emerald-900/10 hover:from-green-100/60 hover:to-emerald-100/60 dark:hover:from-green-800/20 dark:hover:to-emerald-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/10 border border-green-200/30 dark:border-green-700/20 backdrop-blur-sm">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-green-500/70 to-emerald-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                <span class="material-icons text-white/90 text-sm">groups</span>
                            </div>
                            <div class="flex-1">
                                <div
                                    class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                    Sobre Nosotros
                                </div>
                                <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Conoce nuestra empresa
                                </div>
                            </div>
                            <span
                                class="material-icons text-slate-400/60 text-xs group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                        </a>

                        <!-- Servicios (Collapsible) -->
                        <div class="space-y-1">
                            <button id="fab-services-trigger"
                                class="w-full group/item flex items-center justify-between p-2 rounded-lg bg-gradient-to-r from-purple-50/40 to-indigo-50/40 dark:from-purple-900/10 dark:to-indigo-900/10 hover:from-purple-100/60 hover:to-indigo-100/60 dark:hover:from-purple-800/20 dark:hover:to-indigo-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-purple-500/10 border border-purple-200/30 dark:border-purple-700/20 backdrop-blur-sm">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-purple-500/70 to-indigo-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">miscellaneous_services</span>
                                    </div>
                                    <div class="text-left">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-purple-600 dark:group-hover/item:text-purple-400 transition-colors duration-300">
                                            Servicios
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Nuestros servicios
                                        </div>
                                    </div>
                                </div>
                                <span id="fab-services-arrow"
                                    class="material-icons text-slate-400/60 text-xs transition-transform duration-300 group-hover/item:text-purple-500">expand_more</span>
                            </button>

                            <!-- Subnivel: Servicios -->
                            <div id="fab-services-content" class="hidden ml-4 space-y-1">
                                <a href="{{ route('servicios.consultoria-ti') }}"
                                    class="group/sub flex items-center p-1.5 rounded-md bg-gradient-to-r from-purple-50/20 to-indigo-50/20 dark:from-purple-900/5 dark:to-indigo-900/5 hover:from-purple-100/40 hover:to-indigo-100/40 dark:hover:from-purple-800/10 dark:hover:to-indigo-800/10 transition-all duration-300 hover:scale-105 border border-purple-100/20 dark:border-purple-700/10 backdrop-blur-sm">
                                    <span
                                        class="material-icons text-purple-500/70 dark:text-purple-400/70 mr-1.5 text-xs group-hover/sub:scale-110 transition-transform duration-300">psychology</span>
                                    <span
                                        class="text-xs font-medium text-slate-700/80 dark:text-slate-300/80 group-hover/sub:text-purple-600 dark:group-hover/sub:text-purple-400 transition-colors duration-300">Consultoría
                                        TI</span>
                                </a>
                                <a href="{{ route('servicios.ciberseguridad') }}"
                                    class="group/sub flex items-center p-1.5 rounded-md bg-gradient-to-r from-purple-50/20 to-indigo-50/20 dark:from-purple-900/5 dark:to-indigo-900/5 hover:from-purple-100/40 hover:to-indigo-100/40 dark:hover:from-purple-800/10 dark:hover:to-indigo-800/10 transition-all duration-300 hover:scale-105 border border-purple-100/20 dark:border-purple-700/10 backdrop-blur-sm">
                                    <span
                                        class="material-icons text-purple-500/70 dark:text-purple-400/70 mr-1.5 text-xs group-hover/sub:scale-110 transition-transform duration-300">security</span>
                                    <span
                                        class="text-xs font-medium text-slate-700/80 dark:text-slate-300/80 group-hover/sub:text-purple-600 dark:group-hover/sub:text-purple-400 transition-colors duration-300">Ciberseguridad</span>
                                </a>
                                <a href="{{ route('servicios.auditorias') }}"
                                    class="group/sub flex items-center p-1.5 rounded-md bg-gradient-to-r from-purple-50/20 to-indigo-50/20 dark:from-purple-900/5 dark:to-indigo-900/5 hover:from-purple-100/40 hover:to-indigo-100/40 dark:hover:from-purple-800/10 dark:hover:to-indigo-800/10 transition-all duration-300 hover:scale-105 border border-purple-100/20 dark:border-purple-700/10 backdrop-blur-sm">
                                    <span
                                        class="material-icons text-purple-500/70 dark:text-purple-400/70 mr-1.5 text-xs group-hover/sub:scale-110 transition-transform duration-300">fact_check</span>
                                    <span
                                        class="text-xs font-medium text-slate-700/80 dark:text-slate-300/80 group-hover/sub:text-purple-600 dark:group-hover/sub:text-purple-400 transition-colors duration-300">Auditorías</span>
                                </a>
                                <a href="{{ route('servicios.soluciones-saas') }}"
                                    class="group/sub flex items-center p-1.5 rounded-md bg-gradient-to-r from-purple-50/20 to-indigo-50/20 dark:from-purple-900/5 dark:to-indigo-900/5 hover:from-purple-100/40 hover:to-indigo-100/40 dark:hover:from-purple-800/10 dark:hover:to-indigo-800/10 transition-all duration-300 hover:scale-105 border border-purple-100/20 dark:border-purple-700/10 backdrop-blur-sm">
                                    <span
                                        class="material-icons text-purple-500/70 dark:text-purple-400/70 mr-1.5 text-xs group-hover/sub:scale-110 transition-transform duration-300">cloud</span>
                                    <span
                                        class="text-xs font-medium text-slate-700/80 dark:text-slate-300/80 group-hover/sub:text-purple-600 dark:group-hover/sub:text-purple-400 transition-colors duration-300">Soluciones
                                        SaaS</span>
                                </a>
                            </div>
                        </div>

                        <!-- Soluciones (Collapsible) -->
                        <div class="space-y-1">
                            <button id="fab-solutions-trigger"
                                class="w-full group/item flex items-center justify-between p-2 rounded-lg bg-gradient-to-r from-teal-50/40 to-cyan-50/40 dark:from-teal-900/10 dark:to-cyan-900/10 hover:from-teal-100/60 hover:to-cyan-100/60 dark:hover:from-teal-800/20 dark:hover:to-cyan-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-teal-500/10 border border-teal-200/30 dark:border-teal-700/20 backdrop-blur-sm">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-teal-500/70 to-cyan-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">widgets</span>
                                    </div>
                                    <div class="text-left">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-teal-600 dark:group-hover/item:text-teal-400 transition-colors duration-300">
                                            Soluciones
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Nuestras
                                            soluciones</div>
                                    </div>
                                </div>
                                <span id="fab-solutions-arrow"
                                    class="material-icons text-slate-400/60 text-xs transition-transform duration-300 group-hover/item:text-teal-500">expand_more</span>
                            </button>

                            <!-- Subnivel: Soluciones -->
                            <div id="fab-solutions-content" class="hidden ml-4 space-y-1">
                                <a href="{{ route('soluciones.kibi') }}"
                                    class="group/sub flex items-center p-1.5 rounded-md bg-gradient-to-r from-teal-50/20 to-cyan-50/20 dark:from-teal-900/5 dark:to-cyan-900/5 hover:from-teal-100/40 hover:to-cyan-100/40 dark:hover:from-teal-800/10 dark:hover:to-cyan-800/10 transition-all duration-300 hover:scale-105 border border-teal-100/20 dark:border-teal-700/10 backdrop-blur-sm">
                                    <span
                                        class="material-icons text-teal-500/70 dark:text-teal-400/70 mr-1.5 text-xs group-hover/sub:scale-110 transition-transform duration-300">analytics</span>
                                    <span
                                        class="text-xs font-medium text-slate-700/80 dark:text-slate-300/80 group-hover/sub:text-teal-600 dark:group-hover/sub:text-teal-400 transition-colors duration-300">KIBI</span>
                                </a>
                                <a href="{{ route('soluciones.track-safe') }}"
                                    class="group/sub flex items-center p-1.5 rounded-md bg-gradient-to-r from-teal-50/20 to-cyan-50/20 dark:from-teal-900/5 dark:to-cyan-900/5 hover:from-teal-100/40 hover:to-cyan-100/40 dark:hover:from-teal-800/10 dark:hover:to-cyan-800/10 transition-all duration-300 hover:scale-105 border border-teal-100/20 dark:border-teal-700/10 backdrop-blur-sm">
                                    <span
                                        class="material-icons text-teal-500/70 dark:text-teal-400/70 mr-1.5 text-xs group-hover/sub:scale-110 transition-transform duration-300">security</span>
                                    <span
                                        class="text-xs font-medium text-slate-700/80 dark:text-slate-300/80 group-hover/sub:text-teal-600 dark:group-hover/sub:text-teal-400 transition-colors duration-300">Track
                                        Safe</span>
                                </a>
                            </div>
                        </div>

                        <!-- Contacto -->
                        <a href="{{ route('contacto') }}"
                            class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-orange-50/40 to-amber-50/40 dark:from-orange-900/10 dark:to-amber-900/10 hover:from-orange-100/60 hover:to-amber-100/60 dark:hover:from-orange-800/20 dark:hover:to-amber-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-orange-500/10 border border-orange-200/30 dark:border-orange-700/20 backdrop-blur-sm">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-orange-500/70 to-amber-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                <span class="material-icons text-white/90 text-sm">support_agent</span>
                            </div>
                            <div class="flex-1">
                                <div
                                    class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-orange-600 dark:group-hover/item:text-orange-400 transition-colors duration-300">
                                    Contacto
                                </div>
                                <div class="text-xs text-slate-500/70 dark:text-slate-400/70">¿Necesitas ayuda?</div>
                            </div>
                            <span
                                class="material-icons text-slate-400/60 text-xs group-hover/item:text-orange-500 transition-colors duration-300">arrow_forward_ios</span>
                        </a>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-slate-200/30 dark:border-slate-700/30"></div>
                    @endif

                    <!-- Level 2: Área de Usuario -->
                    <div class="space-y-2">
                        <div
                            class="text-xs font-bold text-slate-600/80 dark:text-slate-300/80 uppercase tracking-wider px-2 py-1 bg-gradient-to-r from-cyan-50/50 to-blue-50/50 dark:from-cyan-900/10 dark:to-blue-900/10 rounded-md border border-cyan-100/30 dark:border-cyan-800/20 backdrop-blur-sm">
                            👤 Área de Usuario
                        </div>

                        @if($isAdmin)
                            <!-- Menú completo para administradores -->
                            @if(request()->routeIs('dashboard') || request()->routeIs('profile.*') || request()->routeIs('cursos.catalogo') || request()->routeIs('articulos.catalogo') || request()->routeIs('redes-sociales'))
                                <!-- Mostrar TODAS las opciones del ÁREA DE USUARIO en vistas de admin -->
                                <!-- Dashboard -->
                                <a href="{{ route('dashboard') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-indigo-50/40 to-purple-50/40 dark:from-indigo-900/10 dark:to-purple-900/10 hover:from-indigo-100/60 hover:to-purple-100/60 dark:hover:from-indigo-800/20 dark:hover:to-purple-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-indigo-500/10 border border-indigo-200/30 dark:border-indigo-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-indigo-500/70 to-purple-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">dashboard</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-indigo-600 dark:group-hover/item:text-indigo-400 transition-colors duration-300">
                                            Dashboard
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Panel de control</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-indigo-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mi Perfil -->
                                <a href="{{ route('profile.show') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-cyan-50/40 to-blue-50/40 dark:from-cyan-900/10 dark:to-blue-900/10 hover:from-cyan-100/60 hover:to-blue-100/60 dark:hover:from-cyan-800/20 dark:hover:to-blue-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-cyan-500/10 border border-cyan-200/30 dark:border-cyan-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-cyan-500/70 to-blue-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">person</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-cyan-600 dark:group-hover/item:text-cyan-400 transition-colors duration-300">
                                            Mi Perfil
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Información personal</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-cyan-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mis Cursos -->
                                <a href="{{ route('cursos.catalogo') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-green-50/40 to-emerald-50/40 dark:from-green-900/10 dark:to-emerald-900/10 hover:from-green-100/60 hover:to-emerald-100/60 dark:hover:from-green-800/20 dark:hover:to-emerald-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/10 border border-green-200/30 dark:border-green-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-green-500/70 to-emerald-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">school</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                            Mis Cursos
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Aprende y crece</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Blog -->
                                <a href="{{ route('articulos.catalogo') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-blue-50/40 to-indigo-50/40 dark:from-blue-900/10 dark:to-indigo-900/10 hover:from-blue-100/60 hover:to-indigo-100/60 dark:hover:from-blue-800/20 dark:hover:to-indigo-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/10 border border-blue-200/30 dark:border-blue-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-blue-500/70 to-indigo-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">article</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                            Blog
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Artículos y noticias</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Redes Sociales -->
                                <a href="{{ route('redes-sociales') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-pink-50/40 to-rose-50/40 dark:from-pink-900/10 dark:to-rose-900/10 hover:from-pink-100/60 hover:to-rose-100/60 dark:hover:from-pink-800/20 dark:hover:to-rose-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-pink-500/10 border border-pink-200/30 dark:border-pink-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-pink-500/70 to-rose-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">share</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-pink-600 dark:group-hover/item:text-pink-400 transition-colors duration-300">
                                            Redes Sociales
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Conecta con nosotros</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-pink-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>
                            @else
                                <!-- Mostrar todas las opciones cuando estamos en home (admin) -->
                                <!-- Dashboard -->
                                <a href="{{ route('dashboard') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-indigo-50/40 to-purple-50/40 dark:from-indigo-900/10 dark:to-purple-900/10 hover:from-indigo-100/60 hover:to-purple-100/60 dark:hover:from-indigo-800/20 dark:hover:to-purple-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-indigo-500/10 border border-indigo-200/30 dark:border-indigo-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-indigo-500/70 to-purple-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">dashboard</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-indigo-600 dark:group-hover/item:text-indigo-400 transition-colors duration-300">
                                            Dashboard
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Panel de control</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-indigo-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mi Perfil -->
                                <a href="{{ route('profile.show') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-cyan-50/40 to-blue-50/40 dark:from-cyan-900/10 dark:to-blue-900/10 hover:from-cyan-100/60 hover:to-blue-100/60 dark:hover:from-cyan-800/20 dark:hover:to-blue-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-cyan-500/10 border border-cyan-200/30 dark:border-cyan-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-cyan-500/70 to-blue-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">person</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-cyan-600 dark:group-hover/item:text-cyan-400 transition-colors duration-300">
                                            Mi Perfil
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Información personal</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-cyan-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mis Cursos -->
                                <a href="{{ route('cursos.catalogo') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-green-50/40 to-emerald-50/40 dark:from-green-900/10 dark:to-emerald-900/10 hover:from-green-100/60 hover:to-emerald-100/60 dark:hover:from-green-800/20 dark:hover:to-emerald-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/10 border border-green-200/30 dark:border-green-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-green-500/70 to-emerald-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">school</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                            Mis Cursos
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Aprende y crece</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Blog -->
                                <a href="{{ route('articulos.catalogo') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-blue-50/40 to-indigo-50/40 dark:from-blue-900/10 dark:to-indigo-900/10 hover:from-blue-100/60 hover:to-indigo-100/60 dark:hover:from-blue-800/20 dark:hover:to-indigo-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/10 border border-blue-200/30 dark:border-blue-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-blue-500/70 to-indigo-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">article</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                            Blog
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Artículos y noticias</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Redes Sociales -->
                                <a href="{{ route('redes-sociales') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-pink-50/40 to-rose-50/40 dark:from-pink-900/10 dark:to-rose-900/10 hover:from-pink-100/60 hover:to-rose-100/60 dark:hover:from-pink-800/20 dark:hover:to-rose-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-pink-500/10 border border-pink-200/30 dark:border-pink-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-pink-500/70 to-rose-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">share</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-pink-600 dark:group-hover/item:text-pink-400 transition-colors duration-300">
                                            Redes Sociales
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Conecta con nosotros</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-pink-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>
                            @endif
                        @elseif($isCreador)
                            <!-- Menú para creadores -->
                            @if(request()->routeIs('creador.dashboard') || request()->routeIs('creador.cursos.*') || request()->routeIs('creador.articulos.*') || request()->routeIs('profile.*'))
                                <!-- Mostrar opciones del creador en vistas específicas -->
                                <!-- Dashboard -->
                                <a href="{{ route('creador.dashboard') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-indigo-50/40 to-purple-50/40 dark:from-indigo-900/10 dark:to-purple-900/10 hover:from-indigo-100/60 hover:to-purple-100/60 dark:hover:from-indigo-800/20 dark:hover:to-purple-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-indigo-500/10 border border-indigo-200/30 dark:border-indigo-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-indigo-500/70 to-purple-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">dashboard</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-indigo-600 dark:group-hover/item:text-indigo-400 transition-colors duration-300">
                                            Dashboard
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Panel de creador</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-indigo-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mi Perfil -->
                                <a href="{{ route('profile.show') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-cyan-50/40 to-blue-50/40 dark:from-cyan-900/10 dark:to-blue-900/10 hover:from-cyan-100/60 hover:to-blue-100/60 dark:hover:from-cyan-800/20 dark:hover:to-blue-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-cyan-500/10 border border-cyan-200/30 dark:border-cyan-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-cyan-500/70 to-blue-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">person</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-cyan-600 dark:group-hover/item:text-cyan-400 transition-colors duration-300">
                                            Mi Perfil
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Información personal</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-cyan-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mis Cursos -->
                                <a href="{{ route('creador.cursos.index') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-green-50/40 to-emerald-50/40 dark:from-green-900/10 dark:to-emerald-900/10 hover:from-green-100/60 hover:to-emerald-100/60 dark:hover:from-green-800/20 dark:hover:to-emerald-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/10 border border-green-200/30 dark:border-green-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-green-500/70 to-emerald-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">school</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                            Mis Cursos
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Gestionar mis cursos</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mis Artículos -->
                                <a href="{{ route('creador.articulos.index') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-blue-50/40 to-indigo-50/40 dark:from-blue-900/10 dark:to-indigo-900/10 hover:from-blue-100/60 hover:to-indigo-100/60 dark:hover:from-blue-800/20 dark:hover:to-indigo-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/10 border border-blue-200/30 dark:border-blue-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-blue-500/70 to-indigo-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">article</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                            Mis Artículos
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Gestionar mis artículos</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>
                            @else
                                <!-- Mostrar todas las opciones cuando estamos en home (creador) -->
                                <!-- Dashboard -->
                                <a href="{{ route('creador.dashboard') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-indigo-50/40 to-purple-50/40 dark:from-indigo-900/10 dark:to-purple-900/10 hover:from-indigo-100/60 hover:to-purple-100/60 dark:hover:from-indigo-800/20 dark:hover:to-purple-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-indigo-500/10 border border-indigo-200/30 dark:border-indigo-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-indigo-500/70 to-purple-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">dashboard</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-indigo-600 dark:group-hover/item:text-indigo-400 transition-colors duration-300">
                                            Dashboard
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Panel de creador</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-indigo-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mi Perfil -->
                                <a href="{{ route('profile.show') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-cyan-50/40 to-blue-50/40 dark:from-cyan-900/10 dark:to-blue-900/10 hover:from-cyan-100/60 hover:to-blue-100/60 dark:hover:from-cyan-800/20 dark:hover:to-blue-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-cyan-500/10 border border-cyan-200/30 dark:border-cyan-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-cyan-500/70 to-blue-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">person</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-cyan-600 dark:group-hover/item:text-cyan-400 transition-colors duration-300">
                                            Mi Perfil
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Información personal</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-cyan-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mis Cursos -->
                                <a href="{{ route('creador.cursos.index') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-green-50/40 to-emerald-50/40 dark:from-green-900/10 dark:to-emerald-900/10 hover:from-green-100/60 hover:to-emerald-100/60 dark:hover:from-green-800/20 dark:hover:to-emerald-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/10 border border-green-200/30 dark:border-green-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-green-500/70 to-emerald-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">school</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                            Mis Cursos
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Gestionar mis cursos</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>

                                <!-- Mis Artículos -->
                                <a href="{{ route('creador.articulos.index') }}"
                                    class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-blue-50/40 to-indigo-50/40 dark:from-blue-900/10 dark:to-indigo-900/10 hover:from-blue-100/60 hover:to-indigo-100/60 dark:hover:from-blue-800/20 dark:hover:to-indigo-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/10 border border-blue-200/30 dark:border-blue-700/20 backdrop-blur-sm">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-blue-500/70 to-indigo-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <span class="material-icons text-white/90 text-sm">article</span>
                                    </div>
                                    <div class="flex-1">
                                        <div
                                            class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                            Mis Artículos
                                        </div>
                                        <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Gestionar mis artículos</div>
                                    </div>
                                    <span
                                        class="material-icons text-slate-400/60 text-xs group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                                </a>
                            @endif
                        @else
                            <!-- Menú simplificado para estudiantes - Solo Mis Cursos y Blog -->
                            <!-- Mis Cursos -->
                            <a href="{{ route('usuario.cursos.catalogo') }}"
                                class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-green-50/40 to-emerald-50/40 dark:from-green-900/10 dark:to-emerald-900/10 hover:from-green-100/60 hover:to-emerald-100/60 dark:hover:from-green-800/20 dark:hover:to-emerald-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-green-500/10 border border-green-200/30 dark:border-green-700/20 backdrop-blur-sm">
                                <div
                                    class="w-8 h-8 bg-gradient-to-br from-green-500/70 to-emerald-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                    <span class="material-icons text-white/90 text-sm">school</span>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-green-600 dark:group-hover/item:text-green-400 transition-colors duration-300">
                                        Mis Cursos
                                    </div>
                                    <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Aprende y crece</div>
                                </div>
                                <span
                                    class="material-icons text-slate-400/60 text-xs group-hover/item:text-green-500 transition-colors duration-300">arrow_forward_ios</span>
                            </a>

                            <!-- Blog -->
                            <a href="{{ route('articulos.catalogo') }}"
                                class="group/item flex items-center p-2 rounded-lg bg-gradient-to-r from-blue-50/40 to-indigo-50/40 dark:from-blue-900/10 dark:to-indigo-900/10 hover:from-blue-100/60 hover:to-indigo-100/60 dark:hover:from-blue-800/20 dark:hover:to-indigo-800/20 transition-all duration-300 hover:scale-105 hover:shadow-md hover:shadow-blue-500/10 border border-blue-200/30 dark:border-blue-700/20 backdrop-blur-sm">
                                <div
                                    class="w-8 h-8 bg-gradient-to-br from-blue-500/70 to-indigo-600/70 rounded-lg flex items-center justify-center mr-2 group-hover/item:scale-110 transition-transform duration-300">
                                    <span class="material-icons text-white/90 text-sm">article</span>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="text-xs font-semibold text-slate-800/90 dark:text-slate-200/90 group-hover/item:text-blue-600 dark:group-hover/item:text-blue-400 transition-colors duration-300">
                                        Blog
                                    </div>
                                    <div class="text-xs text-slate-500/70 dark:text-slate-400/70">Artículos y noticias</div>
                                </div>
                                <span
                                    class="material-icons text-slate-400/60 text-xs group-hover/item:text-blue-500 transition-colors duration-300">arrow_forward_ios</span>
                            </a>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div class="pt-2 border-t border-slate-200/30 dark:border-slate-700/30 text-center">
                        <p class="text-xs text-slate-500/70 dark:text-slate-400/70">
                            💡 Navegación organizada por niveles
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

    @guest
    <!-- Desktop WhatsApp Button (guests only) -->
    <div class="hidden md:block fixed bottom-4 right-4 z-[60]">
        <a href="https://wa.me/5215522614633" target="_blank" aria-label="WhatsApp"
            class="group relative w-12 h-12 bg-gradient-to-br from-green-500/80 via-emerald-500/80 to-green-600/80 backdrop-blur-sm rounded-full shadow-lg hover:shadow-green-500/25 transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-green-500/30 flex items-center justify-center">
            <svg class="w-6 h-6 text-white transition-transform duration-300 group-hover:rotate-12" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
            </svg>
            <span class="sr-only">Contactar por WhatsApp</span>
        </a>
    </div>
    @endguest

    <!-- Footer -->
    <footer
        class="bg-gray-200 dark:bg-slate-950 text-gray-800 dark:text-white border-t border-gray-300 dark:border-blue-500/20 relative z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2 text-center md:text-left">
                    <div class="flex items-center mb-4 justify-center md:justify-start">
                        <img src="{{ asset('images/logos/SoftLinkIA.ico') }}" alt="SoftLinkIA" class="w-8 h-8 mr-2">
                        <span class="text-xl font-bold text-gradient">SoftLinkIA</span>
                    </div>
                    <p class="text-slate-400 mb-4 max-w-md text-center md:text-left mx-auto md:mx-0">
                        Líder en soluciones de software, inteligencia artificial y transformación digital. Transformamos
                        ideas en realidades digitales
                        <span class="inline sm:hidden">con 5 años de experiencia</span>
                        <span class="hidden sm:inline">con más de 5 años de experiencia</span>
                        en desarrollo frontend y optimización multiplataforma.
                    </p>
                    <div class="flex space-x-4 justify-center md:justify-start">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/share/16pwSCfawU/" target="_blank"
                            class="group transition-all transform hover:scale-110 duration-500">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-blue-600 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-white">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/softlinkia/"
                            class="group transition-all transform hover:scale-110 duration-500">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-pink-500 via-purple-600 to-orange-500 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-8 h-8 bg-gradient-to-br from-pink-500 via-purple-600 to-orange-500 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-white">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@softlinkia"
                            class="group transition-all transform hover:scale-110 duration-500">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-gray-800 to-black rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-8 h-8 bg-gradient-to-br from-gray-800 to-black rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-white">
                                        <path
                                            d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/company/106776373/admin/dashboard/"
                            class="group transition-all transform hover:scale-110 duration-500">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-blue-600 to-blue-700 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-white">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/5215522614633" target="_blank"
                            class="group transition-all transform hover:scale-110 duration-500">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-green-600 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-white">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.89 3.488" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-4 text-white text-center md:text-left">Enlaces Rápidos</h3>
                    <div aria-label="Enlaces rápidos" class="space-y-2 text-slate-300 text-center md:text-left">
                        <div>
                            <a href="{{ route('home') }}" class="hover:text-blue-300">Inicio</a>
                        </div>
                        <div>
                            <a href="{{ route('sobre-nosotros') }}" class="hover:text-blue-300">Sobre Nosotros</a>
                        </div>
                        <div>
                            <a href="{{ route('servicios.consultoria-ti') }}" class="hover:text-blue-300">Servicios</a>
                        </div>
                        <div>
                            <a href="{{ route('contacto') }}" class="hover:text-blue-300">Contacto</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-4 text-white text-center md:text-left">Contacto</h3>
                    <div class="space-y-2 text-slate-400">
                        <div class="flex items-start justify-center md:justify-start">
                            <span class="material-icons text-sm mr-2 text-cyan-400 mt-0.5">location_on</span>
                            <span>02 de Marzo, número 807, colonia centro, Texcoco, Estado de México, México, C.P.
                                56100</span>
                        </div>
                        <div class="flex items-center justify-center md:justify-start">
                            <span class="material-icons text-sm mr-2 text-cyan-400">phone</span>
                            <span>+52 55 2261 4633</span>
                        </div>
                        <div class="flex items-center justify-center md:justify-start">
                            <span class="material-icons text-sm mr-2 text-cyan-400">email</span>
                            <span>contact@softlinkia.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-8 pt-8 text-slate-400">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <!-- Copyright - Izquierda -->
                    <div class="text-center md:text-left">
                        <p>&copy; SoftLinkIA Software, AI and Digital Solutions | {{ date('Y') }} | Todos los derechos
                            reservados</p>
                    </div>

                    <!-- Políticas - Derecha -->
                    <div class="flex flex-wrap items-center justify-center md:justify-end space-x-1 text-sm">
                        <a href="{{ route('politica-privacidad') }}"
                            class="text-slate-400 hover:text-cyan-400 transition-colors duration-300">Política de
                            Privacidad</a>
                        <span class="text-slate-600">·</span>
                        <a href="{{ route('terminos-servicio') }}"
                            class="text-slate-400 hover:text-cyan-400 transition-colors duration-300">Términos de
                            Servicio</a>
                        <span class="text-slate-600">·</span>
                        <a href="{{ route('politica-cookies') }}"
                            class="text-slate-400 hover:text-cyan-400 transition-colors duration-300">Política de
                            Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function () {
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu) {
                    mobileMenu.classList.toggle('hidden');
                }
            });
        }

        // Close mobile menu when clicking outside the panel area
        document.addEventListener('click', function (e) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuButton = document.getElementById('mobile-menu-button');
            if (!mobileMenu || mobileMenu.classList.contains('hidden')) return;
            if (!mobileMenu.contains(e.target) && (!menuButton || !menuButton.contains(e.target))) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Collapsibles for mobile menu
        const servicesToggle = document.getElementById('mobile-services-toggle');
        const servicesContent = document.getElementById('mobile-services-content');
        const servicesChevron = document.getElementById('mobile-services-chevron');
        if (servicesToggle && servicesContent && servicesChevron) {
            servicesToggle.addEventListener('click', function () {
                servicesContent.classList.toggle('hidden');
                servicesChevron.style.transform = servicesContent.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
            });
        }

        const solutionsToggle = document.getElementById('mobile-solutions-toggle');
        const solutionsContent = document.getElementById('mobile-solutions-content');
        const solutionsChevron = document.getElementById('mobile-solutions-chevron');
        if (solutionsToggle && solutionsContent && solutionsChevron) {
            solutionsToggle.addEventListener('click', function () {
                solutionsContent.classList.toggle('hidden');
                solutionsChevron.style.transform = solutionsContent.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
            });
        }

        // Navbar scroll effect deshabilitado (navbar no anclado)
        // window.addEventListener('scroll', function () {
        //     const navbar = document.getElementById('navbar');
        //     if (window.scrollY > 50) {
        //         navbar.classList.add('navbar-scrolled');
        //     } else {
        //         navbar.classList.remove('navbar-scrolled');
        //     }
        // });

        // Función para alternar el tema oscuro/claro
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            const themeIcon = document.getElementById('theme-icon');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            // pequeña animación del ícono
            [themeIcon, themeIconMobile].forEach(el => {
                if (!el) return;
                el.style.transition = 'transform 300ms ease, color 300ms ease';
                el.style.transform = 'rotate(180deg) scale(1.2)';
                setTimeout(() => el.style.transform = 'rotate(0deg) scale(1)', 300);
            });

            if (isDark) {
                html.classList.remove('dark');
                themeIcon.textContent = 'light_mode';
                themeIconMobile.textContent = 'light_mode';
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                themeIcon.textContent = 'dark_mode';
                themeIconMobile.textContent = 'dark_mode';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Inicializar el tema según la preferencia guardada
        function initTheme() {
            const savedTheme = localStorage.getItem('theme');
            const themeIcon = document.getElementById('theme-icon');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            const html = document.documentElement;

            if (savedTheme === 'light') {
                html.classList.remove('dark');
                themeIcon.textContent = 'light_mode';
                themeIconMobile.textContent = 'light_mode';
            } else {
                html.classList.add('dark');
                themeIcon.textContent = 'dark_mode';
                themeIconMobile.textContent = 'dark_mode';
            }
        }

        // Agregar event listeners para los botones de cambio de tema
        document.getElementById('theme-toggle').addEventListener('click', toggleDarkMode);
        document.getElementById('theme-toggle-mobile').addEventListener('click', toggleDarkMode);

        // Inicializar el tema al cargar la página
        document.addEventListener('DOMContentLoaded', initTheme);

        // Ensure mega menus open on click as well (for pages with overlays)
        function clickToggle(triggerId, panelId) {
            const trigger = document.getElementById(triggerId);
            const panel = document.getElementById(panelId);
            if (!trigger || !panel) return;

            let open = false;
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                open = !open;
                panel.classList.toggle('invisible', !open);
                panel.classList.toggle('opacity-0', !open);
                panel.classList.toggle('visible', open);
                panel.classList.toggle('opacity-100', open);
            });

            document.addEventListener('click', function (e) {
                if (!open) return;
                if (!panel.contains(e.target) && !trigger.contains(e.target)) {
                    open = false;
                    panel.classList.add('invisible', 'opacity-0');
                    panel.classList.remove('visible', 'opacity-100');
                }
            });
        }

        clickToggle('services-trigger', 'services-panel');
        clickToggle('solutions-trigger', 'solutions-panel');
        @if(!request()->routeIs('articulos.catalogo') && !request()->routeIs('cursos.catalogo'))
        clickToggle('main-menu-trigger', 'main-menu-panel');
        clickToggle('profile-menu-trigger', 'profile-menu-panel');

        // Expandable menu functionality for desktop
        const expandMenuTrigger = document.getElementById('expand-menu-trigger');
        const expandMenuContent = document.getElementById('expand-menu-content');
        const expandMenuArrow = document.getElementById('expand-menu-arrow');

        if (expandMenuTrigger && expandMenuContent && expandMenuArrow) {
            let isExpanded = false;

            expandMenuTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                isExpanded = !isExpanded;

                if (isExpanded) {
                    expandMenuContent.classList.remove('hidden');
                    expandMenuArrow.style.transform = 'rotate(180deg)';
                } else {
                    expandMenuContent.classList.add('hidden');
                    expandMenuArrow.style.transform = 'rotate(0deg)';
                }
            });
        }

        // Expandable menu functionality for mobile
        const mobileExpandMenuTrigger = document.getElementById('mobile-expand-menu-trigger');
        const mobileExpandMenuContent = document.getElementById('mobile-expand-menu-content');
        const mobileExpandMenuArrow = document.getElementById('mobile-expand-menu-arrow');

        if (mobileExpandMenuTrigger && mobileExpandMenuContent && mobileExpandMenuArrow) {
            let isMobileExpanded = false;

            mobileExpandMenuTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                isMobileExpanded = !isMobileExpanded;

                if (isMobileExpanded) {
                    mobileExpandMenuContent.classList.remove('hidden');
                    mobileExpandMenuArrow.style.transform = 'rotate(180deg)';
                } else {
                    mobileExpandMenuContent.classList.add('hidden');
                    mobileExpandMenuArrow.style.transform = 'rotate(0deg)';
                }
            });
        }

        // Floating Authentication Button functionality
        const authFabMain = document.getElementById('auth-fab-main');
        const authFabMenu = document.getElementById('auth-fab-menu');
        const authFabIcon = document.getElementById('auth-fab-icon');

        if (authFabMain && authFabMenu && authFabIcon) {
            let isAuthFabOpen = false;

            // Toggle Auth FAB menu
            authFabMain.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                isAuthFabOpen = !isAuthFabOpen;

                if (isAuthFabOpen) {
                    // Open menu
                    authFabMenu.classList.remove('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    authFabMenu.classList.add('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    authFabIcon.style.transform = 'scale(1.2)';
                    authFabMain.classList.add('shadow-green-500/50');
                } else {
                    // Close menu
                    authFabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    authFabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    authFabIcon.style.transform = 'scale(1)';
                    authFabMain.classList.remove('shadow-green-500/50');
                }
            });

            // Close Auth FAB menu when clicking outside
            document.addEventListener('click', function (e) {
                if (isAuthFabOpen && !authFabMain.contains(e.target) && !authFabMenu.contains(e.target)) {
                    isAuthFabOpen = false;
                    authFabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    authFabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    authFabIcon.style.transform = 'scale(1)';
                    authFabMain.classList.remove('shadow-green-500/50');
                }
            });

            // Close Auth FAB menu on escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && isAuthFabOpen) {
                    isAuthFabOpen = false;
                    authFabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    authFabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    authFabIcon.style.transform = 'scale(1)';
                    authFabMain.classList.remove('shadow-green-500/50');
                }
            });
        }

        @endif

        // Floating Action Button functionality
        const fabMain = document.getElementById('fab-main');
        const fabMenu = document.getElementById('fab-menu');
        const fabIcon = document.getElementById('fab-icon');

        if (fabMain && fabMenu && fabIcon) {
            let isFabOpen = false;

            // Toggle FAB menu
            fabMain.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                isFabOpen = !isFabOpen;

                if (isFabOpen) {
                    // Open menu
                    fabMenu.classList.remove('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    fabMenu.classList.add('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    fabIcon.style.transform = 'rotate(45deg)';
                    fabMain.classList.add('shadow-cyan-500/50');
                } else {
                    // Close menu
                    fabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    fabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    fabIcon.style.transform = 'rotate(0deg)';
                    fabMain.classList.remove('shadow-cyan-500/50');
                }
            });

            // Close FAB menu when clicking outside
            document.addEventListener('click', function (e) {
                if (isFabOpen && !fabMain.contains(e.target) && !fabMenu.contains(e.target)) {
                    isFabOpen = false;
                    fabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    fabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    fabIcon.style.transform = 'rotate(0deg)';
                    fabMain.classList.remove('shadow-cyan-500/50');
                }
            });

            // Close FAB menu on escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && isFabOpen) {
                    isFabOpen = false;
                    fabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                    fabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                    fabIcon.style.transform = 'rotate(0deg)';
                    fabMain.classList.remove('shadow-cyan-500/50');
                }
            });

            // Add smooth scroll behavior for FAB links
            const fabLinks = fabMenu.querySelectorAll('a[href^="#"]');
            fabLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        e.preventDefault();
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Close FAB menu after navigation
                        isFabOpen = false;
                        fabMenu.classList.remove('opacity-100', 'visible', 'scale-100', 'translate-y-0');
                        fabMenu.classList.add('opacity-0', 'invisible', 'scale-95', 'translate-y-4');
                        fabIcon.style.transform = 'rotate(0deg)';
                        fabMain.classList.remove('shadow-cyan-500/50');
                    }
                });
            });
        }

        // FAB Collapsible Sections functionality
        const fabServicesTrigger = document.getElementById('fab-services-trigger');
        const fabServicesContent = document.getElementById('fab-services-content');
        const fabServicesArrow = document.getElementById('fab-services-arrow');

        if (fabServicesTrigger && fabServicesContent && fabServicesArrow) {
            let isServicesExpanded = false;

            fabServicesTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                isServicesExpanded = !isServicesExpanded;

                if (isServicesExpanded) {
                    fabServicesContent.classList.remove('hidden');
                    fabServicesArrow.style.transform = 'rotate(180deg)';
                } else {
                    fabServicesContent.classList.add('hidden');
                    fabServicesArrow.style.transform = 'rotate(0deg)';
                }
            });
        }

        const fabSolutionsTrigger = document.getElementById('fab-solutions-trigger');
        const fabSolutionsContent = document.getElementById('fab-solutions-content');
        const fabSolutionsArrow = document.getElementById('fab-solutions-arrow');

        if (fabSolutionsTrigger && fabSolutionsContent && fabSolutionsArrow) {
            let isSolutionsExpanded = false;

            fabSolutionsTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                isSolutionsExpanded = !isSolutionsExpanded;

                if (isSolutionsExpanded) {
                    fabSolutionsContent.classList.remove('hidden');
                    fabSolutionsArrow.style.transform = 'rotate(180deg)';
                } else {
                    fabSolutionsContent.classList.add('hidden');
                    fabSolutionsArrow.style.transform = 'rotate(0deg)';
                }
            });
        }
    </script>

    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Summernote Lite JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')
    @stack('scripts')

    <script>
        // Student Sidebar functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('studentSidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const navbarToggleBtn = document.getElementById('navbar-sidebar-toggle');

            if (sidebar && (toggleBtn || navbarToggleBtn)) {
                let isOpen = false;

                // Load sidebar state from localStorage
                const savedState = localStorage.getItem('studentSidebarOpen');
                if (savedState === 'true') {
                    sidebar.classList.add('open');
                    isOpen = true;
                }

                // Function to toggle sidebar
                function toggleSidebar() {
                    isOpen = !isOpen;

                    if (isOpen) {
                        sidebar.classList.add('open');
                    } else {
                        sidebar.classList.remove('open');
                    }

                    // Save state to localStorage
                    localStorage.setItem('studentSidebarOpen', isOpen.toString());
                }

                // Toggle sidebar from sidebar button
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        toggleSidebar();
                    });
                }

                // Toggle sidebar from navbar button
                if (navbarToggleBtn) {
                    navbarToggleBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        toggleSidebar();
                    });
                }

                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768 && isOpen) {
                        if (!sidebar.contains(e.target) &&
                            !toggleBtn?.contains(e.target) &&
                            !navbarToggleBtn?.contains(e.target)) {
                            sidebar.classList.remove('open');
                            isOpen = false;
                            localStorage.setItem('studentSidebarOpen', 'false');
                        }
                    }
                });

                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        // On desktop, restore saved state
                        const savedState = localStorage.getItem('studentSidebarOpen');
                        if (savedState === 'true') {
                            sidebar.classList.add('open');
                            isOpen = true;
                        }
                    } else {
                        // On mobile, close sidebar
                        sidebar.classList.remove('open');
                        isOpen = false;
                    }
                });
            }
        });

        // Debug script para el botón de pago del dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownPaymentForm = document.getElementById('dropdown-payment-form');
            const dropdownPaymentButton = document.getElementById('dropdown-payment-button');

            if (dropdownPaymentForm && dropdownPaymentButton) {
                console.log('✅ Formulario de pago del dropdown encontrado');

                dropdownPaymentButton.addEventListener('click', function(e) {
                    console.log('🔄 Botón de pago del dropdown clickeado');

                    // Mostrar loading
                    dropdownPaymentButton.innerHTML = '<span class="material-icons text-sm animate-spin">refresh</span> Procesando...';
                    dropdownPaymentButton.disabled = true;
                });

            } else {
                console.log('❌ Formulario de pago del dropdown no encontrado');
            }
        });
    </script>
</body>

</html>
