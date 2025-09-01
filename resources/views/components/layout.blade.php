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

        <div class="nav">
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
        </div>
    </header>

    {{$slot}}

    {{-- <p
        style="width:100vw;background:black;color:white;position:absolute;bottom:0;left:0;padding:0.25rem;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: lighter; text-align: center;">
        Summer 2025 Initiative by Labeeb Hashmi. Student of Computer Systems Engineering MUST</p> --}}
</body>

</html>