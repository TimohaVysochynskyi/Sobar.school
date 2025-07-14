<?php

$conn = new mysqli("localhost", "root", "", "sobar.school");
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}