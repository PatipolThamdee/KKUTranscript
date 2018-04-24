<?php
$returnUrl = 'https://i.kku.ac.th';
header("Location: https://sso.kku.ac.th/logout.php?returnUrl={$returnUrl}");
