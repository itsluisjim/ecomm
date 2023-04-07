<?php

session_start();
session_unset();
session_destroy();

header("location: ../homepage.php?error=none");
