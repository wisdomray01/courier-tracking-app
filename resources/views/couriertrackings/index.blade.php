@extends('layout.app')

@section('content')
    <div class="md:w-8/12 mx-auto grid grid-cols-1 md:grid-cols-2 gap-2 p-10 " id="body">



        <!-- About Section -->
        <div class="p-6 " id="txtcolor">
            <h2 class="text-2xl font-bold mb-4 ">About</h2>


            <p class="text-lg">
                <b>Welome to the Courier Tracking App!</b> <br>
                This system allows you to track your items using the tracking number provided. You will receive updates on
                your package's status directly to your email if you enter your email address in the tracking form. <br>

                <b>To get the latest updates on your shipment, please enter your tracking number.</b>
            </p>
        </div>

        <!-- Tracking Input Form Section -->
        <div class="">
            <div class=" p-6 rounded-lg shadow-md" id="cardbody">
                <h2 class="text-2xl font-bold mb-4 text-white">Track Your Package</h2>
                <hr class=" border-slate-950">
                <form action="{{ route('couriertrackings.result') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="trackingNumber" class="block text-sm font-medium text-white">Tracking Number</label>
                        <input type="text" id="tracking_number" name="tracking_number" required
                            class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter Tracking Number">

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium  text-white">Email (optional)</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                                placeholder="Enter your email (optional)">
                        </div>
                        {{-- @error('tracking_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror --}}
                        @if (session('error'))
                            <div class="bg-red-500 text-white p-2 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>


                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600">Track</button>
                </form>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class=" p-6 rounded-lg shadow-md" id="cardbody">
            <h2 class="text-2xl font-bold mb-4 text-white">Contact Us</h2>
            <hr class="border-t-2 border-slate-950">

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('couriertrackings.message') }}" method="POST" class="txtcolor mt-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-white">Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Your Name">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-white">Phone</label>
                    <input type="tel" id="phone" name="phone" required
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Your Phone Number">
                </div>
                <div class="mb-4">
                    <label for="contactEmail" class="block text-sm font-medium text-white">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Your Email">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-white">Message</label>
                    <textarea id="content" name="content" required class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                        rows="4" placeholder="Your Message"></textarea>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600">Send
                    Message</button>
            </form>
        </div>

        <!-- Company Contact Info Section -->
        <div class="p-6 " id="txtcolor">
            <h2 class="text-2xl font-bold mb-4 abt">Contact Information</h2>
            <p class="text-lg"><strong>Phone:</strong> (123) 456-7890</p>
            <p class="text-lg"><strong>Email:</strong> support@company.com</p>
            <p class="text-lg"><strong>Address:</strong> 123 Courier St, City, Country</p>
            <div class="mt-4">
                <h3 class="text-xl font-bold mb-4 abt">Our Location</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509632!2d144.95373531558068!3d-37.81627997975148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0f3e4b%3A0x0!2zMzdcxKZhbHRlbnRpb24gQ2l0eSwgQXVzdHJhbGlh!5e0!3m2!1sen!2sau!4v1615143104859!5m2!1sen!2sau"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection
