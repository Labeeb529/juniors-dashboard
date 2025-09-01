<x-layout>
    <style>
        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 420px;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;

            p {
                text-align: center;
                margin: 1rem;
            }
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
            border-radius: 24px 24px 0 0;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #2d3748;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 3rem;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
            border-radius: 2px;
        }

        .roll-inputs {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .roll-inputs input {
            flex: 1;
            text-align: center;
            font-weight: 500;
        }

        .roll-inputs p {
            color: #4a5568;
            font-weight: 600;
            font-size: 18px;
            user-select: none;
        }

        input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            background: #ffffff;
            transition: all 0.3s ease;
            outline: none;
            color: #2d3748;
        }

        input:focus {
            border-color: rgb(0, 132, 255);
            background: #f7fafc;
            box-shadow: 0 0 0 4px rgba(0, 132, 255, 0.1);
            transform: translateY(-1px);
        }

        input::placeholder {
            color: #a0aec0;
            font-weight: 400;
        }

        input[name="password"] {
            margin-bottom: 32px;
            margin-top: 8px;
        }

        button {
            width: 100%;
            padding: 16px 20px;
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 132, 255, 0.3);
        }

        button:hover::before {
            left: 100%;
        }


        button:active {
            transform: translateY(0);
            box-shadow: 0 5px 15px rgba(0, 132, 255, 0.2);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            border: 10px solid blue;
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            top: 20%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation-delay: -2s;
        }

        .shape:nth-child(2) {
            top: 60%;
            right: 15%;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(45deg);
            animation-delay: -4s;
        }

        .shape:nth-child(3) {
            bottom: 20%;
            left: 20%;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 20%;
            animation-delay: -1s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-20px) rotate(120deg);
            }

            66% {
                transform: translateY(10px) rotate(240deg);
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 32px 24px;
                margin: 16px;
            }

            h2 {
                font-size: 24px;
                margin-bottom: 24px;
            }

            input,
            button {
                padding: 14px 16px;
                font-size: 15px;
            }

            .roll-inputs {
                gap: 6px;
            }
        }
    </style>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="wrapper">

        <form class="login-container" method="POST" action="/login">
            @csrf
            <h2>Portal Login</h2>
            <input type="text" name="email" placeholder="Email" required value="{{old('email')}}">
            @error('email')
                <p>{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password" required>
            @error('password')
                <p>{{$message}}</p>
            @enderror
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="{{route('signup')}}">Signup</a></p>
        </form>
    </div>
</x-layout>