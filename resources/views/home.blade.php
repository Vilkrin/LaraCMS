<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vilkrin — Gamer & Streamer</title>

    <meta name="description" content="Vilkrin — Gamer & Streamer. A new website is coming soon.">
    <meta name="robots" content="noindex, nofollow">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html,
        body {
            min-height: 100%;
        }

        body {
            background: #050507;
        }

        .grid-background {
            background-image:
                linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: linear-gradient(to bottom, black 0%, transparent 90%);
            -webkit-mask-image: linear-gradient(to bottom, black 0%, transparent 90%);
        }

        .glow {
            animation: pulse-glow 5s ease-in-out infinite;
        }

        .orb {
            animation: float 8s ease-in-out infinite;
        }

        .orb-delay {
            animation-delay: -3s;
        }

        .scanline {
            animation: scan 8s linear infinite;
        }

        @keyframes pulse-glow {
            0%, 100% {
                opacity: .35;
                transform: scale(1);
            }

            50% {
                opacity: .6;
                transform: scale(1.08);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(0, -20px, 0);
            }
        }

        @keyframes scan {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100vh);
            }
        }

        .noise {
            opacity: .035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='.8'/%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="relative min-h-screen overflow-hidden bg-[#050507] text-white antialiased">

    {{-- Background --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">

        {{-- Ambient glows --}}
        <div class="glow absolute -left-40 -top-40 h-[32rem] w-[32rem] rounded-full bg-violet-600/20 blur-[140px]"></div>

        <div class="glow absolute -bottom-48 -right-40 h-[36rem] w-[36rem] rounded-full bg-fuchsia-600/10 blur-[160px]"
             style="animation-delay: -2s;"></div>

        <div class="orb absolute left-[15%] top-[20%] h-2 w-2 rounded-full bg-violet-400/70 shadow-[0_0_20px_5px_rgba(167,139,250,.25)]"></div>

        <div class="orb orb-delay absolute right-[20%] top-[30%] h-1.5 w-1.5 rounded-full bg-fuchsia-400/70 shadow-[0_0_20px_5px_rgba(232,121,249,.2)]"></div>

        <div class="orb absolute bottom-[25%] left-[25%] h-1 w-1 rounded-full bg-white/50"></div>

        {{-- Grid --}}
        <div class="grid-background absolute inset-0"></div>

        {{-- Subtle scanline --}}
        <div class="scanline absolute left-0 right-0 h-px bg-gradient-to-r from-transparent via-violet-400/20 to-transparent"></div>

        {{-- Noise --}}
        <div class="noise absolute inset-0"></div>

        {{-- Vignette --}}
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(5,5,7,.45)_65%,rgba(5,5,7,.95)_100%)]"></div>
    </div>


    {{-- Main content --}}
    <main class="relative z-10 flex min-h-screen flex-col">

        {{-- Header --}}
        <header class="flex items-center justify-between px-6 py-6 sm:px-10 lg:px-16">

            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg border border-white/10 bg-white/[0.04]">
                    <span class="text-sm font-black tracking-tight text-violet-300">
                        V
                    </span>
                </div>

                <span class="text-sm font-semibold tracking-[0.25em] text-white/80 uppercase">
                    Vilkrin
                </span>
            </div>

            <div class="flex items-center gap-2">
                <span class="h-2 w-2 animate-pulse rounded-full bg-violet-400"></span>
                <span class="text-xs font-medium tracking-widest text-white/40 uppercase">
                    Coming Soon
                </span>
            </div>

        </header>


        {{-- Hero --}}
        <section class="flex flex-1 items-center justify-center px-6 py-16 sm:px-10">

            <div class="w-full max-w-4xl text-center">

                {{-- Eyebrow --}}
                <div class="mb-8 inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/[0.03] px-4 py-2 backdrop-blur-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-violet-400 opacity-60"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-violet-400"></span>
                    </span>

                    <span class="text-xs font-medium tracking-[0.2em] text-white/50 uppercase">
                        Website launching soon
                    </span>
                </div>


                {{-- Brand --}}
                <h1 class="text-6xl font-black tracking-[-0.06em] text-white sm:text-7xl md:text-8xl lg:text-9xl">
                    Vilkrin
                </h1>


                {{-- Accent line --}}
                <div class="mx-auto mt-6 h-px w-24 bg-gradient-to-r from-transparent via-violet-400 to-transparent"></div>


                {{-- Descriptor --}}
                <h2 class="mt-6 text-xl font-medium tracking-[0.3em] text-violet-200/80 uppercase sm:text-2xl">
                    Gamer &amp; Streamer
                </h2>


                {{-- Description --}}
                <p class="mx-auto mt-8 max-w-xl text-sm leading-7 text-white/45 sm:text-base">
                    The new Vilkrin website is currently being built.
                    Gaming, streaming, content and more — all in one place.
                </p>


                {{-- Status --}}
                <div class="mx-auto mt-12 flex max-w-sm items-center justify-center gap-4">

                    <div class="h-px flex-1 bg-gradient-to-r from-transparent to-white/10"></div>

                    <span class="text-[10px] font-semibold tracking-[0.3em] text-white/25 uppercase">
                        Stay tuned
                    </span>

                    <div class="h-px flex-1 bg-gradient-to-l from-transparent to-white/10"></div>

                </div>

            </div>

        </section>


        {{-- Footer --}}
        <footer class="px-6 py-6 sm:px-10 lg:px-16">

            <div class="flex flex-col items-center justify-between gap-3 border-t border-white/5 pt-6 text-xs text-white/25 sm:flex-row">

                <p>
                    &copy; <span id="current-year"></span> Vilkrin. All rights reserved.
                </p>

                <p class="tracking-wider">
                    GAMER <span class="mx-2 text-violet-400/40">•</span> STREAMER
                </p>

            </div>

        </footer>

    </main>


    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>

</body>
</html>