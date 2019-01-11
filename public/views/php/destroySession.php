<?php
  session_destroy();
  header("Location: https://app-slim.herokuapp.com");
  exit();
?>