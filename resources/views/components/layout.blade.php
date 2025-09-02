<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8ca681c2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/global.css">
    <title>Junior's Dashboard</title>
</head>

<body>
    <header>
        <div class="text">
            <a href="/" style="text-decoration: none">
                <h1>Junior's Portal</h1>
            </a>
            <p>Computer Systems Engineering</p>
        </div>
        <nav class="nav" id="navMenu">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/register">Register</a>
            <a href="/login">Login</a>
            @auth
                <form action="/signout" method="post">
                    @csrf
                    <button>Signout</button>
                </form>
            @endauth
        </nav>
        <button class="burger" id="burgerBtn" aria-label="Open navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    {{$slot}}

    {{-- <p
        style="width:100vw;background:black;color:white;position:absolute;bottom:0;left:0;padding:0.25rem;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: lighter; text-align: center;">
        Summer 2025 Initiative by Labeeb Hashmi. Student of Computer Systems Engineering MUST</p> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Burger menu functionality
        const burgerBtn = document.getElementById('burgerBtn');
        const navMenu = document.getElementById('navMenu');
        burgerBtn.addEventListener('click', function () {
            burgerBtn.classList.toggle('active');
            navMenu.classList.toggle('open');
            burgerBtn.setAttribute('aria-expanded', navMenu.classList.contains('open'));
        });
        // Close nav on link click (mobile)
        navMenu.querySelectorAll('a, form button').forEach(el => {
            el.addEventListener('click', function () {
                if (window.innerWidth < 900) {
                    navMenu.classList.remove('open');
                    burgerBtn.classList.remove('active');
                    burgerBtn.setAttribute('aria-expanded', 'false');
                }
            });
        });
        // Close nav on outside click
        document.addEventListener('click', function (e) {
            if (window.innerWidth < 900 && navMenu.classList.contains('open')) {
                if (!navMenu.contains(e.target) && !burgerBtn.contains(e.target)) {
                    navMenu.classList.remove('open');
                    burgerBtn.classList.remove('active');
                    burgerBtn.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });
</script>
</body>

</html>