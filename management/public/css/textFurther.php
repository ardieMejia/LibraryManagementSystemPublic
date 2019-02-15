<?php

include './includes/addSVGCircle.inc';
?>

<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="src-css/Skeleton-2.0.4/css/skeletonHybrid.css">
        <link rel="stylesheet" href="./src-css/fontawesome-free-5.6.3-web/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <style>


        </style>

    </head>
    <body>
        <div class="container">



            <h1>Cloud parameters</h1>
            <?php
            fun_addSVGCircle()
            ?>

<a href="test.html">            <svg width="80" height="80">
                <circle cx="40" cy="40" r="20" fill="yellow" stroke-width="2" stroke="black">
                        </svg></a>



            <table>
                <tr>
                    <td width="70%">



    <img src="./src-img/tableDisplay/pic_0.jpg" />


        <svg width="20" height="20">
    <circle cx="10" cy=10" r="5" fill="yellow" stroke-width="1" stroke="black">
    </svg>

                        <h3>.JPEG</h3>

                        nasty tables yet again, nasty tables yet again,
                        nasty tables yet again, nasty tables yet again,
                        nasty tables yet again, nasty tables yet again,
                        nasty tables yet again, nasty tables yet again, 
                        first column at 70%
                        <p>nasty tables yet again, nasty tables yet again, nasty tables yet again, nasty tables yet again, nasty tables yet again, nasty tables yet again, nasty tables yet again, nasty tables yet again, nasty tables yet again</p>
                    </td>
                    <td width="30%">

                        <label><i class="fas fa-pencil-alt"></i> Cloud weight</label>
                        <input name="cloudWeight" type="range" min="1" max="8"/>
                        <label><i class="fas fa-pencil-alt"></i> Cloud dispersion</label>
                        <input name="cloudDispersion"  type="range" min="1" max="8"/>
                            <input hidden name="photoSelectedOne" value="whatnow" />
                            <input type="submit" class="button button-active" value="process effects (PHP)"  id="oneEffectOnly"/>

                    </td>
                </tr>
            </table>

        </div>
    </body>
</html>

