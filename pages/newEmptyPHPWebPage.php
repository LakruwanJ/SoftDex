<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
/*            a{color:#a600ff;} 
            a:hover{color:#ff8585;} 
            .auth-wrapper {
                height: 100vh;
                background-color: #ff8585; 
                background:linear-gradient(-45deg,#a600ff,#ff8585);
                background-attachment: fixed;
                background-size: cover;
                height: calc(var(--vh,1vh) * 100);
            }
            .btn:hover {
                transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
                transition-duration: 0.3s;
                outline: none;
                text-decoration: none;
                box-shadow: 0 10px 15px -3px rgb(0 0 0 / 10%), 0 4px 6px -2px rgb(0 0 0 / 5%);
            }
            .btn-primary{
                background:linear-gradient(-45deg,#a600ff,#ff8585);
                transition: all .5s ease-out;
            }
            .btn-primary:hover{
                background:linear-gradient(-45deg,#ff8585,#a600ff);
            }
            .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
                background-color: #ff8585;
                border-color: #a600ff;
            }
            .btn-primary.focus,
            .btn-primary:focus {
                box-shadow: none;
            }
            .form-control:focus {
                border-color: #a600ff;
                box-shadow: 0 0 0 0.2rem rgba(166, 0, 255,0.25);
            }
            .text-xs {
                font-size: .75rem;
            }
            remove third party custom style
            .circles{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }
            .circles li{
                position: absolute;
                display: block;
                list-style: none;
                width: 20px;
                height: 20px;
                background: rgba(255, 255, 255, 0.2);
                animation: animate 25s linear infinite;
                bottom: -150px;  
            }
            .circles li:nth-child(1){
                left: 25%;
                width: 80px;
                height: 80px;
                animation-delay: 0s;
            }


            .circles li:nth-child(2){
                left: 10%;
                width: 20px;
                height: 20px;
                animation-delay: 2s;
                animation-duration: 12s;
            }

            .circles li:nth-child(3){
                left: 70%;
                width: 20px;
                height: 20px;
                animation-delay: 4s;
            }

            .circles li:nth-child(4){
                left: 40%;
                width: 60px;
                height: 60px;
                animation-delay: 0s;
                animation-duration: 18s;
            }

            .circles li:nth-child(5){
                left: 65%;
                width: 20px;
                height: 20px;
                animation-delay: 0s;
            }

            .circles li:nth-child(6){
                left: 75%;
                width: 110px;
                height: 110px;
                animation-delay: 3s;
            }

            .circles li:nth-child(7){
                left: 35%;
                width: 150px;
                height: 150px;
                animation-delay: 7s;
            }

            .circles li:nth-child(8){
                left: 50%;
                width: 25px;
                height: 25px;
                animation-delay: 15s;
                animation-duration: 45s;
            }

            .circles li:nth-child(9){
                left: 20%;
                width: 15px;
                height: 15px;
                animation-delay: 2s;
                animation-duration: 35s;
            }

            .circles li:nth-child(10){
                left: 85%;
                width: 150px;
                height: 150px;
                animation-delay: 0s;
                animation-duration: 11s;
            }
            @keyframes animate {

                0%{
                    transform: translateY(0) rotate(0deg);
                    opacity: 1;
                    border-radius: 0;
                }

                100%{
                    transform: translateY(-1000px) rotate(720deg);
                    opacity: 0;
                    border-radius: 50%;
                }

            }*/

a {
    color: #0059b3;
}

a:hover {
    color: #00aaff;
}

.auth-wrapper {
    height: 100vh;
    background-color: #00aaff;
    background: linear-gradient(-45deg, #0059b3, #00aaff);
    background-attachment: fixed;
    background-size: cover;
    height: calc(var(--vh, 1vh) * 100);
}

.btn:hover {
    transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
    transition-duration: 0.3s;
    outline: none;
    text-decoration: none;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 10%), 0 4px 6px -2px rgb(0 0 0 / 5%);
}

.btn-primary {
    background: linear-gradient(-45deg, #0059b3, #00aaff);
    transition: all 0.5s ease-out;
}

.btn-primary:hover {
    background: linear-gradient(-45deg, #00aaff, #0059b3);
}

.btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show>.btn-primary.dropdown-toggle {
    background-color: #00aaff;
    border-color: #0059b3;
}

.btn-primary.focus,
.btn-primary:focus {
    box-shadow: none;
}

.form-control:focus {
    border-color: #0059b3;
    box-shadow: 0 0 0 0.2rem rgba(0, 89, 179, 0.25);
}

.text-xs {
    font-size: 0.75rem;
}

/*remove third party custom style*/
.circles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
}

.circles li:nth-child(1) {
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}

.circles li:nth-child(2) {
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

/* ... (other circle styles) ... */

.circles li:nth-child(10) {
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}

@keyframes animate {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }
    100% {
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
}


        </style>
    </head>
    <body>
        <div class="row mx-0 auth-wrapper">
            <!--remove bg-->
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="d-none d-sm-flex col-sm-6 col-lg-8 align-items-center p-5">
                <div class="align-items-start d-lg-flex flex-column offset-lg-2 text-white">
                    <img src="" class="mb-3">
                    <h1 classname="d-flex">Hi 👋 Welcome Back Aji</h1>
                    <p>Lorem ipsum is placeholder text commonly used in the graphic, print,
                        and publishing industries <br> for previewing layouts and visual mockups</p>
                </div>
            </div>
            <div class="d-flex justify-content-center col-sm-6 col-lg-4 align-items-center px-5 bg-white mx-auto">
                <div class="form-wrapper">
                    <div class="d-flex flex-column">
                        <div class="mb-4">

                            <h3 class="font-medium mb-1">Sign In </h3>
                            <p class="mb-2">Please sign in to your account.</p>
                        </div>
                        <div class="mb-10">
                            <div class="form-group">
                                <label for="mail" class="">Email</label>
                                <input name="email" type="text" class="form-control">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="password" class="">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="text-right"><a class="btn btn-link">
                                    Forgot Your Password?
                                </a></div>
                            <button type="submit" class="btn btn-primary btn-block mt-3 border-0">
                                Sign In
                            </button>
                        </div>
                        <div class="p-5 text-center text-xs">
                            <span>
                                Copyright © 2021-2022
                                <a href="https://tailwindcomponents.com/u/aji" rel="" target="_blank" title="aji">ajimon</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
