@extends('layout.app')

@section('content')
    <div class="printable">
        <div class="container mx-auto p-6">

            <div class="w-full md:w-8/12 bg-white p-8 mx-auto">

                <h1 class="text-xl font-bold mb-4"><strong>Courier Details</strong></h1>
                <p class="text-md"><strong>Tracking Number:</strong> {{ $trackers->tracking_number }}</p>
                <p class="text-md"><strong>Sent Date:</strong> {{ $trackers->sent_date }}</p>
                <p class="text-md"><strong>Arrival Date:</strong> {{ $trackers->arrival_date }}</p>

                <div class="grid grid-cols-1 md:grid-cols-2 mt-6">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-lg font-bold mb-4"><strong>Sender</strong></h2>
                        <table class="min-w-full bg-white ">
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Name:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->senders_name }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Phone:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->senders_phone }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Email:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->senders_email }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Address:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->senders_address }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Country:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->senders_country }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-lg font-bold mb-4"><strong>Receiver</strong></h2>
                        <table class="min-w-full bg-white ">
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Name:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->receivers_name }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Phone:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->receivers_phone }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Email:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->receivers_email }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Address:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->receivers_address }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-4 text-md font-semibold"><strong>Country:</strong></td>
                                    <td class="p-4 text-md">{{ $trackers->receivers_country }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-gray-100 p-4 rounded-lg">
                    <h2 class="text-lg font-bold mb-4"><strong>Package Details</strong></h2>
                    <table class="min-w-full bg-white ">
                        <tbody>
                            <tr class="border-b">
                                <td class="p-4 text-md font-semibold"><strong>Items/Descriptions:</strong></td>
                                <td class="p-4 text-md">{{ $trackers->items }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-4 text-md font-semibold"><strong>Weight:</strong></td>
                                <td class="p-4 text-md">{{ $trackers->weight }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-4 text-md font-semibold"><strong>Tax:</strong></td>
                                <td class="p-4 text-md">{{ $trackers->tax }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Print Button -->
    <div class="mx-auto p-6 devbutt">
        <button onclick="window.print()"
            class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded hover:bg-yellow-600">
            Print Details
        </button>


        {{-- <a href="{{ route('couriertrackings.update') }}" class="btn btn-secondary">Status</a> --}}
        <a href="{{ route('couriertrackings.update', $trackers->id) }}"
            class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
            Update Status
        </a>
    </div>
@endsection
