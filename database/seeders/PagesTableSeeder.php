<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('pages')->insert(
        // [
        //     'type' => '1',
        //     'title' => 'Insight',
        //     'slug' => 'insight',
        //     'page_title' => 'Omnis nisi reiciendi',
        //     'page_description' => 'Quis ad sed dolores .',
        //     'visibility' => 'no-follow',
        //     'status' => '1',
        //     'canonical_url' => 'https://www.xikuwyniw.cm',
        //     'has_meta' => null,
        //     'added_by' => 1,
        //     'created_at' => Carbon::parse(now()),
        //     'updated_at' => Carbon::parse(now()),
        //     'deleted_at' => null,
        // ]);
    }
}
