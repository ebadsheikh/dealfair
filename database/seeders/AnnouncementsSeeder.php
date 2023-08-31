<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Announcement::firstOrCreate(
                [
                    'title' => $this->fakeTitle(),
                    'status' => $this->fakeStatus(),
                    'start_date' => $this->fakeDate(),
                    'end_date' => $this->fakeDate(),
                ],
                [
                    'alert' => $this->fakeBoolean(),
                    'description' => $this->fakeDescription(),
                ]
            );
        }
    }

    /**
     * Generate a fake boolean value.
     *
     * @return bool
     */
    private function fakeBoolean()
    {
        return rand(0, 1) == 1;
    }

    /**
     * Generate a fake date.
     *
     * @return string
     */
    private function fakeDate()
    {
        $year = date('Y');
        $month = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
        $day = str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT);

        return "$year-$month-$day";
    }

    /**
     * Generate a fake title.
     *
     * @return string
     */
    private function fakeTitle()
    {
        $titles = [
            'Special Offer',
            'New Product Release',
            'Important Announcement',
            'Upcoming Event',
            'Limited Time Sale',
        ];

        return $titles[array_rand($titles)];
    }

    /**
     * Generate a fake description.
     *
     * @return string
     */
    private function fakeDescription()
    {
        $descriptions = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'Nunc ullamcorper lobortis lectus, sed lobortis dui pulvinar ut.',
            'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            'Donec non purus eu lacus posuere hendrerit at quis elit.',
        ];

        return $descriptions[array_rand($descriptions)];
    }

    /**
     * Generate a fake status.
     *
     * @return string
     */
    private function fakeStatus()
    {
        $statuses = ['published', 'unpublished'];
        return $statuses[array_rand($statuses)];
    }
}
