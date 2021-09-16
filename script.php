
<?php
 $start=microtime(true);
 date_default_timezone_get('Europe/Moscow');
 session_start();
 if (!isset($_SESSION["Answer"])){
    $_SESSION["Answer"] = array();
}  
 $x=$_POST['x'];
 $y=$_POST['y'];
 $r=$_POST['r'];
 if (check_coord_square($x,$y,$r)){
     $correct='yes';
     $prog_time = number_format(microtime(true)-$start,10,".","")*1000000;
     $time = date("H:i:s");
     $result = array($x, $y, $r, $correct, $time, $prog_time);
     array_push($_SESSION["Answer"],$result);
     printAnsw();
     
 }
 else{
    $prog_time = number_format(microtime(true)-$start,10,".","")*1000000;
    $time = date("H:i:s");
    $correct='no';
    $result = array($x, $y, $r, $correct, $time, $prog_time);
    array_push($_SESSION["Answer"],$result);
    printAnsw();
 }
 
 
 function check_coord_square($x,$y,$r)
 {
    if ($y>=0)
    {
        
        if ($x<0)
        {
            return false;
        }
        else if ($x=0){
            return true;
        }
        else if (($x**2+$y**2)<=$r**2)
        {
            return true;
        }
        else{
            return false;
        }
    }
    else
    {
        if ($x<0)
        {
            if($x>=-$r and $y>=-$r)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else if ($x>=0)
        {
            if ($y>=$x-($r/2))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
 
function printAnsw(){
    echo"<table>
        <tr>
            <td>x</td>
            <td>y</td>
            <td>r</td>
            <td>correct</td>
            <td>time</td>
            <td>programm time</td>
            </tr>
        ";
    foreach($_SESSION["Answer"] as $answers)
    echo "<tr>
            <td> $answers[0] </td>
            <td> $answers[1] </td>
            <td> $answers[2] </td>
            <td> $answers[3] </td>
            <td> $answers[4] </td>
            <td> $answers[5] </td>
            </tr>";
}

 
 
 
?>