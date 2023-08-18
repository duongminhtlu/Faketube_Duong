<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            Channel::create([
                'channelName' => "Channel $i",
                'description' => "Description for Channel $i",
                'subscribersCount' => rand(100, 10000),
                'URL' => "https://example.com/channel$i",
            ]);
        }
    }
}
