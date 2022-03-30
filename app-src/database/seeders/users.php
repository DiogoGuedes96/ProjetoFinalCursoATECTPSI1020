<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'user_name' => 'user1',
            'email' => 'user1@edu.atec.pt',
            'password' => bcrypt('1234'),
            'user_token' => '2345tyhgf324566yuhgt678iuyjhr546t65432ewfgfghu7654'
        ]);
        DB::table('user')->insert([
            'user_name' => 'user2',
            'email' => 'user2@edu.atec.pt',
            'password' => bcrypt('1234'),
            'user_token' => '2345tyhgf32456io0897yguhjkip9876tygvjbhkou8976tyughij'
        ]);
        DB::table('user')->insert([
            'user_name' => 'user3',
            'email' => 'user3@edu.atec.pt',
            'password' => bcrypt('1234'),
            'user_token' => 'sadfhgu78654wertyu87654rdgfhjkuiu8765rtyasdert543234565643wq'
        ]);
        DB::table('user')->insert([
            'user_name' => 'user4',
            'email' => 'user4@edu.atec.pt',
            'password' => bcrypt('1234'),
            'user_token' => 'djklsajdkas86723kjahdsdhkahsdhsahkd12932kajdasjdoasjdo2130'
        ]);
        DB::table('user')->insert([
            'user_name' => 'user5',
            'email' => 'user5',
            'password' => bcrypt('1234'),
            'user_token' => 'skndfoksdnfoksdn34242342knknoklnn4okn2k3n4oldsamlm231'
        ]);

        DB::table('user')->insert([
            'user_name' => 'Vitor',
            'email' => 'vitor.custodio.0001081@edu.atec.pt',
            'password' => bcrypt('1234'),
            'user_token' => 'skndfoksdnfoksdn34242342knknoklnn4okn2k3n4oldsamlm231',
           // 'user365_id' =>'124',
            //'reset'=>false
        ]);
        DB::table('user')->insert([
            'user_name' => 'super',
            'email' => 'super@super',
            'password' => bcrypt('1234'),
            'user_token' => 'skndfoksdnfoksdn34242342knknoklnn4okn2k3n4oldsamlm231',
        ]);
    }
}
