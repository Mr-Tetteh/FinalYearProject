<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcriptiontypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtypes = [
            [
                'name' => '1 Month',
                'price' => 50,
                'duration' => 'One Month',
                'valid_days' => 30,
                'description' => '1 Month - GHC50',
            ],
            [
                'name' => '6 Months',
                'price' => 150,
                'duration' => 'Six Months',
                'valid_days' => 180,
                'description' => '6 Months - GHC150 (Save 50%)',
            ],
            [
                'name' => '1 Year',
                'price' => 250,
                'duration' => 'One Year',
                'valid_days' => 365,
                'description' => '1 Year - GHC250 (Best Value)',
            ],
        ];

        foreach ($subtypes as $subtype) {
            SubscriptionType::updateOrCreate(['name' => $subtype['name']], $subtype);
        }
    }
}
