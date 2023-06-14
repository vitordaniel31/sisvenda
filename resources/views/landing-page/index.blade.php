<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menina dos Bottons</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template-landing-page/dist/css/style.css') }}">
    <script src="https://unpkg.com/animejs@2.2.0/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner" style="display: flex; justify-content: space-between;">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
                                <img src="{{ asset('template-landing-page/src/images/icon.png') }}" width="60px"/> 
                            </a>
                        </h1>
                    </div>
                    <a class="button button-sm button-primary button-shadow" href="#">login</a>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
                        <div class="hero-copy">
                            <img src="{{ asset('template-landing-page/src/images/logo.png') }}"/>
                            <p class="hero-paragraph">Adquira bottons personalizados exclusivos para promover sua marca,
                                causa ou evento! Nossos bottons são uma forma criativa e eficaz de destacar sua mensagem
                                de forma visualmente atraente.</p>
                        </div>
                        <div class="hero-illustration">
                            <div class="hero-shape hero-shape-1">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                                    <circle class="anime-element fadeup-animation" cx="20" cy="20" r="20" fill="#F9A8C9"
                                        fill-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="hero-shape hero-shape-2">
                                <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                                    <circle class="anime-element fadeup-animation" cx="44" cy="44" r="44" fill="#F0F47E"
                                        fill-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="hero-main-shape">
                                <svg width="940" height="647" viewBox="0 0 940 647" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow:visible">
                                    <defs>
                                        <!-- Cor do circulo de fundo  -->
                                        <linearGradient x1="100%" y1="0%" x2="0%" y2="100%" id="hero-illustration-a">
                                            <stop stop-color="#31AFF8" offset="0%" />
                                            <stop stop-color="#38B6FF" offset="100%" />
                                        </linearGradient>
                                        <!-- Cor do circulo de fundo pequeno 1  -->
                                        <linearGradient x1="89.764%" y1="16.809%" x2="11.987%" y2="82.178%"
                                            id="hero-illustration-b">
                                            <stop stop-color="#FFC966" offset="0%" />
                                            <stop stop-color="#FFC966" offset="100%" />
                                        </linearGradient>
                                        <!-- Cor do circulo de fundo pequeno 2  -->
                                        <linearGradient x1="100%" y1="23.096%" x2="4.439%" y2="96.586%"
                                            id="hero-illustration-c">
                                            <stop stop-color="#1ADAB7" offset="0%" />
                                            <stop stop-color="#55EBD0" offset="100%" />
                                        </linearGradient>
                                        <!-- Circuloszinhos  -->
                                        <circle id="hero-illustration-r" cx="28" cy="28" r="28" />

                                        <circle id="hero-illustration-t" cx="36" cy="36" r="36" />

                                        <circle id="hero-illustration-v" cx="28" cy="28" r="28" />

                                        <circle id="hero-illustration-x" cx="24" cy="24" r="24" />

                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <!-- animação circulo -->
                                        <path class="anime-element stroke-animation"
                                            d="M600,300 C600,465.685425 465.685425,600 300,600 C134.314575,600 1.3749042e-14,465.685425 3.60373576e-15,300 C-6.54157051e-15,134.314575 134.314575,-1.29473326e-14 300,-2.30926389e-14 C465.685425,-3.32379452e-14 600,134.314575 600,300 Z"
                                            fill="url(#hero-illustration-a)" stroke="#4950F6" />
                                        <g transform="translate(435 518)">
                                            <circle class="anime-element fadeup-animation"
                                                fill="url(#hero-illustration-b)" cx="106" cy="32" r="32" />
                                            <circle class="anime-element fadeup-animation"
                                                fill="url(#hero-illustration-c)" cx="12" cy="117" r="12" />
                                        </g>
                                        <image xlink:href="template-landing-page/src/images/bottons2.png" x="-270" y="-10" width="1000" height="600" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="features section">
                <div class="container">
                    <div class="features-inner section-inner">
                        <div class="features-header text-center">
                            <div class="container-sm">
                                <h2 class="section-title mt-0">Nosso produtos</h2>
                                <p class="section-paragraph">Oferecemos uma ampla variedade de opções de personalização,
                                    incluindo diferentes tamanhos e designs. Você pode escolher entre uma
                                    variedade de materiais duráveis e de alta qualidade, garantindo que seus bottons
                                    tenham uma aparência profissional e resistam ao uso diário.</p>
                            </div>
                        </div>
                        <div class="features-wrap">
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner" style="text-align: center;">
                                    <img src="{{ asset('template-landing-page/src/images/panda.png') }}" style="display: block; margin: 0 auto;"/>
                                    <h4 class="feature-title h3-mobile mb-8">Bottons 37mm</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>4,00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>10,00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>15,00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>25,00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">20</th>
                                                <td>40,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner" style="text-align: center;">
                                    <image src="{{ asset('template-landing-page/src/images/porco.png') }}" style="display: block; margin: 0 auto;"/> 
                                    <h4 class="feature-title h3-mobile mb-8">Bottons 25mm</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2,00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>15,00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">30</th>
                                                <td>30,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner" style="text-align: center;">
                                    <img src="{{ asset('template-landing-page/src/images/borboleta.png') }}" style="display: block; margin: 0 auto;"/>
                                    <h4 class="feature-title h3-mobile mb-8">Bottons Holográficos</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>5,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonials section">
                <div class="testimonials-shape testimonials-shape-1">
                    <svg width="280" height="280" viewBox="0 0 280 280" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient x1="100%" y1="0%" x2="0%" y2="100%" id="testimonials-shape-1">
                                <stop stop-color="#31AFF8" offset="0%" />
                                <stop stop-color="#38B6FF" offset="100%" />
                            </linearGradient>
                        </defs>
                        <circle cx="140" cy="685" r="140" transform="translate(0 -545)"
                            fill="url(#testimonials-shape-1)" fill-rule="evenodd" />
                    </svg>
                </div>
                <div class="testimonials-shape testimonials-shape-2">
                    <svg width="125" height="107" viewBox="0 0 125 107" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <circle fill="#C6FDF3" cx="48" cy="59" r="48" />
                            <path
                                d="M58.536 39.713c0-6.884 1.72-14.007 5.163-21.368 3.443-7.36 8.167-13.458 14.173-18.292l11.645 7.91c-3.589 4.98-6.262 10.016-8.02 15.106S78.86 33.598 78.86 39.384v13.623H58.536V39.713z"
                                fill="#55EBD0" />
                            <path
                                d="M93.252 39.713c0-6.884 1.722-14.007 5.164-21.368 3.442-7.36 8.166-13.458 14.172-18.292l11.646 7.91c-3.589 4.98-6.262 10.016-8.02 15.106s-2.637 10.529-2.637 16.315v13.623H93.252V39.713z"
                                fill="#1ADAB7" />
                        </g>
                    </svg>
                </div>
                <div class="testimonials-shape testimonials-shape-3">
                    <svg width="48" height="48" viewBox="0 0 48 48" mlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient x1="93.05%" y1="19.767%" x2="15.034%" y2="85.765%"
                                id="testimonials-shape-3">
                                <stop stop-color="#FF3058" offset="0%" />
                                <stop stop-color="#FF6381" offset="100%" />
                            </linearGradient>
                        </defs>
                        <circle cx="24" cy="434" r="24" transform="translate(0 -410)" fill="url(#testimonials-shape-3)"
                            fill-rule="evenodd" />
                    </svg>
                </div>
                <div class="container">
                    <div class="testimonials-inner section-inner">
                        <h2 class="section-title mt-0 text-center">Feedbacks</h2>
                        <div class="testimonials-wrap">
                            <div class="testimonial text-xs is-revealing">
                                <div class="testimonial-inner">
                                    <div class="testimonial-main">
                                        <div class="testimonial-header">
                                            <img class="mb-16"
                                                src="{{ asset('template-landing-page/dist/images/testimonial-01.png') }}"
                                                alt="Testimonial">
                                        </div>
                                        <div class="testimonial-body">
                                            <p class="mb-0">Adorei a qualidade dos bottons que comprei nesta loja! Eles são duráveis e as cores são vibrantes. Com certeza voltarei a comprar mais para adicionar ao meu estilo único.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">Eduarda</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial text-xs is-revealing">
                                <div class="testimonial-inner">
                                    <div class="testimonial-main">
                                        <div class="testimonial-header">
                                            <img class="mb-16"
                                                src="{{ asset('template-landing-page/dist/images/testimonial-02.png') }}"
                                                alt="Testimonial">
                                        </div>
                                        <div class="testimonial-body">
                                            <p class="mb-0">Fiquei impressionado com a variedade de opções disponíveis nesta loja de bottons. Desde os designs mais clássicos até os mais modernos, encontrei exatamente o que estava procurando. A entrega foi rápida e o atendimento ao cliente foi excelente. Recomendo!</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">Lucas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial text-xs is-revealing">
                                <div class="testimonial-inner">
                                    <div class="testimonial-main">
                                        <div class="testimonial-header">
                                            <img class="mb-16"
                                                src="{{ asset('template-landing-page/dist/images/testimonial-03.png') }}"
                                                alt="Testimonial">
                                        </div>
                                        <div class="testimonial-body">
                                            <p class="mb-0">Essa loja de bottons superou todas as minhas expectativas! Os produtos são de alta qualidade e o preço é muito justo. Além disso, o envio foi muito rápido e a embalagem estava perfeita, garantindo que os bottons chegassem em perfeito estado. Com certeza indicarei essa loja para meus amigos e familiares.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#"> Gustavo </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="newsletter section text-light">
                <div class="container-sm">
                    <div class="newsletter-inner section-inner">
                        <div class="newsletter-header text-center">
                            <h2 class="section-title mt-0">Entre em Contato</h2>
                            <p class="section-paragraph">Estamos aqui para atender às suas necessidades personalizadas! Entre em contato conosco agora mesmo e faça o seu pedido. Estamos ansiosos para criar algo especial para você!</p>
                            <a class="button button-lg button-shadow" href="https://wa.me/c/558499292655">Chame no Whatsapp</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="site-footer-inner has-top-divider">
                    <div class="brand footer-brand">
                        <a href="#">
                            <img src="{{ asset('template-landing-page/src/images/icon.png') }}" width="60px"/> 
                        </a>
                    </div>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="https://www.instagram.com/menina_dos_bottons_/" target="_blank">
                                <span class="screen-reader-text">Instagram</span>
                                <img src="{{ asset('template-landing-page/src/images/instagram.svg') }}" width="16" height="16"/> 
                                
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/c/558499292655">
                                <span class="screen-reader-text">Whatsapp</span>
                                <img src="{{ asset('template-landing-page/src/images/zap.svg') }}" width="16" height="16"/> 
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">Menina Dos Bottons &copy; 2023 de junho</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('template-landing-page/dist/js/main.min.js') }}"></script>
</body>

</html>
