<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [

            'AU' => [
                'name' => 'Australia',
                'phone_code' => '+61',
                'currency_code' => 'AUD',
                'is_popular' => true,
                'cities' => [
                    'Sydney',
                    'Melbourne',
                    'Brisbane',
                    'Perth',
                    'Adelaide',
                    'Canberra',
                    'Gold Coast',
                    'Newcastle',
                ],
            ],

            'GB' => [
                'name' => 'United Kingdom',
                'phone_code' => '+44',
                'currency_code' => 'GBP',
                'is_popular' => true,
                'cities' => [
                    'London',
                    'Manchester',
                    'Birmingham',
                    'Liverpool',
                    'Leeds',
                    'Bristol',
                    'Sheffield',
                    'Nottingham',
                    'Glasgow',
                    'Edinburgh',
                ],
            ],

            'US' => [
                'name' => 'United States',
                'phone_code' => '+1',
                'currency_code' => 'USD',
                'is_popular' => true,
                'cities' => [
                    'New York',
                    'Los Angeles',
                    'Boston',
                    'Chicago',
                    'San Francisco',
                    'Seattle',
                    'Washington',
                    'Miami',
                    'Houston',
                ],
            ],

            'CA' => [
                'name' => 'Canada',
                'phone_code' => '+1',
                'currency_code' => 'CAD',
                'is_popular' => true,
                'cities' => [
                    'Toronto',
                    'Vancouver',
                    'Montreal',
                    'Calgary',
                    'Ottawa',
                    'Edmonton',
                    'Winnipeg',
                    'Halifax',
                ],
            ],

            'NZ' => [
                'name' => 'New Zealand',
                'phone_code' => '+64',
                'currency_code' => 'NZD',
                'is_popular' => true,
                'cities' => [
                    'Auckland',
                    'Wellington',
                    'Christchurch',
                    'Hamilton',
                    'Dunedin',
                    'Palmerston North',
                ],
            ],

            'MY' => [
                'name' => 'Malaysia',
                'phone_code' => '+60',
                'currency_code' => 'MYR',
                'is_popular' => true,
                'cities' => [
                    'Kuala Lumpur',
                    'George Town',
                    'Johor Bahru',
                    'Ipoh',
                    'Malacca City',
                    'Kota Kinabalu',
                ],
            ],
        ];

        foreach ($locations as $code => $data) {

            // Create or update country
            $country = Country::updateOrCreate(
                [
                    'code' => $code,
                ],
                [
                    'name' => $data['name'],
                    'slug' => Str::slug($data['name']),
                    'phone_code' => $data['phone_code'],
                    'currency_code' => $data['currency_code'],
                    'is_popular' => $data['is_popular'],
                    'is_active' => true,
                ]
            );

            // Create or update cities
            foreach ($data['cities'] as $cityName) {
                City::updateOrCreate(
                    [
                        'country_id' => $country->id,
                        'slug' => Str::slug($cityName),
                    ],
                    [
                        'name' => $cityName,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}