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
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminTablesSeeder::class);

        $this->call(TemplatesTableSeeder::class);

        $this->call(ActivitiesSeeder::class);

        $this->call(AwardsSeeder::class);

        $this->call(CertificatesSeeder::class);
        $this->call(AdminMenuTableSeeder::class);
    }
}
