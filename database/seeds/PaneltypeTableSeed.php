<?php

use Illuminate\Database\Seeder;

class PaneltypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('paneltype')->insert([
                [
                    'idPaneltype' => '1',
                    'name' => 'DB',
                    'created_at' => new DateTime(),
                ],
                [
                    'idPaneltype' => '2',
                    'name' => 'BLOKSET',
                    'created_at' => new DateTime(),
                ],
                [
                    'idPaneltype' => '3',
                    'name' => 'SIMOPRIME',
                    'created_at' => new DateTime(),
                ],
                [
                    'idPaneltype' => '4',
                    'name' => 'SIMOSEC',
                    'created_at' => new DateTime(),
                ],
                       [
                    'idPaneltype' => '5',
                    'name' => 'HAINAM',
                    'created_at' => new DateTime(),
                ]
            ]);
        // $this->call(UsersTableSeeder::class);
    }
}
