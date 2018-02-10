<?php

use App\User;
use App\Status;
use App\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maru = $this->generate('Maru', 'Vichet', 'Sai');
        $hero = $this->generate('Hero', 'Virak', 'Sim');
        $ravuthz = $this->generate('Ravuthz', 'Vannaravuth', 'Yo');

        Auth::login($maru, false);
        $maru->statuses()->save(factory(Status::class)->make());
        $maru->statuses()->save(factory(Status::class)->make());
        $maru->statuses()->save(factory(Status::class)->make());
        $maru->statuses()->save(factory(Status::class)->make());
        $maru->statuses()->each(function($status) {
            $status->comments()->save(factory(Comment::class)->make());
            $status->comments()->save(factory(Comment::class)->make());
            $status->comments()->save(factory(Comment::class)->make());
            $status->comments()->save(factory(Comment::class)->make());
        });
        $maru->followeds()->save($hero);
        $maru->followeds()->save($ravuthz);
        Auth::logout();

        Auth::login($hero, false);
        $hero->statuses()->save(factory(Status::class)->make());
        $hero->statuses()->save(factory(Status::class)->make());
        $hero->statuses()->save(factory(Status::class)->make());
        $hero->statuses()->each(function($status) {
            $status->comments()->save(factory(Comment::class)->make());
            $status->comments()->save(factory(Comment::class)->make());
            $status->comments()->save(factory(Comment::class)->make());
        });
        $hero->followeds()->save($maru);
        $hero->followeds()->save($ravuthz);
        Auth::logout();

        Auth::login($ravuthz, false);
        $ravuthz->statuses()->save(factory(Status::class)->make());
        $ravuthz->statuses()->save(factory(Status::class)->make());
        $ravuthz->statuses()->each(function($status) {
            $status->comments()->save(factory(Comment::class)->make());
            $status->comments()->save(factory(Comment::class)->make());
        });
        $ravuthz->followeds()->save($maru);
        $ravuthz->followeds()->save($hero);
        Auth::logout();

        Log::debug($ravuthz->toArray());
        Log::debug($ravuthz->followers->toArray());
        Log::debug($ravuthz->followeds->toArray());
        Log::debug($ravuthz->statuses->toArray());
        Log::debug($ravuthz->comments->toArray());

        $ravuthz->statuses->each(function($status) {
            Log::debug($status->comments->toArray());
        });

//        factory(User::class, 10)->create()->each(function($user) {
//            $user->statuses()->save(factory(App\Status::class, 1)->make()->each(function($status) use ($user) {
//
//            }));
//        });

    }

    public function generate($userName, $firstName, $lastName, $email = null) {
        $faker = Faker\Factory::create();
        return User::create([
            'username'  => $userName,
            'password'  => bcrypt('123123'),
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'email'     => $email ? $email : strtolower($userName) . '@gmail.com',
            'phone'     => $faker->tollFreePhoneNumber()
        ]);
    }
}
