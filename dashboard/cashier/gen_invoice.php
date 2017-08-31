<?php
require 'db_conn.php';

if (isset($_POST['name'])) {
    $date;
    $memid;
    $age;
    $full_name;
    $sex;
    $height;
    $weight;
    $total;
    $paid;
    $expiry;
    $sub_type_name;
    $invoice = $_POST['name'];
    
    $query1 = "select * from subsciption WHERE invoice='$invoice'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            $memid         = $row1['mem_id'];
            $full_name     = $row1['name'];
            $sub_type_name = $row1['sub_type_name'];
            $total         = $row1['total'];
            $paid          = $row1['paid'];
            $expiry        = $row1['expiry'];
            $date          = $row1['paid_date'];
            
            $query11  = "select * from user_data WHERE newid='$memid'";
            $result11 = mysqli_query($con, $query11);
            if (mysqli_affected_rows($con) == 1) {
                while ($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)) {
                    
                    $age    = $row11['age'];
                    $sex    = $row11['sex'];
                    $height = $row11['height'];
                    $weight = $row11['weight'];
                }
            }
        }
    }
    $query1 = "select * from mem_types WHERE name='$sub_type_name'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name_type = $row1['name'];
            $details   = $row1['details'];
            $days      = $row1['days'];
            
            
        }
    }
    
    
    
} else {
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
    
}
?>
<!doctype html>

	<head>
		<meta charset="utf-8">
		<title>Recibo</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
 <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="jquery-barcode.js"></script>
    <script type="text/javascript">
  
      function generateBarcode(){
        var value = "<?php
echo $invoice;
?>";
        var btype = "code128";
        var renderer = "css";
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
         
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
  
    </script>
	</head>
	<body>
		<header>
			<a href="view_mem.php"><h1>Invoice (Re-Print Slip)</h1></a>
      <address>
        <p>Platea21's Gym</p>
        <p>3rd flr. JTL bldg. B. S. Tacna, Peru</p>
        <p>Celular:+51995530374</p><p>www.platea21.com (gorchor@gmail.com)</p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>
    <canvas id="canvasTarget"></canvas> </span>
      </address>
			<span><img alt="" src="../../img/logo.png">
		</header>
		<article><img alt="" src="pic1.jpg" width="100" height="100">
			<table class="meta">
				<tr>
					<th><span  >Recibo #</span></th>
					<td><span  ><?php
echo $invoice;
?></span></td>
				</tr>
				<tr>
					<th><span  >Fecha</span></th>
					<td><span  ><?php
echo $date;
?></span></td>
				</tr>
				<tr>
					<th><span  >ID Miembro / Reg ID</span></th>

					<td><?php
$regid = substr($memid, 6, 10);
echo $memid . " / " . $regid;
?></span></td>
				</tr>
			</table>	
<table class="meta">
				<tr>
					<th><span  >Nombre</span></th>
					<td><span  ><?php
echo $full_name;
?></span></td>
				</tr>
				<tr>
					<th><span  >Edad, Sexo</span></th>
					<td><span  ><?php
echo $age . " / " . $sex;
?></span></td>
				</tr>
				<tr>
					<th><span  >Altura / Peso</span></th>
					<td><?php
echo $height . " FEET / " . $weight . " Kg";
?></span></td>
				</tr>
			</table>	
<table class="inventory">
				<thead>
					<tr>
						<th><span  >Tipo Membresia</span></th>
						<th><span  >Detalles</span></th>
						<th><span  >Expiracion de suscripción</span></th>
						
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><span  ><?php
echo $sub_type_name;
?></span></td>
						<td><span  ><?php
echo $details;
?></span></td>
						<td><span  ><?php
echo $expiry;
?></span></td>
					</tr>
				</tbody>
			</table>
			
			
			
			<table class="balance">
				<tr>
					<th><span  >Total</span></th>
					<td><span data-prefix>$</span><span><?php
echo $total;
?></span></td>
				</tr><tr>
					<th><span  >Pagado</span></th>
					<td><span data-prefix>$</span><span><?php
echo $paid;
?></span></td>
				</tr><tr>
					<th><span  >Deuda</span></th>
					<td><span data-prefix>$</span><span><?php
echo $total - $paid;
?></span></td>
				</tr>
				
			</table>
		</article>
    <aside>
      <h1><span  >Notas Adicionales</span></h1>
      <div  >
        <p>1). Todos los miembros deben respetar nuestros TNC / normas normalmente de miembros podrán retirarse. </br> </br> 2). El pago no es transferible y no es reembolsable. </br> </br> 3). Comision en caso de presentarse dentro de los 5 días hábiles antes de la expiración sometidos , de lo contrario 100 PHP / día se le cobrará . </br> </br> 4). Todos los usuarios deben vestir apropiadamente O según aconseja. </br> </br> 5). Fumar NO está permitido en el sitio de la gimnasia . </br> </br> 6). Un PHP 1000 para romper / scracthing gafas que pertenecen a " gimnasio de Platea21 " se impondrá .
      </div>
    </aside><center><br><br><a href="view_mem.php">Platea21's Gym ( www.platea21.com )</center>
  </body>
</html>