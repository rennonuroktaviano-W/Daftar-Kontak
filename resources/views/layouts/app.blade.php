<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager App</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                },
                colors: {
                    brand: {
                        50: '#eff4ff',
                        100: '#dbe6fe',
                        500: '#3b6bf0',
                        600: '#2563EB',
                        700: '#1d4ed8',
                    },
                },
                boxShadow: {
                    soft: '0 1px 2px 0 rgba(15, 23, 42, 0.04), 0 8px 24px -8px rgba(15, 23, 42, 0.08)',
                    card: '0 1px 3px 0 rgba(15, 23, 42, 0.06), 0 1px 2px -1px rgba(15, 23, 42, 0.06)',
                },
            },
        },
    }
    </script>

    <style>
    body {
        font-feature-settings: 'cv11', 'ss01';
    }

    ::selection {
        background-color: #dbe6fe;
        color: #1d4ed8;
    }

    @keyframes fadeSlideDown {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeSlideDown 0.35s ease-out;
    }
    </style>
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">

    <!-- Navbar -->
    <nav class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/80 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3.5 flex justify-between items-center">
            <a href="{{ route('contacts.index') }}" class="flex items-center gap-2.5 group">
                <span
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-600 text-white shadow-soft transition-transform duration-200 group-hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </span>
                <span class="text-[15px] font-bold tracking-tight text-slate-900">
                    Contact<span class="text-brand-600">Hub</span>
                </span>
            </a>

            <div class="hidden sm:flex items-center gap-2 text-xs font-medium text-slate-400">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                Sistem Manajemen Kontak
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
        {{-- Flash Message Success --}}
        @if (session('success'))
        <div
            class="animate-fade-in mb-6 flex items-center justify-between gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5 text-emerald-800 shadow-sm">
            <div class="flex items-center gap-3">
                <span
                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                </span>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()"
                class="shrink-0 rounded-md p-1 text-emerald-500 transition hover:bg-emerald-100 hover:text-emerald-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200/70 mt-12">
        <div
            class="max-w-6xl mx-auto px-4 sm:px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-slate-400">
            <span>&copy; {{ date('Y') }} ContactHub &mdash; Sistem Manajemen Daftar Kontak.</span>
            <span>Dibuat untuk Praktik Kerja Lapangan (PKL).</span>
        </div>
    </footer>

</body>

</html>