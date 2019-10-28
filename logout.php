<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['fname']);
session_destroy();

header("Location: index.html");