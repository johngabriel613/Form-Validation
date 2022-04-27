<?php
// define variables and set to empty values
$emailErr =$passwordErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Invalid email format";
    }
  }

  if(empty($_POST["password"])){
      $passwordErr = "*Password is required";
  }else {
    $email = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if (!filter_var($password, 
    FILTER_VALIDATE_REGEXP,
    array( "options"=> array( "regexp" => "/.{6,25}/")))) {
      $passwordErr = "*Password is not strong enough";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script src="login.js" defer></script>
    <style>
    
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}


body{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(images/bg-cyan-light.svg);
    background-attachment: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-family: 'Poppins', 'Arial', sans-serif;
    font-display: swap ;
}

.container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    min-height: 100vh;
    position: relative;
    margin: 10px;

}

.wrapper{
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 400px;
    transition: 1s ease-in-out;
    background-color: #fff;
    padding: 10px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    border-radius: 10px;
    
}

h2{
    margin: 10px 20px 0;
    font-size: 2rem;  
    position: relative;
}

h2::before{
    content: '';
    position: absolute;
    width: 30px;
    height: 3px;
    background-color:#0db8a8;
    bottom: 0;
}

.lower-link p{
    text-align: center;
    font-size: .75rem;
    margin-bottom: 10px;
}

.field p{
   color: red;
    font-size: .65rem;
    visibility: hidden;
}

.error p{
    visibility: visible;
}

.check, .exclamation{
   position: absolute;
   top: 10px;
   right: 10px;
   font-size: 1.2rem;
   visibility: hidden;

}

.check-pass,.exclamation-pass{
    position: absolute;
   top: 10px;
   right: 25px;
   font-size: 1.2rem;
   visibility: hidden;
}

.check, .check-pass{
    color: green;
}

.exclamation, .exclamation-pass{
    color: red;
}


.success .check,.success .check-pass{
    visibility: visible;
}

.error .exclamation, .error .exclamation-pass{
    visibility: visible;
}



form{
    padding: 20px 20px 0;
    width: 100%;
}



.field{
    position: relative;
    width: 100%;
}

.field input{
    display: block;
    margin-bottom: 20px;
    width: 100%;
    padding: 10px 25px;
    border-radius: 5px;
    border: 1px solid #d3d3d3;
    outline: none;
}


.field input:focus{
    border: solid 2px #0db8a8;
}

.field input:focus ~ .icon, .field input:focus ~ label{
    color: #0db8a8;
}



.icon{
    position: absolute;
    top:12px;
    left: 5px;
}

.eye1, .eye2{
    top:10px;
    right:5px ;
    padding-right: 2px;
    position: absolute;
    font-size: 1.2rem;
    color: gray;
    cursor: pointer;
}

.eye2{
    display: none;
}

button{
    width: 100%;
    padding: 10px;
    background-color:  	#0db8a8;
    border-radius: 5px;
    outline: none;
    border: none;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: .9rem;
    letter-spacing: .7px;
    color: #fff;
}

button:active{
    background-color: #0078cc;
}

.error{
    color: red;
    font-size: .75rem;
    position: absolute;
    top: 40px;
}

label{
    position: absolute;
    left: 25px;
    top: 10px;
    pointer-events: none;
    font-size: .9rem;
    color: grey;
    transition: .5s ease;
}

.fill label{
    font-size: .75rem;
    left: 10px;
    top: -5px;
    background-color: #fff;
    padding-inline: 5px;
}


            /* poppins-300 - latin */
    @font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 300;
    src: url('../fonts/poppins-v19-latin-300.eot'); /* IE9 Compat Modes */
    src: local(''),
        url('../fonts/poppins-v19-latin-300.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/poppins-v19-latin-300.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/poppins-v19-latin-300.woff') format('woff'), /* Modern Browsers */
        url('../fonts/poppins-v19-latin-300.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/poppins-v19-latin-300.svg#Poppins') format('svg'); /* Legacy iOS */
    font-display: swap;
    }
    /* poppins-regular - latin */
    @font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    src: url('../fonts/poppins-v19-latin-regular.eot'); /* IE9 Compat Modes */
    src: local(''),
        url('../fonts/poppins-v19-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/poppins-v19-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/poppins-v19-latin-regular.woff') format('woff'), /* Modern Browsers */
        url('../fonts/poppins-v19-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/poppins-v19-latin-regular.svg#Poppins') format('svg'); /* Legacy iOS */
    font-display: swap;
    }
    /* poppins-500 - latin */
    @font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 500;
    src: url('../fonts/poppins-v19-latin-500.eot'); /* IE9 Compat Modes */
    src: local(''),
        url('../fonts/poppins-v19-latin-500.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/poppins-v19-latin-500.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/poppins-v19-latin-500.woff') format('woff'), /* Modern Browsers */
        url('../fonts/poppins-v19-latin-500.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/poppins-v19-latin-500.svg#Poppins') format('svg'); /* Legacy iOS */
    font-display: swap;
    }
    /* poppins-600 - latin */
    @font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    src: url('../fonts/poppins-v19-latin-600.eot'); /* IE9 Compat Modes */
    src: local(''),
        url('../fonts/poppins-v19-latin-600.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/poppins-v19-latin-600.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/poppins-v19-latin-600.woff') format('woff'), /* Modern Browsers */
        url('../fonts/poppins-v19-latin-600.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/poppins-v19-latin-600.svg#Poppins') format('svg'); /* Legacy iOS */
    font-display: swap;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
          
                <h2>Sign in</h2>
         
                <form class="form" action="" method="POST">
                    <div class="field">  
                        
                        <input type="text" class="email" name="email"> 
                        <label for="email">Email</label>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 1.95c-5.52 0-10 4.48-10 10s4.48 10 10 10h5v-2h-5c-4.34 0-8-3.66-8-8s3.66-8 8-8s8 3.66 8 8v1.43c0 .79-.71 1.57-1.5 1.57s-1.5-.78-1.5-1.57v-1.43c0-2.76-2.24-5-5-5s-5 2.24-5 5s2.24 5 5 5c1.38 0 2.64-.56 3.54-1.47c.65.89 1.77 1.47 2.96 1.47c1.97 0 3.5-1.6 3.5-3.57v-1.43c0-5.52-4.48-10-10-10zm0 13c-1.66 0-3-1.34-3-3s1.34-3 3-3s3 1.34 3 3s-1.34 3-3 3z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="check" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2 12l5.25 5l2.625-3M8 12l5.25 5L22 7m-6 0l-3.5 4"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="exclamation" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z"/><path fill="currentColor" d="M464 688a48 48 0 1 0 96 0a48 48 0 1 0-96 0zm24-112h48c4.4 0 8-3.6 8-8V296c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8z"/></svg>
                        <span class="error"> <?php echo $emailErr;?></span>
                        
                    </div>
                    <div class="field">
                        <input type="password" name="password" class="password" >
                        <label for="password">Password</label>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12.65 10A5.99 5.99 0 0 0 7 6c-3.31 0-6 2.69-6 6s2.69 6 6 6a5.99 5.99 0 0 0 5.65-4H17v4h4v-4h2v-4H12.65zM7 14c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="eye1" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><circle cx="12" cy="12" r="1.5" fill="currentColor"/><path fill="currentColor" d="M21.87 11.5c-.64-1.11-4.16-6.68-10.14-6.5c-5.53.14-8.73 5-9.6 6.5a1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25c5.53-.14 8.74-5 9.6-6.5a1 1 0 0 0 0-1Zm-9.87 4a3.5 3.5 0 1 1 3.5-3.5a3.5 3.5 0 0 1-3.5 3.5Z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="eye2" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M17.81 13.39A8.93 8.93 0 0 0 21 7.62a1 1 0 1 0-2-.24a7.07 7.07 0 0 1-14 0a1 1 0 1 0-2 .24a8.93 8.93 0 0 0 3.18 5.77l-2.3 2.32a1 1 0 0 0 1.41 1.41l2.61-2.6a9.06 9.06 0 0 0 3.1.92V19a1 1 0 0 0 2 0v-3.56a9.06 9.06 0 0 0 3.1-.92l2.61 2.6a1 1 0 0 0 1.41-1.41Z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="check-pass" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2 12l5.25 5l2.625-3M8 12l5.25 5L22 7m-6 0l-3.5 4"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="exclamation-pass" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z"/><path fill="currentColor" d="M464 688a48 48 0 1 0 96 0a48 48 0 1 0-96 0zm24-112h48c4.4 0 8-3.6 8-8V296c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8z"/></svg>
                        <span class="error"> <?php echo $passwordErr;?></span>
                    </div>
                    <div class="field">
                        <button type="submit" name="submit" id="login">Log in</button>
                    </div>
                </form>

                <div class="lower-link"><p>Don't have an account yet? <a href="signup.php">Register now</a> </p></div>
                
        </div>
    </div>
    
</body>
</html>