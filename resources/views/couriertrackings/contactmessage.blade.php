@extends('layout.app')

@section('content')
<div class="container mx-auto p-10">
    <div class="w-full md:w-8/12 bg-white p-8 mx-auto">
    <h2 class="text-2xl font-bold mb-4">Message</h2>


        <table class="min-w-full bg-white border border-gray-300">

                <tr class="border-b">
                    <td class="p-4 text-md font-semibold"><strong>Name:</strong></td>
                    <td class="p-4 text-md">{{ $messages->name }}</td>
                </tr>

                <tr class="border-b">
                    <td class="p-4 text-md font-semibold"><strong>Phone Number:</strong></td>
                    <td class="p-4 text-md">{{ $messages->phone }}</td>
                </tr>

                <tr class="border-b">
                    <td class="p-4 text-md font-semibold"><strong>Email:</strong></td>
                    <td class="p-4 text-md">{{ $messages->email }}</td>
                </tr>

                <tr class="border-b">
                    <td class="p-4 text-md font-semibold"><strong>Message:</strong></td>
                    <td class="p-4 text-md">{{ $messages->content }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
