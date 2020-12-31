<?php

use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    public function run()
    {
        $title = ['GRUNDLAGEN', 'GESCHÄFTSMODELLE', 'GRÜNDUNG', 'AUS DER PRAXIS', 'KUNDENAKQUISE', 'WACHSTUM', 'TOOLS', 'VORLAGEN', 'COACHING'];
        for ($i = 0; $i < count($title); $i++){
            $thread = \App\Models\Thread::create([
                'title'     => $title[$i],
            ]);
        }
    }
}
