<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');"><span class="flash-text"><b>Error:</b> <?= $message ?></span></div>
