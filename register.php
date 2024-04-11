<?php //Register error handling
if (isset($_GET['error']) && $_GET['error'] == 1) {
  $error = "An unexpected error occured.";
  echo '<script type="text/javascript">window.onload = function() { document.getElementById("error1").innerHTML = "' . $error . '"; }</script>';
}
if (isset($_GET["error"]) && $_GET["error"] == 2) {
  $error = "Email already in use.";
  echo '<script type="text/javascript">window.onload = function() { document.getElementById("error2").innerHTML = "' . $error . '"; }</script>';
}
if (isset($_GET["error"]) && $_GET["error"] == 3) {
  $error = "Passwords do not match.";
  echo '<script type="text/javascript">window.onload = function() { document.getElementById("error1").innerHTML = "' . $error . '"; }</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | Aurora</title>
  <!--CSS-->
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/index.css"> <!--Should use a separate .css file, but since both pages share most of their styling it seems redundant-->
  <!--Font import-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet">
</head>

<body>
  <form action="assets/php/register_process.php" method="post">
    <h1>Register</h1>
    <div id="usernameWrapper">
      <svg xmlns="http://www.w3.org/2000/svg" id="usernameSVG" class="icon icon-tabler icon-tabler-mail" width="44"
        height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f0f0f4" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
        <path d="M3 7l9 6l9 -6" />
      </svg>
      <input type="text" id="username" name="username" placeholder="Email*" required onfocus="gainFocus(1)"
        onblur="loseFocus(1)"> <!--gainFocus/loseFocus is a "sketchy" solution, likely semantically wrong, but it works-->
    </div>
    <div id="error2"></div> <!--Used to show the user relevant error-->
    <div id="passwordWrapper">
      <svg xmlns="http://www.w3.org/2000/svg" id="passwordSVG" class="icon icon-tabler icon-tabler-lock" width="44"
        height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f0f0f4" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
        <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
      </svg>
      <input type="password" id="password" name="password" placeholder="Password*" required onfocus="gainFocus(2)"
        onblur="loseFocus(2)">
    </div>
    <div id="passwordConfirmWrapper">
      <svg xmlns="http://www.w3.org/2000/svg" id="passwordConfirmSVG" class="icon icon-tabler icon-tabler-lock"
        width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f0f0f4" fill="none"
        stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
        <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
      </svg>
      <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm password*" required
        onfocus="gainFocus(3)" onblur="loseFocus(3)">
      <img id="eyeConfirm" src="assets/images/eyeClosed.svg" onclick="viewPassword(2)">
    </div>
    <div id="error1"></div> <!--Used to show the user relevant error-->
    <button type="submit">Register</button>
  </form>
  <script src="assets/js/focus.js"></script>
  <script src="assets/js/viewPassword.js"></script>
</body>

</html>