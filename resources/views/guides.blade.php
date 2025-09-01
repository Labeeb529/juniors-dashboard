<x-layout>
    <style>

        .guides-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 28px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            min-height: 120px;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 132, 255, 0.03), transparent);
            transition: left 0.6s;
        }

        .card:hover::after {
            left: 100%;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 132, 255, 0.15);
            border-color: rgba(0, 132, 255, 0.3);
        }

        .card:active {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 132, 255, 0.1);
        }

        .left {
            flex: 1;
            padding-right: 20px;
            position: relative;
            z-index: 2;
        }

        .left h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
            transition: color 0.3s ease;
            line-height: 1.3;
        }

        .card:hover .left h3 {
            color: rgb(0, 132, 255);
        }

        .left h5 {
            font-size: 0.95rem;
            color: #718096;
            font-weight: 500;
            line-height: 1.5;
            margin: 0;
        }

        .right {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(0, 132, 255, 0.1), rgba(49, 49, 255, 0.1));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .card:hover .right {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 132, 255, 0.3);
        }

        .right i {
            font-size: 1.5rem;
            color: rgb(0, 132, 255);
            transition: all 0.3s ease;
        }

        .card:hover .right i {
            color: white;
            transform: scale(1.1);
        }

        /* Staggered animation for cards */
        .card {
            animation: slideIn 0.5s ease-out both;
        }

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

        .card:nth-child(7) {
            animation-delay: 0.7s;
        }

        .card:nth-child(8) {
            animation-delay: 0.8s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .guides-section {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 24px 16px;
            }

            .card {
                padding: 24px 20px;
                min-height: 100px;
            }

            .left {
                padding-right: 16px;
            }

            .left h3 {
                font-size: 1.1rem;
                margin-bottom: 6px;
            }

            .left h5 {
                font-size: 0.9rem;
            }

            .right {
                width: 50px;
                height: 50px;
            }

            .right i {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .guides-section {
                padding: 20px 12px;
            }

            .card {
                padding: 20px 16px;
                min-height: 90px;
            }

            .left h3 {
                font-size: 1rem;
            }

            .left h5 {
                font-size: 0.85rem;
            }

            .right {
                width: 45px;
                height: 45px;
            }

            .right i {
                font-size: 1.2rem;
            }
        }

        /* Tablet styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .guides-section {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                padding: 32px 24px;
            }
        }

        /* Large desktop optimization */
        @media (min-width: 1200px) {
            .guides-section {
                grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            }
        }

        /* Focus states for accessibility */
        .card:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 132, 255, 0.3);
        }

        /* Loading state */
        .card.loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .card.loading::before {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Empty state */
        .guides-section:empty::after {
            content: "No guides available at the moment.";
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            color: #718096;
            font-size: 1.1rem;
        }
    </style>
    <section class="guides-section">
        <!-- Sample data for demonstration -->
        @foreach($guides as $guide)
            <a href="/guide/{{$guide->id}}">
                <div class="card">
                    <div class="left">
                        <h3>{{$guide->title}}</h3>
                        <h5>{{$guide->description}}</h5>
                    </div>
                    <div class="right">
                        <i class="fa-solid fa-code"></i>
                    </div>
                </div>
            </a>
        @endforeach

        <a href="/guide/2">
            <div class="card">
                <div class="left">
                    <h3>Database Design Principles</h3>
                    <h5>Master the art of designing efficient and scalable database systems for your applications.
                    </h5>
                </div>
                <div class="right">
                    <i class="fa-solid fa-database"></i>
                </div>
            </div>
        </a>

        <a href="/guide/3">
            <div class="card">
                <div class="left">
                    <h3>Web Development Basics</h3>
                    <h5>Build your first website using HTML, CSS, and JavaScript with our comprehensive guide.</h5>
                </div>
                <div class="right">
                    <i class="fa-solid fa-globe"></i>
                </div>
            </div>
        </a>

        <a href="/guide/4">
            <div class="card">
                <div class="left">
                    <h3>Algorithm Analysis</h3>
                    <h5>Understand time and space complexity to write more efficient code and solve problems faster.
                    </h5>
                </div>
                <div class="right">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
            </div>
        </a>

        <a href="/guide/5">
            <div class="card">
                <div class="left">
                    <h3>Mobile App Development</h3>
                    <h5>Create stunning mobile applications for iOS and Android platforms using modern frameworks.
                    </h5>
                </div>
                <div class="right">
                    <i class="fa-solid fa-mobile-alt"></i>
                </div>
            </div>
        </a>

        <a href="/guide/6">
            <div class="card">
                <div class="left">
                    <h3>Version Control with Git</h3>
                    <h5>Learn how to manage your code effectively using Git and collaborate with other developers.
                    </h5>
                </div>
                <div class="right">
                    <i class="fa-solid fa-code-branch"></i>
                </div>
            </div>
        </a>

        <a href="/guide/7">
            <div class="card">
                <div class="left">
                    <h3>Machine Learning Fundamentals</h3>
                    <h5>Dive into the world of AI and machine learning with practical examples and real-world
                        applications.</h5>
                </div>
                <div class="right">
                    <i class="fa-solid fa-brain"></i>
                </div>
            </div>
            </div>

            <a href="/guide/8">
                <div class="card">
                    <div class="left">
                        <h3>Cybersecurity Best Practices</h3>
                        <h5>Protect your applications and data with essential security measures and threat
                            prevention techniques.</h5>
                    </div>
                    <div class="right">
                        <i class="fa-solid fa-shield-alt"></i>
                    </div>
                </div>
            </a>
    </section>

    <script>
        // Add interactive enhancements
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');

            // Add keyboard navigation
            cards.forEach(card => {
                card.setAttribute('tabindex', '0');
                card.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        const link = card.closest('a');
                        if (link) {
                            window.location.href = link.href;
                        }
                    }
                });
            });

            // Add ripple effect on click
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
                        background: rgba(0, 132, 255, 0.2);
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

            // Intersection Observer for performance
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                observer.observe(card);
            });
        });

        // Add ripple animation CSS
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
</x-layout>