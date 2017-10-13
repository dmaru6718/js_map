<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>マップアプリの感想</h1>
<?php
    $subject=array('とても面白かった','面白かった','普通','つまらなかった','とてもつまらなかった');
for($i=0; $i<count($subject); $i++){
    echo "<input type='radio' name='kanso' value='$i'>{$subject[$i]}<br>\n";
}
        ?>
    <br>
    
    <input type="submit" name="submit" value="送信">
    
    <?php
     $data=file('hw1.txt');
for($i=0; $i<count($subject); $i++){
    $data[$i]=rtrim($data[$i]);
}
if(isset($_POST['submit'])){
    $data[$_POST['kanso']]++;
    $fp=@fopen('hwphp.txt','w');
    fwrite($fp,$data[$_POST['kanso']]."\n");
    fclose($fp);
}

echo "<hr>";
for($i=0; $i<count($subject); $i++){
    echo "<tr>";
    echo "<td>{$subject[$i]}</td>";
    echo "<td><table><tr>";
    $wd=$data[$i]*10;
    echo "<td width='$wd' bgcolor='#eeeeee'> </td>";
    echo "<td>{$data[$i]} 票</td>";
    echo "</tr></table></td>";
    echo "</tr>\n";
}
?>
    
</body>
</html>