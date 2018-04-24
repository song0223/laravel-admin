<?php

use Illuminate\Database\Seeder;
use App\Admin\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = $this->getData();
        foreach ($items as $item) {
            $user_model = User::find($item['id']);
            if (!isset($user_model)) {
                $user_model = new User();
                $user_model->id = $item['id'];
            }
            $user_model->name = $item['name'];
            $user_model->email = $item['email'];
            $user_model->password = $item['password'];
            $user_model->role_id = $item['role_id'];
            $user_model->save();
        }
    }

    private function getData()
    {
        return [
            [
                'id'   => 1,
                'name' => 'admin',
                'email' => 'admin@xx.com',
                'password' => '$2y$10$VTRap.PhJ.XSdVnNFVlTnOBsEIejcS94px9yEPLgjFIuv6z3JZpIm',
                'role_id' => '1',
            ]
        ];
    }
}
