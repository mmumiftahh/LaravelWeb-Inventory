<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\User;
use App\Type;
use App\Room;
use App\Item;
use App\Level;
use App\Employee;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        //input dummy data di table level
        Level::create(['name'=>'admin']);
        Level::create(['name'=>'operator']);

        //input dummy data di table user        
         User::create([
            'name'=>'Administrator',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'level_id'=>1,
        ]);

        User::create([
            'name'=>'Operator',
            'email'=>'operator@gmail.com',
            'password'=>Hash::make('operator123'),
            'level_id'=>2,
        ]);

        //input dummy data di table type
        for($i = 1; $i <= 10; $i++){
            Type::create([
                'name'=>'TYPE - '.$i,
                'description'=>$faker->text,
            ]);
        }

        //input dummy data di table room
        for($i = 1; $i <= 10; $i++){
            Room::create([
                'name'=>'ROOM - '.$i,
                'description'=>$faker->text,
            ]);
        }

        //input dummy data di table employee
        for($i = 1; $i <= 10; $i++){
            Employee::create([
                'name'=>$faker->name,
                'nip'=>'1160500'.$i,
                'username'=>'1160500'.$i,
                'password'=>Hash::make("1160500".$i),
                'address'=>$faker->address,
            ]);
        }

        for($i = 1; $i <= 10; $i++){
            Item::create([
                'name'=>$faker->name,
                'total'=>'100',
                'room_id'=>$i,
                'type_id'=>$i,
                'user_id'=>1,
                'description'=>$faker->text,
                'registration_date'=>Carbon::now(),
            ]);
        }

    }
}
