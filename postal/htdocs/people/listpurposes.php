<?php 
	//date_default_timezone_set('America/New_York'); 
		
	require_once $_SERVER["DOCUMENT_ROOT"] . "/../libs/db/db_twitter.php";
	
	$r = new Twitter();
	$result = $r->SeeAllTwitterPurposes();
	//print "<PRE>" . print_r($result, 1) . "</PRE>";
	
	// This is to get the string to be done.
	$TotalString = 0;
	if (! empty ($_GET["text"])) {
		$str_arr = preg_split ("/\,/", $_GET["text"]);		
		foreach ($str_arr as $var) {
			if (! empty($var)) {	
				$TextToReplace[$TotalString] = $r->GetFullText($var);
				$TotalString++;
			}
		}
	}

	// Get the twitter accounts	
	if (! empty ($result)) {
		foreach ($result as $var) {
			if (! empty ($var)) {
				if ( ! empty ($var["Twitter_UserID"])) {
					$newresult[$var["TwitterGroup_Reason"]] .= "@" . $var["Twitter_UserID"] . " ";
					$newresultid[$var["TwitterGroup_Reason"]] = $var["TwitterGroup_ID"];
				}
			}
		}
	}
	
	// print "<PRE>" . print_r($newresultid, 1) . "</PRE>";
?>

<H1>Twitter of Interest</H1>

<P>
<TABLE BORDER=1>
	<TR>
		<TH>Purpose</TH>
		<TH>Reason</TH>
		<TH>&nbsp;</TH>
	</TR>

<?php
	$i = 0;
		if (! empty ($newresult)) {
			foreach ($newresult as $index => $var) {
				if (! empty ($var)) {
					$i++;
?>
	
	<TR>
		<TD><?= $index ?></TD>
		<TD><input type="text" value="<?= $var ?>" id="myInput[<?= $i ?>]" SIZE=60></TD>		
		<TD><button onclick="myFunction(<?= $i ?>)">Copy text</button></TD>
	</TR>
	
	<?php if ($TotalString > 0) { 
			for($j = 0; $j < $TotalString; $j++) {
				$i++;
				$NewText = preg_replace('/<#TWITTERNAMES#>/i', $var, $TextToReplace[$j]["TwitterText_text"]);
	?>
	
	<TR>
		<TD>&nbsp;</TD>
		<TD><input type="text" value="<?= $NewText ?>" id="myInput[<?= $i ?>]" SIZE=60></TD>		
		<TD><button onclick="myFunction(<?= $i ?>)">Copy text</button></TD>
	</TR>
	
	
	
<?php } ?>
<TR><TD COLSPAN=3>&nbsp;</TD></TR>
<?php 		}
				}
			}
		}
?>

</TABLE>

</P>


<SCRIPT>
function myFunction(i) {
  /* Get the text field */
  var MyInput = "myInput[" + i + "]";
  var copyText = document.getElementById(MyInput);
   
  /* Select the text field */
	copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  
  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied the text: " + copyText.value);
} 
</SCRIPT>