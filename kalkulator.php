<?php
    $display = '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <form method="post">
            <div class="display-container">
                <button type="submit" name="clear" class="button clear" onclick="document.getElementById('display').value = '';">C</button>
                <button type="button" class="button backspace" onclick="backspace()">⌫</button>
                <input type="text" name="expression" class="display" id="display" value="<?= htmlspecialchars($display) ?>" readonly>
            </div>
            <button type="button" class="button number" onclick="appendValue('7')">7</button>
            <button type="button" class="button number" onclick="appendValue('8')">8</button>
            <button type="button" class="button number" onclick="appendValue('9')">9</button>
            <button type="button" class="button operator" onclick="appendValue('/')">÷</button><br>
            <button type="button" class="button number" onclick="appendValue('4')">4</button>
            <button type="button" class="button number" onclick="appendValue('5')">5</button>
            <button type="button" class="button number" onclick="appendValue('6')">6</button>
            <button type="button" class="button operator" onclick="appendValue('*')">×</button><br>
            <button type="button" class="button number" onclick="appendValue('1')">1</button>
            <button type="button" class="button number" onclick="appendValue('2')">2</button>
            <button type="button" class="button number" onclick="appendValue('3')">3</button>
            <button type="button" class="button operator" onclick="appendValue('-')">−</button><br>
            <button type="button" class="button number" onclick="appendValue('.')">.</button>
            <button type="button" class="button number" onclick="appendValue('0')">0</button>
            <button type="button" class="button equal" onclick="calculate()">=</button>
            <button type="button" class="button operator" onclick="appendValue('+')">+</button><br>
        </form>
    </div>
    <script>
        function formatNumber(num) {
            // Pastikan desimal tidak diubah oleh format angka
            const [integer, decimal] = num.toString().split(".");
            const formattedInteger = integer.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return decimal ? `${formattedInteger},${decimal}` : formattedInteger;
        }

        function appendValue(value) {
            const display = document.getElementById('display');
            if (value === '/') {
                display.value += '÷'; // Tampilkan ÷ pada layar
            } else if (value === '*') {
                display.value += 'x'; // Tampilkan x pada layar
            } else {
                display.value += value; // Tambahkan karakter biasa
            }
        }

        function backspace() {
            const display = document.getElementById('display');
            display.value = display.value.slice(0, -1);
        }

        function calculate() {
            const display = document.getElementById('display');
            try {
                // Ganti simbol ÷ menjadi / dan x menjadi * untuk evaluasi
                const expression = display.value
                    .replace(/÷/g, '/')
                    .replace(/x/g, '*')
                    .replace(/,/g, '.'); // Pastikan desimal menggunakan titik untuk evaluasi
                const result = eval(expression);
                display.value = formatNumber(result); // Format hasil dengan pemisah ribuan dan koma untuk desimal
            } catch (error) {
                display.value = 'Error';
            }
        }
    </script>
</body>
</html>