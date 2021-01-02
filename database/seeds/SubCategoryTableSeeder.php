<?php

use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $sub = SubCategories::create([
            'parent'            => $categories[0]->id,
            'name'              => 'MINDSET',
            'slug'              => 'mindset',
            'description'       => 'Grundlegendes Gewinner-Mindset entscheidet meistens zwischen Erfolg und Misserfolg. Ein Business braucht ein solides Fundament auf dem es errichtet wird - und das ist deine Einstellung zum Erfolg, deine Sicht auf die Gegebenheiten und deine Motivation.',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[1]->id,
            'name'              => 'SMMA',
            'slug'              => 'smma',
            'description'       => 'Wahrscheinlich ist Social Media Marketing als Agenturdienstleistung eines der beliebtesten Geschäftsmodelle derzeit. Das ist auch kein Wunder, denn der Bedarf ist riesig und die Startkosten gering.'
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[1]->id,
            'name'              => 'AMAZON',
            'slug'              => 'amazon',
            'description'       => 'Amazon ist mit Abstand das größte Kaufhaus der Welt. Mit Innovation und aggressiven Expansionsstrategien hat es Amazon geschafft, dass allein in Deutschland 44 Millionen Menschen regelmäßig dort einkaufen - das sind 85% aller deutschen E-Commerce-Nutzer. Hier kann es sich durchaus lohnen dabei zu sein.'
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[2]->id,
            'name'              => 'OM-AGENTUR',
            'slug'              => 'om-agentur',
            'description'       => 'Online-Marketing-Agenturen erscheinen zahlreich am Markt - die meisten davon verschwinden genauso schnell wieder. Einige Unternehmer sind allerdings langfristig sehr erfolgreich mit der eigenen Agentur und erzählen hier exklusiv, was sie so erfolgreich macht.'
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[3]->id,
            'name'              => 'DIREKTANSPRACHE',
            'slug'              => 'direktansprache',
            'description'       => 'Wenn du dein Angebot nicht verkaufen kannst, dann ist es nichts wert. Zahlreiche Unternehmer stagnieren in ihrem Business, weil sie keine neuen Kunden bekommen. Unsere Experten verraten dir, wie du dir um Neukunden keine Gedanken mehr machen brauchst.'
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[3]->id,
            'name'              => 'LIVE-BERATUNGEN',
            'slug'              => 'live-beratungen',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[4]->id,
            'name'              => 'POSITIONIERUNG',
            'slug'              => 'positionierung',
            'description'       => 'Positionierung ist so wichtig, und doch wird sie am häufigsten unterschätzt. Warum man sich als Dienstleister unbedingt positionieren sollte und wie man das am Besten machen sollte, erzählen euch hier unsere Experten.'
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[5]->id,
            'name'              => 'FOTO & VIDEO',
            'slug'              => 'foto-video',
            'description'       => 'Für die gute Darstellung für dich und deine Kunden sind die richtigen Quellen einfach super hilfreich und Gold wert. Hier stelle gebe ich dir zahlreiche Möglichkeiten an die Hand, mit denen hochwertiges Bild- und Video-Material günstig, oder gar kostenfrei erhälst.'
        ]);
    }
}
