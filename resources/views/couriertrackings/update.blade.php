@extends('layout.app') <!-- Adjust this as per your layout structure -->

@section('content')
    <div class="container mx-auto p-6">
        <div class="w-full md:w-4/12 bg-white p-8 mx-auto">
            <h2 class="text-l font-bold mb-4 text-black">Tracking Number: {{ $trackers->tracking_number }}</h2>
            {{-- Check if tracking_events exists --}}
        <h2 class="text-l font-bold mb-4 text-black">
            Current Status: {{ $tracking_events ? $tracking_events->status : 'No status available' }}
        </h2>
        @if(session('success'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif
            <hr class=" border-slate-950">




            <form action="{{ route('couriertrackings.store') }}" method="POST">
                @csrf

                <input type="hidden" name="tracker_id" value="{{ $trackers->id }}">

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-black">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="">Select Status</option>
                        <option value="Pickup">Pickup</option>
                        <option value="Pending">Pending</option>
                        <option value="Shipped">Shipped</option>
                        <option value="In Transit">In Transit</option>
                        <option value="Arrived">Arrived</option>
                        <option value="Sorting">Sorting</option>
                        <option value="Out For Delivery">Out For Delivery</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Returned">Returned</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-black">Remarks</label>
                    <input type="text" id="remarks" name="remarks"
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Remarks">
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-black">Date</label>
                    <input type="date" id="date_updated" name="date_updated"
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Date Updated">
                </div>


                <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Update Tracking
                </button>
                {{-- <a href="{{ route('couriertrackings.update') }}" class="btn btn-secondary">Cancel</a> --}}
            </form>

            {{-- @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif --}}
        </div>
    </div>
@endsection
