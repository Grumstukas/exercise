<?php
session_start();
include $_SESSION['DIR'].'/uploader.php';
use controller\Display;


$display = new Display;

$display->displayArray($_SESSION['file_type'], $_SESSION['array'], $_SESSION['DIR']);