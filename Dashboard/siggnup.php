<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
</head>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: cursive;
    }
     body{
        background-image: linear-gradient(to right, rgb(2, 80, 102), rgb(236, 236, 236));} 
     

     .signup-section{
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        gap: 1.7rem;
        width: 100%;
        /* background-color: brown; */
        justify-content: center;
        align-items: center;
        margin-top: 12%;
     }

     .signup-section .title{
        color: white;
        font-size: 2.5rem;
     }

     .signup-section .input-box{
        background-color: aqua;
        width: 27rem;
        height: 2.8rem;
        border-radius: 1rem;
     }

     .signup-section .input-box input{
        padding-inline: 1rem;
        width: 100%;
        height: 100%;
        border-radius: inherit;
     }


</style>
<body>
    
    <section class="signup-section">
        <h2 class="title">Sign up</h2>

        <div class="input-box"><input type="text" placeholder="Enter user name"></div>
        <div class="input-box"><input type="email" placeholder="Enter your email"></div>
        <div class="input-box"><input type="password" placeholder="Enter password"></div>
        <div class="input-box"><input type="password" placeholder="Confirm password"></div>
        <div class="input-box" style="background-color: aliceblue;"><input style="margin-top: 1rem;" type="file" ><a href="login.html" >I already have account</a></div>

        <div class="input-box" style="width: 7%;margin-left: 18rem;"><input type="submit" value="submit"></div>

    </section>
</body>
</html>