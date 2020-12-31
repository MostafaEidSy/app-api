<?php

use Illuminate\Database\Seeder;

class ExpertTableSeeder extends Seeder
{
    public function run()
    {
        $exp = \App\Models\Expert::create([
            'name'          => 'CRISTIAN ANDREI GHENTA',
            'description'   => 'Cristian Andrei Ghenta ist Serial Entrepreneur, Selfmade Multimillionär und mehrfacher Gewinner des Clickfunnels 8-Figure-Award. Als Mentor hat er bereits vielen Jungunternehmern zu massivem Erfolg verholfen und bietet weiterhin exklusives Mentoring für Nachwuchstalente an.',
            'image'         => 'OMA-Cristian-Andrej-Ghenta.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'PHILIPP LANG',
            'description'   => 'Philipp Lang ist Inhaber einer Marketing-Agentur für Lead-Generierung über Social-Media-Kanäle und Coach zahlreicher Unternehmer, die mit Social-Media-Marketing das 9-to-5 Hamsterrad hinter sich lassen konnten.',
            'image'         => 'OMA-Philipp-Lang.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'MANUEL KRETSCHMER',
            'description'   => 'Mit über 100 Millionen Umsatz pro Jahr auf Amazon gehört Manuel Kretschmer mit seiner Agentur seit 4 Jahren zu den führenden Experten in diesem Bereich. Mit seiner innovativen Schulungsplattform ama-X schult er Unternehmen und Konzerne mit einem planbaren Skalierungssystem und hat bereits 4 eigene Marken erfolgreich auf- und außerhalb von Amazon aufgebaut.',
            'image'         => 'OMA-Manuel-Kretschmar.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'ERIC PROMM',
            'description'   => 'Eric Promm ist bekannt für die Umsatzsteigerungen, die er seinen Kunden mit seiner Agentur Cashflow Marketing ermöglicht. Dabei begeistert er die Neukunden ohne in irgendeiner Weise aggressive oder plumpe Verkaufsmaschen einzusetzen.',
            'image'         => 'OMA-Eric-Promm.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'PASCAL RÄHSE',
            'description'   => 'Pascal Rähse ist Inhaber und Geschäftsführer von CodingArts, einer Agentur in den Bereichen Webdesign und Online Marketing. Mit seinem YouTube Kanal begeistert er über 6.000 Abonnenten mit den Themen Marketing und Unternehmens-Aufbau.',
            'image'         => 'OMA-Pascal-Raehse.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'TIM HORST',
            'description'   => 'Tim Horst versteht es wie kein Zweiter aus einem Abschluss eine hohe Customer Lifetime Value zu generieren. Sein Credo "Auf der Extrameile gibt es keine Staus" hat er bereits in vielen Vertrieben erfolgreich etabliert und die Umsätze durch Abschlüsse, den daraus entstehenden Empfehlungen und einem einzigartigen Kunden­rück­gewinnungs­konzept massiv gesteigert.',
            'image'         => 'OMA-Tim-Horst.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'TANJA & STEPHANIE FALKNER',
            'description'   => 'Durch ihre Leidenschaft zum Reisen erkannten die österreichischen Schwestern früh, dass der traditionelle 9-to-5 Job nicht das Richtige für sie ist. Mit ihrem Social Media Marketing Unternehmen konnten sie sich ortsunabhängig einen Kundenstamm aufbauen, den sie international mit erfolgreichen Marketingstrategien zur Leadgenerierung, Umsatzsteigerung und Markenpräsenz unterstützen und gleichzeitig die Welt bereisen.',
            'image'         => 'OMA-Marketing-Minds.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'HANS SCHNEIDER',
            'description'   => 'Hans Schneider ist Online-Marketing-Consultant & CEO der Performance-Marketing-Agentur HS ONLINE MARKETING. Mit seinem Expertenteam hilft er Unternehmern & Selbstständigen zu mehr Sichtbarkeit im Internet, durch messbare PPC-Strategien. Seine Digital Advertising Masterclass gilt als die Kaderschmiede für erfolgreiche Online-Marketing-Berater von morgen.',
            'image'         => 'OMA-Hans-Schneider.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'JOSHUA KLATT',
            'description'   => 'Joshua Klatt ist erfolgreicher Online-Marketer und Gründer der Agentur Siegerkonzept. Durch gezielte Positionierung und frischen Akquisestrategien unterstützt er Unternehmer in der Neukundengewinnung und Skalierung. Joshua beweist immer wieder aufs Neue, dass es keine riesigen Werbebudgets braucht um massive Umsätze zu generieren.',
            'image'         => 'OMA-Joshua-Klatt.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'ANELA CAREVIC & ANDREA LEICK',
            'description'   => 'Bekannt durch erfolgreiche Facebook Gruppen-Strategien, helfen Anela und Andrea Unternehmern dabei, wie sie profitable Kunden über Facebook, Instagram & Co. gewinnen. Mit ihrer Reichweite sind sie angesehene Experten für Social Media Hacks.',
            'image'         => 'OMA-Anela-Andrea.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'VIKTOR SIEMENS',
            'description'   => 'Viktor Siemens ist Marketing Coach und Experte in der Vermarktung von Hochpreisdienstleistungen. Mit seiner Agentur hilft er zahlreichen Unternehmern durch die richtigen Strategien zu wachsen. Sein Ziel für 2019 ist es, 100 Menschen auf ein Jahreseinkommen von 100.000€ zu verhelfen.',
            'image'         => 'OMA-Viktor-Siemens.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'JUDITH WITTMANN',
            'description'   => 'Seit 13 Jahren in der Branche hilft die Mrs. Markenstrategin Unternehmern und Kommunikations­profis dabei, Wellen mit dem eigenen Business zu schlagen. Bisher ohne Vertriebsmaßnahmen erfolgreich, ist die Unternehmerin selbst von der Markenpsychologie absolut fasziniert und kennt den Unterschied des Markensogs.',
            'image'         => 'OMA-Judith-Wittmann.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'DANIEL HAUBER & STEFAN BEIER',
            'description'   => 'Daniel Hauber und Stefan Beier sind besonders in der Direktvertriebs-Branche gefragte Video Marketing Trainer und zählen mit ihrem ungewöhnlichen Stil zu den Online Unternehmern der neuen Generation. Sie verfügen in ihrem Segment über eine kombinierte Praxis-Erfahrung von 13 Jahren im Verkauf, Internet- und speziell Video Marketing und vermitteln dadurch Kompetenz aus der Praxis für die Praxis.',
            'image'         => 'OMA-Babba-Media.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'ANDREAS KÖNIG',
            'description'   => 'Andreas König ist Experte im Bereich E-Commerce und generiert damit Millionen­umsätze mit hohen Profitmagen. Er absolvierte vor zwei Jahren sein Masterstudium und gab sein Wissen schon immer gerne weiter. Andreas hat mit seinem Partner eine Traineeship Case Study entwickelt, diese zeigt seinen Weg im Detail und hilft anderen Unternehmern im E-Commerce zum Erfolg.',
            'image'         => 'OMA-Andreas-Koenig.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'PAVEL MASLOBOEW',
            'description'   => 'Pavel Masloboew ist Gründer und CEO von Instafabrik, einer der führenden Instagram Marketing Agenturen im deutschsprachigen Raum. Um seinen Kunden massive Steigerungen in Umsatz und Engagement zu liefern, hat er 2019 einen plattform­übergreifenden Chatbot entwickelt und damit den Markt revolutioniert.',
            'image'         => 'OMA-Pavel-Masloboew.png'
        ]);
        $exp = \App\Models\Expert::create([
            'name'          => 'KATHARINA KISLEWSKI',
            'description'   => 'Vom 9-to-5 Job zur erfolgreichen Online Unternehmerin. Der Aufbau einer aktiven Social Media Community war bei Katharina Kislewski damals der Schlüssel zum Erfolg. Du denkst schon lange darüber nach eine Social Media Community aufzubauen? Super Idee! Was du dabei bedenken musst und wie du am besten vorgehst, erklärt dir Katharina Schritt-für-Schritt in ihrem Vortrag.',
            'image'         => 'OMA-Katharina-Kislewski.png'
        ]);
    }
}
