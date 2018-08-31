<?php

	// The following code saves the entered text to a tinymce.txt file.
	$f="syllabus.txt";
	$fh=fopen($f,'w')or die("can't open file");
	$t=$_POST['text'];
	fwrite($fh,$t);
	fclose($fh);

	// To save the text into a MySQL database create a database for it and simply uncomment the following code
	//mysql_connect("hostname","username","password");
	//mysql_select_db("database_name");
	//$t=$_POST['text'];
	//mysql_query("INSERT INTO data ('text') VALUES ('$t')");

	class MyDB extends SQLite3
	{
		 function __construct()
		 {
				$this->open('syllabus.db');
		 }
	}
	$db = new MyDB();
	if(!$db){
		 echo $db->lastErrorMsg();
	} else {
		 echo "Opened database successfully\n";
	}

	$sql =<<<EOF
		 INSERT INTO SYLLABUS (ID, HTML) VALUES (NULL, '$t');
EOF;

	$ret = $db->exec($sql);
	if(!$ret){
		 echo $db->lastErrorMsg();
	} else {
		 echo "sql stuff worked\n";
	}
	$db->close();
	//
	// $sql =<<<EOF
	// INSERT INTO SYLLABUS (ID, HTML) VALUES (NULL, '$t');
	// EOF;
	// $ret = $db->exec($sql);
	// if(!$ret){
	// 	 echo $db->lastErrorMsg();
	// } else {
	// 	 echo "Records created successfully\n";
	// }
	//
	// $db->close();
?>
