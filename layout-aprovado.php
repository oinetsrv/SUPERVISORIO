<?php

session_start();
if (!isset($_SESSION['botao_semafaro_externo_A'])) {
	$_SESSION['botao_semafaro_externo_A'] = 0;  // EXECUTADO
    $_SESSION['botao_abrir_cancelas']     = 0;  // EXECUTADO
	$_SESSION['botao_semafaro_interno_A'] = 0;  // falta IMPLEMENTAR LOGICA

	$_SESSION['sensor_aproximacao_A']     = 0;  // SERÁ EXECUTADO EM DATA FUTURA
	$_SESSION['sensor_seguranca_A']       = 0;	// SERÁ EXECUTADO EM DATA FUTURA

	$_SESSION['estabilidade']             = 0;
	$_SESSION['sensor_seguranca_B']       = 0;
	$_SESSION['botao_semafaro_externo_B'] = 0;
	$_SESSION['botao_semafaro_interno_B'] = 0;
	$_SESSION['sensor_aproximacao_B']     = 0;
	$_SESSION['leiturapeso']              = 00000;

} 



?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
    <!--  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- baixei a bagaça toda -->
       
     <link type="text/css" rel="stylesheet" href="material-design-icons-master/material-design-icons-master/iconfont/material-icons.css"
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <title>Sistema Supervisório - Controle de acessórios. Versão 1.064</title>
    </head>

    	<body>
 

<!--

    		<ul id="dropdown1" class="dropdown-content">
  				<li><a href="#!">one</a></li>
  				<li><a href="#!">two</a></li>
  				<li class="divider"></li>
  				<li><a href="#!">three</a></li>
			</ul>
				<nav>
  					<div class="nav-wrapper teal darken-1 black-text "> 
    					  
    					<ul class="right hide-on-med-and-down">   
      						<li><a href="sass.html">Sass</a></li>
      						<li><a href="badges.html">Components</a></li>

      						-->
      <!-- Dropdown Trigger -->
      <!--
      						<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    					</ul>
  					</div>
				</nav>
				-->
				
<!-- aqui está o menu lateral -->
<div class="row ">
      <div class="col s12 m2 l3 ">
      <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->
         <ul class="collection">
            <li class="collection-item">Pesagem Inicial</li>
            <li class="collection-item">Pesagem Final</li>
            <li class="collection-item">Relatórios</li>
            <li class="collection-item">Pesquisa</li>
            
  	
            <li class="collection-item"> 
            	<form action="comandos/COMANDO_RECEBE_DADOS.php" method="post">
            		<button class="waves-effect waves-teal btn-flat" type="submit" name="atualizar">
            		Atualizar status sistema </button>
            	</form>
            
            
           
            
            
           </li>

         </ul>

<h4 class=" center   ">Controle de Cancelas</h4>
        
			

<?php
if ($_SESSION['botao_abrir_cancelas'] == 0) {
	// se memoria em 0 sistema define que a cancela está fechada e envvia comando para abrir
	// muda memoria para um informando que a ultima acão foi abrir as cancelas.
	echo "<div class='col center s12'>";
	echo "  <label> Click para abrir cancelas</label>";

	echo " <form  action='comandos/COMANDO_AC_AB.php' method='post'> <button class='waves-effect waves-light btn   #1b5e20 green darken-4' type='submit' name='action'> Abrir <i class='material-icons right'>beenhere</i> </button>";
   echo "</form>";
	echo "</div>";
	
	 
} 
if ($_SESSION['botao_abrir_cancelas'] == 1) {
	// se memoria = 1 sistema percebe que o ultimo comando foi para abrir a cancela
	// então se precionar o botao novamente o sistema envia comando para fechar
	
	echo "<div class='col center s12'>";
	echo "  <label> Click para fechar cancelas</label>";
	echo "<form  action='comandos/COMANDO_FC_AB.php' method='post'>  <button class='waves-effect waves-light btn grey darken-4' name='Fechar' type='submit'><i class='material-icons right '>block</i>Fechar</button>";
	echo "</form>";
	echo "</div>";
}

?>
 <div class="row center s2">
 	
</div> 
 		 
  <img class="materialboxed center"  width="310" src="img/logo4.jpg">
      
 

<!-- <img src="img/logo3.jpg"   >	-->
  
 
      </div>
<!-- fim  menu lateral -->
				<!-- inicio painel Controle de cancelas -->
				<div class="col s10 m8 l9 card-panel ">
 

          		<!--	<h4 class=" center ">Controle de Cancelas</h4>  -->
          						<!-- inicio pagina central?-->
          						<div>
          									<!-- inicio lateral semaforos e sensores?-->
          									<div class="row">
          													<!-- coluna com os sensores?-->
          												<div class="col s8 m8 l8">
          													 
              													 	 
<!-- INICIO DA LINHA QUE CONTEM SEMAFORO EXTERNO A SENSOR DE APROXIMAÇÃO A  LEITURA DE PESO E CONTROLE DE CANCELAS -->
              																<div class="row">
  																			<?php            																 
if ($_SESSION['botao_semafaro_externo_A'] == 0) {
	echo"<div class='col s2'>";
	// SE TIVER ZERO SIGNIFICA QUE O SEMAFORO ENTRADA --A-- ESTÁ DESLIGADO
	// ENTÃO  BOTAO DEVE ESTAR PRETO E DEPOIS DE ACIONADO DEVE FICAR VERDE
	// ENVIAR COMANDO PARA ARDUINO PARA ATIVAR ENTRADA --A-- MUDAR MEMORIA PARA
	// 1 
	 echo" <label for='botao_semafaro_externo_A'>Entrada A <br> </label>";
	 echo" <label for='botao_semafaro_externo_A'>Semáforo externo</label>";
	 echo" <form  action='comandos/COMANDO_ENTRA_A.php' method='post'><button class='waves-effect waves-light btn grey darken-4' name='botao_semafaro_externo_A' type='submit'><i class='material-icons ''>highlight_off</i></button>";
	 echo" </form>";
	 
	echo"</div>";
} 
if ($_SESSION['botao_semafaro_externo_A'] == 1) {
	// SE TIVER 1 SIGNIFICA QUE O SEMAFORO ENTRADA --A-- ESTÁ VERDE
	// ENTÃO  BOTAO DEVE ESTAR VERDE E DEPOIS DE ACIONADO DEVE FICAR VERMELHO
	// ENVIAR COMANDO PARA ARDUINO PARA DESATIVAR ENTRADA --A-- MUDAR MEMORIA PARA
	// 2 
	echo "<div class='col s2'>";
	echo "  <label for='botao_semafaro_externo_A'>Entrada A <br> </label>";
	echo "  <label for='botao_semafaro_externo_A'>Semáforo externo</label>";

	echo" <form  action='comandos/COMANDO_NOT_AB.php' method='post'><button class='waves-effect waves-light btn teal darken-1 ' name='botao_semafaro_externo_A' type='submit'><i class='material-icons ''>highlight</i></button>";
	 echo" </form>";

	echo "</div>";
} 

if ($_SESSION['botao_semafaro_externo_A'] == 2) {
	// SE TIVER 2 SIGNIFICA QUE O SEMAFORO ENTRADA --A-- ESTÁ VERMELHO
	// ENTÃO  BOTAO DEVE FCIAR VERMELHO   E DEPOIS DE ACIONADO DEVE FICAR DESLIGADO
	// ENVIAR COMANDO PARA ARDUINO PARA DESATIVAR SEMAFOROS MUDAR MEMORIA PARA
	// 0 
	echo "<div class='col s2'>";
	echo "  <label for='botao_semafaro_externo_A'>Entrada A <br> </label>";
	echo "  <label for='botao_semafaro_externo_A'>Semáforo externo</label>";

	echo" <form  action='comandos/COMANDO_OFF_AB.php' method='post'><button class='waves-effect waves-light btn red darken-1 ' name='botao_semafaro_externo_A' type='submit'><i class='material-icons ''>highlight</i></button>";
	 echo" </form>";

	echo "</div>";
} 

																			?>
<!-- ESSA PARTE NÃO FOI DEPURADA MOTIVO PRECISA DA REALIMENTAÇÃO DOS SENSORES
NA FASE INICIAL ESTOU PASSANDO OS COMANDOS PARA OS SEMAFOROS
 -->
<?php
if ($_SESSION['sensor_aproximacao_A'] == 0) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_aproximacao_A' type='text' name='sensor_aproximacao_A' value='BLOQUEADO' >";
	echo "  <label for='sensor_aproximacao_A'>Sensor aproximoção</label>";
	echo "</div>";
} elseif ($_SESSION['sensor_aproximacao_A'] == 1) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_aproximacao_A' type='text' name='sensor_aproximacao_A' value='LIVRE' >";
	echo "  <label for='sensor_aproximacao_A'>Sensor aproximoção</label>";
	echo "</div>";
}

?>

<?php
if (isset($_SESSION['leiturapeso'])) {
	$valor = $_SESSION['leiturapeso'];
	echo "<div class='col s3 input-field'>";
	echo "    <input style='font-size: 40px' class='black-text large' disabled id='leiturapeso' type='text' name='leiturapeso' value='{$valor}'>";
	echo "    <label for='leiturapeso'>Peso</label>";
	echo "</div>";
} else {
	echo "<div class='col s3  input-field'>";
	echo "    <input class='black-text toggle-text' disabled id='0' type='text' name='leiturapeso' value='ERRO LEITURA'>";
	echo "    <label for='leiturapeso'>Peso</label>";
	echo "</div>";
}

?>

 <!-- FIM PARTE SENSORES NAO DEPURADA. -->
 
 
<!-- FIM DA LINHA QUE CONTEM SEMAFORO EXTERNO A SENSOR DE APROXIMAÇÃO A  LEITURA DE PESO E CONTROLE DE CANCELAS -->
              																</div>

<!-- INICIO DA LINHA QUE CONTEM SEMAFORO INTERNO A SENSOR DE SEGURANÇA A  e peso bruto  -->
              											<div class="row">

														<?php

// VAMOS UTILIZAR ESSA FUNÇÃO NAO FASE 2 DO PROJETO.
// NECESSARIO DEFINIR LOGICA  E VERIFICAR SE ROTINA ESTÁ 
// INSTALADA NO ARDUINO.
if ($_SESSION['botao_semafaro_interno_A'] == 0) {
	echo "<div class='col s2'>";
	echo "  <label for='botao_semafaro_interno_A'>Semáforo interno</label>";
	echo "  <button class='waves-effect waves-light btn grey darken-4' name='botao_semafaro_interno_A' type='submit'><i class='material-icons '>highlight_off</i></button>";
	echo "</div>";
} elseif ($_SESSION['botao_semafaro_interno_A'] == 1) {
	# code...
	echo "<div class='col s2'>";
	echo "  <label for='botao_semafaro_interno_A'>Semáforo interno</label>";
	echo "  <button class='waves-effect waves-light btn teal darken-1' name='botao_semafaro_interno_A' type='submit'><i class='material-icons'>highlight</i></button>";
	echo "</div>";
} elseif ($_SESSION['botao_semafaro_interno_A'] == 2) {
	echo "<div class='col s2'>";
	echo "  <label for='botao_semafaro_interno_A'>Semáforo interno</label>";
	echo "  <button class='waves-effect waves-light btn red darken-1' name='botao_semafaro_interno_A' type='submit'><i class='material-icons '>highlight</i></button>";
	echo "</div>";
}
?>
<!--FIM SEMAFORO INTERNO A -->

<!-- DEPUTAR EM OUTRO DIA HOJE ESTOU TRABALHANDO COM OS SEMAFOROS EXTERNOS E CONTROLE DE CANCELA EM 25 /01 /2017-->
<?php
if ($_SESSION['sensor_seguranca_A'] == 0) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_seguranca_A' type='text' name='sensor_seguranca_A' value='BLOQUEADO' >";
	echo "  <label for='sensor_seguranca_A'>Sensor de Segurança</label>";
	echo "</div>";
} elseif ($_SESSION['sensor_seguranca_A'] == 1) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_seguranca_A' type='text' name='sensor_seguranca_A' value='LIVRE' >";
	echo "  <label for='sensor_seguranca_A'>Sensor de Segurança</label>";
	echo "</div>";
}

														?>
																<div class="row">
    																<div class="col input-field s3 ">
        															<input style='font-size: 40px' id="bruto" type="number" name="bruto" >
         															<label for='bruto'>Peso Bruto</label>
    																</div>
  																</div>
<!--FIM SEMAFORO INTERNO A -->

              											</div>	
 <!-- fim DA LINHA QUE CONTEM SEMAFORO INTERNO A SENSOR DE SEGURANÇA A  e peso bruto  -->

 <!-- inicio DA LINHA QUE CONTEM apontador de estabildiade de leitura e tara -->
 													<div class="row">
													<?php
// função que devera ser implementada apos captura do peso
if ($_SESSION['estabilidade'] == 1) {
	echo "<div class='col s3 offset-s2 input-field'>";
	echo "    <input class='black-text' disabled id='estabilidade' type='text' name='estabilidade' value='ESTÁVEL'>";
	echo "    <label for='estabilidade'>Peso</label>";
	echo "</div>";
} elseif ($_SESSION['estabilidade'] == 0) {
	# code...
	echo "<div class='col s3 offset-s2 input-field'>";
	echo "    <input class='black-text' disabled id='estabilidade' type='text' name='estabilidade' value='Peso instável'>";
	echo "    <label for='estabilidade'>Peso</label>";
	echo "</div>";
}

?>
															<div class="col input-field s3">
        														<input style='font-size: 40px' id="tara" type="number" name="tara" >
         														<label for='tara'>Tara</label>
    														</div>
													</div>
	 <!-- fim DA LINHA QUE CONTEM apontador de estabildiade de leitura e tara -->	
	 		 <!--INICI DA LINHA QUE CONTEM SEMAFORO B INTERNO SENSOR DE SEGURANÇA B -->			 
	 												<div class="row">
													<?php
if ($_SESSION['botao_semafaro_interno_B'] == 0) {
	echo "<div class='col s2'>";
	echo "  <button class='waves-effect waves-light btn grey darken-4' name='botao_semafaro_interno_B' type='submit'><i class='material-icons '>highlight_off</i></button>";
	echo "  <label for='botao_semafaro_interno_B'>Semáforo interno</label>";
	echo "</div>";
} elseif ($_SESSION['botao_semafaro_interno_B'] == 1) {
	# code...
	echo "<div class='col s2'>";
	echo "  <button class='waves-effect waves-light btn teal darken-1' name='botao_semafaro_interno_B' type='submit'><i class='material-icons'>highlight</i></button>";
	echo "  <label for='botao_semafaro_interno_B'>Semáforo interno</label>";
	echo "</div>";
} elseif ($_SESSION['botao_semafaro_interno_B'] == 2) {
	echo "<div class='col s2'>";
	echo "  <button class='waves-effect waves-light btn red darken-1' name='botao_semafaro_interno_B' type='submit'><i class='material-icons '>highlight</i></button>";
	echo "  <label for='botao_semafaro_interno_B'>Semáforo interno</label>";
	echo "</div>";
}
													?>
													<?php
if ($_SESSION['sensor_seguranca_B'] == 0) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_seguranca_B' type='text' name='sensor_seguranca_B' value='BLOQUEADO' >";
	echo "  <label for='sensor_seguranca_B'>Sensor de Segurança</label>";
	echo "</div>";
} elseif ($_SESSION['sensor_seguranca_B'] == 1) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_seguranca_B' type='text' name='sensor_seguranca_B' value='LIVRE' >";
	echo "  <label for='sensor_seguranca_B'>Sensor de Segurança</label>";
	echo "</div>";
}

													?>
														<div class="col input-field s3">
        													<input style='font-size: 40px' id="liquido" type="number" name="liquido" >
        													 <label for='liquido'>Peso Líquido</label>
														</div>
 <!--FIM DA LINHA QUE CONTEM SEMAFORO B INTERNO SENSOR DE SEGURANÇA B -->	
													</div>
 <!--INICIO DA LINHA QUE CONTEM SEMAFORO B EXTERNO SENSOR DE PROXIMIDADE B -->	
												<div class="row">
															<?php
															// ESSE CODIGO FOI COMENTADO 
			// NA ENTRADA A. A DIFERENÇA É QUE QUANDO SINAL VERDE A ATIVO
			// SINAL VERMELHO B FICARA ATIVO


if ($_SESSION['botao_semafaro_externo_B'] == 0) {
	echo "<div class='col s2'>";
	echo " <form  action='comandos/COMANDO_ENTRA_B.php' method='post'> <button class='waves-effect waves-light btn grey darken-4' name='botao_semafaro_externo_B' type='submit'><i class='material-icons '>highlight_off</i></button>";

	
	echo "  <label for='botao_semafaro_externo_B'>Semáforo externo</label>";
	echo "  <label for='botao_semafaro_externo_B'>Entrada B <br> </label>";
	
	echo "</div>";
} elseif ($_SESSION['botao_semafaro_externo_B'] == 1) {
 
	echo "<div class='col s2'>";
	echo "<form  action='comandos/COMANDO_NOT_AB.php' method='post'>  <button class='waves-effect waves-light btn teal darken-1' name='botao_semafaro_externo_B' type='submit'><i class='material-icons'>highlight</i></button>";
	echo "  <label for='botao_semafaro_externo_B'>Semáforo externo</label>";
	echo "  <label for='botao_semafaro_externo_B'>Entrada B <br> </label>";
	echo "</div>";
} elseif ($_SESSION['botao_semafaro_externo_B'] == 2) {
	echo "<div class='col s2'>";
	echo " <form  action='comandos/COMANDO_OFF_AB.php' method='post'> <button class='waves-effect waves-light btn red darken-1' name='botao_semafaro_externo_B' type='submit'><i class='material-icons '>highlight</i></button>";
	echo "  <label for='botao_semafaro_externo_B'>Semáforo externo</label>";
	echo "  <label for='botao_semafaro_externo_B'>Entrada B <br> </label>";
	echo "</div>";
}

															?>

															<?php
if ($_SESSION['sensor_aproximacao_B'] == 0) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_aproximacao_B' type='text' name='sensor_aproximacao_B' value='BLOQUEADO' >";
	echo "  <label for='sensor_aproximacao_B'>Sensor aproximoção</label>";
	echo "</div>";
} elseif ($_SESSION['sensor_aproximacao_B'] == 1) {
	echo "<div class='col s3 input-field'>";
	echo "  <input class='black-text' disabled id='sensor_aproximacao_B' type='text' name='sensor_aproximacao_B' value='LIVRE' >";
	echo "  <label for='sensor_aproximacao_B'>Sensor aproximoção</label>";
	echo "</div>";
}

																?>

														 </div>
<!--FIM DA LINHA QUE CONTEM SEMAFORO B EXTERNO SENSOR DE PROXIMIDADE B -->	 


          											</div>




          							<!-- fim pagina central?-->
          						</div>


				 </div>


</div>


<!-- 
configurações da pagina

-->
    <footer class="page-footer teal darken-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">BALANÇAS RIO VERDE</h5>
                <p class="grey-text text-lighten-4">Uma parceria de peso.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                
<!-- Se um dia precisar add links espaço configurado
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>

  -->
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 TODOS OS DIREITOS RESERVADOS
            <a class="grey-text text-lighten-4 right" href="#!">Link do futuro site da empresa</a>
            </div>
          </div>
        </footer>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


    	</body>
  </html>