
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LaraCMS — Coming Soon</title>

    <meta
        name="description"
        content="LaraCMS is a modern Laravel-powered content management system. Coming soon."
    >

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: {
                            850: '#172033',
                            950: '#0b1120',
                        },
                        amber: {
                            450: '#fbbf24',
                        }
                    },
                    boxShadow: {
                        glow: '0 0 40px rgba(251, 191, 36, 0.12)',
                        'glow-lg': '0 0 80px rgba(251, 191, 36, 0.10)',
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-slate-950 text-white antialiased">

    <!-- Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <!-- Main glow -->
        <div
            class="absolute left-1/2 top-1/3 h-[500px] w-[500px] -translate-x-1/2 rounded-full bg-amber-400/5 blur-[120px]"
        ></div>

        <!-- Secondary glow -->
        <div
            class="absolute -bottom-40 -right-40 h-[450px] w-[450px] rounded-full bg-amber-500/5 blur-[120px]"
        ></div>

        <!-- Grid -->
        <div
            class="absolute inset-0 opacity-[0.025]"
            style="
                background-image:
                    linear-gradient(rgba(255,255,255,0.5) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.5) 1px, transparent 1px);
                background-size: 50px 50px;
            "
        ></div>
    </div>


    <!-- Header -->
    <header class="border-b border-slate-800/70 bg-slate-950/70 backdrop-blur-xl">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8">

            <!-- Logo -->
            <div class="flex items-center gap-3">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-amber-400/20 bg-slate-900 shadow-glow"
                >
                    <svg
                        class="h-6 w-6 text-amber-400"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v18M5 7h14M7 7v10M17 7v10M4 17h6M14 17h6"
                        />
                    </svg>
                </div>

                <div>
                    <div class="text-lg font-bold tracking-tight">
                        Lara<span class="text-amber-400">CMS</span>
                    </div>

                    <div class="text-[10px] uppercase tracking-[0.25em] text-slate-500">
                        Laravel Content Management
                    </div>
                </div>

            </div>

            <!-- Status -->
            <div class="hidden items-center gap-2 sm:flex">
                <span class="relative flex h-2.5 w-2.5">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-40"
                    ></span>

                    <span
                        class="relative inline-flex h-2.5 w-2.5 rounded-full bg-amber-400"
                    ></span>
                </span>

                <span class="text-xs font-medium text-slate-400">
                    Currently in development
                </span>
            </div>

        </div>

    </header>


    <!-- Main -->
    <main class="relative flex min-h-[calc(100vh-81px)] items-center">

        <div class="mx-auto w-full max-w-5xl px-6 py-20 lg:px-8 lg:py-28">

            <div class="text-center">

                <!-- Badge -->
                <div
                    class="mb-8 inline-flex items-center gap-2 rounded-full border border-amber-400/20 bg-amber-400/5 px-4 py-2 text-sm text-amber-300"
                >
                    <svg
                        class="h-4 w-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6v6l4 2"
                        />
                        <circle cx="12" cy="12" r="9" />
                    </svg>

                    <span>Something new is being built</span>
                </div>


                <!-- Heading -->
                <h1
                    class="mx-auto max-w-4xl text-5xl font-black tracking-tight text-white sm:text-6xl lg:text-7xl"
                >
                    Lara<span class="text-amber-400">CMS</span>
                </h1>

                <p
                    class="mx-auto mt-5 max-w-2xl text-xl font-medium text-slate-300 sm:text-2xl"
                >
                    A modern content management system,
                    <span class="text-amber-400">built with Laravel.</span>
                </p>


                <!-- Description -->
                <p
                    class="mx-auto mt-6 max-w-2xl text-base leading-7 text-slate-400"
                >
                    LaraCMS is being built from the ground up to provide a
                    flexible, modern and developer-friendly CMS for Laravel.
                    The site isn't quite ready yet, but development is well underway.
                </p>


                <!-- Progress -->
                <div class="mx-auto mt-12 max-w-xl">

                    <div class="mb-3 flex items-center justify-between text-sm">
                        <span class="font-medium text-slate-300">
                            Development
                        </span>

                        <span class="font-semibold text-amber-400">
                            In Progress
                        </span>
                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-800">
                        <div
                            class="h-full w-[65%] rounded-full bg-amber-400 shadow-[0_0_18px_rgba(251,191,36,0.35)]"
                        ></div>
                    </div>

                </div>


                <!-- Feature cards -->
                <div
                    class="mx-auto mt-16 grid max-w-4xl gap-4 text-left sm:grid-cols-3"
                >

                    <!-- Card -->
                    <div
                        class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6 backdrop-blur-sm"
                    >
                        <div
                            class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-amber-400/10 text-amber-400"
                        >
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 7.5L12 12l7.5-4.5M12 12v9"
                                />
                            </svg>
                        </div>

                        <h2 class="font-semibold text-white">
                            Built for Laravel
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Designed from the ground up around the Laravel
                            ecosystem.
                        </p>
                    </div>


                    <!-- Card -->
                    <div
                        class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6 backdrop-blur-sm"
                    >
                        <div
                            class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-amber-400/10 text-amber-400"
                        >
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3v18M3 12h18"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5.5 5.5l13 13M18.5 5.5l-13 13"
                                />
                            </svg>
                        </div>

                        <h2 class="font-semibold text-white">
                            Flexible by Design
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            A flexible foundation for building and managing
                            modern websites.
                        </p>
                    </div>


                    <!-- Card -->
                    <div
                        class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6 backdrop-blur-sm"
                    >
                        <div
                            class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-amber-400/10 text-amber-400"
                        >
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 12l2 2 4-4"
                                />
                            </svg>
                        </div>

                        <h2 class="font-semibold text-white">
                            Made to Extend
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Designed with extensibility, themes and plugins
                            in mind.
                        </p>
                    </div>

                </div>


                <!-- Footer message -->
                <div class="mt-16">

                    <p class="text-sm text-slate-500">
                        LaraCMS is currently under active development.
                    </p>

                    <div class="mt-4 flex items-center justify-center gap-2 text-xs text-slate-600">
                        <span>Powered by</span>

                        <span class="font-semibold text-slate-500">
                            Laravel
                        </span>

                        <span>•</span>

                        <span>
                            LaraCMS
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </main>

</body>
</html>
