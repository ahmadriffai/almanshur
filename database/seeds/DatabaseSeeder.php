<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(RekeningTableSeeder::class);
        $this->call(KamarTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(TagihanTableSeeder::class);
        $this->call(SantriTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TimeTableSeeder::class);
        $this->call(PembayaranTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
