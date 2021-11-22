<?php

require_once '/home/stagiaire16/Documents/mini_blog/model/auth.php';

if(session_status()!== PHP_SESSION_ACTIVE) {session_start();}

$loggeduser= $_SESSION['username'];