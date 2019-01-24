<?php
$side = 30;
$space = 2;
// $tip = sqrt($side*$side-$side/2*$side/2);
$tip = 27;

$colors = ["#f0f0f0",
           "#f1f1f1",
           "#f2f2f2",
           "#f3f3f3",
           "#f4f4f4",
           "#f5f5f5",
           "#f6f6f6",
           "#f7f7f7",
           "#f8f8f8",
           "#fbfbfb",
          ];

/*
$colors = ["red",
           "blue",
           "yellow",
           "green",
          ];
*/

// works only >= PHP7.3
// $bounds = gmp_lcm($side + $space, $tip + $space);
$bounds = 224;
echo '<svg height="'.$bounds.'" width="'.$bounds.'">';

$max = $bounds / ($side + $space);
$startColor = 0;
$startColorReverse = 0;
for ($x = 0; $x <= $max; $x++) {
  for ($y = 0; $y <= $max; $y++) {
    $x1 = $x * $space / 2 + $x * $tip;
    $y1 = $y * $space + $y * $side;
    $x2 = $x1;
    $y2 = $y1 + $side;
    $x3 = $x * $space / 2 + ($x + 1) * $tip;
    $y3 = $y * $space + $y * $side + $side / 2;
    if($x % 2 == 1) {
      $shift = $side / 2 + $space / 2;
      $y1 -= $shift;
      $y2 -= $shift;
      $y3 -= $shift;
    }
    $color = array_rand($colors);
    if($y == 0) {
      $startColor = $color;
    }
    if($y == $max) {
      $color = $startColor;
    }
    echo '<polygon points="'.$x1.','.$y1.' '.$x2.','.$y2.' '.$x3.','.$y3.'" style="fill:'.$colors[$color].'" />';

    $x1 += $tip;
    $x2 = $x1;
    $x3 -= $tip;
    if($x % 2 == 0) {
      $shift = $side / 2 + $space / 2;
      $y1 -= $shift;
      $y2 -= $shift;
      $y3 -= $shift;
    } else {
      $shift = $side / 2 + $space / 2;
      $y1 += $shift;
      $y2 += $shift;
      $y3 += $shift;
    }
    $color = array_rand($colors);
    if($y == 0) {
      $startColorReverse = $color;
    }
    if($y == $max) {
      $color = $startColorReverse;
    }
    echo '<polygon points="'.$x1.','.$y1.' '.$x2.','.$y2.' '.$x3.','.$y3.'" style="fill:'.$colors[$color].'" />';
  }
}

echo '</svg>';
?>
