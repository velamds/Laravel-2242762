<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
class InvoiceSeeder extends Seeder
{
    public function run()
    {
        Invoice::factory(5)->create();
    }
}
