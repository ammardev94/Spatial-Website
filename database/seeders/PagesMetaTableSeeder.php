<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesMetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('pages_meta')->insert([
        //     [
        //         'ref_id' => 9,
        //         'ref_key' => 'related_insights_title',
        //         'ref_value' => 'Follow Spatial for the Latest <br> Projects and Insights',
        //         'created_at' => Carbon::parse(now()),
        //         'updated_at' => Carbon::parse(now()),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'ref_id' => 9,
        //         'ref_key' => 'related_insights_button_text',
        //         'ref_value' => 'Follow us on instagram',
        //         'created_at' => Carbon::parse(now()),
        //         'updated_at' => Carbon::parse(now()),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'ref_id' => 9,
        //         'ref_key' => 'related_insights_button_link',
        //         'ref_value' => 'Follow us on instagram',
        //         'created_at' => Carbon::parse(now()),
        //         'updated_at' => Carbon::parse(now()),
        //         'deleted_at' => null,
        //     ],
            
        // ]);
    }
}

