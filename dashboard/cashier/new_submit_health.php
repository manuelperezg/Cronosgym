<?php
require 'db_conn.php';
page_protect();
$query2 = "select * from user_data WHERE wait='yes'";

//echo $query;
$result2 = mysqli_query($con, $query2);

if (mysqli_affected_rows($con) == 1) {
    
} else {
    mysqli_query($con, "DELETE FROM user_data WHERE wait='yes'");
    
    echo "<head><script>alert('Profile NOT Added, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
}
if (isset($_POST['p_name']) && isset($_POST['mem_type']) && isset($_POST['total']) && isset($_POST['age']) && isset($_POST['paid'])) {
    function getRandomWord($len = 3)
    {
        $word = array_merge(range('a', 'z'), range('0', '9'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }
    $mem_type = $_POST['mem_type'];
    
    $query1 = "select * from mem_types WHERE mem_type_id='$mem_type'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name_type = $row1['name'];
            $details   = $row1['details'];
            $days      = $row1['days'];
            
            
        }
    }
    
    $proof = $_POST['proof'];
    if (isset($_POST['other_proof'])) {
        $other_proof = $_POST['other_proof'];
    } else {
        $other_proof = " ";
    }
    $invoice   = substr(time(), 2, 10) . getRandomWord();
    $date      = $_POST['date'];
    $age       = rtrim($_POST['age']);
    $full_name = rtrim($_POST['p_name']);
    $email     = rtrim($_POST['email']);
    $address   = rtrim($_POST['add']);
    $zipcode   = rtrim($_POST['zipcode']);    
    $birthdate   = $_POST['birthdate'];
    $contact   = rtrim($_POST['contact']);
    $sex       = rtrim($_POST['sex']);
    $height    = rtrim($_POST['height']);
    $weight    = rtrim($_POST['weight']);
    $nationality    = rtrim($_POST['nationality']);
    $facebookaccount    = rtrim($_POST['facebookaccount']);
    $twitteraccount    = rtrim($_POST['twitteraccount']);
    $contactperson    = rtrim($_POST['contactperson']);
    $previousgym    = rtrim($_POST['previousgym']);
    $yearstraining    = rtrim($_POST['yearstraining']);
    $total     = $_POST['total'];
    $paid      = $_POST['paid'];
    $mod_date  = strtotime($date . "+ $days days");
    $expiry    = date("Y-m-d", $mod_date);
    $wait      = "no";
    $time      = $days * 86400;
    
    $exp_time = $time + strtotime($date);
    
    $query = "select * from user_data WHERE wait='yes'";
    
    //echo $query;
    $result = mysqli_query($con, $query);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $p_id = $row['newid'];
            
             mysqli_query($con, "UPDATE user_data SET name='$full_name', address='$address', zipcode='$zipcode', birthdate='$birthdate', contact='$contact', email='$email', height='$height', weight='$weight', nationality='$nationality', facebookaccount='$facebookaccount', twitteraccount='$twitteraccount', contactperson='$contactperson', previousgym='$previousgym', yearstraining='$yearstraining', joining='$date', age='$age', proof='$proof', other_proof='$other_proof', sex='$sex' WHERE wait='yes'");
            $bal = $total - $paid;
            
            mysqli_query($con, "INSERT INTO subsciption (mem_id,name,sub_type,paid_date,total,paid,expiry,invoice,sub_type_name,bal,exp_time,renewal)
VALUES ('$p_id','$full_name','$mem_type','$date','$total','$paid','$expiry','$invoice','$name_type','$bal','$exp_time','yes')");
            echo "<head><script>alert('Member Added ,');</script></head></html>";
            
            mysqli_query($con, "UPDATE user_data SET wait='no' WHERE wait='yes'");
        }
    }
    
    
} else {
    echo "<head><script>alert('Profile NOT Added, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
    
}
?>
<!doctype html>

	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
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
			<a href="new_entry.php"><h1>Recibo (Nuevo Registro)</h1></a>
			<address>
				<p>Platea21's Gym</p>
				<p>3rd flr. JTL bldg. B. S. Aquino Drive</p>
				<p>Landline:+63347090076</p><p>www.platea21.com (gorchor@gmail.com)</p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>
    <canvas id="canvasTarget"></canvas> </span>
			</address>
			<span><img alt="" src="../../img/logo.png">
		</header>
		<article>
			<table class="meta">
			<img alt="" src="pic1.jpg" width="100" height="100">	<tr>
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
$regid = substr($p_id, 6, 10);
echo $p_id . " / " . $regid;
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
echo $height . "  FEET / " . $weight . " Kg";
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
echo $name_type;
?></span></td>
						<td><span  ><?php
echo $details . " For " . $days;
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
			<div>
			<p> 1 ) . Todos los miembros deben respetar nuestros TNC / normas normalmente de miembros podrán retirarse. < / Br > < / br > 2 ) . El pago no es transferible y no es reembolsable. < / Br > < / br > 3 ) .Fee En caso de presentarse dentro de los 5 días hábiles antes de la expiración sometidos , de lo contrario 100 PHP / día se le cobrará . < / Br > < / br > 4 ) .Todos los usuarios deben vestir apropiadamente O según aconseja. < / br > < / br > 5 ) .Smoking NO está permitido en el sitio de la gimnasia . < / br > < / br > 6 ) . Un PHP 1000 para romper / scracthing gafas que pertenecen a " gimnasio de Platea21 " se impondrá . </p></div>
		</aside><center><br><br><a href="view_mem.php">Platea21's Gym ( www.platea21.com )</center>
	</body>
</html>