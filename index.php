<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
#inputgen {
	border: 1px solid #FF00FF; background: #FFF;cursor:pointer;
}
#inputgen:hover {
	border: 1px solid #FFFFFF; background: #FFF;cursor:pointer;
}
</style>
</head>
<body>
<br><br>
<center>

<?php
define('DBHOST', 'localhost');
define('DBLOG','root');
define('DBPASS', "zxasqw12");

function dbConnect() {
	
	$dbLink	= mysql_connect(DBHOST, DBLOG, DBPASS);
	
	if(!$dbLink)	{
		ifError();
	}
	
	mysql_query ("set character_set_client='utf8'"); 
	mysql_query ("set character_set_results='utf8'"); 
	mysql_query ("set collation_connection='utf8_general_ci'"); 
	
	return $dbLink;
	
}

function ifError()	{
	//header('Location: /nomysql.html');
	echo"<br><br><br><br>";
	echo"<h1>Не удается загрузить страницу</h1>";
	echo"Наш сервер в настоящий момент перегружен, попробуйте обновить страницу или зайти через несколько минут.<br>";
	echo"Приносим наши извинения.";
	//echo mysql_error();
	exit();
}

function closeDBConnect($dbLink)	{
	@ mysql_close($dbLink);
}

function selectDB()	{
	$result	=	mysql_select_db("bible_".$_GET['lang']);
	
	if(!$result)	{
		ifError();
	}
}

function getQueryDB($query, $dbLink=NULL)	{
	$result	=	mysql_query($query, $dbLink);
	return $result;
}

function getQuery($query)	{
	$dbLink = dbConnect();
	selectDB();
	$resultQuery=getQueryDB($query, $dbLink);
	closeDBConnect($dbLink);
	
	return $resultQuery;
}

function getNumRows($query)
{
	$dbLink = dbConnect();
	selectDB();
	$result	=	mysql_num_rows($query);
	closeDBConnect($dbLink);
	
	return $result;
}

echo 'язык: '.$_GET['lang'].'<br>';

include_once('languages50.php');

$foo = new Languages50();


function javabible_generator1($language) {


if ($language == 'ru') {

	$glavcount = array(0,50,40,27,36,34,24,21,4,31,24,22,25,29,36,10,13,10,42,150,31,12,8,66,52,5,48,14,14,3,9,1,4,7,3,3,3,2,14,4,28,16,24,21,28,
	5,5,3,5,1,1,1,16,16,13,6,6,4,4,5,3,6,4,3,1,13,22);
	//книги Библии, которые нужно разделить (если на русском языке)
	$bigbook = array(1,2,3,4,5,6,7,9,10,11,12,13,14,16,18,19,20,23,24,26,27,40,41,42,43,44,
	52,53,54,66);
} else {
	$glavcount = array(0,50,40,27,36,34,24,21,4,31,24,22,25,29,36,10,13,10,42,150,31,12,8,66,52,5,48,14,14,3,9,1,4,7,3,3,3,2,14,4,28,16,24,21,28,
	16,16,13,6,6,4,4,5,3,6,4,3,1,13,5,5,3,5,1,1,1,22);
	//книги Библии, которые нужно разделить (если на другом языке)
	$bigbook = array(1,2,3,4,5,6,7,9,10,11,12,13,14,16,18,19,20,23,24,26,27,40,41,42,43,44,
	45,46,47,66);
}

$lang = new Languages50();

$language = $_GET['lang'];

$str_commands = $language."_commands";
$commands = $lang->$str_commands();

$str_commands_array = $language."_array";
$commands_array = $lang->$str_commands_array();
$books_array = $commands_array;

echo '<br>';

	for($i=1;$i<=8;$i++) {
		echo $commands[$i].'<br>';
	}
	
	if(!is_dir('./'.$language)) mkdir('./'.$language);
	if(!is_dir('./'.$language.'/in.dobro/')) mkdir('./'.$language.'/in.dobro/');
	if(!is_dir('./'.$language.'/in.dobro/'.$language)) mkdir('./'.$language.'/in.dobro/'.$language);

	$filemain = $language.'/in.dobro/'.$language.'Bible.java';
	
	$fp = fopen($filemain, "w");
	
	fwrite($fp, "package in.dobro;\n\n");
	fwrite($fp, "import javax.microedition.midlet.*;\n");
	fwrite($fp, "import javax.microedition.lcdui.*;\n\n");
	fwrite($fp, "import vz.*;\n");
	fwrite($fp, "import nz.*;\n\n");

fwrite($fp, "\tpublic class ".$language."Bible extends MIDlet implements CommandListener {\n");
fwrite($fp, "\t\n");
fwrite($fp, "\t   public static int zavetsel = 0;\n\n");

fwrite($fp, "\t   public static int vzsel = 0;\n");
fwrite($fp, "\t   public static int vzselglav1 = 1;\n");
fwrite($fp, "\t   public static int vzselglav2 = 1;\n");
fwrite($fp, "\t   public static int vzselglav3 = 1;\n");
fwrite($fp, "\t   public static int vzselglav4 = 1;\n");
fwrite($fp, "\t   public static int vzselglav5 = 1;\n");
fwrite($fp, "\t   public static int vzselglav6 = 1;\n");
fwrite($fp, "\t   public static int vzselglav7 = 1;\n");
fwrite($fp, "\t   public static int vzselglav8 = 1;\n");
fwrite($fp, "\t   public static int vzselglav9 = 1;\n");
fwrite($fp, "\t   public static int vzselglav10 = 1;\n");
fwrite($fp, "\t   public static int vzselglav11 = 1;\n");
fwrite($fp, "\t   public static int vzselglav12 = 1;\n");
fwrite($fp, "\t   public static int vzselglav13 = 1;\n");
fwrite($fp, "\t   public static int vzselglav14 = 1;\n");
fwrite($fp, "\t   public static int vzselglav15 = 1;\n");
fwrite($fp, "\t   public static int vzselglav16 = 1;\n");
fwrite($fp, "\t   public static int vzselglav17 = 1;\n");
fwrite($fp, "\t   public static int vzselglav18 = 1;\n");
fwrite($fp, "\t   public static int vzselglav19 = 1;\n");
fwrite($fp, "\t   public static int vzselglav20 = 1;\n");
fwrite($fp, "\t   public static int vzselglav21 = 1;\n");
fwrite($fp, "\t   public static int vzselglav22 = 1;\n");
fwrite($fp, "\t   public static int vzselglav23 = 1;\n");
fwrite($fp, "\t   public static int vzselglav24 = 1;\n");
fwrite($fp, "\t   public static int vzselglav25 = 1;\n");
fwrite($fp, "\t   public static int vzselglav26 = 1;\n");
fwrite($fp, "\t   public static int vzselglav27 = 1;\n");
fwrite($fp, "\t   public static int vzselglav28 = 1;\n");
fwrite($fp, "\t   public static int vzselglav29 = 1;\n");
fwrite($fp, "\t   public static int vzselglav30 = 1;\n");
fwrite($fp, "\t   public static int vzselglav31 = 1;\n");
fwrite($fp, "\t   public static int vzselglav32 = 1;\n");
fwrite($fp, "\t   public static int vzselglav33 = 1;\n");
fwrite($fp, "\t   public static int vzselglav34 = 1;\n");
fwrite($fp, "\t   public static int vzselglav35 = 1;\n");
fwrite($fp, "\t   public static int vzselglav36 = 1;\n");
fwrite($fp, "\t   public static int vzselglav37 = 1;\n");
fwrite($fp, "\t   public static int vzselglav38 = 1;\n");
fwrite($fp, "\t   public static int vzselglav39 = 1;\n\n");
fwrite($fp, "\t   public static int nzsel = 0;\n");
fwrite($fp, "\t   public static int nzselglav1 = 1;\n");
fwrite($fp, "\t   public static int nzselglav2 = 1;\n");
fwrite($fp, "\t   public static int nzselglav3 = 1;\n");
fwrite($fp, "\t   public static int nzselglav4 = 1;\n");
fwrite($fp, "\t   public static int nzselglav5 = 1;\n");
fwrite($fp, "\t   public static int nzselglav6 = 1;\n");
fwrite($fp, "\t   public static int nzselglav7 = 1;\n");
fwrite($fp, "\t   public static int nzselglav8 = 1;\n");
fwrite($fp, "\t   public static int nzselglav9 = 1;\n");
fwrite($fp, "\t   public static int nzselglav10 = 1;\n");
fwrite($fp, "\t   public static int nzselglav11 = 1;\n");
fwrite($fp, "\t   public static int nzselglav12 = 1;\n");
fwrite($fp, "\t   public static int nzselglav13 = 1;\n");
fwrite($fp, "\t   public static int nzselglav14 = 1;\n");
fwrite($fp, "\t   public static int nzselglav15 = 1;\n");
fwrite($fp, "\t   public static int nzselglav16 = 1;\n");
fwrite($fp, "\t   public static int nzselglav17 = 1;\n");
fwrite($fp, "\t   public static int nzselglav18 = 1;\n");
fwrite($fp, "\t   public static int nzselglav19 = 1;\n");
fwrite($fp, "\t   public static int nzselglav20 = 1;\n");
fwrite($fp, "\t   public static int nzselglav21 = 1;\n");
fwrite($fp, "\t   public static int nzselglav22 = 1;\n");
fwrite($fp, "\t   public static int nzselglav23 = 1;\n");
fwrite($fp, "\t   public static int nzselglav24 = 1;\n");
fwrite($fp, "\t   public static int nzselglav25 = 1;\n");
fwrite($fp, "\t   public static int nzselglav26 = 1;\n");
fwrite($fp, "\t   public static int nzselglav27 = 1;\n\n");
fwrite($fp, "\t   private Form nzgoodform, vzgoodform;\n\n");
fwrite($fp, "\t   Command toexit, nzglava, tonzlist, tonztext;\n");
fwrite($fp, "\t   Command tozavet, vzglava, tovzlist, vzornz;\n");
fwrite($fp, "\t   Command tovztext;\n");
fwrite($fp, "\t   private Display display;\n");
fwrite($fp, "\t   public List zavetlist, vzlist, nzlist, nzglavlist;\n");
fwrite($fp, "\t   public List vzglavlist;\n\n");
fwrite($fp, "\t   int countglav;\n\n");
fwrite($fp, "\t   String nameglavlist;\n");
fwrite($fp, "\t   String textbible;\n");
fwrite($fp, "\t   String vtextbible;\n\n");

fwrite($fp, "\t   private void CreateCommands() {\n");
fwrite($fp, "\t   toexit = new Command(\"".$commands_array[2]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   nzglava = new Command(\"".$commands_array[3]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   tonzlist = new Command(\"".$commands_array[9]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   vzglava = new Command(\"".$commands_array[3]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   tovzlist = new Command(\"".$commands_array[8]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   tozavet = new Command(\"".$commands_array[5]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   tonztext = new Command(\"".$commands_array[6]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   tovztext = new Command(\"".$commands_array[6]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   vzornz = new Command(\"".$commands_array[7]."\", Command.SCREEN, 2);\n");
fwrite($fp, "\t   }\n\n");

fwrite($fp, "\t   private Displayable zavetlist(int selzavet) {\n\n");
fwrite($fp, "\t   zavetlist = new List(\"".$commands_array[1]."\", 3);\n");
fwrite($fp, "\t   zavetlist.append(\"".$commands_array[8]."\",null);\n");
fwrite($fp, "\t   zavetlist.append(\"".$commands_array[9]."\",null);\n\n");
fwrite($fp, "\t   zavetlist.setSelectedIndex(".$language."Bible.zavetsel, true);\n\n");
fwrite($fp, "\t   zavetlist.addCommand(vzornz);\n");
fwrite($fp, "\t   zavetlist.addCommand(toexit);\n\n");
fwrite($fp, "\t   zavetlist.setCommandListener(this);\n\n");
fwrite($fp, "\t   return zavetlist;\n\n");
fwrite($fp, "\t   }\n\n");

fwrite($fp, "\t   private Displayable vzlist(int vzselglavus) {\n\n");
fwrite($fp, "\t   vzlist = new List(\"".$commands_array[8]."\", 3);\n");

	for($i=1;$i<=39;$i++) {
		fwrite($fp, "\t   vzlist.append(\"".$books_array[$i]."\",null);\n");
	}

fwrite($fp, "\t   vzlist.setSelectedIndex(".$language."Bible.vzsel, true);\n\n");
fwrite($fp, "\t   vzlist.addCommand(tozavet);\n");
fwrite($fp, "\t   vzlist.addCommand(vzglava);\n");
fwrite($fp, "\t   vzlist.addCommand(toexit);\n\n");
fwrite($fp, "\t   vzlist.setCommandListener(this);\n\n");
fwrite($fp, "\t   return vzlist;\n\n");
fwrite($fp, "\t}\n\n");

fwrite($fp, "\t private Displayable nzlist(int nzselglavus) {\n\n");
fwrite($fp, "\t nzlist = new List(\"".$commands_array[9]."\", 3);\n");

	for($i=40;$i<=66;$i++) {
		fwrite($fp, "\t nzlist.append(\"".$books_array[$i]."\",null);\n");
	}
	
fwrite($fp, "\t nzlist.setSelectedIndex(".$language."Bible.nzsel, true);\n\n");
fwrite($fp, "\t nzlist.addCommand(tozavet);\n");
fwrite($fp, "\t nzlist.addCommand(nzglava);\n");
fwrite($fp, "\t nzlist.addCommand(toexit);\n\n");
fwrite($fp, "\t nzlist.setCommandListener(this);\n\n");
fwrite($fp, "\t return nzlist;\n\n");
fwrite($fp, "\t }\n\n");	

fwrite($fp, "\tprivate Displayable nzglavlist(int intglav) {\n\n");
fwrite($fp, "\tswitch (intglav) {\n");
	
	for($i=1;$i<=27;$i++) {
 	    fwrite($fp, "\tcase ".$i.":\n");
		fwrite($fp, "\t\tcountglav = ".$glavcount[($i+39)].";\n");
		fwrite($fp, "\t\tnameglavlist = \"".$books_array[($i+39)]."\";\n");
	    fwrite($fp, "\tbreak;\n");
		fwrite($fp, "\n");
	}
	fwrite($fp, "\t}\n\n");
	
fwrite($fp, "\tnzglavlist = new List(nameglavlist, 3);\n\n");
fwrite($fp, "\t	for (int i = 1; i<=countglav; i++) {\n");
fwrite($fp, "\t	String itemglav = \"".$commands_array[3]." \" + i;\n");
fwrite($fp, "\t	nzglavlist.append(itemglav, null);\n");
fwrite($fp, "\t	}\n\n");

fwrite($fp, "\tswitch (intglav) {\n");

	for($i=1;$i<=27;$i++) {
		fwrite($fp, "\tcase ".$i.":\n");
		fwrite($fp, "\t\tnzglavlist.setSelectedIndex(".$language."Bible.nzselglav".$i."-1, true);\n");
		fwrite($fp, "\tbreak;\n");
		fwrite($fp, "\n");
	}	
	
	fwrite($fp, "\t}\n\n");

    fwrite($fp, "\tnzglavlist.addCommand(tonzlist);\n");
    fwrite($fp, "\tnzglavlist.addCommand(tonztext);\n");
    fwrite($fp, "\tnzglavlist.addCommand(toexit);\n");
    fwrite($fp, "\tnzglavlist.setCommandListener(this);\n\n");

	fwrite($fp, "\treturn nzglavlist;\n");
    fwrite($fp, "\t}\n\n");
	
	fwrite($fp, "\tprivate Displayable vzglavlist(int intglav) {\n\n");
	fwrite($fp, "\tString headglav;\n\n");
	fwrite($fp, "\tswitch (intglav) {\n");
	
	for($i=1;$i<=39;$i++) {
 	    fwrite($fp, "\tcase ".$i.":\n");
		fwrite($fp, "\t\tcountglav = ".$glavcount[($i)].";\n");
		fwrite($fp, "\t\tnameglavlist = \"".$books_array[($i)]."\";\n");
	    fwrite($fp, "\tbreak;\n");
	}
	fwrite($fp, "\t}\n\n");
	
	fwrite($fp, "\tvzglavlist = new List(nameglavlist, 3);\n\n");

	fwrite($fp, "\tif(intglav != 19) {\n");
	fwrite($fp, "\theadglav = \"".$commands_array[3] ." \";\n");
	fwrite($fp, "\t} else {\n");
	fwrite($fp, "\theadglav = \"".$commands_array[10]." \";\n");
	fwrite($fp, "\t}\n\n");

	fwrite($fp, "\t	for (int i = 1; i<=countglav; i++) {\n");
	fwrite($fp, "\t	String itemglav = headglav + i;\n");
	fwrite($fp, "\t	vzglavlist.append(itemglav, null);\n");
	fwrite($fp, "\t	}\n\n");
	
	fwrite($fp, "\tswitch (intglav) {\n");
	
	for($i=1;$i<=39;$i++) {
		fwrite($fp, "\tcase ".$i.":\n");
		fwrite($fp, "\t\tvzglavlist.setSelectedIndex(".$language."Bible.vzselglav".$i."-1, true);\n");
		fwrite($fp, "\tbreak;\n");
	}
	
	fwrite($fp, "\t}\n\n");
	
	fwrite($fp, "\tvzglavlist.addCommand(tovzlist);\n");
    fwrite($fp, "\tvzglavlist.addCommand(tovztext);\n");
    fwrite($fp, "\tvzglavlist.addCommand(toexit);\n");

    fwrite($fp, "\tvzglavlist.setCommandListener(this);\n\n");

    fwrite($fp, "\treturn vzglavlist;\n");
    fwrite($fp, "\t}\n\n");
	
	fwrite($fp, "\tpublic void startApp() {\n\n");

    fwrite($fp, "\tCreateCommands();\n");
    fwrite($fp, "\tDisplay.getDisplay(this).setCurrent(zavetlist(0));\n");
    fwrite($fp, "\tdisplay = Display.getDisplay(this);\n");
    fwrite($fp, "\t}\n\n");

    fwrite($fp, "\tpublic void pauseApp() {\n");
    fwrite($fp, "\t}\n\n");

    fwrite($fp, "\tpublic void destroyApp(boolean unconditional) {\n");
    fwrite($fp, "\t}\n\n");

    fwrite($fp, "\tprivate Displayable nzgoodform(int i) {\n\n");
	
	fwrite($fp, "\tswitch (".$language."Bible.nzsel) {\n");
	
	for($i=40;$i<=66;$i++) {
		
		fwrite($fp, "\tcase ".($i-40).":\n");
		
		/*
            if (Bible.nzselglav1 < 11) {
	    	bible40_1 nareabible1_1 = new bible40_1(Bible.nzselglav1);
	    	textbible = nareabible1_1 + "";
			}
		*/
		
		if(in_array($i, $bigbook)) {
			$countstr = ceil($glavcount[$i]/7);
				$counter = 0;
				for($count=1;$count<=$countstr;$count++){
					$beginnum = $count*7-7+1;
					$endnum = (($count*7) <= $glavcount[$i]) ? $count*7 : $glavcount[$i];
					if($counter<1) {
						//fwrite($fp, "\t\t <".($endnum+1).";\n");
						fwrite($fp, "\t\tif (".$language."Bible.nzselglav".($i-39)." < ".($endnum+1).") {\n");
						fwrite($fp, "\t\t".$language."Bible".$i."_".$count." areabible".($i-39)."_".$count." = new ".$language."Bible".$i."_".$count."(".$language."Bible.nzselglav".($i-39).");\n");
						fwrite($fp, "\t\ttextbible = areabible".($i-39)."_".$count." + \"\";\n");
						fwrite($fp, "\t\t}\n");
					} else {
					if (($counter+1) != $countstr) {
						//fwrite($fp, "\t\t >".($beginnum-1) ." && <".($endnum+1).";\n");
						fwrite($fp, "\t\telse if (".$language."Bible.nzselglav".($i-39)." > ".($beginnum-1)." && ".$language."Bible.nzselglav".($i-39)." < ". ($endnum+1) .") {\n");
						fwrite($fp, "\t\t".$language."Bible".$i."_".$count." areabible".($i-39)."_".$count." = new ".$language."Bible".$i."_".$count."(".$language."Bible.nzselglav".($i-39).");\n");
						fwrite($fp, "\t\ttextbible = areabible".($i-39)."_".$count." + \"\";\n");
						fwrite($fp, "\t\t}\n");
					}
					else  {
						//fwrite($fp, "\t\t >".($beginnum-1) . ";\n");
						fwrite($fp, "\t\telse if (".$language."Bible.nzselglav".($i-39)." > ".($beginnum-1).") {\n");
						fwrite($fp, "\t\t".$language."Bible".$i."_".$count." areabible".($i-39)."_".$count." = new ".$language."Bible".$i."_".$count."(".$language."Bible.nzselglav".($i-39).");\n");
						fwrite($fp, "\t\ttextbible = areabible".($i-39)."_".$count." + \"\";\n");
						fwrite($fp, "\t\t}\n");
					}
				}
				$counter++;
			}
		} else {
			fwrite($fp, "\t\t".$language."Bible".$i." areabible".($i-39)." = new ".$language."Bible".$i."(".$language."Bible.nzselglav".($i-39).");\n");
			fwrite($fp, "\t\ttextbible = areabible".($i-39)." + \"\";\n");
		}
		
		fwrite($fp, "\t\tnzgoodform = new Form(\"".$books_array[($i)]."\");\n");
		fwrite($fp, "\tbreak;\n");
		
	}
	
	fwrite($fp, "\t}\n\n");
	
	fwrite($fp, "\tnzgoodform.append(textbible);\n");
    fwrite($fp, "\tnzgoodform.addCommand(nzglava);\n");
	fwrite($fp, "\tnzgoodform.addCommand(toexit);\n");
    fwrite($fp, "\tnzgoodform.setCommandListener(this);\n\n");

    fwrite($fp, "\treturn nzgoodform;\n\n");
	
	fwrite($fp, "\t}\n\n");
	
	
    fwrite($fp, "\tprivate Displayable vzgoodform(int i) {\n\n");
	
	fwrite($fp, "\tswitch (".$language."Bible.vzsel) {\n");
	
	for($i=1;$i<=39;$i++) {
		
		fwrite($fp, "\tcase ".($i-1).":\n");
		
		if(in_array($i, $bigbook)) {
			$countstr = ceil($glavcount[$i]/7);
				$counter = 0;
				for($count=1;$count<=$countstr;$count++){
					$beginnum = $count*7-7+1;
					$endnum = (($count*7) <= $glavcount[$i]) ? $count*7 : $glavcount[$i];
					if($counter<1) {
						//fwrite($fp, "\t\t <".($endnum+1).";\n");
						fwrite($fp, "\t\tif (".$language."Bible.vzselglav".($i)." < ".($endnum+1).") {\n");
						fwrite($fp, "\t\t".$language."Bible".$i."_".$count." vareabible".($i)."_".$count." = new ".$language."Bible".$i."_".$count."(".$language."Bible.vzselglav".($i).");\n");
						fwrite($fp, "\t\tvtextbible = vareabible".($i)."_".$count." + \"\";\n");
						fwrite($fp, "\t\t}\n");
					} else {
					if (($counter+1) != $countstr) {
						//fwrite($fp, "\t\t >".($beginnum-1) ." && <".($endnum+1).";\n");
						fwrite($fp, "\t\telse if (".$language."Bible.vzselglav".($i)." > ".($beginnum-1)." && ".$language."Bible.vzselglav".($i)." < ". ($endnum+1) .") {\n");
						fwrite($fp, "\t\t".$language."Bible".$i."_".$count." vareabible".($i)."_".$count." = new ".$language."Bible".$i."_".$count."(".$language."Bible.vzselglav".($i).");\n");
						fwrite($fp, "\t\tvtextbible = vareabible".($i)."_".$count." + \"\";\n");
						fwrite($fp, "\t\t}\n");
					}
					else  {
						//fwrite($fp, "\t\t >".($beginnum-1) . ";\n");
						fwrite($fp, "\t\telse if (".$language."Bible.vzselglav".($i)." > ".($beginnum-1).") {\n");
						fwrite($fp, "\t\t".$language."Bible".$i."_".$count." vareabible".($i)."_".$count." = new ".$language."Bible".$i."_".$count."(".$language."Bible.vzselglav".($i).");\n");
						fwrite($fp, "\t\tvtextbible = vareabible".($i)."_".$count." + \"\";\n");
						fwrite($fp, "\t\t}\n");
					}
				}
				$counter++;
			}
		} else {
			fwrite($fp, "\t\t".$language."Bible".$i." vareabible".($i)." = new ".$language."Bible".$i."(".$language."Bible.vzselglav".($i).");\n");
			fwrite($fp, "\t\tvtextbible = vareabible".($i)." + \"\";\n");
		}
		
		fwrite($fp, "\t\tvzgoodform = new Form(\"".$books_array[($i)]."\");\n");
		fwrite($fp, "\tbreak;\n");
		
	}
	
	fwrite($fp, "\t}\n\n");
	
	fwrite($fp, "\tvzgoodform.append(vtextbible);\n");
    fwrite($fp, "\tvzgoodform.addCommand(vzglava);\n");
	fwrite($fp, "\tvzgoodform.addCommand(toexit);\n");
    fwrite($fp, "\tvzgoodform.setCommandListener(this);\n\n");

    fwrite($fp, "\treturn vzgoodform;\n\n");
	
	fwrite($fp, "\t}\n\n");	
	
	
	    fwrite($fp, "\tpublic void commandAction(Command c, Displayable s) {\n");
        fwrite($fp, "\tif (c == toexit) {\n");
            fwrite($fp, "\t\tdestroyApp(false);\n");
            fwrite($fp, "\t\tnotifyDestroyed();\n");
        fwrite($fp, "\t}\n");
        fwrite($fp, "\telse if (c == nzglava) {\n");
            fwrite($fp, "\t\t".$language."Bible.nzsel = nzlist.getSelectedIndex();\n");
            fwrite($fp, "\t\tDisplay.getDisplay(this).setCurrent(nzglavlist(nzlist.getSelectedIndex()+1));\n");
            fwrite($fp, "\t\tdisplay = Display.getDisplay(this);\n");
        fwrite($fp, "\t}\n");
        fwrite($fp, "\telse if (c == vzglava) {\n");
            fwrite($fp, "\t\t".$language."Bible.vzsel = vzlist.getSelectedIndex();\n");
            fwrite($fp, "\t\tDisplay.getDisplay(this).setCurrent(vzglavlist(vzlist.getSelectedIndex()+1));\n");
            fwrite($fp, "\t\tdisplay = Display.getDisplay(this);\n");
        fwrite($fp, "\t}\n");
        fwrite($fp, "\t\telse if (c == tozavet) {\n\n");

            fwrite($fp, "\t\ttry {\n");
            fwrite($fp, "\t\t".$language."Bible.nzsel = nzlist.getSelectedIndex();\n");
            fwrite($fp, "\t\t".$language."Bible.vzsel = vzlist.getSelectedIndex();\n");
            fwrite($fp, "\t\t} catch (Exception e) {}\n\n");

            fwrite($fp, "\t\tDisplay.getDisplay(this).setCurrent(zavetlist(0));\n");
            fwrite($fp, "\t\tdisplay = Display.getDisplay(this);\n");
        fwrite($fp, "\t}\n");
        fwrite($fp, "\telse if (c == vzornz) {\n");
            fwrite($fp, "\t\t".$language."Bible.zavetsel = zavetlist.getSelectedIndex();\n");
            fwrite($fp, "\t\tif (zavetlist.getSelectedIndex() == 1) {\n");
            fwrite($fp, "\t\tDisplay.getDisplay(this).setCurrent(nzlist(0));\n");
            fwrite($fp, "\t\tdisplay = Display.getDisplay(this);\n");
            fwrite($fp, "\t\t} else if (zavetlist.getSelectedIndex() == 0) {\n");
            fwrite($fp, "\t\tDisplay.getDisplay(this).setCurrent(vzlist(0));\n");
            fwrite($fp, "\t\tdisplay = Display.getDisplay(this);\n");
            fwrite($fp, "\t\t}\n");
        fwrite($fp, "\t}\n");
        fwrite($fp, "\telse if (c == tonzlist) {\n");
            fwrite($fp, "\t\tswitch (".$language."Bible.nzsel){\n");
			
			for($i=1;$i<=27;$i++) {
				fwrite($fp, "\tcase ".($i-1).":\n");
                    fwrite($fp, "\t\t".$language."Bible.nzselglav".$i." = nzglavlist.getSelectedIndex()+1;\n");
                fwrite($fp, "\tbreak;\n");
			}
			
			fwrite($fp, "\t}\n");
            fwrite($fp, "\tDisplay.getDisplay(this).setCurrent(nzlist(nzglavlist.getSelectedIndex()));\n");
            fwrite($fp, "\tdisplay = Display.getDisplay(this);\n");
			fwrite($fp, "\t}\n");
		
		       fwrite($fp, "\telse if (c == tovzlist) {\n");
            fwrite($fp, "\tswitch (".$language."Bible.vzsel){\n");
			
			for($i=1;$i<=39;$i++) {
				fwrite($fp, "\tcase ".($i-1).":\n");
                    fwrite($fp, "\t\t".$language."Bible.vzselglav".$i." = vzglavlist.getSelectedIndex()+1;\n");
                fwrite($fp, "\tbreak;\n");
			}
	
	            fwrite($fp, "\t}\n");
            fwrite($fp, "\tDisplay.getDisplay(this).setCurrent(vzlist(vzglavlist.getSelectedIndex()));\n");
            fwrite($fp, "\tdisplay = Display.getDisplay(this);\n");
			fwrite($fp, "\t}\n");
		
		        fwrite($fp, "\telse if (c == tonztext) {\n");
            fwrite($fp, "\tswitch (".$language."Bible.nzsel){\n");
			
			for($i=1;$i<=27;$i++) {
				fwrite($fp, "\tcase ".($i-1).":\n");
                    fwrite($fp, "\t\t".$language."Bible.nzselglav".$i." = nzglavlist.getSelectedIndex()+1;\n");
                fwrite($fp, "\tbreak;\n");
			}	
			
	            fwrite($fp, "\t}\n");
            fwrite($fp, "\tDisplay.getDisplay(this).setCurrent(nzgoodform(nzglavlist.getSelectedIndex()+1));\n");
            fwrite($fp, "\tdisplay = Display.getDisplay(this);\n");
			fwrite($fp, "\t}\n\n");
		
	        fwrite($fp, "\telse if (c == tovztext) {\n");
            fwrite($fp, "\tswitch (".$language."Bible.vzsel){\n");
			
			for($i=1;$i<=39;$i++) {
				fwrite($fp, "\tcase ".($i-1).":\n");
                    fwrite($fp, "\t\t".$language."Bible.vzselglav".$i." = vzglavlist.getSelectedIndex()+1;\n");
                fwrite($fp, "\tbreak;\n");
			}
			
            fwrite($fp, "\t}\n");
            fwrite($fp, "\tDisplay.getDisplay(this).setCurrent(vzgoodform(vzglavlist.getSelectedIndex()+1));\n");
            fwrite($fp, "\tdisplay = Display.getDisplay(this);\n");

	fwrite($fp, "\t}\n\n");

    fwrite($fp, "\t}\n\n\n");

	fwrite($fp, "\t}\n");

	fclose ($fp);
	
	echo '<br><hr>сгенерирован код на "'.$language.'" языке';
	
}

function javabible_generator2($language) {

if ($language == 'ru') {
	$glavcount = array(0,50,40,27,36,34,24,21,4,31,24,22,25,29,36,10,13,10,42,150,31,12,8,66,52,5,48,14,14,3,9,1,4,7,3,3,3,2,14,4,28,16,24,21,28,
	5,5,3,5,1,1,1,16,16,13,6,6,4,4,5,3,6,4,3,1,13,22);
	//книги Библии, которые нужно разделить (если на русском языке)
	$bigbook = array(1,2,3,4,5,6,7,9,10,11,12,13,14,16,18,19,20,23,24,26,27,40,41,42,43,44,
	52,53,54,66);
} else {
	$glavcount = array(0,50,40,27,36,34,24,21,4,31,24,22,25,29,36,10,13,10,42,150,31,12,8,66,52,5,48,14,14,3,9,1,4,7,3,3,3,2,14,4,28,16,24,21,28,
	16,16,13,6,6,4,4,5,3,6,4,3,1,13,5,5,3,5,1,1,1,22);
	//книги Библии, которые нужно разделить (если на другом языке)
	$bigbook = array(1,2,3,4,5,6,7,9,10,11,12,13,14,16,18,19,20,23,24,26,27,40,41,42,43,44,
	45,46,47,66);
}
	
$tablename = $language.'text';
	
	
for($i = 1; $i <= 66; $i++) {

$countglav = $glavcount[$i];
$testament = ($i < 40) ? 'vz' : 'nz';
	

		if(in_array($i, $bigbook)) {
		$countstr = ceil($glavcount[$i]/7);

			for($count=1;$count<=$countstr;$count++){
				
				if(!is_dir('./'.$language.'/'.$testament)) mkdir('./'.$language.'/'.$testament);
				$file_en = $language.'/'.$testament. '/'.$language.'Bible' . $i . '_' . $count . '.java';
				
				$fp = fopen($file_en, "w");
				fwrite($fp, "package ".$testament.";\n\n");
				fwrite($fp, "public class ".$language."Bible".$i."_".$count." {\n\n");
				fwrite($fp, "\tString bibletext;\n\n");
				
				$beginnum = $count*7-7+1;
				$endnum = (($count*7) <= $glavcount[$i]) ? $count*7 : $glavcount[$i];
				
					for($ii = $beginnum; $ii <= $endnum; $ii++) {
						$result = getQuery('SELECT poem, chapter, poemtext FROM '.$tablename.' WHERE bible='.$i.' AND chapter='.$ii);
					fwrite($fp, "\tprivate String b" . $i . "_" . $ii . "=\"");
						while( $row = mysql_fetch_assoc($result) ) {
							fwrite($fp, $row['poem'] . ' ' . str_replace('"','\"',$row['poemtext']) . '\n');
						}
						fwrite($fp, "\";\n\n");
					}
					
			fwrite($fp, "public ".$language."Bible".$i."_".$count." (int intbible) {\n");
			fwrite($fp, "\tswitch (intbible) {\n");

				for($ii = $beginnum; $ii <= $endnum; $ii++) {
					fwrite($fp, "\t\tcase " . $ii . ":\n");
					fwrite($fp, "\t\t\tthis.bibletext = this.b".$i."_".$ii.";\n");
					fwrite($fp, "\t\tbreak;\n");
				}
				
			fwrite($fp, "\t}\n}\n\n");
			
			fwrite($fp, "public String toString() {\n");
			fwrite($fp, "\treturn this.bibletext;\n");
			fwrite($fp, "}\n\n");
		
			fwrite($fp, "}");
			fclose ($fp);
				
			}

		} else {
			$file_en = $language.'/'.$testament.'/'.$language.'Bible'.$i.'.java';
			
			$fp = fopen($file_en, "w");
			fwrite($fp, "package ".$testament.";\n\n");
			fwrite($fp, "public class ".$language."Bible".$i." {\n\n");
			fwrite($fp, "\tString bibletext;\n\n");
			
				for($ii = 1; $ii <= $countglav; $ii++) {
					$result = getQuery('SELECT poem, chapter, poemtext FROM '.$tablename.' WHERE bible='.$i.' AND chapter='.$ii);
					fwrite($fp, "\tprivate String b" . $i . "_" . $ii . "=\"");
						while( $row = mysql_fetch_assoc($result) ) {
							fwrite($fp, $row['poem'] . ' ' . str_replace('"','\"',$row['poemtext']) . '\n');
						}
					fwrite($fp, "\";\n\n");
					
				}
				
			fwrite($fp, "public ".$language."Bible".$i."(int intbible) {\n");
			fwrite($fp, "\tswitch (intbible) {\n");

				for($ii = 1; $ii <= $countglav; $ii++) {
					fwrite($fp, "\t\tcase " . $ii . ":\n");
					fwrite($fp, "\t\t\tthis.bibletext = this.b".$i."_".$ii.";\n");
					fwrite($fp, "\t\tbreak;\n");
				}
				
			fwrite($fp, "\t}\n}\n\n");
			
			fwrite($fp, "public String toString() {\n");
			fwrite($fp, "\treturn this.bibletext;\n");
			fwrite($fp, "}\n\n");
		
			fwrite($fp, "}");
			fclose ($fp);
		}
		


	}
	
	echo 'сгенерирован код на "'.$language.'" языке';
	
}

if(@$_GET['lang']) { 
	javabible_generator1($_GET['lang']);
	javabible_generator2($_GET['lang']);
}
?>
</body>
</html>