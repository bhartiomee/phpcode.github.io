<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Temprature convertor</title>
</head>

<body>
    <header>
        <h1>Temperature convertor</h1>
        <div class="main-div">
            <div class="left">
                <img src="img/sunny.png" alt="">
            </div>
            <div class="right">
                <form action="index.php" method="post">
                    <input type="text" name="data" id="data" placeholder="0.0">
                    <div class="selection">
                        <label for="Celcius">Celcius</label>
                        <input type="radio" name="unit" value="cel" checked>
                        <label for="Farenheit">Farenheit</label>
                        <input type="radio" name="unit" value="far">

                    </div>
                    <button type="submit" name="submit">CONVERT</button>
                </form>
                <div class="answer">
                   
                        <?php
                            
                            // $method = $_SERVER['REQUEST_METHOD'];
                            if(isset($_POST['submit'])){
                                $num=(isset($_POST['data']) ? $_POST['data'] : '');
                                $unit=(isset($_POST['unit']) ? $_POST['unit'] : '');
                                $result=0;
                                if($unit=='cel'){
                                    $result=$num*9/5+32;
                                    $result=round($result,2);
                                    echo ' <p>'.$num.'&#8451 = '.$result.'&#8457</p>';

                                }
                                else{
                                    $result=($num-32)*5/9;
                                    $result=round($result,2);
                                    echo '<p>'.$num.'&#8457 = '.$result.'&#8451</p>';
                                }
                                
                            }
                        ?>
                    
                    <!-- <p>$num&#8451=$result&#8457</p> -->
               
                </div>

            </div>
        </div>
    </header>
    
</body>
</html>