<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Card</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="style-home.css">
</head>
<body>
    <nav class="navbar">
        <ul class="menu">
            <li><a href="index.php">My Card</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="university.php">University</a></li>
            <li><a href="login.php">Log in</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="left-block">
            <h2>Карніц Роман Сергійович</h2>
            <p>Інститут: ІКТА</p>
            <p>Кафедра: Інститут комп'ютерних технологій, автоматики та метрології</p>
            <p>Академічна група: КІ-48</p>
            <p>Форма навчання: денна</p>
            <p>Рік навчання: 4</p>
            <p>Початок навчання: Sep 30 2020 12:00AM</p>
            <p>Кінець навчання: Jun 30 2024 12:00AM</p>
            <p>Е-пошта: Roman.Karnits.KI.2020@lpnu.ua</p>
        </div>
        <div class="right-block">
            <table>
                <tr>
                    <th>Дисципліна</th>
                    <th>Сем.</th>
                    <th>Кред. ЄКТС</th>
                    <th>Год. всього</th>
                    <th>Каф.</th>
                    <th>Оц. 100</th>
                    <th>Оц. 2-5</th>
                </tr>
                <tr>
                    <td>Автоматизоване проектування комп'ютерних систем</td>
                    <td>7</td>
                    <td>4.5</td>
                    <td>135</td>
                    <td>СКС</td>
                    <td><input type="text" name="grade1" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
                <tr>
                    <td>Архітектура спеціалізованих комп'ютерних систем</td>
                    <td>7</td>
                    <td>6</td>
                    <td>180</td>
                    <td>СКС</td>
                    <td><input type="text" name="grade2" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
                <tr>
                    <td>Інформаційно-вимірювальні обчислювальні системи</td>
                    <td>7</td>
                    <td>5</td>
                    <td>150</td>
                    <td>СКС</td>
                    <td><input type="text" name="grade3" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
                <tr>
                    <td>Обробка сигналів і зображень</td>
                    <td>7</td>
                    <td>5</td>
                    <td>150</td>
                    <td>СКС</td>
                    <td><input type="text" name="grade4" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
                <tr>
                    <td>Обробка сигналів і зображень</td>
                    <td>7</td>
                    <td>2</td>
                    <td>60</td>
                    <td>СКС</td>
                    <td><input type="text" name="grade5" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
                <tr>
                    <td>Проектно-технологічна практика</td>
                    <td>7</td>
                    <td>4.5</td>
                    <td>135</td>
                    <td>СКС</td>
                    <td><input type="text" name="grade6" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
                <tr>
                    <td>Технології сховищ даних</td>
                    <td>7</td>
                    <td>6</td>
                    <td>180</td>
                    <td>ЕОМ</td>
                    <td><input type="text" name="grade7" onchange="calculateGrade(this)"></td>
                    <td><input type="text" name="grade1to5" readonly></td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        function calculateGrade(input) {
            var grade100 = parseInt(input.value);
            var grade1to5Input = input.parentElement.nextElementSibling.querySelector('input[name="grade1to5"]');
            if (!isNaN(grade100)) {
                if (grade100 >= 0 && grade100 <= 50) {
                    grade1to5Input.value = '2';
                } else if (grade100 >= 51 && grade100 <= 70) {
                    grade1to5Input.value = '3';
                } else if (grade100 >= 71 && grade100 <= 87) {
                    grade1to5Input.value = '4';
                } else if (grade100 >= 88 && grade100 <= 100) {
                    grade1to5Input.value = '5';
                } else {
                    grade1to5Input.value = ''; // Очистити поле, якщо введена оцінка виходить за межі діапазону
                }
            } else {
                grade1to5Input.value = ''; // Очистити поле, якщо введено нечислове значення
            }
        }
    </script>
    <!-- Футер -->
    <footer>
        <p>WEB2324</p>
    </footer>
</body>
</html>
