<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalkulator PHP</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container{
            text-align: center;
        }

        h1{
            margin-bottom: 20px;
            font-size: 40px;
        }

        .calculator{
            background: #1f1f1f;
            padding: 20px;
            border-radius: 20px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        #display{
            width: 100%;
            height: 70px;
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: right;
            padding: 10px;
            font-size: 35px;
            background: #2d2d2d;
            color: white;
        }

        .buttons{
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button{
            height: 70px;
            border: none;
            border-radius: 12px;
            font-size: 25px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover{
            transform: scale(0.95);
        }

        .number{
            background: #3a3a3a;
            color: white;
        }

        .operator{
            background: orange;
            color: white;
        }

        .equal{
            background: #00b894;
            color: white;
        }

        .clear{
            background: #d63031;
            color: white;
        }

    </style>
</head>
<body>

<div class="container">

    <h1>Kalkulator PHP</h1>

    <div class="calculator">

        <input type="text" id="display" readonly>

        <div class="buttons">

            <button class="clear" onclick="clearDisplay()">C</button>
            <button class="operator" onclick="appendValue('/')">÷</button>
            <button class="operator" onclick="appendValue('*')">×</button>
            <button class="operator" onclick="appendValue('-')">-</button>

            <button class="number" onclick="appendValue('7')">7</button>
            <button class="number" onclick="appendValue('8')">8</button>
            <button class="number" onclick="appendValue('9')">9</button>
            <button class="operator" onclick="appendValue('+')">+</button>

            <button class="number" onclick="appendValue('4')">4</button>
            <button class="number" onclick="appendValue('5')">5</button>
            <button class="number" onclick="appendValue('6')">6</button>
            <button class="equal" onclick="calculate()">=</button>

            <button class="number" onclick="appendValue('1')">1</button>
            <button class="number" onclick="appendValue('2')">2</button>
            <button class="number" onclick="appendValue('3')">3</button>
            <button class="number" onclick="appendValue('.')">.</button>

            <button class="number" style="grid-column: span 4;" onclick="appendValue('0')">0</button>

        </div>

    </div>

</div>

<script>

    function appendValue(value){
        document.getElementById("display").value += value;
    }

    function clearDisplay(){
        document.getElementById("display").value = "";
    }

    function calculate(){

        let display = document.getElementById("display");

        try{
            display.value = eval(display.value);
        }
        catch{
            display.value = "Error";
        }

    }

    // SUPPORT KEYBOARD

    document.addEventListener("keydown", function(event){

        let key = event.key;

        // ANGKA
        if(key >= '0' && key <= '9'){
    appendValue(key);
}

        // OPERATOR
        else if(key === "+" || key === "-" || key === "*" || key === "/"){
            appendValue(key);
        }

        // TITIK
        else if(key === "."){
            appendValue(".");
        }

        // ENTER
        else if(key === "="){
            calculate();
        }

        // BACKSPACE
        else if(key === "Backspace"){

            let display = document.getElementById("display");

            display.value = display.value.slice(0, -1);

        }

        // ESC = CLEAR
        else if(key === "Escape"){
            clearDisplay();
        }

    });

</script>

</body>
</html>