<?php

$largura = isset($width) ? $width : 18.5;
$altura = isset($height) ? $height : 15.5;
$fill = isset($cor) ? $cor : '#fff';

echo '
<svg width="'.$largura.'" height="'.$altura.'" viewBox="0 0 '.$largura.' '.$altura.'" fill="none">
<path class="d" d="M18.42,8.13c.1-.24,.1-.52,0-.76-.05-.12-.12-.23-.22-.33L11.46,.29c-.39-.39-1.02-.39-1.41,0s-.39,1.02,0,1.41l5.04,5.04H1c-.55,0-1,.45-1,1s.45,1,1,1H15.09l-5.04,5.04c-.39,.39-.39,1.02,0,1.41,.2,.2,.45,.29,.71,.29s.51-.1,.71-.29l6.75-6.75c.09-.09,.17-.2,.22-.33Z"  fill="'.$fill.'"/>
</svg>
';