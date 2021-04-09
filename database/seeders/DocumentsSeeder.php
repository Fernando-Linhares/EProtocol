<?php
namespace Database\Seeders;

use App\Models\Document;
use App\Models\User;
use App\Models\Historic;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++):
            Document::create([
                'protocol'=>67221,'number'=>rand(1000,5000),'title'=>'PAM',
                'date'=>date("Y-m-d"),'vol'=>rand(1,50),'user_id'=>2
                ]);
        endfor;
    }
}
