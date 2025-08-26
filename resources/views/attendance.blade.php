<x-layout>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
        }

        .attendance {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
            padding: 2rem;
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

        .list {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .subject {
            display: grid;
            grid-template-columns: 60px 1fr 100px 100px 100px 120px;
            gap: 20px;
            padding: 10px 24px;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            border-bottom: 1px solid rgba(226, 232, 240, 0.6);
        }

        .subject:last-child {
            border-bottom: none;
        }

        .subject-headers {
            background: linear-gradient(135deg, rgba(0, 132, 255, 0.1), rgba(49, 49, 255, 0.1));
            font-weight: 600;
            color: #2d3748;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .subject:not(.subject-headers):hover {
            background: rgba(0, 132, 255, 0.04);
            transform: translateX(4px);
        }

        .number {
            font-weight: 600;
            color: #4a5568;
            text-align: center;
            font-size: 14px;
        }

        .name {
            min-width: 0;
        }

        .name h4 {
            font-size: 16px;
            color: #2d3748;
            margin-bottom: 4px;
            font-weight: 600;
            line-height: 1.3;
        }

        .name p {
            font-size: 13px;
            color: #718096;
            font-weight: 500;
        }

        .lectures,
        .present,
        .absent {
            text-align: center;
            font-weight: 600;
            color: #4a5568;
            font-size: 15px;
        }

        .attendance {
            text-align: center;
            font-weight: 700;
            font-size: 16px;
            position: relative;
        }

        .subject-headers .attendance {
            color: #2d3748;
        }

        .subject:not(.subject-headers) .attendance {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            color: white;
            padding: 8px 12px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 132, 255, 0.3);
            transition: all 0.3s ease;
        }

        .subject:not(.subject-headers) .attendance:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 132, 255, 0.4);
        }

        .footer-text {
            font-size: 12px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 16px;
            padding: 12px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            body {
                padding: 16px;
            }

            .subject {
                grid-template-columns: none;
                grid-template-areas:
                    "number name attendance"
                    "stats stats stats";
                gap: 12px;
                padding: 20px 16px;
            }

            .number {
                grid-area: number;
                align-self: start;
                margin-top: 2px;
            }

            .name {
                grid-area: name;
                min-width: 0;
            }

            .name h4 {
                font-size: 15px;
                margin-bottom: 2px;
            }

            .name p {
                font-size: 12px;
            }

            .attendance {
                grid-area: attendance;
                justify-self: end;
                align-self: start;
            }

            .lectures,
            .present,
            .absent {
                grid-area: stats;
                display: flex;
                justify-content: space-between;
                background: rgba(247, 250, 252, 0.8);
                padding: 12px 16px;
                border-radius: 12px;
                margin-top: 8px;
            }

            .subject-headers .lectures,
            .subject-headers .present,
            .subject-headers .absent {
                display: none;
            }

            .subject:not(.subject-headers) .lectures::before {
                content: "Lectures: ";
                color: #718096;
                font-weight: 500;
            }

            .subject:not(.subject-headers) .present::before {
                content: "Present: ";
                color: #48bb78;
                font-weight: 500;
            }

            .subject:not(.subject-headers) .absent::before {
                content: "Absent: ";
                color: #f56565;
                font-weight: 500;
            }

            .subject:not(.subject-headers) .lectures,
            .subject:not(.subject-headers) .present,
            .subject:not(.subject-headers) .absent {
                background: none;
                padding: 0;
                margin: 0;
                font-size: 14px;
                display: block;
                text-align: left;
            }

            .subject:not(.subject-headers) {
                background: rgba(255, 255, 255, 0.6);
                border-radius: 16px;
                margin-bottom: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            .subject:not(.subject-headers):hover {
                transform: none;
                background: rgba(255, 255, 255, 0.8);
            }

            .subject-headers {
                background: none;
                padding: 16px;
                border-bottom: 2px solid rgba(255, 255, 255, 0.3);
                border-radius: 0;
                margin-bottom: 16px;
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
                margin-top: 12px;
            }

            .stat-item {
                background: rgba(247, 250, 252, 0.9);
                padding: 12px;
                border-radius: 10px;
                text-align: center;
                backdrop-filter: blur(10px);
            }

            .stat-label {
                font-size: 11px;
                color: #718096;
                font-weight: 500;
                margin-bottom: 4px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .stat-value {
                font-size: 16px;
                font-weight: 700;
                color: #2d3748;
            }

            .list {
                border-radius: 16px;
            }
        }

        /* Extra small mobile */
        @media (max-width: 480px) {
            .subject {
                padding: 16px 12px;
            }

            .name h4 {
                font-size: 14px;
            }

            .name p {
                font-size: 11px;
            }

            .subject:not(.subject-headers) .attendance {
                padding: 6px 10px;
                font-size: 14px;
                border-radius: 10px;
            }
        }

        /* Tablet styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .subject {
                grid-template-columns: 50px 1fr 90px 90px 90px 110px;
                gap: 16px;
                padding: 18px 20px;
            }

            .name h4 {
                font-size: 15px;
            }

            .lectures,
            .present,
            .absent,
            .attendance {
                font-size: 14px;
            }
        }
    </style>
    <section class="attendance">
        <div class="list">
            <div class="subject subject-headers">
                <div class="number">S#</div>
                <div class="name">
                    <h4>Subject Name</h4>
                </div>
                <div class="lectures">Lectures</div>
                <div class="present">Present</div>
                <div class="absent">Absent</div>
                <div class="attendance">Attendance</div>
            </div>

            @if(count($attendance) == 0)
                <h4>No subjects registered.</h4>
            @else

                @foreach ($attendance as $subject)
                    <?php        $subjectNumber = 1; ?>
                    @if (strpos($subject['Course Title'], ' Lab'))
                        <div class="subject">
                            <div class="number">{{$subject['$S#'] ?? $subjectNumber}}</div>
                            <div class="name">
                                <h4>{{$subject['Course Title'] }}</h4>
                                <p>{{$subject['Faculty']}}</p>
                            </div>
                            <div class="lectures">{{$subject['Lab Lectures']}}</div>
                            <div class="present">{{$subject['Lab Present'] }}</div>
                            <div class="absent">{{$subject['Lab Absent']}}</div>
                            <div class="attendance">{{$subject['Lab %']}}</div>
                        </div>
                    @else
                        <div class="subject">
                            <div class="number">{{$subject['$S#'] ?? $subjectNumber}}</div>
                            <div class="name">
                                <h4>{{$subject['Course Title'] }}</h4>
                                <p>{{$subject['Faculty']}}</p>
                            </div>
                            <div class="lectures">{{$subject['Lectures']}}</div>
                            <div class="present">{{$subject['Present'] }}</div>
                            <div class="absent">{{$subject['Absent']}}</div>
                            <div class="attendance">{{$subject['Theory %']}}</div>
                        </div>
                    @endif
                    <?php        $subjectNumber++; ?>
                @endforeach
            @endif
    </section>

    <script>
        // Add mobile-specific enhancements
        if (window.innerWidth <= 768) {
            document.querySelectorAll('.subject:not(.subject-headers)').forEach(subject => {
                const lectures = subject.querySelector('.lectures');
                const present = subject.querySelector('.present');
                const absent = subject.querySelector('.absent');

                if (lectures && present && absent) {
                    // Create stats grid for mobile
                    const statsGrid = document.createElement('div');
                    statsGrid.className = 'stats-grid';

                    // Create stat items
                    const lecturesItem = document.createElement('div');
                    lecturesItem.className = 'stat-item';
                    lecturesItem.innerHTML = `
                        <div class="stat-label">Lectures</div>
                        <div class="stat-value">${lectures.textContent}</div>
                    `;

                    const presentItem = document.createElement('div');
                    presentItem.className = 'stat-item';
                    presentItem.innerHTML = `
                        <div class="stat-label">Present</div>
                        <div class="stat-value">${present.textContent}</div>
                    `;

                    const absentItem = document.createElement('div');
                    absentItem.className = 'stat-item';
                    absentItem.innerHTML = `
                        <div class="stat-label">Absent</div>
                        <div class="stat-value">${absent.textContent}</div>
                    `;

                    // Add items to grid
                    statsGrid.appendChild(lecturesItem);
                    statsGrid.appendChild(presentItem);
                    statsGrid.appendChild(absentItem);

                    // Replace original elements
                    lectures.style.display = 'none';
                    present.style.display = 'none';
                    absent.style.display = 'none';

                    subject.appendChild(statsGrid);
                }
            });
        }
    </script>
</x-layout>