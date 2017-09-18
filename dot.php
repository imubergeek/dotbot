<!DOCTYPE html>

<!--Author - Anthony Bonante
Halo ODST Superintendent made with CSS and PHP
-->
<html>

<head>

</head>

<body>
    <?php 
    if($_GET['r'] == 'm'){header("refresh:5;url=dot.php?mood=blank&r=a");}
    else {header("refresh:30;url=dot.php?mood=sleep&r=a");}
    ?>
    <style>
    /* Colors:
        Cyan: #6FC3DF 111,195,223
        Pane: #E6FFFF 230,255,255
        Orange: #DF740C 223,116,12
        Yellow: #FFE64D 255,230,77
        Superintendant Green: #3EA619 62,166,25
        Darker green: #5E7E4C 94.126.76
        eyes are 30% smaller than inner sphere
        */
        
         :root {
            --border: white;
            --pricolor: #5E7E4C;
            --eyes: white;
            --blackbkg: rgba(12, 20, 31, 1);
        }
        
        html {
            background-color: black;
            color: white;
        }
        
        a {
            color: white;
        }
        
        .dotblock {
            position: fixed;
            margin-left: 45%;
            margin-top: 20%;
            background: var(--blackbkg);
            width: 120px;
            height: 120px;
            -moz-border-radius: 15px;
            -webkit-border-radius: 15px;
            border-radius: 15px;
            border: solid 5px var(--border);
        }
        
        .dot {
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 100px;
            background: var(--pricolor);
            width: 100px;
            height: 100px;
            position: relative;
            box-shadow: 0 0 0 5px var(--border);
            margin: 10px;
        }
        
        #dot-lefteye {
            position: absolute;
            width: 30px;
            height: 30px;
            background: var(--eyes);
            -moz-border-radius: 30px;
            -webkit-border-radius: 30px;
            border-radius: 30px;
            top: 50%;
            left: 50%;
            margin: -15px 0px 0px -40px;
        }
        
        #dot-righteye {
            position: absolute;
            width: 30px;
            height: 30px;
            background: var(--eyes);
            -moz-border-radius: 30px;
            -webkit-border-radius: 30px;
            border-radius: 30px;
            top: 50%;
            left: 50%;
            margin: -15px 0px 0px 10px;
        }
        
        #dot-eyelid-upper {
            background: var(--pricolor);
            width: 35px;
            height: 15px;
        }
        
        #dot-eyelid-lower {
            background: var(--pricolor);
            width: 35px;
            height: 15px;
            margin: 15px 0px;
        }
        
        #dot-rage {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 40px solid transparent;
            border-right: 40px solid transparent;
            border-top: 50px solid var(--pricolor);
            margin: 25px 10px;
        }
        
        #dot-sad-l {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 0px solid transparent;
            border-right: 40px solid transparent;
            border-top: 40px solid var(--pricolor);
            margin: 25px 10px;
        }
        
        #dot-sad-r {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 40px solid transparent;
            border-right: 0px solid transparent;
            border-top: 40px solid var(--pricolor);
            margin: 25px 50px;
        }
        
        #dot-wink-l {
            position: absolute;
            width: 30px;
            height: 5px;
            background: var(--eyes);
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            top: 65px;
            left: 50px;
            margin: -15px 0px 0px -40px;
        }
        
        #dot-wink-r {
            position: absolute;
            width: 30px;
            height: 5px;
            background: var(--eyes);
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            top: 65px;
            left: 50px;
            margin: -15px 0px 0px 10px;
        }
    }

    </style>
    <?php 
    
    function super($state){
        
        if(empty($state)){return '<div class="dot">
            <div id="dot-lefteye"></div>
            <div id="dot-righteye"></div>
        </div>';}
                          
        elseif($state == 'mad'){return '<div class="dot">
            <div id="dot-lefteye">
                <div id="dot-eyelid-upper"></div>
            </div>
            <div id="dot-righteye">
                <div id="dot-eyelid-upper"></div>
            </div>
        </div>';}
        
        elseif($state == 'wtf'){return '<div class="dot">
            <div id="dot-lefteye"></div>
            <div id="dot-righteye">
                <div id="dot-eyelid-upper"></div>
            </div>
        </div>';}
        
        elseif($state == 'peppy'){return '<div class="dot">
            <div id="dot-lefteye">
                <div id="dot-eyelid-lower"></div>
            </div>
            <div id="dot-righteye">
                <div id="dot-eyelid-lower"></div>
            </div>
        </div>';}
        
        elseif($state == 'rage'){return '<div class="dot">

            <div id="dot-lefteye"></div>
            <div id="dot-righteye"></div>
            <div id="dot-rage"></div>
        </div>';}
        
        elseif($state == 'sad'){return '<div class="dot">

            <div id="dot-lefteye"></div>
            <div id="dot-righteye"></div>
            <div id="dot-sad-l"></div>
            <div id="dot-sad-r"></div>

        </div>';}
        
        elseif($state == 'sleep'){return '<div class="dot">
        <div id="dot-wink-l"></div>
        <div id="dot-wink-r"></div>
        </div>';}
        
        elseif($state == 'wink'){return '<div class="dot">
        <div id="dot-lefteye"></div>
        <div id="dot-wink-r"></div>
        </div>';}
        
        else{return '<div class="dot">
            <div id="dot-lefteye"></div>
            <div id="dot-righteye"></div>
        </div>';}
    }
    
    
    
    echo '<div class="dotblock">';

        if(empty($_GET['mood'])){$mood = 'blank';} else {$mood = $_GET['mood'];}
        echo super($mood);
    echo '</div>';
    
    echo '
            <br>
            <a href="dot.php?mood=blank&r=m">Neutral</a>
            <a href="dot.php?mood=peppy&r=m">Peppy</a>
            <a href="dot.php?mood=wtf&r=m">WTF</a>
            <a href="dot.php?mood=wink&r=m">Wink</a>
            <a href="dot.php?mood=sad&r=m">Sad</a>
            <a href="dot.php?mood=mad&r=m">Mad</a>
            <a href="dot.php?mood=rage&r=m">Rage</a>
            <a href="dot.php?mood=sleep&r=m">Sleep</a>';
    
?>


</body>

</html>
