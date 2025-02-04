<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cardaloom - Cardápio digital</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('website/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('website/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('website/css/style.css')}}" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">Cardaloom</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Início</a>
                        <a href="#about" class="nav-item nav-link">Sobre nós</a>

                        <a href="#pricing" class="nav-item nav-link">Planos</a>
                        <a href="#contact" class="nav-item nav-link">Contato</a>
                    </div>
                    <a href="#pricing" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Começe grátis</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">O Cardápio digital que está revolucionando o negócio de muita gente</h1>
                            <p class="text-white pb-3 animated slideInDown">Conheça nosso sistema no plano grátis e veja como a técnologia pode ajudar o seu negócio ir ainda mais <b>longe!</b></p>
                            <a href="#pricing" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Começar agora</a>

                        </div>
                        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="{{asset('website/img/screenshot-1.png')}}" alt="">
                                <img class="img-fluid" src="{{asset('website/img/screenshot-2.png')}}" alt="">
                                <img class="img-fluid" src="{{asset('website/img/screenshot-3.png')}}" alt="">
                                <img class="img-fluid" src="{{asset('website/img/screenshot-4.png')}}" alt="">
                                <img class="img-fluid" src="{{asset('website/img/screenshot-5.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">Sobre nós</h5>
                        <h1 class="mb-4">#1 Cardápio digital facilitado</h1>
                        <p class="mb-4">Criamos algo que além de inovador é muito didático e simples de mexer, toda a estruturação é básico e dinâmica, proporcionando ao usuário um ambiente descomplicado</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex">
                                    <i class="fa fa-cogs fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">5872</h2>
                                        <p class="text-primary-gradient mb-0">Usuários ativos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="d-flex">
                                    <i class="fa fa-comments fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">3114</h2>
                                        <p class="text-secondary-gradient mb-0">Avaliações na internet</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#pricing" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Conheça nossos planos</a>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src="{{asset('website/img/about.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        <!-- Screenshot Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">

                        <h1 class="mb-4">Vale a pena ter um cardápio digital?</h1>
                        <p class="mb-4">Se o seu objetivo é aumentar as vendas, não perder mais clientes e ter um atendimento completo e diferenciado, você está no lugar certo</p>
                        <p><i class="fa fa-check text-primary-gradient me-3"></i><b>+ Velocidade </b> para receber pedidos</p>
                        <p><i class="fa fa-check text-primary-gradient me-3"></i><b> + Comodidade </b> para o cliente escolher seus itens</p>
                        <p class="mb-4"><i class="fa fa-check text-primary-gradient me-3"></i><b> + Barato </b> e sem burocracia na hora de contratar</p>
                        <a href="#pricing" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Começar agora</a>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                        <div class="owl-carousel screenshot-carousel">
                            <img class="img-fluid" src="{{asset('website/img/screenshot-1.png')}}" alt="">
                            <img class="img-fluid" src="{{asset('website/img/screenshot-2.png')}}" alt="">
                            <img class="img-fluid" src="{{asset('website/img/screenshot-3.png')}}" alt="">
                            <img class="img-fluid" src="{{asset('website/img/screenshot-4.png')}}" alt="">
                            <img class="img-fluid" src="{{asset('website/img/screenshot-5.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Screenshot End -->


        <!-- Process Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium"></h5>
                    <h1 class="mb-5">3 diferenciais da Cardaloom</h1>
                </div>
                <div class="row gy-5 gx-4 justify-content-center">
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-cog fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 mb-3">Plataforma veloz</h5>
                            <p class="mb-0">Uma plataforma que funciona 24h com um desempenho acima do normal proporcionando confiança e agilidade ao realizar pedidos</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-address-card fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 mb-3">Interface facilitada</h5>
                            <p class="mb-0">Menus simples que faz toda a diferença ao realizar cadastros de novos itens do pedido, até mesmo para pessoas que não tem muita vivência com a tecnologia</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-check fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 mb-3">Aviso de pedido a caminho</h5>
                            <p class="mb-0">O que o cliente mais espera é que seja avisado assim que o pedido sair do restaurante até sua casa, ele é notificado na hora</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Process Start -->




        <!-- Pricing Start -->
        <div class="container-xxl py-5" id="pricing">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Preços</h5>
                    <h1 class="mb-5">Escolha o seu plano</h1>
                </div>
                <div class="tab-class text-center pricing wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center bg-primary-gradient rounded-pill mb-5">
                        <li class="nav-item">

                                               </ul>
                    <div class="tab-content text-start">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="bg-light rounded">
                                        <div class="border-bottom p-4 mb-4">
                                            <h4 class="text-primary-gradient mb-1">Plano Básico</h4>
                                            <span>Restaurantes novos</span>
                                        </div>
                                        <div class="p-4 pt-0">
                                            <h1 class="mb-3">
                                                <small class="align-top" style="font-size: 22px; line-height: 45px;">R$</small>29,90<small
                                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mês</small>
                                            </h1>
                                            <div class="d-flex justify-content-between mb-3"><span>Até 50 pedidos mensais</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Atualizações gratuitas</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Suporte por e-mail</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-2"><span>30 dias grátis</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
<script class="ymp-script" src="https://api.yampi.io/v2/dreamlivery/public/buy-button/EYKYYBG55T/js"></script>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-light rounded border">
                                        <div class="border-bottom p-4 mb-4">
                                            <h4 class="text-primary-gradient mb-1">Plano Gold</h4>
                                            <span>Restaurantes já conhecidos</span>
                                        </div>
                                        <div class="p-4 pt-0">
                                            <h1 class="mb-3">
                                                <small class="align-top" style="font-size: 22px; line-height: 45px;">R$</small>44,90<small
                                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mês</small>
                                            </h1>
                                            <div class="d-flex justify-content-between mb-3"><span>Até 100 pedidos mensais</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Atualizações gratuitas</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Suporte por e-mail</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-2"><span>30 dias grátis</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
<script class="ymp-script" src="https://api.yampi.io/v2/dreamlivery/public/buy-button/4ZMPFVFBNZ/js"></script>                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-light rounded">
                                        <div class="border-bottom p-4 mb-4">
                                            <h4 class="text-primary-gradient mb-1">Plano Premium</h4>
                                            <span>Restaurantes que bombam</span>
                                        </div>
                                        <div class="p-4 pt-0">
                                            <h1 class="mb-3">
                                                <small class="align-top" style="font-size: 22px; line-height: 45px;">R$</small>59.90<small
                                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mês</small>
                                            </h1>
                                            <div class="d-flex justify-content-between mb-3"><span>Pedidos ilimitados</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Atualizações gratuitas</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Suporte por e-mail e whatsapp</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
<div class="d-flex justify-content-between mb-3"><span>30 dias grátis</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>

<script class="ymp-script" src="https://api.yampi.io/v2/dreamlivery/public/buy-button/SJM8E9GWHU/js"></script>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade p-0">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="bg-light rounded">
                                        <div class="border-bottom p-4 mb-4">
                                            <h4 class="text-primary-gradient mb-1">Plano Básico</h4>
                                            <span>Restaurantes novos</span>
                                        </div>
                                        <div class="p-4 pt-0">
                                            <h1 class="mb-3">
                                                <small class="align-top" style="font-size: 22px; line-height: 45px;">R$</small>328,90<small
                                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Ano</small>
                                            </h1>
                                            <div class="d-flex justify-content-between mb-3"><span>Até 50 pedidos mensais</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Atualizações gratuitas</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Suporte por e-mail</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-2"><span>30 dias grátis</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <a href="" class="btn btn-primary-gradient rounded-pill py-2 px-4 mt-4">Escolher</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-light rounded border">
                                        <div class="border-bottom p-4 mb-4">
                                            <h4 class="text-primary-gradient mb-1">Plano Avançado</h4>
                                            <span>Restaurantes já conhecidos</span>
                                        </div>
                                        <div class="p-4 pt-0">
                                            <h1 class="mb-3">
                                                <small class="align-top" style="font-size: 22px; line-height: 45px;">R$</small>493,90<small
                                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Ano</small>
                                            </h1>
                                            <div class="d-flex justify-content-between mb-3"><span>Até 100 pedidos mensais</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Atualizações gratuitas</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Suporte por e-mail</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-2"><span>30 dias grátis</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <a href="" class="btn btn-secondary-gradient rounded-pill py-2 px-4 mt-4">Escolher</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-light rounded">
                                        <div class="border-bottom p-4 mb-4">
                                           <h4 class="text-primary-gradient mb-1">Plano Premium</h4>
                                            <span>Restaurantes quem bombam</span>
                                        </div>
                                        <div class="p-4 pt-0">
                                            <h1 class="mb-3">
                                                <small class="align-top" style="font-size: 22px; line-height: 45px;">R$</small>658,90<small
                                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Ano</small>
                                            </h1>
                                            <div class="d-flex justify-content-between mb-3"><span>Pedidos ilimitados</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Atualizações gratuitas</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-3"><span>Suporte por e-mail e whatsapp</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
                                            <div class="d-flex justify-content-between mb-2"><span>Cardápio cadastrado pela nossa equipe</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>
<div class="d-flex justify-content-between mb-3"><span>30 dias grátis</span><i class="fa fa-check text-primary-gradient pt-1"></i></div>

                                            <a href="" class="btn btn-primary-gradient rounded-pill py-2 px-4 mt-4">Escolher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5" id="review">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Depoimentos</h5>
                    <h1 class="mb-5">O que nossos clientes estão falando?</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="{{asset('website/img/testimonial-1.jpg')}}" style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Luana de Cassia</h5>
                                <p class="mb-1">Pizzaria imperio - MS</p>
                                <div>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">“Implementar o Cardaloom foi uma das melhores decisões que tomamos para a nossa pizzaria. Antes, enfrentávamos problemas com a atualização de itens e muitas vezes os clientes tinham que ligar para fazer pedidos, o que gerava filas e atrasos. Com o novo sistema, tudo ficou muito mais ágil e organizado. Nossos clientes agora podem visualizar o cardápio completo, fazer pedidos diretamente pelo site e ainda personalizar as opções. Isso não só facilitou o nosso dia a dia, como também aumentou as vendas e melhorou a satisfação dos nossos clientes. É incrível ver como a tecnologia pode transformar o nosso negócio!”</p>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="{{asset('website/img/testimonial-2.jpg')}}" style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Anderson Sacilotto</h5>
                                <p class="mb-1">Hamburgueria Prime Beef</p>
                                <div>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">Assim que conhecemos a Cardaloom nós conseguimos otimizar o tempo da equipe e melhorar o atendimento. O impacto positivo nas vendas e na satisfação dos clientes foi imediato. Estamos muito satisfeitos com os resultados e como a tecnologia ajudou a nossa hamburgueria a crescer.</p>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="{{asset('website/img/testimonial-3.jpg')}}" style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Kleber Santos</h5>
                                <p class="mb-1">Pastel de Vento e CIA - RS</p>
                                <div>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">O Cardaloom tornou o processo de pedidos muito mais eficiente e amigável para os nossos clientes. Eles adoram a facilidade de navegar pelo cardápio e fazer pedidos diretamente do celular. Para nós, a gestão do cardápio ficou muito mais simples, e conseguimos atualizar ofertas e promoções com apenas alguns cliques. A melhora no atendimento e o aumento nas vendas foram notáveis. O Cardaloom não só ajudou a nossa pastelaria a prosperar, mas também elevou a satisfação dos nossos clientes a um novo patamar. Estamos entusiasmados com o impacto positivo que essa ferramenta trouxe para o nosso negócio!</p>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="{{asset('website/img/testimonial-4.jpg')}}" style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Ana Paula</h5>
                                <p class="mb-1">Casa do Hotdog - ES</p>
                                <div>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">Adotar o Cardaloom na nossa dogueria foi uma das melhores decisões que já tomamos! O sistema de cardápio online transformou a forma como atendemos nossos clientes. Agora eles podem personalizar seus pedidos e finalizar tudo em questão de minutos, diretamente pelo celular. O processo ficou mais ágil, reduzimos erros nos pedidos e a equipe conseguiu focar mais no preparo, o que melhorou a qualidade do serviço. Desde que implementamos o Cardaloom, nossas vendas aumentaram e o feedback dos clientes tem sido super positivo. Sem dúvida, essa ferramenta foi essencial para o crescimento e sucesso da nossa dogueria!"</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5" id="contact">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Ficou alguma dúvida?</h5>
                    <h1 class="mb-5">Entre em contato</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <p class="text-center mb-4">Responderemos o mais breve possível
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Seu nome</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Seu e-mail</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Assunto</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Mensagem</label>

                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary-gradient rounded-pill py-3 px-5" type="submit">Enviar mensagem</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Localização</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Cidade de Americana - SP</p>
                        <p><i class="fa fa-phone-alt me-3"></i>(19) 99330-1294</p>
                        <p><i class="fa fa-envelope me-3"></i>duvidas@cardaloom.com.br</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">

        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('website/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('website/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('website/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('website/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('website/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('website/js/main.js')}}"></script>
</body>

</html>
