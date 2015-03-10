
<html>
<head>
	<title>PHP SCRAPER</title>

	
</head>
<body>
<pre>


<?php

// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(-1);
// $htmlPage = file_get_contents("http://nseindia.moneycontrol.com/mutualfundindia/latestnav/index.php?sel_ffid=CA&sort=1");


// $doc = new DOMDocument();

//   $doc->loadHTML($htmlPage);


//  $links = array();
//   $container = $doc->getElementById("amc_frm");
//   $arr = $container->getElementsByTagName("option");


// foreach($arr as $item) {
//     $href =  $item->getAttribute("value");
//     $text = trim(preg_replace("/[\r\n]+/", " ", $item->nodeValue));
//     $dropdown[$href] = $text;
// }


//print_r($dropdown);die;
//var_dump($arr);die;





//$doc = new DOMDocument();



?>
</pre>

<form action="#" method="post" id="ffid">
	<div class="FL">
	<strong>Search by AMCs:</strong>
		<select name="ffid" id="sel_ffid" style="width:220px; height:22px" class="b_12">
		<option value="">Select</option>
 							<option value='AA'>Axis Mutual Fund</option><option value='BO'>Baroda Pioneer Mutual Fund</option><option value='BA'>BOI AXA Mutual Fund</option><option value='BS'>Birla Sun Life Mutual Fund</option><option value='AB'>BNP Paribas Mutual Fund</option><option value='CA'>Canara Robeco Mutual Fund</option><option value='DE'>Deutsche Mutual Fund</option><option value='DS'>DSP BlackRock Mutual Fund</option><option value='EW'>Edelweiss Mutual Fund</option><option value='ES'>Escorts Mutual Fund</option><option value='TE'>Franklin Templeton Mutual Fund</option><option value='GS'>Goldman Sachs Mutual Fund</option><option value='HD'>HDFC Mutual Fund</option><option value='HS'>HSBC Mutual Fund</option><option value='PI'>ICICI Prudential Mutual Fund</option><option value='IB'>IDBI Mutual Fund</option><option value='AG'>IDFC Mutual Fund</option><option value='II'>IIFL Mutual Fund</option><option value='IM'>Indiabulls Mutual Fund</option><option value='JM'>JM Financial Mutual Fund</option><option value='JP'>JPMorgan Mutual Fund</option><option value='KM'>Kotak Mahindra Mutual Fund</option><option value='CC'>L&T Mutual Fund</option><option value='JB'>LIC NOMURA Mutual Fund</option><option value='MA'>Mirae Asset Mutual Fund</option><option value='MS'>Morgan Stanley Mutual Fund</option><option value='MO'>Motilal Oswal Mutual Fund</option><option value='PM'>Peerless Mutual Fund</option><option value='AI'>PineBridge Mutual Fund</option><option value='PP'>PPFAS Mutual Fund</option><option value='PA'>Pramerica Mutual Fund</option><option value='ID'>PRINCIPAL Mutual Fund</option><option value='QU'>Quantum Mutual Fund</option><option value='RC'>Reliance Mutual Fund</option><option value='LI'>Religare Invesco Mutual Fund</option><option value='FI'>Sahara Mutual Fund</option><option value='SB'>SBI Mutual Fund</option><option value='SR'>Shriram Mutual Fund</option><option value='SM'>SREI Mutual Fund (IDF)</option><option value='SN'>Sundaram Mutual Fund</option><option value='TA'>Tata Mutual Fund</option><option value='CM'>Taurus Mutual Fund</option><option value='UK'>Union KBC Mutual Fund</option><option value='UT'>UTI Mutual Fund</option>							
		</select>
	<br/>	
		<input type="submit" value="Submit">

</form>
<br/><br/>

<pre>
<?php
	
	if($_REQUEST){
		$ffid = $_POST['ffid'];
		$newURL = "http://nseindia.moneycontrol.com/mutualfundindia/latestnav/index.php?sel_ffid=$ffid&sort=1";

//		echo $newURL;

		$newHtmlPage = file_get_contents($newURL);
		$newDoc = new DOMDocument();
	    $newDoc->loadHTML($newHtmlPage);

				
		$rows = $newDoc->getElementsByTagName('tr');
		for ($i = 0; $i < $rows->length; $i++) {
   			$cells = $rows->item($i)->getElementsByTagName('td');
    		for ($j = 0; $j < $cells->length; $j++) {
        		$table_data[$i][$j] = $cells->item($j)->textContent;
    		}
		}?>
		<table border="1">
			<tr><th>Scheme Name</th><th>NAVs</th><th>Change</th></tr>
		<?php  foreach ($table_data as $key => $valueArray):?>
			<tr>
				<td><?php echo $valueArray[0];?></td>
				<td><?php echo $valueArray[2];?></td>
				<td><?php echo $valueArray[3];?></td>
			</tr>
				<?php endforeach;?>
		</table>
<?php		

	}
?>
				 




</pre>



</body>
</html>