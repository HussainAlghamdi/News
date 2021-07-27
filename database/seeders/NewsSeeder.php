<?php

namespace Database\Seeders;

use App\Models\Newsarticle;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Newsarticle::factory(25)->create();
    }
}
