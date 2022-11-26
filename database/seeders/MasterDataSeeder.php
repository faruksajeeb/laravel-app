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
                'option' => [
                    'Asia',
                    'Africa',
                    'North America',
                    'South America',
                    'Antarctica',
                    'Europe',
                    'Australia',
                ]
            ], [
                'option_group_name' => 'country',
                'option_value' => [
                    'Bangladesh', 
                    'Pakistan', 
                    'India', 
                    'Miyanmar', 
                    'Vutan',
                    'Nepal', 
                    'Srilanka', 
                    'China', 
                    'South Korea', 
                    'North Korea', 
                    'Thiland', 
                    'Singapue',
                    'America', 
                    'Saudi Arabia', 
                    'Iran', 
                    'Iraq', 
                    'Afganistan', 
                    'Turkey', 
                    'Libiya', 
                    'Seriya',
                ]
            ], [
                'option_group_name' => 'blood_group',
                'option' => [
                    'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
                ]
            ], [
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
            , [
                'option_group_name' => 'marital_status',
                'option' => [
                    'Married',
                    'Divorced',
                    'Separated',
                    'Widowed',
                    'Never married',
                ]
            ]
            , [
                'option_group_name' => 'leave_type',
                'option' => [
                    'Annual Leave',
                    'Casual Leave',
                    'Sick Leave',
                    'Maternity Leave',
                    'Special Leave',
                ]
            ]
            , [
                'option_group_name' => 'pay_type',
                'option' => [
                    'Cash',
                    'Check',
                    'Bank',
                    'Credit Card',
                    'A/R',
                    'COD',
                ]
            ]
            , [
                'option_group_name' => 'yearly_holiday',
                'option' => [
                    'Language Martyrs Day', 
                    'Shab e-Barat',
                    'Independence Day',
                    'Bengali New Year',
                    'Shab-e-Qadr',
                    'Jumatul Bidah',
                ]
            ]
        );
    }
}
