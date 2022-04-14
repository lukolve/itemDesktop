<?php
// Nastaví název cookie, pouze kosmetická úprava
ini_set("session.name", "BlogSid");
// Cesta v cookie, na kterých adresách je viditelná
ini_set("session.cookie_path", "/");
// Cookie není možné přečíst v JavaSciprtu
ini_set("session.cookie_httponly", true);
// Session ID akceptuje pouze v cookies, nikoli v URL
ini_set("session.use_only_cookies", true);
// Při obdržení SID, které neexistuje, je vygenerováno nové
ini_set("session.use_strict_mode", true);
// Zákázání transparentního SID
ini_set("session.use_trans_sid", false); 
// Cookie se SID je odeslána pouze po zabezpečeném připojení
ini_set("session.cookie_secure", true);
// Místo ukládání session souborů
// ini_set("session.save_path", "/tmp");
// regenerate SID
$sessionRegenerateID = 600; // 10 minut
if (!isset($_SESSION['regenerate']) ||
        $_SESSION['regenerate'] + $sessionRegenerateID < time()) {
    session_regenerate_id(true); // true -> vymaže starou session
    $_SESSION['regenerate'] = time();
}
?>