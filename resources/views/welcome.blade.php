<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GrandTaxi - Réservation de Taxis Interurbains</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Styles -->
        <style>
            :root {
                --primary: #ffb800;
                --primary-dark: #e6a700;
                --secondary: #1a73e8;
                --dark: #333333;
                --light: #f8f9fa;
                --gray: #6c757d;
                --success: #28a745;
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Poppins', sans-serif;
                color: var(--dark);
                background-color: var(--light);
                line-height: 1.6;
            }
            
            .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1rem;
            }
            
            /* Header and Navigation */
            header {
                background-color: white;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                position: fixed;
                width: 100%;
                top: 0;
                z-index: 1000;
            }
            
            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 1rem 0;
            }
            
            .logo {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: var(--dark);
            }
            
            .logo i {
                color: var(--primary);
                font-size: 2rem;
                margin-right: 0.5rem;
            }
            
            .logo-text {
                font-weight: 700;
                font-size: 1.5rem;
            }
            
            .logo-text span {
                color: var(--primary);
            }
            
            .nav-links {
                display: flex;
                list-style: none;
                align-items: center;
            }
            
            .nav-links li {
                margin-left: 1.5rem;
            }
            
            .nav-links a {
                text-decoration: none;
                color: var(--dark);
                font-weight: 500;
                transition: color 0.3s;
                white-space: nowrap;
            }
            
            .nav-links a:hover {
                color: var(--primary);
            }
            
            .auth-buttons {
                display: flex;
                align-items: center;
            }
            
            .auth-buttons li {
                margin-left: 1rem;
            }
            
            .btn {
                display: inline-block;
                padding: 0.6rem 1.5rem;
                background-color: var(--primary);
                color: white;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 500;
                transition: background-color 0.3s, transform 0.3s;
                border: none;
                cursor: pointer;
                white-space: nowrap;
            }
            
            .btn:hover {
                background-color: var(--primary-dark);
                transform: translateY(-2px);
            }
            
            .btn-outline {
                background-color: transparent;
                border: 2px solid var(--primary);
                color: var(--primary);
            }
            
            .btn-outline:hover {
                background-color: var(--primary);
                color: white;
            }
            
            /* Hero Section */
            .hero {
                height: 100vh;
                background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('storage/taxi-maroc.png') center/cover no-repeat;
                display: flex;
                align-items: center;
                color: white;
                text-align: center;
                padding-top: 70px;
            }
            
            .hero-content {
                max-width: 800px;
                margin: 0 auto;
            }
            
            .hero h1 {
                font-size: 3rem;
                margin-bottom: 1.5rem;
                font-weight: 700;
            }
            
            .hero p {
                font-size: 1.2rem;
                margin-bottom: 2rem;
                font-weight: 300;
            }
            
            /* Search Box */
            .search-box {
                background-color: white;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                margin-top: 2rem;
            }
            
            .search-form {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }
            
            .form-group {
                display: flex;
                flex-direction: column;
            }
            
            .form-group label {
                color: var(--dark);
                margin-bottom: 0.5rem;
                font-weight: 500;
            }
            
            .form-group input, .form-group select {
                padding: 0.8rem;
                border: 1px solid #e1e1e1;
                border-radius: 5px;
                font-family: 'Poppins', sans-serif;
            }
            
            /* Features Section */
            .features {
                padding: 5rem 0;
            }
            
            .section-header {
                text-align: center;
                margin-bottom: 3rem;
            }
            
            .section-header h2 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
                color: var(--dark);
            }
            
            .section-header p {
                color: var(--gray);
                max-width: 700px;
                margin: 0 auto;
            }
            
            .feature-cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }
            
            .feature-card {
                background-color: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
            
            .feature-card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }
            
            .feature-content {
                padding: 1.5rem;
            }
            
            .feature-content h3 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
                color: var(--dark);
            }
            
            .feature-content p {
                color: var(--gray);
                margin-bottom: 1rem;
            }
            
            .feature-icon {
                font-size: 3rem;
                color: var(--primary);
                margin-bottom: 1rem;
            }
            
            /* How It Works Section */
            .how-it-works {
                padding: 5rem 0;
                background-color: #f9f9f9;
            }
            
            .steps {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-top: 3rem;
            }
            
            .step {
                text-align: center;
                position: relative;
            }
            
            .step-number {
                background-color: var(--primary);
                color: white;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.5rem;
                font-weight: 700;
                margin: 0 auto 1.5rem;
            }
            
            .step h3 {
                margin-bottom: 1rem;
                font-size: 1.3rem;
            }
            
            .step p {
                color: var(--gray);
            }
            
            /* CTA Section */
            .cta {
                padding: 5rem 0;
                background: linear-gradient(to right, var(--secondary), #64b5f6);
                color: white;
                text-align: center;
            }
            
            .cta h2 {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
            }
            
            .cta p {
                margin-bottom: 2rem;
                max-width: 700px;
                margin-left: auto;
                margin-right: auto;
            }
            
            .cta .btn {
                background-color: white;
                color: var(--secondary);
                font-weight: 600;
            }
            
            .cta .btn:hover {
                background-color: var(--primary);
                color: white;
            }
            
            /* Footer */
            footer {
                background-color: var(--dark);
                color: white;
                padding: 3rem 0 1rem;
            }
            
            .footer-content {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-bottom: 2rem;
            }
            
            .footer-column h3 {
                font-size: 1.3rem;
                margin-bottom: 1.5rem;
                color: var(--primary);
            }
            
            .footer-column p, .footer-column a {
                color: #aaa;
                margin-bottom: 0.8rem;
                display: block;
                text-decoration: none;
                transition: color 0.3s;
            }
            
            .footer-column a:hover {
                color: var(--primary);
            }
            
            .social-links {
                display: flex;
                gap: 1rem;
                margin-top: 1rem;
            }
            
            .social-links a {
                background-color: rgba(255,255,255,0.1);
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: background-color 0.3s;
            }
            
            .social-links a:hover {
                background-color: var(--primary);
            }
            
            .copyright {
                text-align: center;
                padding-top: 2rem;
                border-top: 1px solid rgba(255,255,255,0.1);
                color: #aaa;
                font-size: 0.9rem;
            }
            
            /* Responsive Design */
            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2.2rem;
                }
                
                .hero p {
                    font-size: 1rem;
                }
                
                .search-form {
                    grid-template-columns: 1fr;
                }
                
                .navbar {
                    flex-direction: column;
                    padding: 1rem;
                }
                
                .nav-links {
                    margin-top: 1.5rem;
                    flex-wrap: wrap;
                    justify-content: center;
                }
                
                .nav-links li {
                    margin: 0.5rem 0.75rem;
                }
                
                .auth-buttons {
                    margin-top: 1rem;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header>
            <div class="container">
                <nav class="navbar">
                    <a href="/" class="logo">
                        <i class="fas fa-taxi"></i>
                        <div class="logo-text">Taxi<span>Link</span></div>
                    </a>
                    
                    <ul class="nav-links">
                        <li><a href="#features">Services</a></li>
                        <li><a href="#how-it-works">Comment ça marche</a></li>
                        <li><a href="#cities">Destinations</a></li>
                        <li><a href="#drivers">Chauffeurs</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="btn">Tableau de bord</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="btn btn-outline">Connexion</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="btn">S'inscrire</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Réservez votre grand taxi pour vos trajets interurbains</h1>
                    <p>Trouvez rapidement un taxi pour vos déplacements entre villes. Simple, pratique et économique.</p>
                    <a href="#" class="btn">Réserver maintenant</a>
                    
                  
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="features">
            <div class="container">
                <div class="section-header">
                    <h2>Pourquoi choisir TaxiLink</h2>
                    <p>Notre plateforme facilite le voyage interurbain en grand taxi pour tous les Marocains</p>
                </div>
                
                <div class="feature-cards">
                    <div class="feature-card">
                        <div class="feature-content">
                            <i class="fas fa-map-marker-alt feature-icon"></i>
                            <h3>Large couverture</h3>
                            <p>Nous desservons plus de 50 villes à travers le Maroc. Trouvez facilement votre trajet, peu importe votre destination.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-content">
                            <i class="fas fa-hand-holding-usd feature-icon"></i>
                            <h3>Tarifs avantageux</h3>
                            <p>Des prix compétitifs et transparents. Réservez à l'avance et économisez sur vos déplacements interurbains.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-content">
                            <i class="fas fa-shield-alt feature-icon"></i>
                            <h3>Chauffeurs vérifiés</h3>
                            <p>Tous nos chauffeurs sont agréés et vérifiés. Voyagez en toute sécurité et tranquillité d'esprit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="how-it-works" id="how-it-works">
            <div class="container">
                <div class="section-header">
                    <h2>Comment ça marche</h2>
                    <p>Réserver un grand taxi n'a jamais été aussi simple</p>
                </div>
                
                <div class="steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <h3>Recherchez votre trajet</h3>
                        <p>Indiquez votre ville de départ, votre destination et la date souhaitée</p>
                    </div>
                    
                    <div class="step">
                        <div class="step-number">2</div>
                        <h3>Choisissez votre taxi</h3>
                        <p>Comparez les offres disponibles et sélectionnez celle qui vous convient</p>
                    </div>
                    
                    <div class="step">
                        <div class="step-number">3</div>
                        <h3>Réservez en ligne</h3>
                        <p>Confirmez votre réservation en quelques clics et recevez une confirmation</p>
                    </div>
                    
                    <div class="step">
                        <div class="step-number">4</div>
                        <h3>Voyagez sereinement</h3>
                        <p>Rendez-vous au point de rencontre à l'heure convenue et profitez de votre trajet</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="container">
                <h2>Vous êtes chauffeur de grand taxi ?</h2>
                <p>Rejoignez notre plateforme et recevez des réservations pour maximiser vos revenus. Gérez vos trajets et vos horaires en toute simplicité.</p>
                <a href="#" class="btn">Devenir partenaire</a>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>GrandTaxi</h3>
                        <p>La première plateforme marocaine de réservation de grands taxis pour vos trajets interurbains.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Liens utiles</h3>
                        <a href="#">À propos de nous</a>
                        <a href="#">Comment ça marche</a>
                        <a href="#">FAQs</a>
                        <a href="#">Blog</a>
                        <a href="#">Contactez-nous</a>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Destinations populaires</h3>
                        <a href="#">Casablanca - Rabat</a>
                        <a href="#">Marrakech - Casablanca</a>
                        <a href="#">Tanger - Tétouan</a>
                        <a href="#">Fès - Meknès</a>
                        <a href="#">Agadir - Marrakech</a>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Contact</h3>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Avenue Mohammed V, Casablanca</p>
                        <p><i class="fas fa-phone"></i> +212 522 123 456</p>
                        <p><i class="fas fa-envelope"></i> contact@taxilink.ma</p>
                    </div>
                </div>
                
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} GrandTaxi. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </body>
</html>