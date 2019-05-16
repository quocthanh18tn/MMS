<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
                [
                    'idManager' => '3333',
                    'idType' => '3',
                    'nameType' => 'production',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh1@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                [
                    'idManager' => '1111',
                    'idType' => '1',
                    'nameType' => 'admin',
                    'password' => bcrypt('123456'),
                     'name' => 'phan quoc thanh',
                    'email' => 'thanh2@gmail.com',
                   
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],[
                    'idManager' => '2222',
                    'idType' => '2',
                    'nameType' => 'project',
                    'password' => bcrypt('123456'),
                     'name' => 'phan quoc thanh',
                    'email' => 'thanh3@gmail.com',
                   
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'idManager' => '4444',
                    'idType' => '4',
                    'nameType' => 'QC',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh4@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'idManager' => '22221',
                    'idType' => '21',
                    'nameType' => 'production_EA',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh5@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'idManager' => '22222',
                    'idType' => '22',
                    'nameType' => 'production_Busbar',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh6@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'idManager' => '22223',
                    'idType' => '23',
                    'nameType' => 'production_MC',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh7@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'idManager' => '22224',
                    'idType' => '24',
                    'nameType' => 'production_PC',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh8@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'idManager' => '22225',
                    'idType' => '25',
                    'nameType' => 'production_CW',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh9@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                   [
                    'idManager' => '22226',
                    'idType' => '26',
                    'nameType' => 'production_TW',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh10@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],
                  [
                    'idManager' => '22227',
                    'idType' => '27',
                    'nameType' => 'production_QC',
                    'name' => 'phan quoc thanh',
                    'email' => 'thanh11@gmail.com',
                    'password' => bcrypt('123456'),
                    // 'quyen'=> 0,
                    'created_at' => new DateTime(),
                ],

	        ]
        	);
        // $this->call(UsersTableSeeder::class);
    }
}
