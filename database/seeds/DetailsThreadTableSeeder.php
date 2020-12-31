<?php

use Illuminate\Database\Seeder;

class DetailsThreadTableSeeder extends Seeder
{
    public function run()
    {
        $list1 = ['MINDSET', 'ERFOLGSGESETZE', 'IDEEN ENTWICKELN UND TESTEN', 'BUSINESS VS. 9-TO-5', 'RAUS AUS DEM HAMSTERRAD'];
        $list2 = ['AGENTURMODELLE', 'OPTIMIERUNGEN', 'SMMA', 'WEBDESIGN', 'NEUKUNDENGEWINNUNG', 'SHOPS UND ECOMMERCE'];
        $list3 = ['BUSINESSPLAN', 'RECHTSFORMEN', 'STEUERN', 'RECHTLICHES'];
        $list4 = ['EINBLICKE IN AGENTUREN', 'SOCIAL MEDIA STRATEGIEN', 'WEBDESIGN', 'FUNNEL-STRATEGIEN', 'ONLINE-ANZEIGEN', 'MESSENGER-BOTS'];
        $list5 = ['PROFITABLE BRANCHEN', 'DIREKTANSPRACHE', 'LINKEDIN', 'XING', 'ANZEIGENSCHALTUNG', 'TESTPHASEN'];
        $list6 = ['POSITIONIERUNG', 'SPEZIALISIERUNG', 'AUTOMATION', 'OUTSOURCING', 'FÜHRUNGSQUALITÄTEN', 'SKALIERUNG'];
        $list7 = ['PRODUKTIVITÄT', 'EFFIZIENZ', 'AFFILIATE', 'RECHERCHE', 'BÜRO', 'PROFITABILITÄT'];
        $list8 = ['ANSCHREIBEN', 'ANGEBOTSFORMULARE', 'AGBS', 'PREISLISTEN', 'RECHTLICHES', 'DESIGNS'];
        $list9 = ['LIVE-SESSIONS', 'STREAMS', 'ASK ME ANYTHING', 'GRUPPENCOACHING', 'BEST PRACTICES', 'EXPERTEN-INTERVIEWS'];
        for ($i = 0; $i < count($list1); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 1,
                'detail'        => $list1[$i]
            ]);
        }
        for ($i = 0; $i < count($list2); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 2,
                'detail'        => $list2[$i]
            ]);
        }
        for ($i = 0; $i < count($list3); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 3,
                'detail'        => $list3[$i]
            ]);
        }
        for ($i = 0; $i < count($list4); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 4,
                'detail'        => $list4[$i]
            ]);
        }
        for ($i = 0; $i < count($list5); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 5,
                'detail'        => $list5[$i]
            ]);
        }
        for ($i = 0; $i < count($list6); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 6,
                'detail'        => $list6[$i]
            ]);
        }
        for ($i = 0; $i < count($list7); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 7,
                'detail'        => $list7[$i]
            ]);
        }
        for ($i = 0; $i < count($list8); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 8,
                'detail'        => $list8[$i]
            ]);
        }
        for ($i = 0; $i < count($list9); $i++){
            $details = \App\Models\DetailsThread::create([
                'thread_id'     => 9,
                'detail'        => $list9[$i]
            ]);
        }
    }
}
