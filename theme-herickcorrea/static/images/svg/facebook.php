<?php

$largura = isset($width) ? $width : 24;
$altura = isset($height) ? $height : 24;
$fill = isset($cor) ? $cor : '#5E5D5F';

echo '
<svg width="'.$largura.'" height="'.$altura.'" viewBox="0 0 '.$largura.' '.$altura.'" fill="none">
<path d="M19.5 0C20.7396 0 21.7995 0.440104 22.6797 1.32031C23.5599 2.20052 24 3.26042 24 4.5V19.5C24 20.7396 23.5599 21.7995 22.6797 22.6797C21.7995 23.5599 20.7396 24 19.5 24H16.5625V14.7031H19.6719L20.1406 11.0781H16.5625V8.76562C16.5625 8.18229 16.6849 7.74479 16.9297 7.45312C17.1745 7.16146 17.651 7.01562 18.3594 7.01562L20.2656 7V3.76562C19.6094 3.67188 18.6823 3.625 17.4844 3.625C16.0677 3.625 14.9349 4.04167 14.0859 4.875C13.237 5.70833 12.8125 6.88542 12.8125 8.40625V11.0781H9.6875V14.7031H12.8125V24H4.5C3.26042 24 2.20052 23.5599 1.32031 22.6797C0.440104 21.7995 0 20.7396 0 19.5V4.5C0 3.26042 0.440104 2.20052 1.32031 1.32031C2.20052 0.440104 3.26042 0 4.5 0H19.5Z" fill="'.$fill.'"/>
</svg>
';