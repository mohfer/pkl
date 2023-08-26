<?php

function sanitizeInput($input)
{
    if (is_array($input)) {
        return array_map('sanitizeInput', $input);
    }

    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

$_POST = sanitizeInput($_POST);
