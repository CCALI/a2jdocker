<?php
	/**
	 * SetData.php
	 * Example of saving A2J Guided Interview (R) data from
	 * A2JViewer as xml.
	 * Tobias Nteireho
	 * Center for Computer Aided Legal Instruction (CALI)
	 */
	session_start();

	$xml=stripslashes($_REQUEST['AnswerKey']);
	$_SESSION['XML']=$xml;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Saving Data | Access To Justice</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1"/>
</HEAD>
<BODY>
<?php

// Setup variables
$curdate = getdate();
$curdate = date('Y-m-d-H.i.s');
$filename = "data.xml";

// Setup save directory
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
$dir = '/var/www/private/';//__DIR__ ;//. '../../../SomewhereSafe/';//'file:///inetpub/wwwroot/LFImport/imported_files/';
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!
// !!!!!!! THIS SHOULD NOT BE WEB ACCESSIBLE !!!!!!!!

$AnswerKey = isset($_POST['AnswerKey']) ? $_POST['AnswerKey'] : null ;

file_put_contents($dir . '/' . $filename , $AnswerKey);

// Get user names, submit date
//$results = $xslt->transformToDoc($xmlobject);
//$s = simplexml_load_string($AnswerKey);
$doc = new DOMDocument();
$doc->loadXML($AnswerKey);
$xpath = new DOMXPath($doc);
$firstname = $xpath->query("//Answer[@name='Client first name TE']/TextValue")->item(0)->nodeValue;

$lastname = $xpath->query("//Answer[@name='Client last name TE']/TextValue")->item(0)->nodeValue;

$submitdate = date("Y-m-d H:i:s");

?>
<div style="text-align:center; font-size:medium; width:600px; margin:5px auto;">
<p>Thank you, <?php echo $firstname . " " . $lastname; ?>.
Your request for legal help has been submitted on
<?php echo $submitdate; ?>.
</div>
</BODY>
</HTML>
