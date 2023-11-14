<?php

$sum = 0; 

for($i = 1; $i < 1000; $i++)
{
    if($i % 3 == 0 || $i % 5 == 0)
        $sum += $i;
}

echo $sum . "<br>";
?>

<?php
//ex 97

print bcmod(bcadd(1, bcmul(28433, bcpowmod(2, 7830457, 1e10))), 1e10);
?>

<?php
//ex 30
//objetivo encontrar a soma de todos os nÃºmeros que podem ser escritos como a soma das quinta potÃªncia de seus dÃ­gitos

function is_fith_power($num)
{
    $digits = str_split($num);
    foreach($digits as &$value)
    {
        $value = pow($value, 5);
    }
    
    if(array_sum($digits) == $num)
        return true;
    else
        return false;
}

$sum = 0;
for($i = 2; $i <= pow(9, 5) * 6; $i++)
{
    if(is_fith_power($i))
    {
        $sum += $i;
        print "\n$i pode ser escrito como a soma das quintas potÃªncias de seus dÃ­gitos.\n";
    }
}

print $sum;
?>

<?php
//ex 9

for($a = 1; $a < 1000; $a++)
{
    for($b = 1; $b < 1000; $b++)
    {
        $c = 1000 - $a - $b;
        
        if($a + $b +$c === 1000 && pow($a, 2) + pow($b, 2) == pow($c, 2) && $c > 0)
        {
            print $a * $b * $c;        
            exit;
        }
    }
}
?>

<?php
$sum = 0;
$curr = 2;
$prev = 1;
$goal = 4000000;

while ($curr < $goal) {
    if($curr % 2 == 0) {
        $sum += $curr;
    }

    $tmp = $prev;
    $prev = $curr;
    $curr += $tmp;
}

echo "$sum\n";

?>