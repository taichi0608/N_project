<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class M_SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'category_code' => '1',
            'category_name' => '宿泊部門',
            'category_ab_name'=> '宿泊',
            'PayFor'=>'0',
            'DisplayOrder'=>'1',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'category_code' => '2',
            'category_name' => '飲料部門',
            'category_ab_name'=> '飲料',
            'PayFor'=>'0',
            'DisplayOrder'=>'2',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'category_code' => '3',
            'category_name' => 'その他部門',
            'category_ab_name'=> 'その他',
            'PayFor'=>'0',
            'DisplayOrder'=>'3',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'category_code' => '4',
            'category_name' => '現金',
            'category_ab_name'=> '金',
            'PayFor'=>'0',
            'DisplayOrder'=>'4',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'category_code' => '5',
            'category_name' => 'クレジット',
            'category_ab_name'=> 'クレ',
            'PayFor'=>'0',
            'DisplayOrder'=>'5',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'category_code' => '6',
            'category_name' => 'クーポン',
            'category_ab_name'=> 'クー',
            'PayFor'=>'0',
            'DisplayOrder'=>'6',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'category_code' => '7',
            'category_name' => 'ポイント',
            'category_ab_name'=> 'PT',
            'PayFor'=>'0',
            'DisplayOrder'=>'7',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'category_code' => '8',
            'category_name' => '売掛',
            'category_ab_name'=> '売',
            'PayFor'=>'0',
            'DisplayOrder'=>'8',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'category_code' => '9',
            'category_name' => '預り金',
            'category_ab_name'=> '預',
            'PayFor'=>'0',
            'DisplayOrder'=>'9',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        
    }
}