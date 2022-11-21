<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create default company
        DB::table('company_settings')->insert([
            'company_name' => 'ABC Ltd.',
            'contact_person' => 'Omar Sajeeb Mridha',
            'created_at' => now()
        ]);
    }
}
