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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

        /* Custom animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        /* Gradient text animation */
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .gradient-text-animated {
            background: linear-gradient(-45deg, #3b82f6, #06b6d4, #8b5cf6, #3b82f6);
            background-size: 400% 400%;
            animation: gradient-shift 3s ease infinite;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Mobile optimizations */
        @media (max-width: 640px) {
            .min-h-screen {
                min-height: 100vh;
                padding: 1rem 0;
            }
            
            /* Ensure text is readable on small screens */
            .text-6xl {
                font-size: 4rem;
                line-height: 1;
            }
            
            /* Better touch targets for mobile */
            button, a {
                min-height: 44px;
                min-width: 44px;
            }
            
            /* Optimize spacing for mobile */
            .mb-6 {
                margin-bottom: 1.5rem;
            }
            
            .mb-8 {
                margin-bottom: 2rem;
            }
            
            /* Better button layout on mobile */
            .flex-col {
                gap: 0.75rem;
            }
        }

        /* Tablet optimizations */
        @media (min-width: 641px) and (max-width: 1024px) {
            .text-8xl {
                font-size: 6rem;
                line-height: 1;
            }
        }
    </style>

    @yield('styles')
</head>

<body class="bg-gray-100 text-gray-900 dark:bg-slate-900 dark:text-white transition-colors duration-300">
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    @yield('scripts')
</body>

</html>
