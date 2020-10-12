<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part2</title>
    <style>
        body{
            background-color: #2A1541;
            font-family: arial;
            background-image: url("salary-background-1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .wrapper{
            margin: auto;
            width: 70%;
            display: flex;
            column-gap: 30px;
        }
        form{
            margin:auto;
            margin-top:150px;
            font-size:22px;
            background-color:#F7665E;
            padding:50px;
            border-radius:30px;
        }
        .table{
            margin:auto;
            margin-top:200px; 
            background-color:white;
        }
        h1{
            position:fixed;
            left:300px;
            right:300px;
            color:#770100;

        }
        label{
            color:black;  
        }
        table {
            border-collapse: collapse;

        }

        table, th, td {
         border: 1px solid black;
         
        }
        th, td{
            width:200px;
            height:40px;
        }
        td{
            text-align: center;
        
        }
        th{
            background-color:#F7665E;
        }
    </style>
</head>
<body>

    <div class="wrapper">
    <h1>Income Tax Calculator</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Salary in USD:</label>
            <input type="number" name="salary" value="<?php if (isset($_POST['salary'])){echo $_POST['salary'];}?>" required>
            <br><br>
            <input type="radio" id="monthly" name="yearly-monthly" value="monthly" required>
            <label for="monthly">Monthly</label><br>
            <input type="radio" id="yearly" name="yearly-monthly" value="yearly" required>
            <label for="yearly">Yearly</label>
            <br><br>
            <label>Tax Free Allowance in USD:</label>
            <input type="number" name="taxFree" value="<?php if (isset($_POST['taxFree'])){echo $_POST['taxFree'];}?>" required>
            <br><br>
            <input class="submit" type="submit" name="submit" value="Submit">  

        </form>
    
    <?php
$salary=$taxFree="";
$taxAmount=$ssf=$salaryFinal=0;
$test="";
$yearly=false;
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])){
        if (!empty($_POST["salary"])) {
            $salary=test_input($_POST["salary"]);
        }
        if (!empty($_POST["yearly-monthly"])) {
            $test=test_input($_POST["yearly-monthly"]);
             if ($test=="yearly"){
                 $yearly=true;
             }else{
                 $yearly=false;
             }
        }
        if (!empty($_POST["taxFree"])) {
            $taxFree=test_input($_POST["taxFree"]);
        }
        if ($yearly){
            $ssf=$salary * 4/100;
            if($salary<=10000){
                $taxAmount=0;
                $ssf=0;
            }
            elseif($salary<=25000 and $salary>10000){
                $taxAmount= $salary * 11/100;
            }
            elseif($salary<=50000 and $salary>25000){
                $taxAmount= $salary * 30/100;
            }
            elseif($salary>50000){
                $taxAmount= $salary * 45/100;
            }
            $salaryFinal=$salary - $taxAmount - $ssf + $taxFree;
            echo"<div class='table'>";
            echo"<table>";
            echo"<tr>";
            echo"<th> </th>";
            echo"<th>Yearly</th>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Total Salary</th>";
            echo"<td>$salary</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Tax Amount</th>";
            echo"<td>$taxAmount</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Social Security Fee</th>";
            echo"<td>$ssf</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Salary after tax </th>";
            echo"<td>$salaryFinal</td>";
            echo"</tr>";
            echo"</table>";
            echo "</div>";

        }else{
            $ssf=$salary * 4/100;
            if($salary*12<=10000){
                $taxAmount=0;
                $ssf=0;
            }
            elseif($salary*12<=25000 and $salary*12>10000){
                $taxAmount= $salary * 11/100;
            }
            elseif($salary*12<=50000 and $salary*12>25000){
                $taxAmount= $salary * 30/100;
            }
            elseif($salary*12>50000){
                $taxAmount= $salary * 45/100;
            }
            $salaryFinal=$salary - $taxAmount - $ssf + ($taxFree/12);
            echo"<div class='table'>";
            echo"<table>";
            echo"<tr>";
            echo"<th> </th>";
            echo"<th>Monthly</th>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Total Salary</th>";
            echo"<td>$salary</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Tax Amount</th>";
            echo"<td>$taxAmount</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Social Security Fee</th>";
            echo"<td>$ssf</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>Salary after tax </th>";
            echo"<td>$salaryFinal</td>";
            echo"</tr>";
            echo"</table>";
            echo "</div>";
        }
    }
}   
?>
</div>
</body>
</html>