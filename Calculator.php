<style>
body{
    text-align:center;
    margin-top:40px;
    border:2px solid black;
}
</style>
<body>
<h1>Addition Calclutor only</h1>
<form method="POST" >
Number 1: <input type="number" name="number1"><br><br>
Number 2:<input type="number" name="number2">
<input type="Submit" name="Submit" value="Add">
</form>

<h3><?php
if(isset($_POST['Submit']))
{
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $Sum = $number1 + $number2;
    echo "The sum is $Sum";
}
else{
    echo "Enter the number";
}
?>
</h3>
</body>