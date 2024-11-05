<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CM-APP</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <style>
        @media print {
            .devbutt * {
                display: none; /* Hide everything */
            }
            footer * {
                display: none; /* Hide everything */
            }
            .printable, .printable * {
                display: absolute; /* Show only elements with class "printable" */
            }
        }
    </style>
</head>

<body>

    <div class="container" id="bodyc">
        <!-- header -->
        <header class="headerct text-white ">
            <div class="container mx-auto flex justify-center items-center py-4">
                <h1 class="text-3xl font-bold">
                    CourierTracker
                </h1>
            </div>
        </header>

        <div>

            @yield('content');
        </div>

        <footer class="footerct">
            <div class="container mx-auto text-center pt-2">
                <div class="mb-2">
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="text-sm py-3">
                    &copy; <span id="year"></span> Couriertracker.com. All rights reserved.
                </p>
            </div>
        </footer>

        <script>
            // JavaScript to automatically set the current year
            document.getElementById('year').textContent = new Date().getFullYear();
        </script>
    </div>
</body>

</html>
