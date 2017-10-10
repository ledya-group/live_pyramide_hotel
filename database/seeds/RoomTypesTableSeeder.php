<?php

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RoomType::class, 5)->create()->each(function($room_type) {
            $room_type->rooms()->saveMany(
                factory(App\Room::class, 10)->make()
            );
        });
    }
}
