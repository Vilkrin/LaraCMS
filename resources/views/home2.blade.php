<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
               
        <!-- TinyMCE configuration and source script -->
        <x-head.tinymce-config/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @fluxAppearance
    </head>

<body>
  <!-- Header -->
  <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
      <!-- Logo -->
      <a href="index.html" class="text-tech-darkblue font-bold text-xl">
        <span class="font-fira-code">Tech</span>Portfolio
      </a>

      <!-- Centered Desktop Navigation -->
      <nav class="hidden md:flex items-center justify-center flex-1 mx-8">
        <div class="flex space-x-8">
          <a href="#home" class="text-tech-gray hover:text-tech-blue transition-colors">Home</a>
          <a href="#services" class="text-tech-gray hover:text-tech-blue transition-colors">Services</a>
          <a href="#projects" class="text-tech-gray hover:text-tech-blue transition-colors">Projects</a>
          <a href="#about" class="text-tech-gray hover:text-tech-blue transition-colors">About</a>
          <a href="#contact" class="text-tech-gray hover:text-tech-blue transition-colors">Contact</a>
        </div>
      </nav>

      <!-- Login/Register Buttons - Desktop -->
      <div class="hidden md:flex items-center space-x-3">
        <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2 gap-1">
          <i data-lucide="log-in" class="h-4 w-4"></i> Login
        </button>
        <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-tech-blue hover:bg-tech-darkblue text-white h-9 px-4 py-2 gap-1">
          <i data-lucide="user-plus" class="h-4 w-4"></i> Register
        </button>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button 
          id="mobile-menu-button"
          class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 w-10 p-0"
          aria-label="Toggle menu"
        >
          <i data-lucide="menu" class="h-6 w-6"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden absolute top-full left-0 right-0 bg-white shadow-lg p-4 hidden animate-slide-in">
      <nav class="flex flex-col space-y-4">
        <a href="#home" class="text-tech-gray hover:text-tech-blue transition-colors py-2 px-4 border-b">Home</a>
        <a href="#services" class="text-tech-gray hover:text-tech-blue transition-colors py-2 px-4 border-b">Services</a>
        <a href="#projects" class="text-tech-gray hover:text-tech-blue transition-colors py-2 px-4 border-b">Projects</a>
        <a href="#about" class="text-tech-gray hover:text-tech-blue transition-colors py-2 px-4 border-b">About</a>
        <a href="#contact" class="text-tech-gray hover:text-tech-blue transition-colors py-2 px-4 border-b">Contact</a>

        <!-- Login/Register Buttons - Mobile -->
        <div class="flex flex-col space-y-3 pt-2">
          <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full gap-1">
            <i data-lucide="log-in" class="h-4 w-4"></i> Login
          </button>
          <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-tech-blue hover:bg-tech-darkblue text-white h-10 px-4 py-2 w-full gap-1">
            <i data-lucide="user-plus" class="h-4 w-4"></i> Register
          </button>
        </div>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="home" class="min-h-screen pt-20 pb-10 flex items-center bg-gradient-to-b from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center justify-between gap-12">
        
        <!-- Left column - Text content -->
        <div class="md:w-1/2 space-y-6 animate-slide-in" style="animation-delay: 0.1s;">
          <div class="flex items-center space-x-3">
            <div class="h-1 w-10 bg-tech-teal"></div>
            <p class="text-tech-teal font-medium">IT PROFESSIONAL</p>
          </div>
          
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-tech-darkblue">
            IT Technician & <span class="text-tech-blue">Laravel Developer</span>
          </h1>
          
          <p class="text-lg text-tech-gray max-w-xl">
            Specialized in advanced IT support, network installation, and custom Laravel application development. Transforming technical challenges into innovative solutions.
          </p>
          
          <div class="flex flex-wrap gap-4 pt-4">
            <a href="#projects" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-tech-blue hover:bg-tech-darkblue text-white h-10 px-4 py-2">
              View My Work
              <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
            </a>
            <a href="#contact" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-tech-blue text-tech-blue hover:bg-tech-blue/10 h-10 px-4 py-2">
              Contact Me
            </a>
          </div>
        </div>
        
        <!-- Right column - Tech skills visualization -->
        <div class="md:w-1/2 flex justify-center">
          <div class="relative w-full max-w-md">
            <!-- Main profile card -->
            <div class="bg-white rounded-2xl shadow-xl p-6 animate-slide-in" style="animation-delay: 0.3s;">
              <div class="flex justify-center mb-6">
                <div class="w-32 h-32 bg-gradient-to-r from-tech-blue to-tech-teal rounded-full flex items-center justify-center">
                  <span class="text-4xl text-white font-bold">TP</span>
                </div>
              </div>
              <h2 class="text-xl font-bold text-center text-tech-darkblue mb-2">Your Name</h2>
              <p class="text-tech-gray text-center mb-6">10+ Years of Technical Experience</p>
              
              <div class="grid grid-cols-3 gap-4 text-center">
                <div class="flex flex-col items-center">
                  <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mb-2">
                    <i data-lucide="server" class="h-6 w-6 text-tech-blue"></i>
                  </div>
                  <span class="text-sm text-tech-gray">IT Support</span>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mb-2">
                    <i data-lucide="wifi" class="h-6 w-6 text-tech-blue"></i>
                  </div>
                  <span class="text-sm text-tech-gray">Networks</span>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mb-2">
                    <i data-lucide="code" class="h-6 w-6 text-tech-blue"></i>
                  </div>
                  <span class="text-sm text-tech-gray">Laravel Dev</span>
                </div>
              </div>
            </div>
            
            <!-- Decorative elements -->
            <div class="absolute -z-10 -top-5 -left-5 w-full h-full rounded-2xl border-2 border-dashed border-tech-teal"></div>
            <div class="absolute -z-10 -bottom-5 -right-5 w-full h-full rounded-2xl border-2 border-dashed border-tech-blue"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-tech-darkblue mb-4">
          Technical <span class="text-tech-blue">Services</span>
        </h2>
        <div class="w-20 h-1 bg-tech-teal mx-auto mb-6"></div>
        <p class="text-tech-gray max-w-2xl mx-auto">
          Comprehensive IT solutions tailored to meet your technical requirements. From hardware support to custom software development.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Service 1 -->
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 hover:shadow-lg transition-shadow animate-slide-in" style="animation-delay: 0.1s;">
          <div class="flex flex-col space-y-1.5 p-6 pb-2">
            <div class="w-12 h-12 rounded-md bg-blue-100 flex items-center justify-center mb-4">
              <i data-lucide="server" class="h-6 w-6 text-tech-blue"></i>
            </div>
            <h3 class="text-xl font-bold text-tech-darkblue">IT Technical Support</h3>
          </div>
          <div class="p-6 pt-0">
            <p class="text-tech-gray">Expert troubleshooting and maintenance for all your computer systems and hardware.</p>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 hover:shadow-lg transition-shadow animate-slide-in" style="animation-delay: 0.2s;">
          <div class="flex flex-col space-y-1.5 p-6 pb-2">
            <div class="w-12 h-12 rounded-md bg-blue-100 flex items-center justify-center mb-4">
              <i data-lucide="wifi" class="h-6 w-6 text-tech-blue"></i>
            </div>
            <h3 class="text-xl font-bold text-tech-darkblue">Network Installation</h3>
          </div>
          <div class="p-6 pt-0">
            <p class="text-tech-gray">Professional setup and configuration of secure, high-performance networks.</p>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 hover:shadow-lg transition-shadow animate-slide-in" style="animation-delay: 0.3s;">
          <div class="flex flex-col space-y-1.5 p-6 pb-2">
            <div class="w-12 h-12 rounded-md bg-blue-100 flex items-center justify-center mb-4">
              <i data-lucide="code" class="h-6 w-6 text-tech-blue"></i>
            </div>
            <h3 class="text-xl font-bold text-tech-darkblue">Laravel Development</h3>
          </div>
          <div class="p-6 pt-0">
            <p class="text-tech-gray">Custom web applications built with the powerful Laravel PHP framework.</p>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 hover:shadow-lg transition-shadow animate-slide-in" style="animation-delay: 0.4s;">
          <div class="flex flex-col space-y-1.5 p-6 pb-2">
            <div class="w-12 h-12 rounded-md bg-blue-100 flex items-center justify-center mb-4">
              <i data-lucide="shield" class="h-6 w-6 text-tech-blue"></i>
            </div>
            <h3 class="text-xl font-bold text-tech-darkblue">Cybersecurity Solutions</h3>
          </div>
          <div class="p-6 pt-0">
            <p class="text-tech-gray">Comprehensive security measures to protect your business data and systems.</p>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 hover:shadow-lg transition-shadow animate-slide-in" style="animation-delay: 0.5s;">
          <div class="flex flex-col space-y-1.5 p-6 pb-2">
            <div class="w-12 h-12 rounded-md bg-blue-100 flex items-center justify-center mb-4">
              <i data-lucide="database" class="h-6 w-6 text-tech-blue"></i>
            </div>
            <h3 class="text-xl font-bold text-tech-darkblue">Database Management</h3>
          </div>
          <div class="p-6 pt-0">
            <p class="text-tech-gray">Efficient design, optimization, and maintenance of database systems.</p>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 hover:shadow-lg transition-shadow animate-slide-in" style="animation-delay: 0.6s;">
          <div class="flex flex-col space-y-1.5 p-6 pb-2">
            <div class="w-12 h-12 rounded-md bg-blue-100 flex items-center justify-center mb-4">
              <i data-lucide="layout-grid" class="h-6 w-6 text-tech-blue"></i>
            </div>
            <h3 class="text-xl font-bold text-tech-darkblue">UI/UX Design</h3>
          </div>
          <div class="p-6 pt-0">
            <p class="text-tech-gray">User-centered design focusing on intuitive interfaces and engaging experiences.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-tech-darkblue mb-4">
          Recent <span class="text-tech-blue">Projects</span>
        </h2>
        <div class="w-20 h-1 bg-tech-teal mx-auto mb-6"></div>
        <p class="text-tech-gray max-w-2xl mx-auto">
          A selection of my recent technical projects across network installation, IT services, and web development.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Project 1 -->
        <div class="rounded-lg overflow-hidden border-none shadow-lg animate-slide-in" style="animation-delay: 0.1s;">
          <div class="relative h-48 bg-gray-200">
            <img 
              src="/placeholder.svg" 
              alt="Enterprise Network Setup" 
              class="w-full h-full object-cover"
            />
            <div class="absolute top-4 left-4 bg-tech-blue text-white text-xs font-semibold px-2 py-1 rounded">
              Network Installation
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-tech-darkblue mb-2">Enterprise Network Setup</h3>
            <p class="text-tech-gray mb-4">Complete network infrastructure design and implementation for a 200-employee office.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Network</span>
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Security</span>
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Infrastructure</span>
            </div>
          </div>
          <div class="border-t pt-4 p-6 flex justify-between">
            <a href="projects/network-setup.html" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-tech-blue text-tech-blue hover:bg-blue-50 h-9 px-4 py-2">
              <i data-lucide="external-link" class="h-4 w-4 mr-2"></i>
              View Details
            </a>
          </div>
        </div>

        <!-- Project 2 -->
        <div class="rounded-lg overflow-hidden border-none shadow-lg animate-slide-in" style="animation-delay: 0.2s;">
          <div class="relative h-48 bg-gray-200">
            <img 
              src="/placeholder.svg" 
              alt="Inventory Management System" 
              class="w-full h-full object-cover"
            />
            <div class="absolute top-4 left-4 bg-tech-blue text-white text-xs font-semibold px-2 py-1 rounded">
              Laravel Development
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-tech-darkblue mb-2">Inventory Management System</h3>
            <p class="text-tech-gray mb-4">Custom Laravel application with real-time inventory tracking and automated procurement.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Laravel</span>
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">MySQL</span>
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Vue.js</span>
            </div>
          </div>
          <div class="border-t pt-4 p-6 flex justify-between">
            <a href="projects/inventory-system.html" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-tech-blue text-tech-blue hover:bg-blue-50 h-9 px-4 py-2">
              <i data-lucide="external-link" class="h-4 w-4 mr-2"></i>
              View Details
            </a>
            <a href="#" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-tech-gray hover:text-tech-darkblue h-9 px-2 py-2">
              <i data-lucide="github" class="h-4 w-4 mr-2"></i>
              Code
            </a>
          </div>
        </div>

        <!-- Project 3 -->
        <div class="rounded-lg overflow-hidden border-none shadow-lg animate-slide-in" style="animation-delay: 0.3s;">
          <div class="relative h-48 bg-gray-200">
            <img 
              src="/placeholder.svg" 
              alt="Healthcare Data Migration" 
              class="w-full h-full object-cover"
            />
            <div class="absolute top-4 left-4 bg-tech-blue text-white text-xs font-semibold px-2 py-1 rounded">
              IT Services
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-tech-darkblue mb-2">Healthcare Data Migration</h3>
            <p class="text-tech-gray mb-4">Secure migration of sensitive patient data to a new cloud-based system with zero downtime.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Data Migration</span>
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Cloud</span>
              <span class="text-xs bg-blue-100 text-tech-blue px-2 py-1 rounded-full">Security</span>
            </div>
          </div>
          <div class="border-t pt-4 p-6 flex justify-between">
            <a href="projects/healthcare-migration.html" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-tech-blue text-tech-blue hover:bg-blue-50 h-9 px-4 py-2">
              <i data-lucide="external-link" class="h-4 w-4 mr-2"></i>
              View Details
            </a>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="projects.html" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-tech-blue hover:bg-tech-darkblue text-white h-10 px-4 py-2">
          View All Projects
        </a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center gap-12">
        <!-- Left column - Profile Image with decorative elements -->
        <div class="md:w-2/5 space-y-6 relative">
          <div class="relative w-full max-w-md mx-auto">
            <!-- Profile picture -->
            <div class="rounded-2xl overflow-hidden shadow-xl">
              <img 
                src="/placeholder.svg" 
                alt="IT Professional" 
                class="w-full h-80 object-cover"
              />
            </div>
            
            <!-- Experience highlight -->
            <div class="absolute -bottom-5 -right-5 bg-tech-blue text-white py-3 px-6 rounded-lg shadow-lg">
              <span class="text-3xl font-bold block">10+</span>
              <span class="text-sm">Years Experience</span>
            </div>
            
            <!-- Decorative code block -->
            <div class="absolute -top-5 -left-5 bg-white p-3 rounded-md shadow-lg rotate-3 font-fira-code text-xs text-tech-gray">
              <pre class="text-left">
                <code>
                  <span class="text-blue-600">function</span> 
                  <span class="text-green-600">solveITProblems</span>(){"\n"}
                  {"  "}
                  <span class="text-purple-600">return</span> solutions;{"\n"}
                </code>
              </pre>
            </div>
          </div>
        </div>
        
        <!-- Right column - About content -->
        <div class="md:w-3/5 space-y-6">
          <div class="flex items-center space-x-3">
            <div class="h-1 w-10 bg-tech-teal"></div>
            <p class="text-tech-teal font-medium">ABOUT ME</p>
          </div>
          
          <h2 class="text-3xl md:text-4xl font-bold text-tech-darkblue">
            IT Specialist & <span class="text-tech-blue">Laravel Developer</span>
          </h2>
          
          <p class="text-tech-gray">
            I'm a versatile IT professional with over 10 years of experience spanning technical support, network installation, and web application development. My approach combines strong technical knowledge with creative problem-solving skills to deliver effective solutions.
          </p>
          
          <p class="text-tech-gray">
            As a certified network installer and Laravel developer, I specialize in bridging the gap between hardware infrastructure and software applications. Whether it's optimizing network performance, troubleshooting complex IT issues, or developing custom web applications, I bring a comprehensive skill set to every project.
          </p>
          
          <div class="py-4">
            <h3 class="text-lg font-bold text-tech-darkblue mb-3">Technical Proficiencies</h3>
            <div class="flex flex-wrap gap-2">
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Windows/macOS/Linux</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Network Security</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Cisco Networking</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Laravel</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">PHP</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">MySQL</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">JavaScript</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Vue.js</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">API Development</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Cloud Services</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Virtualization</span>
              <span class="bg-blue-50 text-tech-blue px-3 py-1 rounded-full text-sm">Cybersecurity</span>
            </div>
          </div>
          
          <a href="#" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-tech-blue hover:bg-tech-darkblue text-white h-10 px-4 py-2">
            <i data-lucide="download" class="mr-2 h-4 w-4"></i>
            Download Resume
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-tech-darkblue mb-4">
          Get in <span class="text-tech-blue">Touch</span>
        </h2>
        <div class="w-20 h-1 bg-tech-teal mx-auto mb-6"></div>
        <p class="text-tech-gray max-w-2xl mx-auto">
          Have a technical challenge or project in mind? Reach out to discuss how I can help with your IT, networking, or development needs.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Contact Information Cards -->
        <div class="lg:col-span-1 space-y-4">
          <!-- Location Card -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 animate-slide-in" style="animation-delay: 0.1s;">
            <div class="p-6">
              <div class="flex items-start space-x-4">
                <div class="rounded-full bg-blue-100 p-3">
                  <i data-lucide="map-pin" class="h-6 w-6 text-tech-blue"></i>
                </div>
                <div>
                  <h3 class="text-lg font-bold text-tech-darkblue">Location</h3>
                  <p class="text-tech-gray">Your City, Country</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Phone Card -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 animate-slide-in" style="animation-delay: 0.2s;">
            <div class="p-6">
              <div class="flex items-start space-x-4">
                <div class="rounded-full bg-blue-100 p-3">
                  <i data-lucide="phone" class="h-6 w-6 text-tech-blue"></i>
                </div>
                <div>
                  <h3 class="text-lg font-bold text-tech-darkblue">Phone</h3>
                  <p class="text-tech-gray">+1 (555) 123-4567</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Email Card -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200 animate-slide-in" style="animation-delay: 0.3s;">
            <div class="p-6">
              <div class="flex items-start space-x-4">
                <div class="rounded-full bg-blue-100 p-3">
                  <i data-lucide="mail" class="h-6 w-6 text-tech-blue"></i>
                </div>
                <div>
                  <h3 class="text-lg font-bold text-tech-darkblue">Email</h3>
                  <p class="text-tech-gray">yourname@example.com</p>
                </div>
              </div>
            </div>
          </div>

          <!-- VCard Download -->
          <div class="rounded-lg border bg-gradient-to-r from-tech-blue to-tech-teal text-white animate-slide-in" style="animation-delay: 0.4s;">
            <div class="p-6">
              <div class="text-center space-y-3">
                <h3 class="text-lg font-bold">Save My Contact Info</h3>
                <p class="text-sm opacity-90">Download my virtual business card to add to your contacts</p>
                <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white/10 text-white border-white/20 hover:bg-white/20 h-9 px-4 py-2">
                  Download VCard
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-2 animate-slide-in" style="animation-delay: 0.2s;">
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-gray-200">
            <div class="p-6">
              <h3 class="text-xl font-bold text-tech-darkblue mb-6">Send Me a Message</h3>
              
              <form id="contact-form" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="space-y-2">
                    <label for="name" class="text-sm font-medium text-tech-gray">
                      Your Name
                    </label>
                    <input
                      id="name"
                      name="name"
                      placeholder="John Doe"
                      required
                      class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-gray-300 focus:border-tech-blue focus:ring-tech-blue"
                    />
                  </div>
                  
                  <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-tech-gray">
                      Your Email
                    </label>
                    <input
                      id="email"
                      name="email"
                      type="email"
                      placeholder="john@example.com"
                      required
                      class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-gray-300 focus:border-tech-blue focus:ring-tech-blue"
                    />
                  </div>
                </div>
                
                <div class="space-y-2">
                  <label for="subject" class="text-sm font-medium text-tech-gray">
                    Subject
                  </label>
                  <input
                    id="subject"
                    name="subject"
                    placeholder="Project Inquiry"
                    required
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-gray-300 focus:border-tech-blue focus:ring-tech-blue"
                  />
                </div>
                
                <div class="space-y-2">
                  <label for="message" class="text-sm font-medium text-tech-gray">
                    Message
                  </label>
                  <textarea
                    id="message"
                    name="message"
                    placeholder="Tell me about your project or inquiry..."
                    rows="5"
                    required
                    class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-gray-300 focus:border-tech-blue focus:ring-tech-blue"
                  ></textarea>
                </div>
                
                <button type="submit" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-tech-blue hover:bg-tech-darkblue text-white h-10 px-4 py-2 w-full">
                  <i data-lucide="send" class="mr-2 h-4 w-4"></i>
                  Send Message
                </button>
              </form>
              
              <!-- Success Message (hidden by default) -->
              <div id="success-message" class="hidden mt-4 p-4 bg-green-100 text-green-700 rounded-md">
                <div class="flex items-center">
                  <i data-lucide="check-circle" class="h-5 w-5 mr-2"></i>
                  <p>Thanks for reaching out. I'll get back to you soon!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-tech-darkblue text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- About -->
        <div class="md:col-span-2 space-y-4">
          <h3 class="text-xl font-bold mb-4">
            <span class="font-fira-code">Tech</span>Portfolio
          </h3>
          <p class="text-gray-300 max-w-md">
            Providing expert IT services, network installation, and Laravel development solutions. Transforming technical challenges into innovative solutions.
          </p>
          <div class="flex space-x-4 pt-4">
            <a href="#" class="text-gray-300 hover:text-white transition-colors" aria-label="Twitter">
              <i data-lucide="twitter" class="h-5 w-5"></i>
            </a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors" aria-label="LinkedIn">
              <i data-lucide="linkedin" class="h-5 w-5"></i>
            </a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors" aria-label="GitHub">
              <i data-lucide="github" class="h-5 w-5"></i>
            </a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors" aria-label="Email">
              <i data-lucide="mail" class="h-5 w-5"></i>
            </a>
          </div>
        </div>
        
        <!-- Services -->
        <div>
          <h3 class="text-lg font-bold mb-4">Services</h3>
          <ul class="space-y-2">
            <li>
              <a href="#services" class="text-gray-300 hover:text-white transition-colors">
                IT Technical Support
              </a>
            </li>
            <li>
              <a href="#services" class="text-gray-300 hover:text-white transition-colors">
                Network Installation
              </a>
            </li>
            <li>
              <a href="#services" class="text-gray-300 hover:text-white transition-colors">
                Laravel Development
              </a>
            </li>
            <li>
              <a href="#services" class="text-gray-300 hover:text-white transition-colors">
                Cybersecurity
              </a>
            </li>
            <li>
              <a href="#services" class="text-gray-300 hover:text-white transition-colors">
                Database Management
              </a>
            </li>
          </ul>
        </div>
        
        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li>
              <a href="#home" class="text-gray-300 hover:text-white transition-colors">
                Home
              </a>
            </li>
            <li>
              <a href="#about" class="text-gray-300 hover:text-white transition-colors">
                About
              </a>
            </li>
            <li>
              <a href="#services" class="text-gray-300 hover:text-white transition-colors">
                Services
              </a>
            </li>
            <li>
              <a href="#projects" class="text-gray-300 hover:text-white transition-colors">
                Projects
              </a>
            </li>
            <li>
              <a href="#contact" class="text-gray-300 hover:text-white transition-colors">
                Contact
              </a>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-700 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm">
          &copy; <span id="current-year"></span> Your Name. All rights reserved.
        </p>
        <div class="flex space-x-4 mt-4 md:mt-0">
          <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
          <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Initialize Lucide Icons -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      lucide.createIcons();
      
      // Update copyright year
      document.getElementById('current-year').textContent = new Date().getFullYear();
    });
  </script>
  
  <!-- Custom JavaScript -->
  <script src="assets/js/script.js"></script>
</body>
</html>