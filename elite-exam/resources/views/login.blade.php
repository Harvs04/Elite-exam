<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <div>
            <section class="bg-gray-50">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                    <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                    Elite Exam    
                </a>
                <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            Sign in to your account
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="" method="POST">
                            @csrf
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                <input type="password" name="password" id="password"  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                            </div>
                            <hr class="border-t border-gray-300 w-full">
                            <button type="submit" class="w-full text-black border border-gray-300 bg-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </body>
</html>
