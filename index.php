<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Tailwind CSS Page</title>
    <link href="style.css" rel="stylesheet">
    </head>
<body class="bg-gray-100">

<template>
    <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
            Dashboard</Link
            >

            <template v-else>
                <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >
                Log in</Link
                >

                <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >
                Register</Link
                >
            </template>
        </div>
</template>


<header class="bg-cover bg-center h-10vh w-full">
    <nav class="flex justify-between items-center px-10% pt-2.5">
        <h1 class="text-f5d5bb text-2xl">Furniche</h1>
        <ul class="flex list-none m-0 p-0">
            <li class="inline-block">
                <a class="text-black font-bold no-underline hover:text-gray-700 px-4 py-2"
                   href="Projects.html">Login</a>
            </li>
            <li class="inline-block">
                <a class="text-black font-bold no-underline hover:text-gray-700 px-4 py-2" href="contactus.html">Contact
                    Us</a>
            </li>
            <li class="inline-block">
                <a class="text-black font-bold no-underline hover:text-gray-700 px-4 py-2" href="aboutus.html">About
                    Us</a>
            </li>
        </ul>
    </nav>
</header>

        <div class="relative w-full">
            <img src="https://www.bing.com/images/blob?bcid=qN9eH5NqaGkGPQ" alt=""
         class="h-auto py-4 w-full bg-[rgb(232,225,219)]"/>
            <div class="absolute right-8 top-6 w-36 border-2 border-[rgb(137,80,11)] bg-white p-2">
    <pre>




    </pre>
            </div>
        </div>

        <div class="bg flex items-center justify-center bg-[rgb(232,225,219)]">
            <div class="rounded-lg bg-[(217,217,217)]">
                <label class="text-center text-lg font-semibold">Shop Now!</label>
            </div>
        </div>
        <div class="bg flex items-center justify-center bg-[rgb(232,225,219)]">
            <div class="rounded-lg bg-[(217,217,217)] p-4">
                <label class="text-center text-lg font-semibold">&darr;</label>
            </div>
        </div>

        <div class="relative">
            <img src="https://www.bing.com/images/blob?bcid=qHkj6uJQr2kGcQ" alt="Background" class="h-auto w-full"/>
            <div class="absolute inset-0 flex items-center justify-center w-full">
                <div class="bg-[rgb(184,170,157)] p-4">
                    <p class="text-black">Design your home to be a bit more like you</p>
                </div>
            </div>
        </div>

        <div class="bg flex items-center justify-center bg-[rgb(232,225,219)] py-3">
            <div class="rounded-lg bg-[(217,217,217)] p-4">
                <label class="text-center text-lg font-semibold">Categories</label>
            </div>
        </div>
        <div class="bg-dots-darker dark:bg-dots-lighter relative w-full bg-[rgb(232,225,219)] bg-center selection:bg-red-500 selection:text-white sm:items-center sm:justify-center">
            <div class="grid grid-cols-5 gap-4 rounded p-4">
                <div class="relative h-64 w-full rounded">
                    <a href="product_index.php" class="inline-block hover:opacity-75">
                        <img src="https://www.bing.com/th?id=OIP.csAHwsB3R_e-P74GTOufmgHaJQ&w=150&h=188&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2"
                     class="h-full w-fit rounded-lg object-cover shadow-lg" alt="BOHEMIAN"/>
                    </a>
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-opacity-80">
                        <p>Bohemian</p>
                    </div>
                </div>
                <div class="relative h-64 w-full">
                    <a href="product_index.php" class="inline-block hover:opacity-75">
                        <img src="https://www.bing.com/th?id=OIP.8ta8qBzz5Xx63jDPQ5v0VwHaGC&w=116&h=100&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2"
                     class="h-64 w-full rounded-lg object-cover shadow-lg" alt="RUSTIC"/>
                    </a>
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-opacity-80">
                        <p>Rustic</p>
                    </div>
                </div>
                <div class="relative h-64 w-full">
                    <a href="product_index.php" class="inline-block hover:opacity-75">
                        <img src="https://www.bing.com/th?id=OIP.H2kF4LBQHFvhMGjxmIHu3QHaHa&w=146&h=146&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2"
                     class="h-64 w-full rounded-lg object-cover shadow-lg" alt="MINIMALISTIC"/>
                    </a>
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-opacity-80">
                        <p>Minimalistic</p>
                    </div>
                </div>
                <div class="relative h-64 w-full">
                    <a href="product_index.php" class="inline-block hover:opacity-75">
                        <img src="https://files.oaiusercontent.com/file-0HZ52E6zBjk9bkE6awvCclCQ?se=2023-12-09T21%3A43%3A36Z&sp=r&sv=2021-08-06&sr=b&rscc=max-age%3D31536000%2C%20immutable&rscd=attachment%3B%20filename%3Df8b1e729-563d-4c06-92e6-8ee085284f02.webp&sig=9pHYyytVdMamWhpn8lYp8iXVZicQAuloH8JYuSWrRgo%3D"
                     class="h-64 w-full rounded-lg object-cover shadow-lg" alt="TROPICAL"/>
                    </a>
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-opacity-80">
                        <p>Tropical</p>
                    </div>
                </div>
                <div class="relative h-64 w-full">
                    <a href="product_index.php" class="inline-block hover:opacity-75">
                        <img src="https://files.oaiusercontent.com/file-yA0zSg2yv9NXgEdiPm5OhPA9?se=2023-12-09T21%3A43%3A36Z&sp=r&sv=2021-08-06&sr=b&rscc=max-age%3D31536000%2C%20immutable&rscd=attachment%3B%20filename%3D13000fcc-0273-455e-b3c3-3df8463125c3.webp&sig=udxoSivSUYqqyOzKSACZIEghF1UWkkkfF5zizSqbfvI%3D"
                     class="h-64 w-full rounded-lg object-cover shadow-lg" alt="MODERN"/>
                    </a>
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-opacity-80">
                        <p>Modern</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg flex items-center justify-center bg-[rgb(232,225,219)] py-1">
            <div class="rounded-lg bg-[rgb(232,225,219)] p-4">
                <label class="text-center text-lg font-semibold">Newsletter</label>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 rounded bg-[rgb(232,225,219)] p-4">
            <div class="relative h-fit w-fit">
                <img src="https://www.bing.com/images/blob?bcid=qJb8GaqeEWkGCQ"
             class="h-fit w-fit rounded-lg object-cover shadow-lg" alt="Melissa Ball"/>
                <div class="absolute inset-0 flex items-center bg-black bg-opacity-50 px-3 text-white text-opacity-80">
                    <p>Melissa Ball</p>
                </div>
            </div>
            <div class="relative h-fit w-fit">
                <img src="https://www.bing.com/images/blob?bcid=qFPluvOkomkGjQ"
             class="h-fit w-fit rounded-lg object-cover shadow-lg" alt="Jessica Bash"/>
                <div class="absolute inset-0 flex items-center bg-black bg-opacity-50 px-3 text-white text-opacity-80">
                    <p>Jessica Bash</p>
                </div>
            </div>
        </div>
        <!-- Newsletter Section -->
        <section class="relative h-full w-full bg-[rgb(232,225,219)]">
            .
            <div class="container mx-auto w-full bg-[rgb(232,225,219)] px-6 text-center">
                <div class="mx-auto mt-3 text-black">
                    Subscribe to our newsletter and stay updated on the latest furniture trends.
                    <form class="mt-6 flex justify-center">
                        <div class="flex">
                            <input type="email" class="w-64 rounded-l-lg border border-gray-300 px-4 py-2 focus:outline-none"
                           placeholder="Enter your email"/>
                            <button class="rounded-r-lg bg-[rgb(138,128,118)] px-4 py-2 font-semibold text-white hover:bg-[rgb(138,128,118)] focus:outline-none">
                        Subscribe
                    </button>
                                        </div>
</form>
            <br/>
            </div>
            </div>
    <br/>
        </section>
        <footer class="bg-gray-900 py-16 text-white">
            <div class="container mx-auto flex flex-wrap">
                <div class="w-full p-4 sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4">
                    <h4 class="mb-4 text-xl font-semibold">About Us</h4>
                    <ul>
                        <li><a href="#" class="text-gray-400 hover:text-white">Our Founder</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Our Values</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Our Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Our Services</a></li>
                    </ul>
                </div>
                <div class="w-full p-4 sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4">
                    <h4 class="mb-4 text-xl font-semibold">Address</h4>
                    <h5 class="text-gray-400">206 Canada Place, Liverpool Street, E12 1CL</h5>
                </div>
                <div class="w-full p-4 sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4">
                    <h4 class="mb-4 text-xl font-semibold">Contact Us</h4>
                    <h5 class="text-gray-400">Email us at: comms@furniche.com</h5>
                    <h5 class="text-gray-400">Call us at: 01563385967</h5>
                    <ul>
                        <li><a href="C:\Users\Osaze\OneDrive\Documents\GitHub\TeamProject6\contact.css"
                       class="text-gray-400 hover:text-white">Contact Us via our Website</a></li>
                    </ul>
                </div>
                <div class="w-full p-4 sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4">
                    <h4 class="mb-4 text-xl font-semibold">Follow us</h4>
                    <div class="flex space-x-4">
                        <a href="https://en-gb.facebook.com/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/?lang=en" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="https://uk.linkedin.com/" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://github.com/" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </footer>


    </div>
    </div>
    </div>
</body>

</html>