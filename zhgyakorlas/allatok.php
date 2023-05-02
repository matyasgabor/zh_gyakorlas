<!DOCTYPE html>
<html>
<head>
    <title>Állatkert</title>
    <link rel="stylesheet" type="text/css" href="allatok.css">
</head>
<body>
<h1 id="nevneptun">Név: Mátyás Gábor Neptun-kód: VC1NRK</h1>    
<?php

if(!isset($_GET['faj'])){
echo "<h2 id='hiba'>Nincs megadva faj!</h2>";
}
else{

    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,'allatok');
    $lekerdezes = sprintf("select allat.ID, allat.nev, min(gondozo.kor) from allat
    join ag on ag.AllatID = allat.ID
    join gondozo on gondozo.ID = ag.GondozoID
    where allat.faj = '%s'
    group by allat.ID,allat.nev
    order by allat.nev;",$_GET['faj']);
    $legfiatalabb = mysqli_query($link,$lekerdezes);

    echo "<table>";
    echo "<tr><th>Azonosító</th><th>Név</th><th>Kor</th></tr>";

    while($sor = mysqli_fetch_array($legfiatalabb))
    {
            $id=$sor[0];
            $nev=$sor[1];
            $kor=$sor[2];
            echo "<tr><td>$id</td><td>$nev</td><td>$kor</td></tr> ";
    }
    
    echo "</table>";
mysqli_close($link);

}

?>

</body>
</html>