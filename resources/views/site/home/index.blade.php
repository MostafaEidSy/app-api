@extends('site.layouts.home')

@section('title')
    Online-Marketing-Agentur Mastermind – Rund um Online-Marketing
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/home.css')}}">
@endsection

@section('content-header')
    <div class="title-top">
        <h5>
            {{__('home.HEADER_MIDDLE_TITLE_1')}}
            <br>
            {{__('home.HEADER_MIDDLE_TITLE_2')}}
            <br>
            {{__('home.HEADER_MIDDLE_TITLE_3')}}
        </h5>
    </div>
    <div class="clearfix"></div>
    <div class="title-middle">
        <div class="title-an wow animate__animated animate__fadeInLeft">
            <h2>{{__('home.AGENTUR-MASTERMIND')}}</h2>
            <h3>{{__('home.DIE_MASTERMIND')}}</h3>
            <h3>{{__('home.EXPERTEN_VERRATEN')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="mb-5"></div>
    <div class="mb-5"></div>
    <div class="title-bottom">
        <div class="wow animate__animated animate__fadeInRight">
            <h3>{{__('home.JETZT_KOSTENLOS')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="link-reg">
        <div class="wow animate__animated animate__fadeInRight">
            <a href="{{route('home.getRegister')}}">
                <span>{{__('home.JETZT_ZUGANG')}}</span>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="mb-5"></div>
    <div class="icon text-center">
        <span><i class="fas fa-chevron-down"></i></span>
    </div>
@endsection

@section('content')
    <section class="section-learn">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-7 offset-md-5 mb-5">
                        <div class="info">
                            <h6>{{__('home.GIB_DEINEM_BUSINESS')}}</h6>
                            <h2>{{__('home.WERDE_ZUM_ÜBERFLIEGER')}}</h2>
                            <div class="hr"></div>
                            <div class="box-title">
                                <div class="title">
                                    <h3>{{__('home.LERNE_VON_DEN_BESTEN')}}</h3>
                                    <div class="hr2"></div>
                                    <p>{{__('home.MEHR_ALS')}}</p>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <h6 class="text-right">
                                <i class="fas fa-chevron-right"></i>
                                <a class="scroll" href="#zugang">{{__('home.JETZT_ZUGANG_SICHERN')}}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-die">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h2>{{__('home.DIE_THEMEN')}}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-hr">
                        <div class="hr"></div>
                        <div class="border-hr"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-info-ser" id="themen">
        <div class="container">
            <div class="row">
                @foreach($threads as $thread)
                    <div class="col-md-4">
                        <div class="single-ser">
                            <h4>{{$thread->title}}</h4>
                            <ul class="list-unstyled">
                                @foreach($thread->details as $detail)
                                    <li><i class="fas fa-chevron-right fa-fw"></i> <span>{{$detail->detail}}</span></li>
                                @endforeach
                                    <li><i class="fas fa-chevron-right fa-fw"></i> <span>...UND MEHR</span></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-admin">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="box-hr">
                        <div class="hr"></div>
                        <div class="border-hr"></div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="title">
                        <h2>{{__('home.DER_HOST')}}</h2>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img-admin">
                        <img src="{{asset('site/img/OMA/OMA-Alexander-Steinhauer.png')}}" alt="Alexander Steinhauer">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="info-admin">
                        <h3>{{__('home.ALEXANDER_STEINHAUER')}}</h3>
                        <h4>
                            UMSATZ- UND VERTRIEBSEXPERTE
                            <br>
                            FOUNDER/CEO DER AGENTUR AS CONSULTING & MARKETING
                        </h4>
                        <p>Nach 12 spannenden Jahren im Online-Marketing gründete Alexander Steinhauer seine Performance-Marketing-Agentur. Durch seinen fundierten vertrieblichen Hintergrund gelang es ihm Vertrieb und Marketingstrategien so gezielt miteinander zu kombinieren, dass er nicht nur für seine Kunden, sondern auch für Agenturen starke Mechanismen zur Neukundengewinnung einsetzt.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sic" id="zugang">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h2>{{__('home.SICHERE_DIR_JETZT')}}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-section">
                        <div class="box-img">
                            <h3>
                                TESTE JETZT DIE
                                <br>
                                MASTERMIND
                                <br>
                                GRATIS!
                            </h3>
                            <div class="mb-3"></div>
                            <p>Wenn Du dich JETZT registrierst, bleibt die Basis-Mitgliedschaft dauerhaft kostenfrei.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="box-link">
                            <a href="{{route('home.getRegister')}}" class="btn btn-warning btn-block">JETZT REGISTRIEREN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-die">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h2>DIE EXPERTEN</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-hr">
                        <div class="hr"></div>
                        <div class="border-hr"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-theme">
        <div class="container">
            <div class="row">
                @foreach($experts as $expert)
                    <div class="col-md-4">
                        <div class="single-theme">
                            <div class="name">{{$expert->name}}</div>
                            <div class="info">
                                <div class="img-theme">
                                    <img src="{{asset('uploads/experts/' . $expert->image)}}" alt="{{$expert->name}}">
                                </div>
                                <div class="description">
                                    <p>{{$expert->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-4">
                    <div class="single-theme">
                        <div class="name">...UND NOCH MEHR</div>
                        <div class="info">
                            <div class="img-theme">
                                <img src="{{asset('site/img/OMA/OMA-Anonym.png')}}" alt="...UND NOCH MEHR">
                            </div>
                            <div class="description">
                                <a href="#themen">SEI GESPANNT AUF UNSERE NÄCHSTEN INTERVIEW-GÄSTE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="box-link">
                        <a href="{{route('home.getRegister')}}" class="btn btn-block">JETZT REGISTRIEREN</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-die">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h2>FAQ</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-hr">
                        <div class="hr"></div>
                        <div class="border-hr"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-accordion">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <span class="num">1</span>
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Kann ich wirklich die Mastermind für 1€ testen?
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Ja, du zahlst lediglich nur 1€ und hast 10 Tage lang uneingeschränkten Zugriff auf die gesamten Mastermind-Inhalte und die Live-Sessions. Wenn du dich dazu entscheidest auch nach dieser Testphase die Mastermind zu nutzen, dann kostet das 47€ im Monat.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <span class="num">2</span>
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Sind alle Inhalte jederzeit verfügbar?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Ja. Die Mastermind wächst natürlich mit den Mitgliedern, da wir immer auf eure Wünsche und Fragen eingehen. Alle Inhalte, die wir besprechen sind dauerhaft im umfangreichen Mitgliederbereich abrufbar.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <span class="num">3</span>
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Ich habe noch keine Agentur. Ist die Mastermind trotzdem was für mich?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Absolut! In der Mastermind sprechen wir über alle Stadien deines Unternehmens, also auch über die Gründung und wie du schnell und zuverlässig an Kunden kommst. Egal wo du gerade mit deinem Unternehmen stehst: Du erhälst garantiert wertvollen Content.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFor">
                        <span class="num">4</span>
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                                Kann ich die Agentur Mastermind empfehlen und Geld verdienen?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordionExample">
                        <div class="card-body">
                            Ja, wir haben ein umfangreiches Partnerprogramm eingerichtet, das bequem über Digistore24 abgerechnet wird. Du kannst dich dafür hier registrieren:
                            <br>
                            <a href="#">https://agentur-mastermind.com/partnerprogramm/</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-footer">
        <div class="container">
            <div class="title">
                <h2>KONTAKT</h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info">
                            <h6>
                                DIE AGENTUR MASTERMIND
                                <br>
                                WIRD PRÄSENTIERT VON
                                <br>
                                AS CONSULTING & MARKETING
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <h6>
                                T: +49(0) 4131 927 90 660
                                <br>
                                M: KONTAKT@ASC-MARKETING.COM
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-3">
                        <div class="info">
                            <img src="{{asset('site/img/Agentur-Mastermind-Logo.png')}}" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="social">
                <p>
                    <a href="#" target="_blank"><i class="fab fa-facebook fa-fw"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram fa-fw"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin fa-fw"></i></a>
                </p>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function () {
            $('.section-accordion .card .collapse').on('show.bs.collapse', function () {
                $(this).parent().addClass('showFQ');
            });
            $('.section-accordion .card .collapse').on('hide.bs.collapse', function () {
                $(this).parent().removeClass('showFQ');
            });
        });
    </script>
@endsection
