<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriesSeeder extends Seeder
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
            'category_code' => '11',
            'category_name' => '宿泊部門',
            'category_ab_name'=> '宿泊',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'category_code' => '22',
            'category_name' => '飲料部門',
            'category_ab_name'=> '飲料',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'category_code' => '33',
            'category_name' => 'その他部門',
            'category_ab_name'=> 'その他',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'category_code' => '44',
            'category_name' => '現金',
            'category_ab_name'=> '金',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'category_code' => '55',
            'category_name' => 'クレジット',
            'category_ab_name'=> 'クレ',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'category_code' => '66',
            'category_name' => 'クーポン',
            'category_ab_name'=> 'クー',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'category_code' => '77',
            'category_name' => 'ポイント',
            'category_ab_name'=> 'PT',
            'PayFor'=>'あり',
            'DisplayOrder'=>'1',
            'hidden'=>'表示',
        ]);
     
    }
}