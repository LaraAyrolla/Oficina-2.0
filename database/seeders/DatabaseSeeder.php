<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Popula o banco de dados da aplicação.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrcamentosSeeder::class);
    }
}
