<x-layout>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: white;
            line-height: 1.6;
            color: #2d3748;
        }

        section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .notes-container {
            display: grid;
            gap: 32px;
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

        .semester-section {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            animation: slideIn 0.5s ease-out both;
        }

        .semester-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .semester-section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .semester-section:nth-child(3) {
            animation-delay: 0.3s;
        }

        .semester-section:nth-child(4) {
            animation-delay: 0.4s;
        }

        .semester-section:nth-child(5) {
            animation-delay: 0.5s;
        }

        .semester-section:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .semester-section:hover {
            box-shadow: 0 12px 40px rgba(0, 132, 255, 0.15);
            transform: translateY(-2px);
        }

        .semester-header {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            padding: 24px 28px;
            position: relative;
            overflow: hidden;
        }

        .semester-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: -50px;
            width: 100px;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: skewX(-20deg);
        }

        .semester-header h2 {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 4px;
            position: relative;
            z-index: 2;
        }

        .semester-header sup {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .semester-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        .semester-icon {
            position: absolute;
            right: 28px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.3);
            z-index: 1;
        }

        .subjects-grid {
            padding: 24px 28px 28px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
        }

        .subject-card {
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: space-between
        }

        .subject-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 132, 255, 0.05), transparent);
            transition: left 0.6s;
        }

        .subject-card:hover::before {
            left: 100%;
        }

        .subject-card:hover {
            transform: translateY(-3px);
            border-color: rgb(0, 132, 255);
            background: white;
            box-shadow: 0 8px 25px rgba(0, 132, 255, 0.15);
        }

        .subject-card:active {
            transform: translateY(-1px);
        }

        .subject-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .subject-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, rgba(0, 132, 255, 0.1), rgba(49, 49, 255, 0.1));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .subject-card:hover .subject-icon {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            transform: rotate(5deg) scale(1.1);
        }

        .subject-icon i {
            font-size: 1.1rem;
            color: rgb(0, 132, 255);
            transition: color 0.3s ease;
        }

        .subject-card:hover .subject-icon i {
            color: white;
        }

        .subject-status {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #48bb78;
        }

        .subject-status.unavailable {
            color: #f56565;
        }

        .subject-status i {
            font-size: 0.7rem;
        }

        .subject-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 6px;
            transition: color 0.3s ease;
        }

        .subject-card:hover .subject-title {
            color: rgb(0, 132, 255);
        }

        .subject-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #718096;
        }

        .subject-type {
            background: rgba(0, 132, 255, 0.1);
            color: rgb(0, 132, 255);
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .subject-type.lab {
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            section {
                padding: 24px 16px;
            }

            .notes-container {
                gap: 24px;
            }

            .semester-header {
                padding: 20px 20px;
            }

            .semester-header h2 {
                font-size: 1.3rem;
            }

            .semester-icon {
                right: 20px;
                font-size: 1.5rem;
            }

            .subjects-grid {
                padding: 20px 20px 24px;
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .subject-card {
                padding: 16px;
            }

            .subject-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .semester-header {
                padding: 16px 16px;
            }

            .semester-header h2 {
                font-size: 1.2rem;
            }

            .semester-icon {
                right: 16px;
                font-size: 1.3rem;
            }

            .subjects-grid {
                padding: 16px 16px 20px;
            }

            .subject-card {
                padding: 14px;
            }
        }

        /* Tablet styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .subjects-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        /* Loading animation */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading .subject-card {
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

        /* Search and filter bar */
        .controls {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            margin-bottom: 32px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-box input:focus {
            border-color: rgb(0, 132, 255);
            box-shadow: 0 0 0 3px rgba(0, 132, 255, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
        }

        .filter-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 2px solid #e2e8f0;
            background: white;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #718096;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            color: white;
            border-color: transparent;
        }

        .filter-btn:hover:not(.active) {
            border-color: rgb(0, 132, 255);
            color: rgb(0, 132, 255);
        }
    </style>
    <section>
        <div class="controls">
            <div class="search-box">
                <i class="fa-solid fa-search"></i>
                <input type="text" placeholder="Search subjects..." id="searchInput">
            </div>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="theory">Theory</button>
                <button class="filter-btn" data-filter="lab">Lab</button>
                <button class="filter-btn" data-filter="available">Available</button>
            </div>
        </div>

        <div class="notes-container">
            <!-- Semester 1 -->
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>1<sup>st</sup> Semester</h2>
                        <p>Foundation</p>
                    </div>
                    <i class="fa-solid fa-seedling semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem1Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Semester 2 -->
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>2<sup>nd</sup> Semester</h2>
                        <p>Core Engineering</p>
                    </div>
                    <i class="fa-solid fa-cog semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem2Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>3<sup>rd</sup> Semester</h2>
                        <p>Logic & Programming</p>
                    </div>
                    <i class="fa-solid fa-project-diagram semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem3Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>4<sup>th</sup> Semester</h2>
                        <p>Systems</p>
                    </div>
                    <i class="fa-solid fa-server semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem4Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>5<sup>th</sup> Semester</h2>
                        <p>Networks</p>
                    </div>
                    <i class="fa-solid fa-network-wired semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem5Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>6<sup>th</sup> Semester</h2>
                        <p>Software</p>
                    </div>
                    <i class="fa-solid fa-desktop semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem6Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>7<sup>th</sup> Semester</h2>
                        <p>Innovation</p>
                    </div>
                    <i class="fa-solid fa-lightbulb semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem7Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="semester-section">
                <div class="semester-header">
                    <div>
                        <h2>8<sup>th</sup> Semester</h2>
                        <p>Capstone</p>
                    </div>
                    <i class="fa-solid fa-graduation-cap semester-icon"></i>
                </div>
                <div class="subjects-grid">
                    @foreach ($sem8Notes as $notes)
                        <a href="{{$notes->drive_link ?? ''}}" class="subject-card"
                            data-type="{{lcfirst($notes->subject_type)}}" data-available="{{$notes->availability}}">
                            <div class="subject-header">
                                <div class="subject-icon">
                                    <i class="fa-solid {{$notes->subject_class}}"></i>
                                </div>
                                <div class="subject-status {{$notes->availability}}">
                                    <i class="fa-solid fa-check-circle"></i>
                                    @if($notes->availability == 'available')
                                        Available
                                    @else
                                        Coming Soon
                                    @endif
                                </div>
                            </div>
                            <h4 class="subject-title">{{$notes->subject_name}}</h4>
                            <div class="subject-info">
                                <span>
                                    @if($notes->credit_hours == 1)
                                        {{$notes->credit_hours}} Credit Hour
                                    @else
                                        {{$notes->credit_hours}} Credit Hours
                                    @endif
                                </span>
                                <span class="subject-type {{$notes->subject_type}}">
                                    {{ucfirst($notes->subject_type)}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- More semesters would follow the same pattern -->
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const subjectCards = document.querySelectorAll('.subject-card');
            const semesterSections = document.querySelectorAll('.semester-section');

            // Search functionality
            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                filterSubjects(searchTerm, getActiveFilter());
            });

            // Filter functionality
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.dataset.filter;
                    const searchTerm = searchInput.value.toLowerCase();
                    filterSubjects(searchTerm, filter);
                });
            });

            function getActiveFilter() {
                return document.querySelector('.filter-btn.active').dataset.filter;
            }

            function filterSubjects(searchTerm, filter) {
                let hasVisibleSubjects = {};

                subjectCards.forEach(card => {
                    const title = card.querySelector('.subject-title').textContent.toLowerCase();
                    const type = card.dataset.type;
                    const available = card.dataset.available === 'true';
                    const semester = card.closest('.semester-section');
                    const semesterId = semester.querySelector('.semester-header h2').textContent;

                    let matchesSearch = title.includes(searchTerm);
                    let matchesFilter = filter === 'all' ||
                        (filter === 'theory' && type === 'theory') ||
                        (filter === 'lab' && type === 'lab') ||
                        (filter === 'available' && available);

                    if (matchesSearch && matchesFilter) {
                        card.style.display = 'block';
                        hasVisibleSubjects[semesterId] = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show/hide semester sections based on visible subjects
                semesterSections.forEach(section => {
                    const semesterId = section.querySelector('.semester-header h2').textContent;
                    section.style.display = hasVisibleSubjects[semesterId] ? 'block' : 'none';
                });
            }

            // Add ripple effect to subject cards
            subjectCards.forEach(card => {
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

            // Add keyboard navigation
            subjectCards.forEach(card => {
                card.setAttribute('tabindex', '0');
                card.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        window.location.href = this.href;
                    }
                });
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