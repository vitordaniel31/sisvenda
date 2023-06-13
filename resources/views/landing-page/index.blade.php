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
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
                                <img src="{{ asset('template-landing-page/src/images/icon.png') }}" width="60px"/> 
                            </a>
                        </h1>
                    </div>
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
                                <div class="feature-inner">
                                    <div class="feature-icon">
                                        <image src="{{ asset('template-landing-page/src/images/panda.png') }}"/> 
                                    </div>
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
                                <div class="feature-inner">
                                    <div class="feature-icon" style="background:#FFD8CD;">
                                        <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="nonzero">
                                                <path
                                                    d="M54 56h-9a2 2 0 0 1-2-2V43a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2zm-9-13v10h9V43h-9z"
                                                    fill="#FCAC96" />
                                                <path
                                                    d="M41 50h-7V34h14v5h2v-5a2 2 0 0 0-2-2H34a2 2 0 0 0-2 2v18a2 2 0 0 0 2 2h7v-4z"
                                                    fill="#FC8464" />
                                            </g>
                                        </svg>
                                    </div>
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
                                <div class="feature-inner">
                                    <div class="feature-icon" style="background:#C6FDF3;">
                                        <img class="mb-16" src="{{ asset('template-landing-page/dist/images/.png') }}" alt="Testimonial">
                                    </div>
                                    <h4 class="feature-title h3-mobile mb-8">bottons Holográficos</h4>
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
                                <stop stop-color="#261FB6" offset="0%" />
                                <stop stop-color="#4950F6" offset="100%" />
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
                        <h2 class="section-title mt-0 text-center">Testimonials</h2>
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
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">@martajones</a>
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
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">@michealpahm</a>
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
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">@markbrown</a>
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
                            <h2 class="section-title mt-0">Stay in the know</h2>
                            <p class="section-paragraph">Lorem ipsum is common placeholder text used to demonstrate
                                the
                                graphic elements of a document or visual presentation.</p>
                        </div>
                        <div class="footer-form newsletter-form field field-grouped">
                            <div class="control control-expanded">
                                <input class="input" type="email" name="email" placeholder="Your best email&hellip;">
                            </div>
                            <div class="control">
                                <a class="button button-primary button-block button-shadow" href="#">Early
                                    access</a>
                            </div>
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
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg">
                                <title>April</title>
                                <defs>
                                    <linearGradient x1="114.674%" y1="39.507%" x2="-52.998%" y2="39.507%"
                                        id="logo-footer-a">
                                        <stop stop-color="#8D92FA" offset="0%" />
                                        <stop stop-color="#8D92FA" stop-opacity="0" offset="100%" />
                                    </linearGradient>
                                    <linearGradient x1="93.05%" y1="19.767%" x2="15.034%" y2="85.765%"
                                        id="logo-footer-b">
                                        <stop stop-color="#FF3058" offset="0%" />
                                        <stop stop-color="#FF6381" offset="100%" />
                                    </linearGradient>
                                    <linearGradient x1="32.716%" y1="-20.176%" x2="32.716%" y2="148.747%"
                                        id="logo-footer-c">
                                        <stop stop-color="#FF97AA" offset="0%" />
                                        <stop stop-color="#FF97AA" stop-opacity="0" offset="100%" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path
                                        d="M31.12 7.482C28.327 19.146 19.147 28.326 7.483 31.121A12.04 12.04 0 0 1 .88 24.518C3.674 12.854 12.854 3.674 24.518.879a12.04 12.04 0 0 1 6.603 6.603z"
                                        fill="#312ECA" />
                                    <path
                                        d="M28.874 3.922l-24.91 24.99a12.026 12.026 0 0 1-3.085-4.394C3.674 12.854 12.854 3.674 24.518.879a12.025 12.025 0 0 1 4.356 3.043z"
                                        fill="url(#logo-footer-a)" />
                                    <g opacity=".88">
                                        <path
                                            d="M31.12 24.518a12.04 12.04 0 0 1-6.602 6.603C12.854 28.326 3.674 19.146.879 7.482A12.04 12.04 0 0 1 7.482.88c11.664 2.795 20.844 11.975 23.639 23.639z"
                                            fill="url(#logo-footer-b)" />
                                        <path
                                            d="M24.518 31.12C12.854 28.327 3.674 19.147.879 7.483A12.015 12.015 0 0 1 3.46 3.57L28.47 28.5a12.016 12.016 0 0 1-3.951 2.62z"
                                            fill="url(#logo-footer-c)" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Facebook</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                        fill="#FFF" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Twitter</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"
                                        fill="#FFF" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
                                        fill="#FFF" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">&copy; 2018 April, all rights reserved</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('template-landing-page/dist/js/main.min.js') }}"></script>
</body>

</html>