<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create default option group
        $groups = array(
            [
                'option_group_name' => 'continent'
            ], [
                'option_group_name' => 'country'
            ], [
                'option_group_name' => 'region'
            ], [
                'option_group_name' => 'division'
            ], [
                'option_group_name' => 'district'
            ], [
                'option_group_name' => 'sub-district'
            ], [
                'option_group_name' => 'city'
            ], [
                'option_group_name' => 'state'
            ], [
                'option_group_name' => 'union'
            ], [
                'option_group_name' => 'word'
            ], [
                'option_group_name' => 'village'
            ], [
                'option_group_name' => 'religion'
            ], [
                'option_group_name' => 'gender'
            ], [
                'option_group_name' => 'marital_status'
            ], [
                'option_group_name' => 'blood_group'
            ], [
                'option_group_name' => 'department'
            ], [
                'option_group_name' => 'designation'
            ], [
                'option_group_name' => 'employee_type'
            ], [
                'option_group_name' => 'currency_type'
            ], [
                'option_group_name' => 'currency_type'
            ], [
                'option_group_name' => 'grade'
            ], [
                'option_group_name' => 'working_shift'
            ], [
                'option_group_name' => 'leave_type'
            ], [
                'option_group_name' => 'pay_type'
            ], [
                'option_group_name' => 'relative_type'
            ], [
                'option_group_name' => 'bank'
            ], [
                'option_group_name' => 'yearly_holiday'
            ]
        );
        DB::table('option_groups')->insert($groups);

        $options = array(
            [
                'option_group_name' => 'continent',
                'option_value' => 'Asia'
            ], [
                'option_group_name' => 'continent',
                'option_value' => 'Africa'
            ], [
                'option_group_name' => 'continent',
                'option_value' => 'North America'
            ], [
                'option_group_name' => 'continent',
                'option_value' => 'South America'
            ], [
                'option_group_name' => 'continent',
                'option_value' => 'Antarctica'
            ], [
                'option_group_name' => 'continent',
                'option_value' => 'Europe'
            ], [
                'option_group_name' => 'continent',
                'option_value' => 'Australia'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Bangladesh'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Pakistan'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'India'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Miyanmar'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Vutan'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Nepal'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Srilanka'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'China'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'South Korea'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'North Korea'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Thiland'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Singapue'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'America'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Saudi Arabia'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Iran'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Iraq'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Afganistan'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Turkey'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Libiya'
            ], [
                'option_group_name' => 'country',
                'option_value' => 'Seriya'
            ], [
                'option_group_name' => 'blood_group',
                'option' => [
                    'A+','A-','B+','B-','AB+','AB-','O+','O-'
                ]
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 'B+'
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 'B-'
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 'AB+'
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 'AB-'
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 'O+'
            ], [
                'option_group_name' => 'blood_group',
                'option_value' => 'O-'
            ],[
                'option_group_name' => 'gender',
                'option' => [
                    'Male',
                    'Female',
                    'Common',
                ]
            ], [
                'option_group_name' => 'religion',
                'option' => [
                    'Islam',
                    'Christianity',
                    'Buddhism',
                    'Hinduism',
                    'Jainism',
                    'Judaism',
                    'Shinto',
                    'Sikhism',
                    'Taoism',
                    'Zoroastrianism',
                ]
            ]
        );
    }
}
