<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DestinationController extends Controller
{

    
public function destinations(Request $request)
{
    $allDestinations = json_decode(
        File::get(resource_path('data/destinations.json')),
        true
    );

    $search = trim((string) $request->query('search', ''));
    $region = trim((string) $request->query('region', ''));
    $sort = $request->query('sort', 'rating');

    // Validate sorting
    if (!in_array($sort, ['rating', 'popular'], true)) {
        $sort = 'rating';
    }

    // Get unique regions
    $regions = collect($allDestinations)
        ->pluck('region')
        ->filter()
        ->unique()
        ->sort()
        ->values();

    // Filter destinations
    $destinations = collect($allDestinations)

        // Search
        ->when($search !== '', function ($items) use ($search) {

            $needle = mb_strtolower($search);

            return $items->filter(function ($destination) use ($needle) {

                $searchable = [
                    $destination['name'] ?? '',
                    $destination['title'] ?? '',
                    $destination['country'] ?? '',
                    $destination['region'] ?? '',
                    $destination['description'] ?? '',
                    ...($destination['topUniversities'] ?? []),
                    ...($destination['popularFor'] ?? []),
                ];

                foreach ($searchable as $value) {
                    if (
                        is_string($value) &&
                        str_contains(mb_strtolower($value), $needle)
                    ) {
                        return true;
                    }
                }

                return false;
            });
        })

        // Region filter
        ->when($region !== '', function ($items) use ($region) {
            return $items->where('region', $region);
        })

        // Sorting
        ->when($sort === 'popular', function ($items) {
            return $items->sortByDesc(
                fn ($item) => (int) ($item['reviewsCount'] ?? 0)
            );
        }, function ($items) {
            return $items->sortByDesc(
                fn ($item) => (float) ($item['rating'] ?? 0)
            );
        })

        ->values();

    $data = [
        'destinations' => $destinations,
        'totalDestinations' => count($allDestinations),
        'search' => $search,
        'selectedRegion' => $region,
        'sort' => $sort,
        'regions' => $regions,
    ];

    // AJAX response
    if ($request->ajax()) {

        return response()->json([
            'html' => view(
                'frontend.pages.destinations._results',
                $data
            )->render(),

            'count' => $destinations->count(),

            'total' => count($allDestinations),
        ]);
    }

    return view(
        'frontend.pages.destinations.index',
        $data
    );
}

public function show($slug)
{
    $detailsPath = resource_path('data/destination-details.json');

    if (!File::exists($detailsPath)) {
        abort(404);
    }

    $destinationData = json_decode(
        File::get($detailsPath),
        true
    );

    // Find destination by slug
    $destination = collect($destinationData['destinations'] ?? [])
        ->firstWhere('slug', $slug);

    if (!$destination) {
        abort(404);
    }

    // return $destination;

    return view('frontend.pages.destinations.details', compact('destination')
    );
}
}
