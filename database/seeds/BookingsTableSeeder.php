<?php

use App\Bookable;
use App\Booking;
use App\Http\Controllers\Api\BookableController;
use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            // 配列を全て返して、each(function ($item, $key) { // });で繰り返し処理
            $booking = factory(Booking::class)->make(); // booking変数にBookingFactoryで定義した物から新しいコレクションインスタンスを生成
            $bookings = collect([$booking]); // collectヘルパのなかに配列としてbooking変数を入れる

            for ($i = 0; $i < random_int(1, 20); $i++) {
                $from = (clone $booking->to)->addDays(random_int(1,14));
                $to = (clone $from)->addDays(random_int(1,14));

                $booking = Booking::make([
                    'from' => $from,
                    'to' => $to
                ]);
                $bookings->push($booking);
            }
            $bookable->bookings()->saveMany($bookings);
        });
    }
}
