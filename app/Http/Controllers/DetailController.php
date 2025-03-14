<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class DetailController extends Controller
{
    // Display subscription details
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('details.index', compact('subscriptions'));
    }

    // Update subscription status to "paid"
    public function updateStatus(Request $request, $id)
{
    $subscription = Subscription::findOrFail($id);

    // Ensure only admins can update
    if (!auth()->user()->can('admin')) {
        return redirect()->route('details.index')->with('error', 'Unauthorized action.');
    }

    // Validate status
    $request->validate([
        'status' => 'required|in:pending,paid,expired',
    ]);

    // Update status
    $subscription->update([
        'status' => $request->status,
    ]);

    return redirect()->route('details.index')->with('success', 'Subscription status updated successfully.');
}


}


