<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Name - CV</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-white text-gray-800 font-sans scroll-smooth">

    <!-- Navigation -->
<header class="fixed top-0 w-full bg-white shadow z-50">
  <nav class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
    
    <!-- Left: Logo -->
    <div class="text-xl font-bold text-indigo-600">YourName</div>

    <!-- Center: Main Nav -->
    <ul class="absolute left-1/2 transform -translate-x-1/2 flex space-x-6 text-sm font-medium text-gray-600">
      <li><a href="#home" class="hover:text-indigo-600">Home</a></li>
      <li><a href="#about" class="hover:text-indigo-600">About</a></li>
      <li><a href="#contact" class="hover:text-indigo-600">Contact</a></li>
      <li>
        <a href="/resume.pdf" class="hover:text-indigo-600" download>
          Resume
        </a>
      </li>
    </ul>

    <!-- Right: Auth Links -->
    <div class="flex items-center space-x-4 text-sm text-gray-600">
      <a href="/login" class="hover:text-indigo-600">Login</a>
      <a href="/register" class="hover:text-indigo-600">Register</a>
    </div>

  </nav>
</header>

    <!-- Hero Section -->
    <section id="home" class="h-screen flex flex-col items-center justify-center text-center px-4 pt-20 bg-indigo-50">
<img
  src="https://ui-avatars.com/api/?name=Vilkrin&background=4f46e5&color=ffffff&size=120"
  alt="Avatar"
  class="w-28 h-28 rounded-full border-4 border-white shadow mb-4"
/>
      <h1 class="text-4xl font-bold text-indigo-700">Vilkrin</h1>
      <p class="text-gray-600 text-lg mt-2">Web Developer & Designer</p>
      <a
        href="#about"
        class="mt-6 inline-block px-5 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"
      >
        Learn More
      </a>
    </section>

    <!-- About Section -->
    <section id="about" class="min-h-screen flex flex-col justify-center items-center text-center px-6 bg-white">
      <h2 class="text-3xl font-semibold text-indigo-700 mb-4">About Me</h2>
      <p class="max-w-2xl text-gray-700 text-lg">
        I'm a web developer passionate about sleek interfaces and accessible design. I love turning ideas into digital experiences using clean code.
      </p>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="min-h-[60vh] flex flex-col justify-center items-center text-center px-6 bg-indigo-50">
      <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Get In Touch</h2>
      <p class="text-gray-700 mb-6">Let's build something great together — or just say hi 👋</p>
      <div class="flex space-x-5 text-2xl text-indigo-600">
        <a href="mailto:you@example.com" class="hover:text-indigo-800">📧</a>
        <a href="https://github.com/yourusername" class="hover:text-indigo-800">🐙</a>
        <a href="https://linkedin.com/in/yourprofile" class="hover:text-indigo-800">🔗</a>
      </div>
      <a
        href="/resume.pdf"
        download
        class="mt-6 inline-block px-5 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"
      >
        Download Resume
      </a>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-center text-sm text-gray-400">
      &copy; 2025 Vilkrin
    </footer>

  </body>
</html>
