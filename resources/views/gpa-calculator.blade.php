<x-layout>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            line-height: 1.6;
        }

        section {
            max-width: 1400px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
            padding: 2rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .semester-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
        }

        .semester-wrapper label {
            font-weight: 600;
            color: #2d3748;
            font-size: 16px;
        }

        .semester-wrapper input[type="number"] {
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            width: 120px;
            transition: all 0.3s ease;
            outline: none;
        }

        .semester-wrapper input[type="number"]:focus {
            border-color: rgb(0, 132, 255);
            box-shadow: 0 0 0 4px rgba(0, 132, 255, 0.1);
        }

        .semester-wrapper input[type="button"] {
            padding: 12px 24px;
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .semester-wrapper input[type="button"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 132, 255, 0.3);
        }

        .table-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        #headers {
            background: linear-gradient(135deg, rgba(0, 132, 255, 0.1), rgba(49, 49, 255, 0.1));
            position: sticky;
            top: 0;
            z-index: 10;
        }

        #headers td {
            padding: 20px 12px;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            font-size: 14px;
            border-bottom: 2px solid rgba(0, 132, 255, 0.2);
        }

        tr:not(#headers) {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(226, 232, 240, 0.6);
        }

        tr:not(#headers):hover {
            background: rgba(0, 132, 255, 0.04);
        }

        tr:not(#headers):last-child {
            border-bottom: none;
        }

        td {
            padding: 16px 12px;
            text-align: center;
            vertical-align: middle;
        }

        td:first-child {
            text-align: left;
            font-weight: 600;
            color: #2d3748;
            min-width: 200px;
            font-size: 14px;
        }

        input[type="number"] {
            width: 80px;
            padding: 10px 8px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            outline: none;
            background: #ffffff;
        }

        input[type="number"]:focus {
            border-color: rgb(0, 132, 255);
            background: #f7fafc;
            box-shadow: 0 0 0 3px rgba(0, 132, 255, 0.1);
            transform: scale(1.05);
        }

        .percentage {
            background: linear-gradient(135deg, rgba(0, 132, 255, 0.1), rgba(49, 49, 255, 0.1)) !important;
            color: #2d3748 !important;
            font-weight: 700 !important;
        }

        .gpa {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255)) !important;
            color: white !important;
            font-weight: 700 !important;
        }

        .gpa-display {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 32px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .gpa-display::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
        }

        .gpa-display h4 {
            font-size: 28px;
            color: #2d3748;
            margin-bottom: 8px;
        }

        #final-gpa {
            background: linear-gradient(135deg, rgb(0, 132, 255), rgb(49, 49, 255));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 48px;
            font-weight: 900;
            display: block;
            margin-top: 8px;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            body {
                padding: 12px;
            }

            .semester-wrapper {
                padding: 20px;
                justify-content: center;
                text-align: center;
            }

            .table-container {
                border-radius: 12px;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            table {
                min-width: 900px;
            }

            #headers td {
                padding: 16px 8px;
                font-size: 12px;
            }

            td {
                padding: 12px 8px;
            }

            td:first-child {
                font-size: 12px;
                min-width: 160px;
                padding-left: 12px;
            }

            input[type="number"] {
                width: 70px;
                padding: 8px 6px;
                font-size: 13px;
            }

            .gpa-display {
                padding: 24px;
            }

            .gpa-display h4 {
                font-size: 24px;
            }

            #final-gpa {
                font-size: 36px;
            }
        }

        /* Extra small mobile */
        @media (max-width: 480px) {
            .semester-wrapper {
                padding: 16px;
                flex-direction: column;
                gap: 12px;
            }

            .semester-wrapper input[type="number"] {
                width: 100%;
                max-width: 200px;
            }

            .semester-wrapper input[type="button"] {
                width: 100%;
                max-width: 200px;
            }

            table {
                min-width: 800px;
            }

            #headers td {
                padding: 12px 6px;
                font-size: 11px;
            }

            td {
                padding: 10px 6px;
            }

            input[type="number"] {
                width: 60px;
                padding: 6px 4px;
                font-size: 12px;
            }

            td:first-child {
                min-width: 140px;
                font-size: 11px;
            }

            .gpa-display h4 {
                font-size: 20px;
            }

            #final-gpa {
                font-size: 32px;
            }
        }

        /* Tablet styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            input[type="number"] {
                width: 75px;
            }

            td:first-child {
                min-width: 180px;
            }
        }

        /* Loading animation for inputs */
        .calculating {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Improved focus states */
        input[type="number"]:focus {
            position: relative;
            z-index: 5;
        }

        /* Better scroll indicators */
        .table-container::-webkit-scrollbar {
            height: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: rgba(226, 232, 240, 0.3);
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, rgb(0, 132, 255), rgb(49, 49, 255));
            border-radius: 4px;
        }
    </style>
    <section>
        <div class="semester-wrapper">
            <label for="semester-input">Semester:</label>
            <input name="semester-input" type="number" id="semester-input" placeholder="2" min="1" max="8">
            <input type="button" value="Load Semester">
        </div>

        <div class="table-container">
            <table>
                <tr id="headers">
                    <td>Subject</td>
                    <td>Credit Hours</td>
                    <td>Assignment #1</td>
                    <td>Quiz #1</td>
                    <td>Mid-Terms</td>
                    <td>Assignment #2</td>
                    <td>Quiz #2</td>
                    <td>Terminals</td>
                    <td>Percentage</td>
                    <td>GPA</td>
                </tr>
                <tr id="circuit-analysis" data-subject="Circuit Analysis">
                    <td>Circuit Analysis</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="3"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="circuit-analysis-lab" data-subject="Circuit Analysis Lab">
                    <td>Circuit Analysis Lab</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="1"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="complex-variables-and-transforms" data-subject="Complex Variables and Transforms">
                    <td>Complex Variables and Transforms</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="3"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="computer-programming" data-subject="Computer Programming">
                    <td>Computer Programming</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="3"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="computer-programming-lab" data-subject="Computer Programming Lab">
                    <td>Computer Programming Lab</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="1"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="electronic-devices-and-circuits" data-subject="Electronic Devices and Circuits">
                    <td>Electronic Devices and Circuits</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="3"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="electronic-devices-and-circuits-lab" data-subject="Electronic Devices and Circuits Lab">
                    <td>Electronic Devices and Circuits Lab</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="1"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="holy-quran" data-subject="Holy Quran">
                    <td>Holy Quran with Translation, Tajveed and Tafseer</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="2"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
                <tr id="quantitative-reasoning-1" data-subject="Quantitative Reasoning I">
                    <td>Quantitative Reasoning I</td>
                    <td><input type="number" class="credit-hours" min="0" max="4" placeholder="3"></td>
                    <td><input type="number" class="assignment-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-1" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="mid-term" min="0" max="45" placeholder="45"></td>
                    <td><input type="number" class="assignment-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="quiz-2" min="0" max="10" placeholder="10"></td>
                    <td><input type="number" class="terminal" min="0" max="75" placeholder="75"></td>
                    <td><input type="number" class="percentage" min="0" max="100" placeholder="100" readonly></td>
                    <td><input type="number" class="gpa" min="0" max="4" step="0.01" placeholder="4.00" readonly></td>
                </tr>
            </table>
        </div>

        <div class="gpa-display">
            <h4>Final GPA</h4>
            <span id="final-gpa">0.0</span>
        </div>
    </section>

    <script>
        // Optimized JavaScript with better performance and cleaner code
        class GPACalculator {
            constructor() {
                this.gradingTable = [
                    { min: 90, gpa: 4.00 }, { min: 89, gpa: 3.95 }, { min: 88, gpa: 3.90 },
                    { min: 87, gpa: 3.85 }, { min: 86, gpa: 3.80 }, { min: 85, gpa: 3.75 },
                    { min: 84, gpa: 3.70 }, { min: 83, gpa: 3.65 }, { min: 82, gpa: 3.60 },
                    { min: 81, gpa: 3.55 }, { min: 80, gpa: 3.50 }, { min: 79, gpa: 3.45 },
                    { min: 78, gpa: 3.40 }, { min: 77, gpa: 3.35 }, { min: 76, gpa: 3.30 },
                    { min: 75, gpa: 3.25 }, { min: 74, gpa: 3.20 }, { min: 73, gpa: 3.15 },
                    { min: 72, gpa: 3.10 }, { min: 71, gpa: 3.05 }, { min: 70, gpa: 3.00 },
                    { min: 69, gpa: 2.95 }, { min: 68, gpa: 2.90 }, { min: 67, gpa: 2.85 },
                    { min: 66, gpa: 2.80 }, { min: 65, gpa: 2.75 }, { min: 64, gpa: 2.70 },
                    { min: 63, gpa: 2.65 }, { min: 62, gpa: 2.60 }, { min: 61, gpa: 2.55 },
                    { min: 60, gpa: 2.50 }, { min: 59, gpa: 2.45 }, { min: 58, gpa: 2.40 },
                    { min: 57, gpa: 2.35 }, { min: 56, gpa: 2.30 }, { min: 55, gpa: 2.25 },
                    { min: 54, gpa: 2.20 }, { min: 53, gpa: 2.15 }, { min: 52, gpa: 2.10 },
                    { min: 51, gpa: 2.05 }, { min: 50, gpa: 2.00 }, { min: 0, gpa: 0.00 }
                ];
                
                this.components = [
                    { class: 'assignment-1', weight: 5, total: 10 },
                    { class: 'quiz-1', weight: 5, total: 10 },
                    { class: 'mid-term', weight: 30, total: 45 },
                    { class: 'assignment-2', weight: 5, total: 10 },
                    { class: 'quiz-2', weight: 5, total: 10 },
                    { class: 'terminal', weight: 50, total: 75 }
                ];

                this.finalGpaElement = document.getElementById('final-gpa');
                this.debounceTimer = null;
                this.init();
            }

            init() {
                // Event delegation for better performance
                document.querySelector('table').addEventListener('input', (e) => {
                    if (e.target.type === 'number' && !e.target.readOnly) {
                        this.handleInput(e.target);
                    }
                });
            }

            handleInput(input) {
                // Debounce calculations to improve performance
                clearTimeout(this.debounceTimer);
                this.debounceTimer = setTimeout(() => {
                    const row = input.closest('tr');
                    if (row && row.id !== 'headers') {
                        this.calculateRowGPA(row);
                        this.calculateTotalGPA();
                    }
                }, 100);
            }

            calculateRowGPA(row) {
                let totalWeight = 0;
                let earnedWeight = 0;

                // Calculate weighted percentage
                this.components.forEach(comp => {
                    const input = row.querySelector(`.${comp.class}`);
                    const value = parseFloat(input.value);
                    
                    if (!isNaN(value) && value !== '') {
                        const percentage = value / comp.total;
                        earnedWeight += percentage * comp.weight;
                        totalWeight += comp.weight;
                    }
                });

                const projectedPercentage = totalWeight > 0 ? (earnedWeight / totalWeight) * 100 : 0;
                const gpa = this.getGPAFromPercentage(projectedPercentage);

                // Update UI
                const percentageInput = row.querySelector('.percentage');
                const gpaInput = row.querySelector('.gpa');
                
                percentageInput.value = projectedPercentage.toFixed(2);
                gpaInput.value = gpa.toFixed(2);
            }

            getGPAFromPercentage(percentage) {
                return this.gradingTable.find(grade => percentage >= grade.min)?.gpa || 0.00;
            }

            calculateTotalGPA() {
                let totalWeightedGPA = 0;
                let totalCredits = 0;

                // Get all subject rows (exclude headers)
                const rows = document.querySelectorAll('tr:not(#headers)');
                
                rows.forEach(row => {
                    const creditInput = row.querySelector('.credit-hours');
                    const gpaInput = row.querySelector('.gpa');
                    
                    const credits = parseFloat(creditInput.value);
                    const gpa = parseFloat(gpaInput.value);
                    
                    if (!isNaN(credits) && !isNaN(gpa) && credits > 0 && gpa > 0) {
                        totalWeightedGPA += gpa * credits;
                        totalCredits += credits;
                    }
                });

                const finalGPA = totalCredits > 0 ? (totalWeightedGPA / totalCredits) : 0;
                this.finalGpaElement.textContent = finalGPA.toFixed(2);
                
                // Add visual feedback for GPA ranges
                this.updateGPADisplay(finalGPA);
            }

            updateGPADisplay(gpa) {
                const element = this.finalGpaElement;
                element.className = ''; // Reset classes
                
                if (gpa >= 3.5) element.style.color = '#48bb78';
                else if (gpa >= 3.0) element.style.color = '#ed8936';
                else if (gpa >= 2.0) element.style.color = '#f56565';
                else element.style.color = '#e53e3e';
            }
        }

        // Initialize calculator when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new GPACalculator();
        });

        // Add smooth scroll for mobile horizontal scrolling
        if (window.innerWidth <= 768) {
            const tableContainer = document.querySelector('.table-container');
            let isScrolling = false;
            
            tableContainer.addEventListener('touchstart', () => {
                isScrolling = true;
            });
            
            tableContainer.addEventListener('touchend', () => {
                setTimeout(() => {
                    isScrolling = false;
                }, 100);
            });
        }

        // Add keyboard navigation support
        document.addEventListener('keydown', (e) => {
            if (e.target.type === 'number') {
                const inputs = Array.from(document.querySelectorAll('input[type="number"]:not([readonly])'));
                const currentIndex = inputs.indexOf(e.target);
                
                if (e.key === 'Tab' || e.key === 'Enter') {
                    e.preventDefault();
                    const nextIndex = e.shiftKey ? currentIndex - 1 : currentIndex + 1;
                    if (inputs[nextIndex]) {
                        inputs[nextIndex].focus();
                        inputs[nextIndex].select();
                    }
                }
            }
        });

        // Auto-save functionality (stores in memory only)
        class AutoSave {
            constructor() {
                this.data = {};
                this.init();
            }

            init() {
                this.loadData();
                this.setupAutoSave();
            }

            setupAutoSave() {
                document.querySelector('table').addEventListener('input', (e) => {
                    if (e.target.type === 'number' && !e.target.readOnly) {
                        this.saveData();
                    }
                });
            }

            saveData() {
                const rows = document.querySelectorAll('tr:not(#headers)');
                rows.forEach(row => {
                    const subjectId = row.id;
                    const inputs = row.querySelectorAll('input[type="number"]:not([readonly])');
                    
                    this.data[subjectId] = {};
                    inputs.forEach(input => {
                        if (input.className && input.value) {
                            this.data[subjectId][input.className] = input.value;
                        }
                    });
                });
            }

            loadData() {
                // In a real application, this would load from localStorage or server
                // For now, just initialize empty data
                this.data = {};
            }

            clearData() {
                this.data = {};
                document.querySelectorAll('input[type="number"]').forEach(input => {
                    if (!input.readOnly) {
                        input.value = '';
                    }
                });
            }
        }

        // Initialize auto-save
        new AutoSave();
    </script>
</x-layout>