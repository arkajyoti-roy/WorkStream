<?php
include 'conn.php';

// google recaptcha
if (isset($_POST['g-recaptcha-response'])) {
  $secreatkey = "6LdR0xwpAAAAAKiMssj65qJ2MpLEB8fUrG5JVNOp";

  $ip = $_SERVER['REMOTE_ADDR'];
  $response = $_POST['g-recaptcha-response'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secreatkey&response=$response&remoteip=$ip";

  $fire = file_get_contents($url);
  $data = json_decode($fire);
  if ($data->success == true) {
    // echo "Success";

    error_reporting(0);
    if (isset($_SERVER["REQUEST_METHOD"])) {

      $email = $_POST['email'];
      $password = $_POST['pass'];
      $email2 = $_POST['email2'];
      $password2 = $_POST['pass2'];

      $sql = "SELECT * FROM `pro`.`admin_login` WHERE email = '$email' AND pass = '$password'";
      $query = mysqli_query($conn, $sql);
      $sql2 = "SELECT * FROM `pro`.`staff` WHERE email = '$email2' AND man = 'Manager'";
      $query2 = mysqli_query($conn, $sql2);



      if (mysqli_num_rows($query) > 0) {
        while ($verify = mysqli_fetch_array($query)) {
          if ($verify['pass'] == $password) {
            $name = $verify['name'];
            session_start();
            $_SESSION["new_session"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            header("location:admin/dashboard.php");
          } else {
            echo '<span style = "color: red";>password is invalid. Please enter valid password</span>';
          }
        }
      } else {
      }


      $sqlm = "SELECT * FROM `pro`.`details` WHERE `email` = '$email2' AND `role` = 'Manager';";
      $querym = mysqli_query($conn, $sqlm);


      if (mysqli_num_rows($query2) > 0) {
        while ($verify2 = mysqli_fetch_array($query2)) {
          if (password_verify($password2, $verify2['pass'])) {
            $nm = $verify2['name'];
            $img = $verify2['img'];
            $deptm = $verify2['deptm'];
            session_start();
            $_SESSION["new_session_02"] = true;
            $_SESSION["email2"] = $email2;
            $_SESSION["deptmy"] = $deptm;
            $_SESSION['nm'] = $nm;
            $_SESSION['img'] = $img;

            if (mysqli_num_rows($querym) == 0) {
              header("location: manager/man_first.php");
            } else {
              header("location:manager/man_task.php");
            }
          } else {
            echo '<span style = "color: red";>password is invalid. Please enter valid password</span>';
          }
        }
      } else {
      }
    }
  } else {
    // echo "Recaptcha Error";
  }
} else {
}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="index.css" />
    <link rel="icon" href="logo.png" />
    <title>WorkStream</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>

  <body>
    <img class="ikp" src="loge.png" alt="" />
    <style>
      .ikp {
        width: 160px;
        height: 92px;
        z-index: 1;
        position: absolute;
        margin-bottom: -200px;
      }

      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");
.p1 {
    font-weight: 600;
    color: navy;
    line-height: 1;
    font-size: 1.5rem;
  }

  .h1 {
    font-size: 0.95rem;
    padding: 0.7rem 0;
    color: navy;
  }


  #iix {
    margin-top: -5px;
    margin-left: 20px;
  }

  #iiy {
    margin-top: -5px;
    margin-left: 20px;
  }

  .captcha {
    margin: 15px 0px;
    width: 63%;
  }

  .captcha .preview {
    color: #555;
    width: 100%;
    text-align: center;
    height: 40px;
    line-height: 40px;
    letter-spacing: 8px;
    border: none;
    font-family: "monospace";
  }

  .captcha .preview span {
    display: inline-block;
    user-select: none;
  }

  .captcha .captcha-form {
    display: flex;
  }

  .captcha-form:focus {
    box-shadow: none;
    border-color: #333;
  }

  .captcha .captcha-form input {
    width: 100%;
    padding: 8px;
    border: 1px solid #888;
    border: none;
  }

  .captcha .captcha-form .captcha-refresh {
    width: 40px;
    border: none;
    outline: none;
    background-color: transparent;
    color: #eee;
    cursor: pointer;
    padding-top: 5px;
  }

  .captcha2 {
    margin: 15px 0px;
    width: 63%;
  }

  .captcha2 .preview2 {
    color: #555;
    width: 100%;
    text-align: center;
    height: 40px;
    line-height: 40px;
    letter-spacing: 8px;
    border: none;
    font-family: "monospace";
  }

  .captcha2 .preview2 span {
    display: inline-block;
    user-select: none;
  }

  .captcha2 .captcha-form2 {
    display: flex;
  }

  .captcha-form2:focus {
    box-shadow: none;
    border-color: #333;
  }

  .captcha2 .captcha-form2 input {
    width: 100%;
    padding: 8px;
    border: 1px solid #888;
    border: none;
  }

  .captcha2 .captcha-form2 .captcha-refresh2 {
    width: 40px;
    border: none;
    outline: none;
    background-color: transparent;
    color: #eee;
    cursor: pointer;
    padding-top: 5px;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body,
  input {
    font-family: "Poppins", sans-serif;
  }

  .container {
    position: relative;
    width: 100%;
    background-color: #fff;
    min-height: 100vh;
    overflow: hidden;
  }

  .forms-container {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
  }

  .signin-signup {
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 75%;
    width: 50%;
    transition: 1s 0.7s ease-in-out;
    display: grid;
    grid-template-columns: 1fr;
    z-index: 5;
  }

  form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0rem 5rem;
    transition: all 0.2s 0.7s;
    overflow: hidden;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
  }

  form.sign-up-form {
    opacity: 0;
    z-index: 1;
  }

  form.sign-in-form {
    z-index: 2;
  }

  .title {
    font-size: 2.2rem;
    color: #444;
    margin-bottom: 10px;
  }

  .input-field {
    max-width: 380px;
    width: 100%;
    background-color: #f0f0f0;
    margin: 10px 0;
    height: 55px;
    border-radius: 55px;
    display: grid;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
  }

  .input-field i {
    text-align: center;
    line-height: 55px;
    color: #acacac;
    transition: 0.5s;
    font-size: 1.1rem;
  }

  .input-field input {
    background: none;
    outline: none;
    border: none;
    line-height: 1;
    font-weight: 600;
    font-size: 1.1rem;
    color: #333;
  }

  .input-field input::placeholder {
    color: #aaa;
    font-weight: 500;
  }

  .social-text {
    padding: 0.7rem 0;
    font-size: 1rem;
    cursor: pointer;
  }

  .social-media {
    display: flex;
    justify-content: center;
  }

  .social-icon {
    height: 46px;
    width: 46px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 0.45rem;
    color: #333;
    border-radius: 50%;
    border: 1px solid #333;
    text-decoration: none;
    font-size: 1.1rem;
    transition: 0.3s;
  }

  .social-icon:hover {
    color: #4481eb;
    border-color: #4481eb;
  }

  .btn {
    width: 150px;
    background-color: #5995fd;
    border: none;
    outline: none;
    height: 49px;
    border-radius: 49px;
    color: navy;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    cursor: pointer;
    transition: 0.5s;
  }

  .btn:hover {
    background-color: #4d84e2;
  }

  .panels-container {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }

  .container:before {
    content: "";
    position: absolute;
    height: 2000px;
    width: 2000px;
    top: -10%;
    right: 48%;
    transform: translateY(-50%);
    transition: 1.8s ease-in-out;
    border-radius: 50%;
    z-index: 6;
  }

  .image {
    width: 100%;
    transition: transform 1.1s ease-in-out;
    transition-delay: 0.4s;
  }

  .panel {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: space-around;
    text-align: center;
    z-index: 6;
  }

  .left-panel {
    pointer-events: all;
    padding: 3rem 17% 2rem 12%;
  }

  .right-panel {
    pointer-events: none;
    padding: 3rem 12% 2rem 17%;
  }

  .panel .content {
    color: navy;
    /* color: #fff; */
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
  }

  .panel h3 {
    margin-left: -195px;
    font-weight: 600;
    color: navy;
    line-height: 1;
    font-size: 1.5rem;
  }

  .panel p {
    margin-left: -195px;
    font-size: 0.95rem;
    padding: 0.7rem 0;
    color: navy;
  }

  .btn.transparent {
    margin-left: -195px;
    /* margin: 0; */
    background: none;
    border: 2px solid navy;
    width: 130px;
    height: 41px;
    font-weight: 600;
    font-size: 0.8rem;
  }

  .right-panel .image,
  .right-panel .content {
    transform: translateX(800px);
  }

  /* ANIMATION */

  .container.sign-up-mode:before {
    transform: translate(100%, -50%);
    right: 52%;
  }

  .container.sign-up-mode .left-panel .image,
  .container.sign-up-mode .left-panel .content {
    transform: translateX(-800px);
  }

  .container.sign-up-mode .signin-signup {
    left: 25%;
  }

  .container.sign-up-mode form.sign-up-form {
    opacity: 1;
    z-index: 2;
  }

  .container.sign-up-mode form.sign-in-form {
    opacity: 0;
    z-index: 1;
  }

  .container.sign-up-mode .right-panel .image,
  .container.sign-up-mode .right-panel .content {
    transform: translateX(0%);
  }

  .container.sign-up-mode .left-panel {
    pointer-events: none;
  }

  .container.sign-up-mode .right-panel {
    pointer-events: all;
  }

@media (max-width: 570px) {
    .p1 {
        font-weight: 600;
        color: navy;
        line-height: 1;
        font-size: 1.5rem;
      }

      .h1 {
        font-size: 0.95rem;
        padding: 0.7rem 0;
        color: navy;
      }

     

      #iix {
        margin-top: -5px;
        margin-left: 20px;
      }

      #iiy {
        margin-top: -5px;
        margin-left: 20px;
      }

      .captcha {
        margin: 15px 0px;
        width: 63%;
      }

      .captcha .preview {
        color: #555;
        width: 100%;
        text-align: center;
        height: 40px;
        line-height: 40px;
        letter-spacing: 8px;
        border: none;
        font-family: "monospace";
      }

      .captcha .preview span {
        display: inline-block;
        user-select: none;
      }

      .captcha .captcha-form {
        display: flex;
      }

      .captcha-form:focus {
        box-shadow: none;
        border-color: #333;
      }

      .captcha .captcha-form input {
        width: 100%;
        padding: 8px;
        border: 1px solid #888;
        border: none;
      }

      .captcha .captcha-form .captcha-refresh {
        width: 40px;
        border: none;
        outline: none;
        background-color: transparent;
        color: #eee;
        cursor: pointer;
        padding-top: 5px;
      }

      .captcha2 {
        margin: 15px 0px;
        width: 63%;
      }

      .captcha2 .preview2 {
        color: #555;
        width: 100%;
        text-align: center;
        height: 40px;
        line-height: 40px;
        letter-spacing: 8px;
        border: none;
        font-family: "monospace";
      }

      .captcha2 .preview2 span {
        display: inline-block;
        user-select: none;
      }

      .captcha2 .captcha-form2 {
        display: flex;
      }

      .captcha-form2:focus {
        box-shadow: none;
        border-color: #333;
      }

      .captcha2 .captcha-form2 input {
        width: 100%;
        padding: 8px;
        border: 1px solid #888;
        border: none;
      }

      .captcha2 .captcha-form2 .captcha-refresh2 {
        width: 40px;
        border: none;
        outline: none;
        background-color: transparent;
        color: #eee;
        cursor: pointer;
        padding-top: 5px;
      }

      


      .container {
        position: relative;
        width: 100%;
        background-color: #fff;
        min-height: 100vh;
        overflow: hidden;
      }

      .forms-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
      }

      .signin-signup {
        position: absolute;
        top: 72%;
        transform: translate(-50%, -50%);
        left: 50%;
        width: 100%;
        transition: 1s 0.7s ease-in-out;
        display: grid;
        grid-template-columns: 1fr;
        z-index: 5;
      }

      form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0rem 5rem;
        transition: all 0.2s 0.7s;
        overflow: hidden;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
      }

      form.sign-up-form {
        opacity: 0;
        z-index: 1;
      }

      form.sign-in-form {
        z-index: 2;
      }

      .title {
        font-size: 2.2rem;
        color: #444;
        margin-bottom: 10px;
      }

      .input-field {
        max-width: 380px;
        width: 100%;
        background-color: #f0f0f0;
        margin: 10px 0;
        height: 55px;
        border-radius: 55px;
        display: grid;
        grid-template-columns: 15% 85%;
        padding: 0 0.4rem;
        position: relative;
      }

      .input-field i {
        text-align: center;
        line-height: 55px;
        color: #acacac;
        transition: 0.5s;
        font-size: 1.1rem;
      }

      .input-field input {
        background: none;
        outline: none;
        border: none;
        line-height: 1;
        font-weight: 600;
        font-size: 1.1rem;
        color: #333;
      }

      .input-field input::placeholder {
        color: #aaa;
        font-weight: 500;
      }

      .social-text {
        padding: 0.7rem 0;
        font-size: 1rem;
        cursor: pointer;
      }

      .social-media {
        display: flex;
        justify-content: center;
      }

      .social-icon {
        height: 46px;
        width: 46px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 0.45rem;
        color: #333;
        border-radius: 50%;
        border: 1px solid #333;
        text-decoration: none;
        font-size: 1.1rem;
        transition: 0.3s;
      }

      .social-icon:hover {
        color: #4481eb;
        border-color: #4481eb;
      }

      .btn {
        width: 150px;
        background-color: #5995fd;
        border: none;
        outline: none;
        height: 49px;
        border-radius: 49px;
        color: navy;
        text-transform: uppercase;
        font-weight: 600;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.5s;
      }

      .btn:hover {
        background-color: #4d84e2;
      }

      .panels-container {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
      }

      .container:before {
        content: "";
        position: absolute;
        height: 2000px;
        width: 2000px;
        top: -10%;
        right: 48%;
        transform: translateY(-50%);
        transition: 1.8s ease-in-out;
        border-radius: 50%;
        z-index: 6;
      }

      .image {
        width: 100%;
        transition: transform 1.1s ease-in-out;
        transition-delay: 0.4s;
        display: none;
      }

      .panel {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-around;
        text-align: center;
        z-index: 6;
       
      }

      .left-panel {
        pointer-events: all;
        padding: 3rem 17% 2rem 12%;
        
       
      }

      .right-panel {
        pointer-events: none;
        padding: 3rem 12% 2rem 1%;
        position: relative;
        right: 120%;
      }
      .panel .content {
        color: navy;
        /* color: #fff; */
        transition: transform 0.9s ease-in-out;
        transition-delay: 0.6s;
        position: relative;
        left: 143%;
        top: -30%;
      }

      .panel h3 {
        margin-left: -195px;
        font-weight: 600;
        color: navy;
        line-height: 1;
        font-size: 1.5rem;
      }

      .panel p {
        margin-left: -195px;
        font-size: 0.95rem;
        padding: 0.7rem 0;
        color: navy;
      }

      .btn.transparent {
        margin-left: -195px;
        /* margin: 0; */
        background: none;
        border: 2px solid navy;
        width: 130px;
        height: 41px;
        font-weight: 600;
        font-size: 0.8rem;
      }

      .right-panel .image,
      .right-panel .content {
        transform: translateX(800px);
      }

      /* ANIMATION */

      .container.sign-up-mode:before {
        transform: translate(100%, -50%);
        right: 52%;
      }

      .container.sign-up-mode .left-panel .image,
      .container.sign-up-mode .left-panel .content {
        transform: translateX(-800px);
      }

      .container.sign-up-mode .signin-signup {
        left: 50%;
      }

      .container.sign-up-mode form.sign-up-form {
        opacity: 1;
        z-index: 2;
      }

      .container.sign-up-mode form.sign-in-form {
        opacity: 0;
        z-index: 1;
      }

      .container.sign-up-mode .right-panel .image,
      .container.sign-up-mode .right-panel .content {
        transform: translateX(0%);
      }

      .container.sign-up-mode .left-panel {
        pointer-events: none;
      }

      .container.sign-up-mode .right-panel {
        pointer-events: all;
      }

  }
  @media  (min-width: 580px) and (max-width : 870px){
    .container {
      min-height: 800px;
      height: 100vh;
    }

    .signin-signup {
      width: 100%;
      top: 95%;
      transform: translate(-50%, -100%);
      transition: 1s 0.8s ease-in-out;
    }

    .signin-signup,
    .container.sign-up-mode .signin-signup {
      left: 50%;
    }

    .panels-container {
      grid-template-columns: 1fr;
      grid-template-rows: 1fr 2fr 1fr;
    }

    .panel {
      flex-direction: row;
      justify-content: space-around;
      align-items: center;
      padding: 2.5rem 8%;
      grid-column: 1 / 2;
    }

    .right-panel {
      grid-row: 3 / 4;
    }

    .left-panel {
      grid-row: 1 / 2;
    }

    .image {
      width: 200px;
      transition: transform 0.9s ease-in-out;
      transition-delay: 0.6s;
    }

    .panel .content {
      padding-right: 15%;
      transition: transform 0.9s ease-in-out;
      transition-delay: 0.8s;
    }

    .panel h3 {
      font-size: 1.2rem;
    }

    .panel p {
      font-size: 0.7rem;
      padding: 0.5rem 0;
    }

    .btn.transparent {
      width: 110px;
      height: 35px;
      font-size: 0.7rem;
    }

    .container:before {
      width: 1500px;
      height: 1500px;
      transform: translateX(-50%);
      left: 30%;
      bottom: 68%;
      right: initial;
      top: initial;
      transition: 2s ease-in-out;
    }

    .container.sign-up-mode:before {
      transform: translate(-50%, 100%);
      bottom: 32%;
      right: initial;
    }

    .container.sign-up-mode .left-panel .image,
    .container.sign-up-mode .left-panel .content {
      transform: translateY(-300px);
    }

    .container.sign-up-mode .right-panel .image,
    .container.sign-up-mode .right-panel .content {
      transform: translateY(0px);
    }

    .right-panel .image,
    .right-panel .content {
      transform: translateY(300px);
    }

    .container.sign-up-mode .signin-signup {
      top: 5%;
      transform: translate(-50%, 0);
    }
  }

    </style>



    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="POST">
            <h2 class="title">Manager</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email2" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                name="pass2"
                placeholder="Password"
                required
              />
            </div>

            <div
              class="g-recaptcha"
              data-sitekey="6LdR0xwpAAAAAD8a0dvANbyCQ3MfLIdJ3C-p1un4"
            ></div>

            <input type="submit" value="Log In" class="btn solid" />
            <p class="social-text" onclick="op();">Forget Password</p>
          </form>

          <script>
            const fonts = ["cursive", "sans-serif", "serif", "monospace"];
            let captchaValue = "0";

            function generateCaptcha() {
              let value = btoa(Math.random() * 1000000000);
              value = value.substr(0, 5 + Math.random() * 5);
              captchaValue = value;
            }

            function setCaptcha() {
              let html = captchaValue
                .split("")
                .map((char) => {
                  const rotate = -20 + Math.trunc(Math.random() * 30);
                  const font = Math.trunc(Math.random() * fonts.length);
                  return `<span style="color:black;display:inline;transform:rotate(${rotate}deg);font-family: ${fonts[font]}">${char}</span>`;
                })
                .join("");
              document.querySelector(".preview").innerHTML = html;
            }

            function initCaptcha() {
              document
                .querySelector(".captcha-refresh")
                .addEventListener("click", function () {
                  generateCaptcha();
                  setCaptcha();
                });
              generateCaptcha();
              setCaptcha();
            }

            initCaptcha();
          </script>

          <form action="" class="sign-up-form" method="POST">
            <h2 class="title">Admin</h2>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                name="pass"
                placeholder="Password"
                required
              />
            </div>

            <div
              class="g-recaptcha"
              data-sitekey="6LdR0xwpAAAAAD8a0dvANbyCQ3MfLIdJ3C-p1un4"
            ></div>
            <input type="submit" class="btn" value="Log In" />
            <p class="social-text" onclick="op();" style="opacity: 0;">Forget Password</p>
          </form>

          <script
            src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async
            defer
          ></script>

          <script>
            const fonts2 = ["cursive", "sans-serif", "serif", "monospace"];
            let captchaValue2 = "0";

            function generateCaptcha2() {
              let value2 = btoa(Math.random() * 1000000000);
              value2 = value2.substr(0, 5 + Math.random() * 5);
              captchaValue2 = value2;
            }

            function setCaptcha2() {
              let html2 = captchaValue2
                .split("")
                .map((char) => {
                  const rotate = -20 + Math.trunc(Math.random() * 30);
                  const font2 = Math.trunc(Math.random() * fonts2.length);
                  return `<span style="color:black;display:inline;transform:rotate(${rotate}deg);font-family: ${fonts2[font2]}">${char}</span>`;
                })
                .join("");
              document.querySelector(".preview2").innerHTML = html2;
            }

            function initCaptcha2() {
              document
                .querySelector(".captcha-refresh2")
                .addEventListener("click", function () {
                  generateCaptcha2();
                  setCaptcha2();
                });
              generateCaptcha2();
              setCaptcha2();
            }

            initCaptcha2();
          </script>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Login as Admin</h3>
            <p>"Leadership that Inspires, Management that Delivers."</p>
            <button class="btn transparent" id="sign-up-btn">Admin</button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Login as Manager</h3>
            <p>"Leading with Vision, Managing with Precision."</p>
            <button class="btn transparent" id="sign-in-btn">Manager</button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    
    <script>
      const sign_in_btn = document.querySelector("#sign-in-btn");
      const sign_up_btn = document.querySelector("#sign-up-btn");
      const container = document.querySelector(".container");

      sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
      });

      sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
      });
    </script>

<script>
  function op() {
    alert("Relax, and try to remember your paasword");
  }
</script>


  </body>
</html>


