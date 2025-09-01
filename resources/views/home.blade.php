<!DOCTYPE html>
<html lang="en">
<style>
    .header-right {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
    }

    header img {
        height: 100px;
        /* position: absolute; */
        top: 20px;
        right: 20px
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8ca681c2f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/landing.css">
    <title>Junior's Dashboard</title>
</head>

<body>
    <header>
        {{-- <img src="/logo.png" alt=""> --}}
        <div class="text">
            <a href="/" style="text-decoration: none">
                <h1>Junior's Portal</h1>
            </a>
            <p>Computer Systems Engineering</p>
        </div>


        <div class="header-right">
            @auth
                <form action="/signout" method="post">
                    @csrf
                    <button>Signout</button>
                </form>
            @endauth
            <a href="/about">About</a>
            <a href="/signup">Signup</a>
            <a href="/login">Login</a>
        </div>
    </header>
    @if(session()->has('success'))
        <div class="container container--narrow">
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        </div>
    @endif

    @if(session()->has('failure'))
        <div class="container container--narrow">
            <div class="alert alert-danger text-center">
                {{session('failure')}}
            </div>
        </div>
    @endif
    <style>
        header {
            display: flex;
            /* grid-template-columns: 1fr 1fr 1fr; */
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 1.5rem 2.5rem;
            /* background: rgba(255, 255, 255, 0.9); */
            /* box-shadow: 0 0 15px 2px rgba(0, 0, 0, 0.15); */

            h1 {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                color: transparent;
                background: linear-gradient(45deg, rgb(255, 255, 255), rgb(255, 255, 255));
                background-clip: text;
            }

            p {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            a {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                text-transform: uppercase;
                color: rgb(170, 170, 255);
                transition: all 0.3s ease;
                text-decoration: underline;
                text-decoration-color: rgba(255, 255, 255, 0);
                text-underline-offset: 0px;
            }

            a:hover {
                transform: translateY(-5px);
                text-underline-offset: 5px;
                text-decoration-color: rgba(255, 255, 255, 1);
                color: white
            }
        }

        .text {
            align-self: center;
            justify-self: center;
            text-align: center
        }

        .header-right {
            align-self: center;
            justify-self: end;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        .bg-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 1;
        }

        .shape {
            position: absolute;
            opacity: 0.2;
            animation: float 8s ease-in-out infinite;
            border: 10px solid rgb(180, 180, 255);
        }

        .shape:nth-child(1) {
            top: 10%;
            left: 10%;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation-delay: -2s;
        }

        .shape:nth-child(2) {
            top: 20%;
            right: 15%;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.25);
            transform: rotate(45deg);
            animation-delay: -4s;
        }

        .shape:nth-child(3) {
            bottom: 20%;
            left: 20%;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20%;
            animation-delay: -1s;
        }

        .shape:nth-child(4) {
            top: 50%;
            right: 10%;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            animation-delay: -6s;
        }

        .shape:nth-child(5) {
            bottom: 10%;
            right: 30%;
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.18);
            animation-delay: -3s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-20px) rotate(90deg);
            }

            50% {
                transform: translateY(10px) rotate(180deg);
            }

            75% {
                transform: translateY(-15px) rotate(270deg);
            }
        }

        section {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
            animation: slideDown 0.8s ease-out;
        }

        .header h1 {
            color: white;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #ffffff, #d0e1f8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 500;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 32px 28px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 132, 255, 0.1), transparent);
            transition: left 0.6s;
        }

        .card:hover::before {
            left: 100%;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.98);
        }

        .card:active {
            transform: translateY(-4px) scale(1.01);
        }

        .card-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(0, 132, 255, 0.3);
        }

        .card:hover .card-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 12px 30px rgba(0, 132, 255, 0.4);
        }

        .card-icon i {
            font-size: 2.2rem;
            color: white;
            transition: all 0.3s ease;
        }

        .card:hover .card-icon i {
            transform: scale(1.1);
        }

        .card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .card:hover h3 {
            color: rgb(0, 132, 255);
        }

        .card p {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-arrow {
            display: inline-flex;
            align-items: center;
            color: rgb(0, 132, 255);
            font-weight: 600;
            font-size: 0.9rem;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .card:hover .card-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        .card-arrow i {
            margin-left: 6px;
            transition: transform 0.3s ease;
        }

        .card:hover .card-arrow i {
            transform: translateX(4px);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Staggered animation for cards */
        .card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .card:nth-child(6) {
            animation-delay: 0.6s;
        }

        .card {
            animation: cardSlideIn 0.6s ease-out both;
        }

        @keyframes cardSlideIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Special styling for featured cards */
        /* .card.featured {
            background: linear-gradient(135deg, rgba(0, 132, 255, 0.1), rgba(49, 49, 255, 0.1));
            border: 2px solid rgba(0, 132, 255, 0.3);
        }

        .card.featured .card-icon {
            background: linear-gradient(135deg, rgb(49, 49, 255), rgb(0, 132, 255));
        } */

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            body {
                padding: 16px;
            }

            .header h1 {
                font-size: 2.5rem;
                margin-bottom: 12px;
            }

            .header p {
                font-size: 1rem;
                padding: 0 20px;
            }

            .header {
                margin-bottom: 40px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                max-width: 400px;
                margin: 0 auto;
            }

            .card {
                padding: 28px 24px;
            }

            .card-icon {
                width: 70px;
                height: 70px;
                margin-bottom: 16px;
            }

            .card-icon i {
                font-size: 2rem;
            }

            .card h3 {
                font-size: 1.3rem;
            }

            .shape {
                display: none;
                /* Hide floating shapes on mobile for better performance */
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 2rem;
            }

            .cards-grid {
                max-width: 350px;
            }

            .card {
                padding: 24px 20px;
            }

            .card-icon {
                width: 60px;
                height: 60px;
            }

            .card-icon i {
                font-size: 1.8rem;
            }
        }

        /* Tablet styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .header h1 {
                font-size: 3rem;
            }
        }

        /* Large desktop */
        @media (min-width: 1200px) {
            .cards-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <section>
        <div class="header">
            <h1>Student Dashboard</h1>
            <p>Your one-stop solution for academic success. Access all your study materials, track attendance, and
                calculate your GPA effortlessly.</p>
        </div>

        <div class="cards-grid">
            <a href="/notes">
                <div class="card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-file-text"></i>
                        </div>
                        <h3>Notes</h3>
                        <p>Access comprehensive study notes and materials organized by subject and semester.</p>
                        <div class="card-arrow">
                            Browse Notes <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/guides">
                <div class="card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>
                        <h3>Guides</h3>
                        <p>Step-by-step guides and tutorials to help you excel in your academic journey.</p>
                        <div class="card-arrow">
                            View Guides <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/past-papers">
                <div class="card featured">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-copy"></i>
                        </div>
                        <h3>Past Papers</h3>
                        <p>Practice with previous exam papers to prepare effectively for your upcoming tests.</p>
                        <div class="card-arrow">
                            Practice Now <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/cms">
                <div class="card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-server"></i>
                        </div>
                        <h3>CMS</h3>
                        <p>Connect to your Course Management System for assignments and announcements.</p>
                        <div class="card-arrow">
                            Access CMS <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/attendance">
                <div class="card featured">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <h3>Attendance</h3>
                        <p>Track your attendance records and monitor your participation across all subjects.</p>
                        <div class="card-arrow">
                            Check Status <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/gpa-calculator">
                <div class="card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-calculator"></i>
                        </div>
                        <h3>GPA Calculator</h3>
                        <p>Calculate your GPA and track your academic performance throughout the semester.</p>
                        <div class="card-arrow">
                            Calculate GPA <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <script>
        // Add interactive features for better UX
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');

            // Add click ripple effect
            cards.forEach(card => {
                card.addEventListener('click', function (e) {
                    const ripple = document.createElement('div');
                    const rect = card.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(0, 132, 255, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                        z-index: 1;
                    `;

                    card.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add keyboard navigation
            cards.forEach((card, index) => {
                card.setAttribute('tabindex', '0');
                card.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        card.click();
                    }
                });
            });

            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            cards.forEach(card => {
                observer.observe(card);
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
    <p
        style="width:100vw;background:black;color:white;position:absolute;bottom:0;left:0;padding:0.25rem;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: lighter; text-align: center;">
        Summer 2025 Initiative by Labeeb Hashmi. Student of Computer Systems Engineering MUST</p>
</body>

</html>