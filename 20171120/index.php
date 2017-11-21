<?php
$data=array(
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)   
);
?>
<?php
/********************************for******************************************/
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo "<table><tr><th>  Name  </th><th>  Stock  </th><th>  Sold  </th></tr>";
for($i=0;$i<count($data);$i++){
    echo "<tr>";
    for($j=0;$j<count($data[$i]);$j++){
        echo "<td>".$data[$i][$j]."</td>";
    }
    echo "</tr>";            
}
echo "</table>";
?>

<?php
/********************************foreach****************************************/
function td($outterarray){
    $innerarray="";
    foreach($outterarray as $key=>$value){
        $innerarray.="<td>".$value."</td>";
    }
    return $innerarray;    
}
echo "<table><tr><th>Name</th><th>Stock</th><th>Sold</th></tr>";
foreach($data as $key=>$value){
    echo '<tr>'.td($value).'</tr>';
}
echo "</table>";

?>
<?php
/********************************array_map + join*********************************/

/*The funtion is for dealing row*/
function tr($dataarry){
    /*$array1 is the string array with each <td>...</td>*/
    $array1=array_map("tc",$dataarry);
    $joinresult=join("",$array1);
    return "<tr>".$joinresult."</tr>";
    
}
/*The funtion is for dealing col*/
function tc($datacontent){        
    return "<td>".$datacontent."</td>";     
}

/*$array0 is the string array with each <tr>...</tr>*/
$array0=array_map("tr",$data);

$result=join("",$array0);
echo "<table><tr><th>Name</th><th>Stock</th><th>Sold</th></tr>$result</table>";

?>
