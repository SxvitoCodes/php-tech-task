<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Form</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen px-5 pt-16 lg:pt-20 ">
    <div class="w-full h-full max-w-screen-xl mx-auto">

        <h1 class="text-4xl md:text-7xl">Simple Form</h1>
        <div class="mt-4 md:mt-6 w-full max-w-2xl mx-auto">

            {{-- success flash display --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Simple Form --}}
            <form class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('post.create') }}"
                method="POST">
                @csrf

                {{-- Name Field --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border @error('name') border-red-500 @else border-gray-300 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" name="name" type="text" placeholder="Your name.."
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Field --}}
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border @error('email') border-red-500 @else border-gray-300 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" placeholder="Your email..."
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Message Field --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        Message
                    </label>
                    <textarea
                        class="shadow appearance-none border @error('message') border-red-500 @else border-gray-300 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="message" name="message" placeholder="Your message...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                </div>
            </form>

            {{-- output section --}}
            <div class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl md:text-4xl mb-6">Posts:</h2>

                {{-- loop thru the data --}}
                @foreach ($posts as $post)
                    <div class="mb-4 bg-white shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                        <div class="relative w-full flex flex-col justify-center gap-5 overflow-x-auto">

                            {{-- post details --}}
                            <p>Name: {{ $post->name }}</p>
                            <p>Email: {{ $post->email }}</p>
                            <p>Message: {{ $post->message }}</p>
                            <p>Create Date: {{ $post->created_at->format('Y-m-d H:i') }}</p>

                            {{-- delete button --}}
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="absolute right-2 top-2 cursor-pointer">
                                    <svg width="24px" height="24px" viewBox="0 0 1024 1024" class="icon"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M154 260h568v700H154z" fill="#FF3B30"></path>
                                            <path
                                                d="M624.428 261.076v485.956c0 57.379-46.737 103.894-104.391 103.894h-362.56v107.246h566.815V261.076h-99.864z"
                                                fill="#030504"></path>
                                            <path
                                                d="M320.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883zM543.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883z"
                                                fill="#152B3C"></path>
                                            <path d="M721.185 345.717v-84.641H164.437z" fill="#030504"></path>
                                            <path d="M633.596 235.166l-228.054-71.773 31.55-99.3 228.055 71.773z"
                                                fill="#FF3B30"></path>
                                            <path
                                                d="M847.401 324.783c-2.223 0-4.475-0.333-6.706-1.034L185.038 117.401c-11.765-3.703-18.298-16.239-14.592-27.996 3.706-11.766 16.241-18.288 27.993-14.595l655.656 206.346c11.766 3.703 18.298 16.239 14.592 27.996-2.995 9.531-11.795 15.631-21.286 15.631z"
                                                fill="#FF3B30"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</body>

</html>
