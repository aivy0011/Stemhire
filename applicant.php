<?php 
	session_start();
	include_once "dbconnection.php";
	include_once "Layout/default.php";
	$table = 'applicant';
    $result = MYSQLi_QUERY($conn,"SELECT Applicant_firstname, Applicant_lastname FROM {$table}");

    $fields_num = MYSQLi_NUM_FIELDS($result);

    ECHO "<h1>Table: {$table}</h1>";
    ECHO "<table border='1'><tr>";
    // printing table headers
    FOR($i=0; $i<$fields_num; $i++)
    {
        $field = MYSQLi_FETCH_FIELD($result);
        ECHO "<td>{$field->name}</td>";
    }
    ECHO "</tr>\n";
    // printing table rows
    WHILE($row = MYSQLi_FETCH_ROW($result))
    {
        ECHO "<tr>";

        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        FOREACH($row AS $cell)
        ECHO "<td>$cell</td>";

        ECHO "</tr>\n";
    }


?>
<?php
include_once "Layout/footer.php";
?>