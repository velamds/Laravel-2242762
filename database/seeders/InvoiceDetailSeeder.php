<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceDetail;
class InvoiceDetailSeeder extends Seeder
{
    public function run()
    {
        InvoiceDetail::factory(15)->create();
    }
}
