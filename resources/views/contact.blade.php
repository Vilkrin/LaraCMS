<x-layout>

    <!-- Contact Section -->
    <div class="container py-8 pt-24 px-4 mx-auto flex-grow">
        <div class="flex flex-col items-center text-center mb-12">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-[#9146FF] to-[#FF4500] bg-clip-text text-transparent mb-4">Contact Us</h1>
            <p class="text-lg text-gray-500 max-w-2xl">
                Have a question, suggestion, or just want to say hello? We'd love to hear from you. 
                Fill out the form below and we'll respond as soon as possible.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-8 max-w-2xl mx-auto">
                <div class="bg-green-600/10 border border-green-600/30 text-green-500 px-6 py-4 rounded-lg text-center font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 max-w-2xl mx-auto">
                <div class="bg-red-600/10 border border-red-600/30 text-red-500 px-6 py-4 rounded-lg text-center font-medium">
                    <ul class="list-disc list-inside text-left inline-block">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Contact Information -->
            <div class="md:col-span-1">
                <div class="bg-[rgba(17,17,17,0.7)] backdrop-blur-md border border-white/10 rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-[#60A5FA] mb-4">Get in Touch</h2>
                    <p class="text-gray-500 mb-6">Reach out to us directly</p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-[#9146FF]/10 w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope text-[#60A5FA]"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Email</p>
                                <a href="mailto:contact@vilkrin.uk" class="text-sm text-gray-500 hover:underline">contact@vilkrin.uk</a>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <p class="text-sm text-gray-500 mb-4">
                                You can also reach us through our social media channels:
                            </p>
                            
                            <div class="flex space-x-4">
                                <a href="https://twitch.tv" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-[#9146FF] transition-colors">
                                    <i class="fab fa-twitch"></i>
                                    <span class="sr-only">Twitch</span>
                                </a>
                                
                                <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-red-500 transition-colors">
                                    <i class="fab fa-youtube"></i>
                                    <span class="sr-only">YouTube</span>
                                </a>
                                
                                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-blue-400 transition-colors">
                                    <i class="fab fa-twitter"></i>
                                    <span class="sr-only">Twitter</span>
                                </a>
                                
                                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-pink-500 transition-colors">
                                    <i class="fab fa-instagram"></i>
                                    <span class="sr-only">Instagram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="md:col-span-2">
                <div class="bg-[rgba(17,17,17,0.7)] backdrop-blur-md border border-white/10 rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-[#60A5FA] mb-4">Send Us a Message</h2>
                    <p class="text-gray-500 mb-6">We'll get back to you as soon as possible</p>
                    <form class="space-y-6" method="POST" action="{{ route('contact.submit') }}">
                        {!! RecaptchaV3::field('contact') !!}
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium mb-2">Name</label>
                                <input type="text" placeholder="Your name" id="name" name="name" required class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-purple-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" placeholder="your.email@example.com" id="email" name="email" required class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-purple-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Subject</label>
                            <input type="text" placeholder="What's this about?" id="subject" name="subject" required class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-purple-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Message</label>
                            <textarea placeholder="Type your message here." id="message" name="message" required class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-purple-500 min-h-32"></textarea>
                        </div>

                        <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                        <button type="submit" class="w-full bg-[#9146FF] hover:bg-[#9146FF]/80 text-white py-3 rounded-lg transition-colors">
                            Send Message
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>