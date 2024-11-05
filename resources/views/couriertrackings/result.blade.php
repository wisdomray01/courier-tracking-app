@extends('layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="w-full md:w-8/12 bg-white p-8 mx-auto">

            <p class="text-md"><strong>Tracking Number:</strong> {{ $trackers->tracking_number }}</p>
            <p class="text-md"><strong>Sender:</strong> {{ $trackers->senders_name }}</p>
            <p class="text-md"><strong>Receiver:</strong> {{ $trackers->receivers_name }}</p>
            <p class="text-md"><strong>Sent:</strong> {{ $trackers->sent_date }}</p>
            <p class="text-md"><strong>Expected:</strong> {{ $trackers->arrival_date }}</p>

            <div class="bg-gray-100 p-4 rounded-lg bd-rad">
                <h2 class="text-lg font-bold mb-4"><strong>Package Status</strong></h2>
                <table class="min-w-full bg-white ">
                    <tbody>
                        <tr class="border-b">
                            <th class="p-4 text-md font-semibold"><strong>Date</strong></th>
                            <th class="p-4 text-md font-semibold"><strong>Status</strong></th>
                            <th class="p-4 text-md font-semibold"><strong>Remarks</strong></th>

                        </tr>
                        @foreach ($tracking_events as $event)
                            <tr class="border-b">

                                <td class="p-4 text-md">{{ $event->date_updated }}</td>
                                <td class="p-4 text-md">{{ $event->status }}</td>
                                <td class="p-4 text-md">{{ $event->remarks }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <a href="{{ route('couriertrackings.index') }}"
            class="mt-4 inline-block bg-gray-800 text-white py-2 px-4 rounded hover:bg-gray-700">Track Another Package</a>
    </div>

        </div>


@endsection
