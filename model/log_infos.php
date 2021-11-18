<?php

require_once 'auth.php';

if(session_status()!== PHP_SESSION_ACTIVE) {session_start();}

$loggeduser= $_SESSION['user'] ?? "user";