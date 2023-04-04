<!DOCTYPE html>
<html lang="en">
    <?php
    
    ini_set('resplay_errors', 0);

    $op = "";
    $num1 = 0;
    $num2 = 0;

    if (isset($_REQUEST['calculate']))
    {
        $op = $_REQUEST['operator'];
        $num1 = $_REQUEST['firstnum'];
        $num2 = $_REQUEST['secondnum'];
    }

    if ($op == '+'){
        $res = $num1 + $num2;
    }

    if ($op == '-'){
        $res = $num1 - $num2;
    }
    if ($op == '*'){
        $res = $num1 * $num2;
    }
    if ($op == '/'){
        $res = $num1 / $num2;
    }
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.6.4/math.min.js"integrity="sha512-iphNRh6dPbeuPGIrQbCdbBF/qcqadKWLa35YPVfMZMHBSI6PLJh1om2xCTWhpVpmUyb4IvVS9iYnnYMkleVXLA=="crossorigin="anonymous"referrerpolicy="no-referrer">
	</script>
</head>
<body>
    <p class="title">PHP Calculator</p>
    <table id="calculator">
        <tr>
            <td colspan="4">
                <input type="text" id="answer">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="AC" onclick="clear_input()" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="()" onclick="res('()')" onkeydown="ans(event)"> 
            </td>
            <td>
                <input type="button" value="%" onclick="res('%')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="/" onclick="res('/')" onkeydown="ans(event)">
            </td>
        </tr>

        <tr>
            <td>
                <input type="button" value="7" onclick="res('7')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="8" onclick="res('8')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="9" onclick="res('9')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="*" onclick="res('*')" onkeydown="ans(event)">
            </td>
        </tr>

        <tr>
            <td>
                <input type="button" value="4" onclick="res('4')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="5" onclick="res('5')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="6" onclick="res('6')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="-" onclick="res('-')" onkeydown="ans(event)">
            </td>
        </tr>

        <tr>
            <td>
                <input type="button" value="1" onclick="res('1')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="2" onclick="res('2')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="3" onclick="res('3')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="+" onclick="res('+')" onkeydown="ans(event)">
            </td>
        </tr>

        <tr>
            <td>
                <input type="button" value="0" onclick="res('0')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="." onclick="res('.')" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="clear" onclick="clearfield()" onkeydown="ans(event)">
            </td>
            <td>
                <input type="button" value="=" onclick="calculate()">
            </td>
        </tr>
    </table>

    <script>
        function res(val) {
            document.getElementById("answer").value += val
        }

        function clearfield() {
            let st = document.getElementById("answer").value
            document.getElementById("answer").value = st.substring(0, st.length-1);
        }

        function ans(event) {
            if (event.key == '0' || event.key == '1' 
            || event.key == '2' || event.key == '3' 
            || event.key == '4' || event.key == '5' 
            || event.key == '6' || event.key == '7' 
            || event.key == '8' || event.key == '9' 
            || event.key == '+' || event.key == '-' 
            || event.key == '*' || event.key == '/')
            document.getElementById("answer").value += event.key;
        }

        var cal = document.getElementById("calculator");
        cal.onkeyup = function(event) {
            if (event.keyCode === 13) {
                console.log("Enter");
                let a = document.getElementById("answer").value
                console.log(a);
                calculate();
            }
        }

        function calculate() {
            let a = document.getElementById("answer").value
            let b = math.evaluate(a)
            document.getElementById("answer").value = b
        }

        function clear_input() {
            document.getElementById("answer").value = ""
        }

    </script>
    
    <!-- <from>
        <label for="email-id">Email-id</label>
        <input type="text" name="email-id" required />
        <input type="submit" />
    </from> -->

</body>
</html>