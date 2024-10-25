<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Location;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('locationid')->get();

        // Get all groups assigned to locations
        $assignedGroups = Group::whereIn('location_id', $locations->pluck('locationid'))->get();

        return view('stores', compact('locations', 'assignedGroups'));
    }

    public function updateGroups(Request $request)
    {
        $validated = $request->validate([
            'group' => 'required|string',
            'location_id' => 'required|integer',
            'assigned' => 'required|boolean',
        ]);

        // Check if the group entry exists
        $group = Group::updateOrCreate(
            [
                'group' => $validated['group'],
                'location_id' => $validated['location_id']
            ],
            [
                'assigned' => $validated['assigned'],
            ]
        );

        return response()->json(['success' => true, 'group' => $group]);
    }
}
