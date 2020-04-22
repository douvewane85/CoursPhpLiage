<?php
//Variables de types simples
/*$a=12; echo $a;//12
$a=15; echo $a;//15
$b=12.5;
$c="xxxx";
$c1='cccc';
$ok=true;
$z=null;
//Variables de types composés
$tab=[12,34,"bonjour",true,2.5 ,[12,2556]];

//Constantes
define("PI",3.14);
echo PI;
//expressions
//arithmétique
$a+$b;
//comparaison
$a>$b
//logique
$a>$b or $a<$b
*/
$a=2;
$b=0;
$som=$a+$b;

echo "<br/>";
$produit=$a*$b;


echo "<br/>";
if($b!=0){
    $quotient=$a/$b;
    echo "Le quotient  est $quotient";
}else{
    echo "Division Impossible";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<span class="color">La somme est</span><?php echo $som;?>
<br/>
<span  class="color"> <?php echo $produit;?> est le produit </span>
<br/>
</body>
</html>

<style type="text/css">
.color{
    color:green;
}

</style>