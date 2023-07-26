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
    </head>
    <body>





        
        



        <button id="st">Start title</button>
        <button id="et">end title</button>
        <button id="sp">Start para</button>
        <button id="ep">end para</button>
        <button id="sl">Start li</button>
        <button id="el">end li</button>
        <button id="n">new line</button>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
      <div>
            <p>
                <textarea type="text" id="message" ng-model="htmlcontent" required="required" style="display: block;" name="message" required></textarea>
            </p>
        </div>
        
        
        <script>

            var mytextbox = document.getElementById('message');
            var st = document.getElementById('st');
            var et = document.getElementById('et');
            var sp = document.getElementById('sp');
            var ep = document.getElementById('ep');
            var sl = document.getElementById('sl');
            var el = document.getElementById('el');
            var n = document.getElementById('n');

            st.onclick = function () {
                var stValue = "<h3>";
                mytextbox.value = mytextbox.value + stValue + ' ';
            };
            et.onclick = function () {
                var etValue = "</h3>";
                mytextbox.value = mytextbox.value + ' ' + etValue + '\n';
            };
            sp.onclick = function () {
                var spValue = "<p>";
                mytextbox.value = mytextbox.value + spValue + ' ';
            };
            ep.onclick = function () {
                var epValue = "</p>";
                mytextbox.value = mytextbox.value + ' ' + epValue + '\n';
            };
            sl.onclick = function () {
                var slValue = "<li>";
                mytextbox.value = mytextbox.value + slValue + ' ';
            };
            el.onclick = function () {
                var elValue = "</li>";
                mytextbox.value = mytextbox.value + ' ' + elValue + '\n';
            };
            n.onclick = function () {
                var nValue = "<br>";
                mytextbox.value = mytextbox.value + nValue + '\n';
            };

        </script>

        <input type="submit" value="priview" />
        </form>
        
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == 'GET') {
                echo $_GET["message"];
                
        }
        
        
        ?>
        
        
        
        
        
        
        
        
        










        <?php
        // put your code here
        ?>
    </body>
</html>
