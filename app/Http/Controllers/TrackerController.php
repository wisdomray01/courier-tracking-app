<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Tracker;
use App\Models\TrackingEvent;
use App\Mail\AdminMessageReceived;
use App\Mail\UserMessageSent;
use App\Mail\TrackingDetails;
use Illuminate\Support\Facades\Mail;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF; // If using Snappy for PDF
use Illuminate\Http\Request;

class TrackerController extends Controller

{
    public function index()
    {
        return view('couriertrackings.index'); // Adjust the view path as needed

    }


    public function message(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'content' => 'required|string|max:500', // Adjust max length as needed
        ]);



        // Message::create($request->all());

        // return redirect()->route('couriertrackings.index')->with('success', 'Your message has been sent successfully!');

        // Create the message
    $messagename = $request->input('name');
    $messagephone = $request->input('phone');
    $messageemail = $request->input('email');
    $messageContent = $request->input('content');

    Message::create($request->all());

    // Send email to the user
    Mail::to($request->email)->send(new UserMessageSent($messageContent));

    // Send email to the admin with all details
    Mail::to('wisdomray25@gmail.com')->send(new AdminMessageReceived($messagename, $messagephone, $messageemail, $messageContent));

    return redirect()->route('couriertrackings.index')->with('success', 'Your message has been sent successfully!');
}

    public function showMsg($id)
    {
        $messages = Message::findOrFail($id); // Fetch the message by ID
        return view('couriertrackings.contactmessage', compact('messages')); // Pass messages to the view
    }


    // Method to handle the POST request for tracking
    public function result(Request $request)
    {
        // Validate the input
        $request->validate([
            'tracking_number' => 'required|string',
            'email' => 'nullable|email|max:255', // Make email optional
        ]);

        // Fetch the tracker by tracking number
        $trackers = Tracker::where('tracking_number', $request->tracking_number)->first();

        if ($trackers) {
            $tracking_events = $trackers->trackingEvents; // Fetch related tracking events

            // Send email if provided
        if ($request->email) {
            Mail::to($request->email)->send(new TrackingDetails($trackers, $tracking_events));
        }

            return view('couriertrackings.result', compact('trackers', 'tracking_events'));
        } else {
            return redirect()->back()->with('error', 'Tracking number not found.');
        }
    }




    public function show(Tracker $trackers)
    {
        return view('couriertrackings.view', compact('trackers'));
    }

    public function update($tracker_id)
    {
        $trackers = Tracker::findOrFail($tracker_id);

        // Fetch the latest tracking event
        $tracking_events = $trackers->trackingEvents()->latest()->first();

        return view('couriertrackings.update', compact('trackers', 'tracking_events'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'tracker_id' => 'required|exists:trackers,id',
            'status' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
            'date_updated' => 'nullable|date', // Validate the date format
        ]);

        // Fetch the tracker to get sender, receiver names, and tracking number
        $trackers = Tracker::findOrFail($request->tracker_id);

        // Create the tracking event with required fields
        TrackingEvent::create([
            'tracker_id' => $request->tracker_id,
            'status' => $request->status,
            'remarks' => $request->remarks ?? '', // Ensure it can be null
            'date_updated' => $request->date_updated ?? now(), // Use current time if no date is provided
            'senders_name' => $trackers->senders_name, // Get sender's name from tracker
            'receivers_name' => $trackers->receivers_name, // Get receiver's name from tracker
            'tracking_number' => $trackers->tracking_number, // Get tracking number from tracker
        ]);

        // Update the status in the trackers table
        $trackers->updateStatus($request->status);

        return redirect()->back()->with('success', 'Tracking status updated successfully.');
    }
}
