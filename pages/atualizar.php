<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Refresh somente em uma área do site</title>
<style type="text/css">
#all{ width:650px;height:600px; }
#all .left, #all .right{ 
  float:left; 
  width:300px; 
  height:400px;
  border:1px solid #000;	
}
</style>
</head>
<body>
<div id="all">
  <div class="left">
    <p>Valor NÃO muda</p>
    <?php
      $rand = rand(1,9);
      echo "Placar dinâmico: ".$rand;
    ?>
  </div>
  <div class="right">
    <p>Valor muda</p>
      <iframe marginwidth="0" marginheight="0" width="240" height="80" scrolling="no" frameborder=0 src="atualizar2.php"></iframe>
  </div>
</div>
</body>
</html>