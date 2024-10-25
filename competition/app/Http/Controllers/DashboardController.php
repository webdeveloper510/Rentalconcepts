<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->query('group');

        // Fetch location IDs associated with the selected group
        $locationIds = Group::where(['group' => $group, 'assigned' => 1])->pluck('location_id');

        // Check if location IDs are found
        if ($locationIds->isEmpty()) {
            return response()->json(['error' => 'No locations found for the selected group.'], 404);
        }

        // Determine the previous month in "MM-YYYY" format
        $previousMonth = Carbon::now()->subMonth()->format('m-Y');

        // Retrieve Customer data based on location IDs and previous month
        $customersData = Customer::whereIn('Location', $locationIds)
            ->where('Date', $previousMonth)
            ->select('Location', 'Customers')
            ->get()
            ->keyBy('Location');

        // Create the final output array with customer counts, defaulting to 0, and sort by Customers descending
        $data = $locationIds->mapWithKeys(function ($locationId) use ($customersData) {
            return [
                $locationId => [
                    'Location' => $locationId,
                    'Customers' => $customersData->has($locationId) ? $customersData[$locationId]->Customers : 0
                ]
            ];
        })->sortByDesc('Customers');

        // Return data as JSON for AJAX request
        return response()->json($data->values());
    }
}
