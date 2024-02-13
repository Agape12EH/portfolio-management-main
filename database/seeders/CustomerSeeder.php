<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::factory()->count(30)->create([
            'type' => '2'
        ]);

        Customer::factory()->count(20)->create([
            'type' => '0',
            'customer_id' => $customers->random()->id,
        ]);
    }
}
