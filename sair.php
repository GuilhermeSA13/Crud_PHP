<?php
//Quebra de sessao.
session_start();
session_unset();
session_destroy();

header('Location: index.php?success=1');