<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Booking::class, function (Faker $faker) {
    // Carbonのインスタンスを作成。FakerのdateTimeBetweenでダミーデータ間の整合性をとる
    $from = Carbon::instance($faker->dateTimeBetween('-1 months', '+1 months'));
    $to = (clone $from)->add(random_int(0, 14));
    return [
        'from' => $from,
        'to' => $to
    ];
});