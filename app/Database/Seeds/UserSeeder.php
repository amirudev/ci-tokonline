<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 1000; $i++){
            $data = [
                'username' => $faker->userName,
                'password' => $faker->password,
                'avatar' => NULL,
                'role' => 0,
                'created_at' => date("Y-m-d H:i:s")
            ];
    
            $this->db->table('user')->insert($data);
        }
    }
}
?>