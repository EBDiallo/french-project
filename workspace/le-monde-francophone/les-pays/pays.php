<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="/le-monde-francophone/style.css">
        
        <?php 
        $connect = new mysqli("localhost", "ebdiallo03", "", french);
        
        
        $query = $connect->prepare("SELECT * FROM countries WHERE `id` = ?");
        
        $query->bind_param("i", $_GET["id"]);
        
        if ($query->execute() or die($query->error)) {
            $query->bind_result($id, $name, $children, $statistics, $celebs, $video, $food, $map, $sights, $source, $learned, $me);
            $query->fetch();
        }
        
        ?>
        <title>
            <?php echo $name; ?>: L'Info
        </title>
    </head>
    <body>
        
        <div class="navbar">
            <a href="/le-monde-francophone/index.html">La Maison</a>
            <a href="/le-monde-francophone/francais.html">Le Monde Francophone</a>
            <a href="dossier.html" style="background-color: #00CC00; color: black">Les Pays Francophone</a>
        </div>
        
        <h1 style="padding-top: 100px">Bienvenue a <i style='color: grey'><?php echo $name ?></i>!</h1>
        <h2>Hi&eacute;rarchie:</h2>
        
        
        <div style="border: 1px solid; float: right; padding-left: 10px; padding-right: 10px">
            
            <h3>Les Photos</h3>
        
            <img src="data:image/jpeg;base64,<?php echo base64_encode( $map ); ?>" width="300" height="300" style="float: right"><br>
            <img src="data:image/jpeg;base64,<?php echo base64_encode( $sights ); ?>" width="300" height="300" style="margin: 10px 10px">
            <p><a href="<?php echo $source; ?>" target="_blank">(source)</a></p>
        
        </div>

        <p><?php echo $children; ?></p>
        
        
        <div style="float: left; border: 1px solid; padding-left: 10px; padding-right: 10px; padding-bottom: 10px; display: block">
            
            <h2>Les Statistiques:</h2>
            
            <ul>
            <?php
            
            echo $statistics;
            
            ?>
            </ul>
            
            <h2>Les Celebs:</h2>
            
            <ul>
                <?php
                
                echo $celebs;
                
                ?>
            </ul>
            
            <?php echo $food; ?>
            
            <h3>Extrait</h3>
            <iframe width="350" height="200" src="<?php echo $video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
            
        </div>
        
        
        
        <div style="float: center; display: block">
        
            <h2>Qu'est-ce que tu as appris?</h2>
            
            <p style="margin: 10px 50px"><?php echo $learned; ?></p>
            
            <iframe width="500" height="300" src="<?php echo $me; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        
        </div>
        
        
            
        
        
        
        
        
        
    </body>
</html>