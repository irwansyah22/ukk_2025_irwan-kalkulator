<?php
    $display = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['clear'])) {
            $display = '';
        } else if (isset($_POST['expression'])) {
            $expression = $_POST['expression'];
            $display = eval("return $expression;");
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="styles.css"
</head>
<body>
    <div class="calculator">
        <form method="post">
            <div class="display-container">
                <button type="submit" name="clear" class="button clear">C</button>
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
            <button type="submit" class="button equal">=</button>
            <button type="button" class="button operator" onclick="appendValue('+')">+</button><br>
        </form>
    </div>
    <script>
        function appendValue(value) {
            document.getElementById('display').value += value;
        }
    </script>
</body>
</html>