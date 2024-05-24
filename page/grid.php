<?php 

include("../bdd/config.inc.php");
session_start();

if($_SESSION['connected']==true){

    $email=$_SESSION["email_user"];
    $pseudo=$_SESSION["pseudo_user"];

    if (isset($_GET['grid_number'])) {

        $grid_number = $_GET['grid_number'];

        $request="select * from `grid`";
        $length_table=GetSQL($request,$grid);

        $index=0;
        $bool_create_grid=true;

        //Test to know if user wants to create a new grid
        if($grid_number<=$length_table){
            $bool_create_grid=false;
        }

        if($bool_create_grid==true){
        
            $new_grid=$length_table+1;
            $new_grid_name="grid".$new_grid;
        
            $request="INSERT INTO `grid` (`id`, `Name`) VALUES ('$new_grid','$new_grid_name')";
            ExecuteSQL($request);
        
            $bool_create_grid=false;
        
            $grid_number=$new_grid;
        }
    } 
    else {
        $grid_number=1;
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="../stylesheet/grid.css?1" rel="stylesheet">
    </head>

    <header>
        <div class="title">
            <h1>This is the grid number : <?php echo $grid_number; ?> <h1>
        </div>
    </header>

    <body>
        <div class="wholepage">
            <div class="grid_choice">
                <h4>Choose the grid</h4>
                <form action="grid.php" method="get">
                    <select name="grid_number" size="1">
                        <?php
                            //Display all the grids present in the BDD
                            $request="select * from `grid`";
                            $length_table=GetSQL($request,$grid);
                            for($index=0;$index<$length_table; $index++){
                                echo '<option value="'.($index+1).'">'.($index+1).'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Change Grid"/>
                </form>

                <h4>Create new grid ?</h4>
                <form method="get">
                    <?php echo '<input type="hidden" name="grid_number" value="'.($length_table+1).'" >' ?>
                    <button type="submit">New Grid</button>
                </form>
            </div>

            <div class="grid">
                <table id="grid">
                    <?php

                        $request="select * from `pixel`";
                        $length_table=GetSQL($request,$pixel);

                        $pos_grid=0+900*($grid_number-1);
                        $exit=false;
                        $index=0;
                        
                        // Loop to recover the first defined pixel of the grid
                        while(!$exit){
                            if(1+900*($grid_number-1)<=$pixel[$index][0] && $pixel[$index][0]<=900*$grid_number){
                                $pos_bdd=$index;
                                $exit=true;
                            }
                            else if(($index+1)==$length_table){
                                $pos_bdd=0;
                                $exit=true;
                            }
                            $index++;
                        }

                        for ($row = 0; $row < 30; $row++) {
                            echo '<tr>';
                            for ($column = 0; $column < 30; $column++) {
                                if(isset($pixel[$pos_bdd][0]) && (($pos_grid+1)==$pixel[$pos_bdd][0])){
                                    echo '<td class="pixel" id_pixel="'.($pos_grid+1).'" pseudo_pixel="'.$pixel[$pos_bdd][2].'" style="background-color: ' . $pixel[$pos_bdd][1] . '"></td>';
                                    $pos_bdd++;
                                } else {
                                    echo '<td id_pixel="'.($pos_grid+1).'" pseudo_pixel="nobody" class="pixel"></td>';
                                    
                                }
                                $pos_grid++; 
                            }
                            echo '</tr>';
                        }
                    ?>
                </table>
                <div id="infoText"></div>
            </div>

            
            <div class="color">
                <h3>Choice of Color</h3>
                <table id="table">
                    <tr>
                        <td class="choice" style="background-color:#FE0303"></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#031AFE"></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#2DFE03"></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#FE03FB"></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#FEFB03"></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#03FEFB"></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#000000 "></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#FFAA00  "></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#9700FF  "></td>
                    </tr>
                    <tr>
                        <td class="choice" style="background-color:#764E25  "></td>
                    </tr>
                    
                </table>

                <table>
                    <h3>Chosed Color</h3>
                    <tr>
                        <td class="choice" id="selected-color" style="background-color:#FFFFFF"></td>
                    </tr>
                </table>
            </div>
            <div class="deconnection">
            <form action="authentification.php" method="post">
                <input type="submit" name="disconnected" value="Disconnected" />
            </form>
            </div>
        </div>

    <?php
        }
        else{
            echo '<h1>Need an authentification</h1>';
            echo '<a href="authentification.php">Click here</a>';

        } 
    ?>

    <script>
        let selectedColor = '#FFFFFF'; 

        function convertFormat(x) {
            return ("0" + parseInt(x).toString(16)).slice(-2).toUpperCase();;
        }

        function rgbToHex(rgb) {

            var values = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

            var hexValue = "#" + convertFormat(values[1]) + convertFormat(values[2]) + convertFormat(values[3]);

            return hexValue;
        }

        function changeColor(event) {
            const pixel = event.target;
            pixel.style.backgroundColor = selectedColor;

            var id_pixel = pixel.getAttribute('id_pixel');
            var hexColor = rgbToHex(selectedColor);
            
            //Permit to send data to the BDD
            fetch('../bdd/updatePixel.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_pixel: id_pixel,
                    hexColor: hexColor,
                    pseudo: "<?php echo $pseudo; ?>",
                    id_grid: "<?php echo $grid_number; ?>"
                })
            });
        }

        function selectColor(event) {
            selectedColor = event.target.style.backgroundColor;
            document.getElementById('selected-color').style.backgroundColor = selectedColor;
        }

        window.onload = function() {

            setTimeout(function() {location.reload();}, 5000);

            const pixels = document.querySelectorAll('.pixel');
            var infoText = document.getElementById('infoText');
            var grid = document.getElementById('grid');

            //Add listeners to all pixels for clicking and showing the pseudo of the owner
            pixels.forEach(pixel => {
                pixel.addEventListener('click', changeColor);

                pixel.addEventListener('mouseenter', function() {   
                    var pixelRect = pixel.getBoundingClientRect();
                    var pseudo_pixel = pixel.getAttribute('pseudo_pixel');

                    infoText.innerHTML = pseudo_pixel;
                    infoText.style.top = (pixelRect.top - infoText.offsetHeight) + 'px';
                    infoText.style.left = pixelRect.left + 'px';
                    infoText.style.display = 'block';
                });
            });
            
            grid.addEventListener('mouseleave', function() {
                infoText.style.display = 'none';
            });

            const colorChoices = document.querySelectorAll('.choice');
            colorChoices.forEach(colorChoice => {
                colorChoice.addEventListener('click', selectColor);
            });
        }
    </script>
</body>
</html>
