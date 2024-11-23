<?php 

  /** A PHP class to access MySQL database with convenient methods

    * in an object oriented way, and with a powerful debug system.\n

    * Licence:  LGPL \n

    * Web site: http://slaout.linux62.org/

    * @version  1.0

    * @author   S&eacute;bastien Lao&ucirc;t (slaout@linux62.org)

    */

  class DB

  {

    /** Put this variable to true if you want ALL queries to be debugged by default:

      */

    var $defaultDebug = false;



    /** INTERNAL: The start time, in miliseconds.

      */

    var $mtStart;

    /** INTERNAL: The number of executed queries.

      */

    var $nbQueries;

    /** INTERNAL: The last result ressource of a query().

      */

    var $lastResult;

	



    /** Connect to a MySQL database to be able to use the methods below.

      */

    function __construct($base, $server, $user, $pass)

    {

      $this->mtStart    = $this->getMicroTime();

      $this->nbQueries  = 0;

      $this->lastResult = NULL;
      $this->conn = NUll;

      
      $this->conn =mysqli_connect($server, $user, $pass) or die('Server connection not possible.');
      $GLOBALS['conn'] = $this->conn;

      mysqli_select_db($GLOBALS['conn'], $base)               or die('Database connection not possible.');

    }
//Prepaired statement
function p_statement($mysqli, $query_string = "", $type = "", $vars = []) {

  $query = $mysqli->prepare($query_string);
  $parameters = array();
  // push the type string into the array by reference
  $parameters[] = & $type;
  // push the items from $vars array into the array by reference
  for ($i = 0; $i < count($vars); $i++) {
      $parameters[] = & $vars[$i];
  }
  // call mysqli_stmt::bind_param with the $parameters array, which contains [type, var1, var2, ...]
  call_user_func_array(array($query, "bind_param"), $parameters);
  $query->execute();
  $result = null;
  preg_match("/^[a-zA-Z]+/", $query_string, $command);
  //echo strtoupper($command[0]);die;
  switch (strtoupper($command[0])) {
      case "SELECT":
          $result = $query->get_result();
          break;
      case "INSERT":
      case "UPDATE":
      case "DELETE":
          $result = $query->affected_rows;
          break;
  }
  $query->close();
  return $result;
}
function p_statement_query($mysqli, $query_string = "", $type = "", $vars = []) {

  $query = $mysqli->prepare($query_string);
  $parameters = array();
  // push the type string into the array by reference
  $parameters[] = & $type;
  // push the items from $vars array into the array by reference
  for ($i = 0; $i < count($vars); $i++) {
      $parameters[] = & $vars[$i];
  }
  // call mysqli_stmt::bind_param with the $parameters array, which contains [type, var1, var2, ...]
  call_user_func_array(array($query, "bind_param"), $parameters);
  
  $result = $query->execute();
  $query->close();
  return $result;
}
//Function for prvent XXS issues


function jsEscape($str) {
  $output = '';
  $str = str_split($str);
  for($i=0;$i<count($str);$i++) {
   $chrNum = ord($str[$i]);
   $chr = $str[$i];
   if($chrNum === 226) {
     if(isset($str[$i+1]) && ord($str[$i+1]) === 128) {
       if(isset($str[$i+2]) && ord($str[$i+2]) === 168) {
         $output .= '\u2028';
         $i += 2;
         continue;
       }
       if(isset($str[$i+2]) && ord($str[$i+2]) === 169) {
         $output .= '\u2029';
         $i += 2;
         continue;
       }
     }
   }
   switch($chr) {
     case "'":
     case '"':
     case "\n";
     case "\r";
     case "&";
     case "\\";
     case "<":
     case ">":
       $output .= sprintf("\\u%04x", $chrNum);
     break;
     default:
       $output .= $str[$i];
     break;
    }
  }
  return $output;
}
/** Query the database.

      * @param $query The query.

      * @param $debug If true, it output the query and the resulting table.

      * @return The result of the query, to use with fetchNextObject().

      */

    function query($query, $debug = -1)

    {

      $this->nbQueries++;
      if (SHOW_QUERY_ERROR) {
      $this->lastResult = mysqli_query($GLOBALS['conn'],$query) or $this->debugAndDie($query);
      } else {
            $this->lastResult = mysqli_query($GLOBALS['conn'], $query);
      }



      $this->debug($debug, $query, $this->lastResult);



      return $this->lastResult;

    }

    /** Do the same as query() but do not return nor store result.\n

      * Should be used for INSERT, UPDATE, DELETE...

      * @param $query The query.

      * @param $debug If true, it output the query and the resulting table.

      */

    function execute($query, $debug = -1)

    {

      $this->nbQueries++;

      mysqli_query($GLOBALS['conn'],$query) or $this->debugAndDie($query);



      $this->debug($debug, $query);

    }

    /** Convenient method for mysqli_fetch_object().

      * @param $result The ressource returned by query(). If NULL, the last result returned by query() will be used.

      * @return An object representing a data row.

      */

    function fetchNextObject($result = NULL)

    {

      if ($result == NULL)

        $result = $this->lastResult;



      if ($result == NULL || mysqli_num_rows($result) < 1)

        return NULL;

      else

        return mysqli_fetch_object($result);

    }

    /** Get the number of rows of a query.

      * @param $result The ressource returned by query(). If NULL, the last result returned by query() will be used.

      * @return The number of rows of the query (0 or more).

      */

    function numRows($result = NULL)

    {

      if ($result == NULL)

        return mysqli_num_rows($this->lastResult);

      else

        return mysqli_num_rows($result);

    }

    /** Get the result of the query as an object. The query should return a unique row.\n

      * Note: no need to add "LIMIT 1" at the end of your query because

      * the method will add that (for optimisation purpose).

      * @param $query The query.

      * @param $debug If true, it output the query and the resulting row.

      * @return An object representing a data row (or NULL if result is empty).

      */

    function queryUniqueObject($query, $debug = -1)

    {

      $query = "$query LIMIT 1";



      $this->nbQueries++;

      $result = mysqli_query($GLOBALS['conn'],$query) or $this->debugAndDie($query);



      $this->debug($debug, $query, $result);



      return mysqli_fetch_object($result);

    }

    /** Get the result of the query as value. The query should return a unique cell.\n

      * Note: no need to add "LIMIT 1" at the end of your query because

      * the method will add that (for optimisation purpose).

      * @param $query The query.

      * @param $debug If true, it output the query and the resulting value.

      * @return A value representing a data cell (or NULL if result is empty).

      */

    function queryUniqueValue($query, $debug = -1)

    {

      $query = "$query LIMIT 1";



      $this->nbQueries++;

      $result = mysqli_query($GLOBALS['conn'],$query) or $this->debugAndDie($query);

      $line = mysqli_fetch_row($result);



      $this->debug($debug, $query, $result);



      return $line[0];

    }

    /** Get the maximum value of a column in a table, with a condition.

      * @param $column The column where to compute the maximum.

      * @param $table The table where to compute the maximum.

      * @param $where The condition before to compute the maximum.

      * @return The maximum value (or NULL if result is empty).

      */

    function maxOf($column, $table, $where)

    {

      return $this->queryUniqueValue("SELECT MAX(`$column`) FROM `$table` WHERE $where");

    }

    /** Get the maximum value of a column in a table.

      * @param $column The column where to compute the maximum.

      * @param $table The table where to compute the maximum.

      * @return The maximum value (or NULL if result is empty).

      */

    function maxOfAll($column, $table)

    {

      return $this->queryUniqueValue("SELECT MAX(`$column`) FROM `$table`");

    }

    /** Get the count of rows in a table, with a condition.

      * @param $table The table where to compute the number of rows.

      * @param $where The condition before to compute the number or rows.

      * @return The number of rows (0 or more).

      */

    function countOf($table, $where)

    {

      return $this->queryUniqueValue("SELECT COUNT(*) FROM `$table` WHERE $where");

    }

    /** Get the count of rows in a table.

      * @param $table The table where to compute the number of rows.

      * @return The number of rows (0 or more).

      */

    function countOfAll($table)

    {

      return $this->queryUniqueValue("SELECT COUNT(*) FROM `$table`");

    }

    /** Internal function to debug when MySQL encountered an error,

      * even if debug is set to Off.

      * @param $query The SQL query to echo before diying.

      */

    function debugAndDie($query)

    {

      $this->debugQuery($query, "Error");

      die("<p style=\"margin: 2px;\">".mysqli_error($GLOBALS['conn'])."</p></div>");

    }

    /** Internal function to debug a MySQL query.\n

      * Show the query and output the resulting table if not NULL.

      * @param $debug The parameter passed to query() functions. Can be boolean or -1 (default).

      * @param $query The SQL query to debug.

      * @param $result The resulting table of the query, if available.

      */

    function debug($debug, $query, $result = NULL)

    {

      if ($debug === -1 && $this->defaultDebug === false)

        return;

      if ($debug === false)

        return;



      $reason = ($debug === -1 ? "Default Debug" : "Debug");

      $this->debugQuery($query, $reason);

      if ($result == NULL)

        echo "<p style=\"margin: 2px;\">Number of affected rows: ".mysqli_affected_rows()."</p></div>";

      else

        $this->debugResult($result);

    }

    /** Internal function to output a query for debug purpose.\n

      * Should be followed by a call to debugResult() or an echo of "</div>".

      * @param $query The SQL query to debug.

      * @param $reason The reason why this function is called: "Default Debug", "Debug" or "Error".

      */

    function debugQuery($query, $reason = "Debug")

    {

      $color = ($reason == "Error" ? "red" : "orange");

      echo "<div style=\"border: solid $color 1px; margin: 2px;\">".

           "<p style=\"margin: 0 0 2px 0; padding: 0; background-color: #DDF;\">".

           "<strong style=\"padding: 0 3px; background-color: $color; color: white;\">$reason:</strong> ".

           "<span style=\"font-family: monospace;\">".htmlentities($query)."</span></p>";

    }

    /** Internal function to output a table representing the result of a query, for debug purpose.\n

      * Should be preceded by a call to debugQuery().

      * @param $result The resulting table of the query.

      */

    function debugResult($result)

    {

      echo "<table border=\"1\" style=\"margin: 2px;\">".

           "<thead style=\"font-size: 80%\">";

      $numFields = mysqli_num_fields($result);

      // BEGIN HEADER

      $tables    = array();

      $nbTables  = -1;

      $lastTable = "";

      $fields    = array();

      $nbFields  = -1;

      while ($column = mysqli_fetch_field($result)) {

        if ($column->table != $lastTable) {

          $nbTables++;

          $tables[$nbTables] = array("name" => $column->table, "count" => 1);

        } else

          $tables[$nbTables]["count"]++;

        $lastTable = $column->table;

        $nbFields++;

        $fields[$nbFields] = $column->name;

      }

      for ($i = 0; $i <= $nbTables; $i++)

        echo "<th colspan=".$tables[$i]["count"].">".$tables[$i]["name"]."</th>";

      echo "</thead>";

      echo "<thead style=\"font-size: 80%\">";

      for ($i = 0; $i <= $nbFields; $i++)

        echo "<th>".$fields[$i]."</th>";

      echo "</thead>";

      // END HEADER

      while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";

        for ($i = 0; $i < $numFields; $i++)

          echo "<td>".htmlentities($row[$i])."</td>";

        echo "</tr>";

      }

      echo "</table></div>";

      $this->resetFetch($result);

    }

    /** Get how many time the script took from the begin of this object.

      * @return The script execution time in seconds since the

      * creation of this object.

      */

    function getExecTime()

    {

      return round(($this->getMicroTime() - $this->mtStart) * 1000) / 1000;

    }

	

	function parseValue($val) {



	return mysqli_real_escape_string($GLOBALS['conn'],stripslashes($val));

	}

    /** Get the number of queries executed from the begin of this object.

      * @return The number of queries executed on the database server since the

      * creation of this object.

      */

    function getQueriesCount()

    {

      return $this->nbQueries;

    }

    /** Go back to the first element of the result line.

      * @param $result The resssource returned by a query() function.

      */

    function resetFetch($result)

    {

      if (mysqli_num_rows($result) > 0)

        mysqli_data_seek($result, 0);

    }

    /** Get the id of the very last inserted row.

      * @return The id of the very last inserted row (in any table).

      */

    function lastInsertedId()

    {

      return mysqli_insert_id($GLOBALS['conn']);

    }

    /** Close the connexion with the database server.\n

      * It's usually unneeded since PHP do it automatically at script end.

      */

    function close()

    {

      mysqli_close();

    }



    /** Internal method to get the current time.

      * @return The current time in seconds with microseconds (in float format).

      */

    function getMicroTime()

    {

      list($msec, $sec) = explode(' ', microtime());

      return floor($sec / 1000) + $msec;

    }
    /** method to all sql result.*/
    function fetchAllObject($sql)
    {
      while($result=mysqli_fetch_assoc($sql)) {
        $rsArr[]=$result;
      }
      return ($rsArr);
    }
	/*function cleanReqStr($string) {
		   //$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
           $string = trim($string);
		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}*/
	function cleanReqStr($val) {
		
	$string =  preg_replace('/[^A-Za-z0-9\-]/', '', $val); // Removes special chars.
    return mysqli_real_escape_string($GLOBALS['conn'],strip_tags(trim($string)));
    }
	
  } // class DB

?>