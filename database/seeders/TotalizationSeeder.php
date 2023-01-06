<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TotalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'id' => 1,
            'SummarySectionName' => 'シングル',
            'category_id' => '1',
            'SummarySectionCode'=> '1',
            'product_ab_name'=>'シングル',
            'PayFor'=>'1',
            'DisplayOrder'=>'1',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'SummarySectionName' => 'ツイン',
            'category_id' => '1',
            'SummarySectionCode'=> '2',
            'product_ab_name'=>'ツイン',
            'PayFor'=>'0',
            'DisplayOrder'=>'2',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'SummarySectionName' => 'ダブル',
            'category_id' => '1',
            'SummarySectionCode'=> '3',
            'product_ab_name'=>'ダブル',
            'PayFor'=>'0',
            'DisplayOrder'=>'3',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'SummarySectionName' => '和室',
            'category_id' => '1',
            'SummarySectionCode'=> '4',
            'product_ab_name'=>'和室',
            'PayFor'=>'0',
            'DisplayOrder'=>'4',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 5,
            'SummarySectionName' => '追加室料',
            'category_id' => '1',
            'SummarySectionCode'=> '5',
            'product_ab_name'=>'追加室料',
            'PayFor'=>'0',
            'DisplayOrder'=>'5',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'SummarySectionName' => '駐車場',
            'category_id' => '1',
            'SummarySectionCode'=> '6',
            'product_ab_name'=>'駐車場',
            'PayFor'=>'0',
            'DisplayOrder'=>'6',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 7,
            'SummarySectionName' => 'レンタル品',
            'category_id' => '1',
            'SummarySectionCode'=> '7',
            'product_ab_name'=>'レンタル品',
            'PayFor'=>'0',
            'DisplayOrder'=>'7',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'SummarySectionName' => '宿泊付帯',
            'category_id' => '1',
            'SummarySectionCode'=> '8',
            'product_ab_name'=>'宿泊付帯',
            'PayFor'=>'0',
            'DisplayOrder'=>'8',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 9,
            'SummarySectionName' => '朝食',
            'category_id' => '2',
            'SummarySectionCode'=> '9',
            'product_ab_name'=>'朝食',
            'PayFor'=>'0',
            'DisplayOrder'=>'9',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 10,
            'SummarySectionName' => '昼食',
            'category_id' => '2',
            'SummarySectionCode'=> '10',
            'product_ab_name'=>'昼食',
            'PayFor'=>'0',
            'DisplayOrder'=>'10',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 11,
            'SummarySectionName' => '夕食',
            'category_id' => '2',
            'SummarySectionCode'=> '11',
            'product_ab_name'=>'夕食',
            'PayFor'=>'0',
            'DisplayOrder'=>'11',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 12,
            'SummarySectionName' => '追加料理',
            'category_id' => '2',
            'SummarySectionCode'=> '12',
            'product_ab_name'=>'追加料理',
            'PayFor'=>'0',
            'DisplayOrder'=>'12',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'SummarySectionName' => '飲料',
            'category_id' => '2',
            'SummarySectionCode'=> '13',
            'product_ab_name'=>'飲料',
            'PayFor'=>'0',
            'DisplayOrder'=>'13',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 14,
            'SummarySectionName' => 'お土産',
            'category_id' => '3',
            'SummarySectionCode'=> '14',
            'product_ab_name'=>'お土産',
            'PayFor'=>'0',
            'DisplayOrder'=>'14',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 15,
            'SummarySectionName' => 'マッサージ',
            'category_id' => '3',
            'SummarySectionCode'=> '15',
            'product_ab_name'=>'マッサージ',
            'PayFor'=>'0',
            'DisplayOrder'=>'15',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 16,
            'SummarySectionName' => 'タクシー',
            'category_id' => '3',
            'SummarySectionCode'=> '16',
            'product_ab_name'=>'タクシー',
            'PayFor'=>'0',
            'DisplayOrder'=>'16',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 17,
            'SummarySectionName' => '宅急便',
            'category_id' => '3',
            'SummarySectionCode'=> '17',
            'product_ab_name'=>'宅急便',
            'PayFor'=>'0',
            'DisplayOrder'=>'17',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 18,
            'SummarySectionName' => '現金',
            'category_id' => '4',
            'SummarySectionCode'=> '18',
            'product_ab_name'=>'現金',
            'PayFor'=>'0',
            'DisplayOrder'=>'18',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 19,
            'SummarySectionName' => '前受金',
            'category_id' => '4',
            'SummarySectionCode'=> '19',
            'product_ab_name'=>'前受金',
            'PayFor'=>'0',
            'DisplayOrder'=>'19',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 20,
            'SummarySectionName' => '予約金(現金)',
            'category_id' => '4',
            'SummarySectionCode'=> '20',
            'product_ab_name'=>'予約金(現金)',
            'PayFor'=>'0',
            'DisplayOrder'=>'20',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 21,
            'SummarySectionName' => '払戻し',
            'category_id' => '4',
            'SummarySectionCode'=> '21',
            'product_ab_name'=>'払戻し',
            'PayFor'=>'0',
            'DisplayOrder'=>'21',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 22,
            'SummarySectionName' => 'クレジット',
            'category_id' => '5',
            'SummarySectionCode'=> '22',
            'product_ab_name'=>'クレジット',
            'PayFor'=>'0',
            'DisplayOrder'=>'22',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 23,
            'SummarySectionName' => 'JTBクーポン',
            'category_id' => '6',
            'SummarySectionCode'=> '23',
            'product_ab_name'=>'JTBクーポン',
            'PayFor'=>'0',
            'DisplayOrder'=>'23',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 24,
            'SummarySectionName' => 'KNTクーポン',
            'category_id' => '6',
            'SummarySectionCode'=> '24',
            'product_ab_name'=>'KNTクーポン',
            'PayFor'=>'0',
            'DisplayOrder'=>'24',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 25,
            'SummarySectionName' => '楽天ポイント',
            'category_id' => '7',
            'SummarySectionCode'=> '25',
            'product_ab_name'=>'楽天P',
            'PayFor'=>'0',
            'DisplayOrder'=>'25',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 26,
            'SummarySectionName' => 'じゃらんポイント',
            'category_id' => '7',
            'SummarySectionCode'=> '26',
            'product_ab_name'=>'じゃらんP',
            'PayFor'=>'0',
            'DisplayOrder'=>'26',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 27,
            'SummarySectionName' => '売掛金',
            'category_id' => '8',
            'SummarySectionCode'=> '27',
            'product_ab_name'=>'売掛金',
            'PayFor'=>'0',
            'DisplayOrder'=>'27',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('products')->insert([
            'id' => 28,
            'SummarySectionName' => '預り金',
            'category_id' => '9',
            'SummarySectionCode'=> '28',
            'product_ab_name'=>'預り金',
            'PayFor'=>'0',
            'DisplayOrder'=>'28',
            'hidden'=>'0',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
        ]);

    }
}
