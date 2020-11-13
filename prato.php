<?php include('header.php'); ?>
           
<div class="product-page small-11 large-12 columns no-padding small-centered">
    
  <div class="global-page-container">

    <?php

        $cod_prato = $_GET['prato'];


        $server = 'localhost';
        $user = 'tiago';
        $password = '123';
        $db_name = 'restaurante';
        $port = '8889';

        $db_connect = new mysqli($server,$user,$password,$db_name,$port);
        mysqli_set_charset($db_connect,"utf8");

        if ($db_connect->connect_error) {
            echo 'Falha: ' . $db_connect->connect_error;
        } 
        else {
            $sql = "SELECT * FROM pratos WHERE codigo = '$cod_prato'";
            $result = $db_connect->query($sql);

            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $prato_nome = $row['nome'];
                    $prato_categoria = $row['categoria'];
                    $prato_descr = $row['descricao'];
                    $prato_preco = $row['preco'];
                    $prato_calorias = $row['calorias'];

                }
              }
          }
    ?>

    <?php 
        if ($prato_nome != NULL) { ?>
            <div class="product-section">
              <div class="product-info small-12 large-5 columns no-padding">
                <h3><?php echo $prato_nome; ?></h3>
                <h4><?php echo $prato_categoria; ?></h4>
                <p><?php echo $prato_descr; ?>     
                </p>

                <h5><b>Preço: </b><?php echo $prato_preco; ?></h5>
                <h5><b>Calorias: </b><?php echo $prato_calorias; ?></h5> 
              </div>

              <div class="product-picture small-12 large-7 columns no-padding">
                <img src="img/cardapio/<?php echo $cod_prato; ?>.jpg" alt="Foto do prato: <?php echo $prato_nome; ?>">
              </div>            
            <?php
        } 
        else{
            echo "Prato não encontrado<br>";
        }
    ?>

    <div class="go-back small-12 columns no-padding">
      <a href="cardapio.php"><< Voltar ao Cardápio</a>
    </div>

  </div>
</div>
            


        <footer id="footer" class="small-12 columns no-padding">

            <div class="global-page-container">

                <div class="small-11 small-centered large-12 columns footer-section">

                    <div class="follow-us small-5 medium-3 small-offset-1 medium-offset-0 columns">
                        <h4 class="footer-section-title">Siga-nos</h4>
                        <a href="http://www.facebook.com"><img src="img/social-icons/facebook.svg" alt="facebook-icon"></a>
                        <a href="http://www.twitter.com"><img src="img/social-icons/twitter.svg" alt="facebook-icon"></a>
                        <a href="http://www.instagram.com"><img src="img/social-icons/instagram.svg" alt="facebook-icon"></a>
                    </div>
                    
                    <div class="contato small-5 medium-3 small-offset-1 medium-offset-0 columns">
                        <h4 class="footer-section-title">Contato</h4>
                        <p>
                            Rua Nossa senhora de Copacabana, 400<br>
                            Rio de Janeiro/RJ<br>
                            T. 2245-0977<br>
                            contato@restobar.com.br
                        </p>
                    </div>
                    
                    <div class="horario small-5 medium-3 small-offset-1 medium-offset-0 columns">
                        <h4 class="footer-section-title">Horários</h4>
                        <p><span class="horario-aberto">(Aberto Agora)</span><br>
                        Seg-Sex: 11h30 - 24h00<br>
                        Sábado 11h30 - 02h00<br>
                        Domingo 11h30 - 18h</p>
                    </div>
                    
                    <div class="como-chegar small-5 medium-3 small-offset-1 medium-offset-0 columns">
                        <h4 class="footer-section-title">Como chegar</h4>
                        <div id="map"></div>
                    </div>
                    
                    <hr></hr>
                    
                    <div class="copyright small-12 columns">
                    
                        2017 &copy; Todos os direitos reservados
                    
                    </div>
                </div>
            
            </div>

        </footer>


        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/slick.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            function initMap() {
            var local = {lat: -22.971068, lng: -43.186851};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: local,
                styles: 
                [
                    {
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    }
                ]
                
            });
            var marker = new google.maps.Marker({
                position: local,
                map: map
            });
            }
        </script>
        <script 
            async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlo2Bml6zmqP1_xtT3aLybZdWZNP7l8CM&callback=initMap">
        </script>
        <script>
            $(document).foundation();
        </script>
    </body>

</html>