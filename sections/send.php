<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// 🔐 Telegram ma’lumotlari
$botToken = "8116070552:AAHNEp2mCbGtmTJ2QHt9a60Uxh3fFH8_BDo";
$chatId = 5500054763; // sizdagi chat_id

// 📩 Form ma’lumotlari
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$log = __DIR__ . '/form.log';
$ip = $_SERVER['REMOTE_ADDR'];
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$time = date('Y-m-d H:i:s');

file_put_contents($log, "[$time] $ip | $name | $email | $message\n", FILE_APPEND);


if ($name === '' || $email === '' || $message === '') {
    exit('Bo‘sh maydon bor');
}

// ✉️ Xabar
$text =
    "📩 Yangi kontakt xabari\n\n" .
    "👤 Ism: $name\n" .
    "📧 Email: $email\n\n" .
    "💬 Xabar:\n$message";

// 🌐 Telegram API
$url = "https://api.telegram.org/bot{$botToken}/sendMessage";

$data = [
    'chat_id' => $chatId,
    'text' => $text
];

// POST yuborish
$options = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === false) {
    exit('Telegramga yuborilmadi');
}

echo "success";
