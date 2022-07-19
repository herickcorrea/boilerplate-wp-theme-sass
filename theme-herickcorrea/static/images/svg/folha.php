<?php

$largura = isset($width) ? $width : 123;
$altura = isset($height) ? $height : 120;
$fill = isset($cor) ? $cor : '#01C2D9';

echo '
<svg width="'.$largura.'" height="'.$altura.'" viewBox="0 0 '.$largura.' '.$altura.'" fill="none">
<path d="M0 53.3649V120H59.7908C83.0427 120 91.6218 115.115 106.295 103.341C122.903 90.0141 122.903 72.2448 122.903 66.6919V0.056793H66.4342C53.1473 0.0567567 35.1105 -1.36759 19.9303 10.0521C4.75004 21.4717 0 43.3696 0 53.3649Z" fill="'.$fill.'"/>
</svg>
';