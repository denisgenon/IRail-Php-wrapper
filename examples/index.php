<?php

include_once ("../api/IRail.php");
include_once ("../api/data/Connection.php");
include_once ("../api/data/TripNode.php");


if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['travel_day'])
	&& isset($_POST['travel_month']) && isset($_POST['travel_year']) && isset($_POST['travel_hours'])
	&& isset($_POST['travel_minutes'])){
	
	
	$iRail = new IRail("http://api.irail.be/", $_POST['lang']);
	
		 $dateTime = new DateTime($_POST['travel_year']."-".$_POST['travel_month']."-".$_POST['travel_day'].
		 " ".$_POST['travel_hours'].":".$_POST['travel_minutes']);
		 
		 $connections = $iRail->getConnections($_POST['from'], $_POST['to'], $dateTime);
	    foreach($connections as $connection)
	    {
	            // skip connections that have transfers, to keep this example simple
	            if($connection->hasVias())        
	                continue;
	
	           $departure = $connection->getDeparture();	//TripNode 
	           $arrival  = $connection->getArrival();
	           
	          
	         echo "<br/>".$departure->getStation()->getId()."        ".$departure->getTime()->format('Y-m-d H:i:sP');
	         echo "<br/><span style='margin-left:30px;'>".$arrival->getStation()->getId()."        ".$arrival->getTime()->format('Y-m-d H:i:sP')."</span>";
	      
	    }

	
}
else {

	echo "<?xml version='1.0' encoding='UTF-8'?>
		<!DOCTYPE html>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		  <head>
		
		    <meta http-equiv='content-type' content='text/html; charset=UTF-8' />
		    <title></title>
		  </head>
		  <body>
		  <form id='irail_form' method='post' action='index.php'> 
		                        <div class='content'> 
		                            <input type='hidden' value='nl' name='lang' /> 		                  
		 
		                            <fieldset> 
		                                <div class='double'> 
		                                    <label for='Sint'>From</label> 
		                                    
		                                    <input id='from' type='text' maxlength='50' size='18' value='' name='from' /> 
		                                </div> 
		                                <div class='double'> 
		                                    <label for='Zint'>To</label> 
		                                   
		                                    <input id='to' type='text' maxlength='50' size='18' value='' name='to'/> 
		                                </div> 
		                            </fieldset> 
		                            <fieldset> 
		                                <div> 
		                                    <label for='TravelDay'>Date</label> 
		                                    <select name='travel_day' id='travel_day' title='Day'> 
		                                                                                    <option value='01' >01</option> 
		                                                                                    <option value='02' >02</option> 
		                                                                                    <option value='03' >03</option> 
		                                                                                    <option value='04' >04</option> 
		                                                                                    <option value='05' >05</option> 
		                                                                                    <option value='06' >06</option> 
		                                                                                    <option value='07' >07</option> 
		                                                                                    <option value='08' >08</option> 
		                                                                                    <option value='09' >09</option> 
		                                                                                    <option value='10' >10</option> 
		                                                                                    <option value='11' >11</option> 
		                                                                                    <option value='12' >12</option> 
		                                                                                    <option value='13' >13</option> 
		                                                                                    <option value='14' >14</option> 
		                                                                                    <option value='15' >15</option> 
		                                                                                    <option value='16' selected='selected'>16</option> 
		                                                                                    <option value='17' >17</option> 
		                                                                                    <option value='18' >18</option> 
		                                                                                    <option value='19' >19</option> 
		                                                                                    <option value='20' >20</option> 
		                                                                                    <option value='21' >21</option> 
		                                                                                    <option value='22' >22</option> 
		                                                                                    <option value='23' >23</option> 
		                                                                                    <option value='24' >24</option> 
		                                                                                    <option value='25' >25</option> 
		                                                                                    <option value='26' >26</option> 
		                                                                                    <option value='27' >27</option> 
		                                                                                    <option value='28' >28</option> 
		                                                                                    <option value='29' >29</option> 
		                                                                                    <option value='30' >30</option> 
		                                                                                    <option value='31' >31</option> 
		                                                                            </select> 
		                                    <select name='travel_month' title='Month'> 
		                                                                                    <option value='01' selected='selected'>01</option> 
		                                                                                    <option value='02' >02</option> 
		                                                                                    <option value='03' >03</option> 
		                                                                                    <option value='04' >04</option> 
		                                                                                    <option value='05' >05</option> 
		                                                                                    <option value='06' >06</option> 
		                                                                                    <option value='07' >07</option> 
		                                                                                    <option value='08' >08</option> 
		                                                                                    <option value='09' >09</option> 
		                                                                                    <option value='10' >10</option> 
		                                                                                    <option value='11' >11</option> 
		                                                                                    <option value='12' >12</option> 
		                                                                            </select> 
		                                    <select name='travel_year' title='Year'> 
		                                        <option value='2011' selected='selected'>2011</option> 
		                                        <option value='2012'>2012</option> 
		                                    </select> 
		                                </div> 
		                            </fieldset> 
		                            <fieldset> 
		                                <div> 
		                                    <label for='travel_hours'>Time</label> 
		                                    <select name='travel_hours' id='travel_hours' title='Hour'> 
		                                                                            <option value='01' >01</option> 
		                                                                            <option value='02' >02</option> 
		                                                                            <option value='03' >03</option> 
		                                                                            <option value='04' >04</option> 
		                                                                            <option value='05' >05</option> 
		                                                                            <option value='06' >06</option> 
		                                                                            <option value='07' >07</option> 
		                                                                            <option value='08' >08</option> 
		                                                                            <option value='09' >09</option> 
		                                                                            <option value='10' >10</option> 
		                                                                            <option value='11' >11</option> 
		                                                                            <option value='12' >12</option> 
		                                                                            <option value='13' >13</option> 
		                                                                            <option value='14' >14</option> 
		                                                                            <option value='15' >15</option> 
		                                                                            <option value='16' >16</option> 
		                                                                            <option value='17' >17</option> 
		                                                                            <option value='18' >18</option> 
		                                                                            <option value='19' >19</option> 
		                                                                            <option value='20' selected='selected'>20</option> 
		                                                                            <option value='21' >21</option> 
		                                                                            <option value='22' >22</option> 
		                                                                            <option value='23' >23</option> 
		                                                                        </select> 
		                                    <select name='travel_minutes' title='Minutes'> 
		                                                                            <option value='00' >00</option> 
		                                                                            <option value='05' >05</option> 
		                                                                            <option value='10' >10</option> 
		                                                                            <option value='15' >15</option> 
		                                                                            <option value='20' >20</option> 
		                                                                            <option value='25' >25</option> 
		                                                                            <option value='30' >30</option> 
		                                                                            <option value='35' >35</option> 
		                                                                            <option value='40' >40</option> 
		                                                                            <option value='45' selected='selected'>45</option> 
		                                                                            <option value='50' >50</option> 
		                                                                            <option value='55' >55</option> 
		                                                                        </select> 
		                                </div> 
		                            </fieldset> 
		                            <fieldset> 
		                                <div class='align_center'> 
		                                    <input type='radio' name='date_mode' id='date_mode_a' value='depart' checked='checked' /> 
		                                    <label for='date_mode_a' class='nopush'>Departure</label> 
		                                    <input type='radio' name='date_mode' id='date_mode_b' value='arrive' /> 
		                                    <label for='date_mode_b' class='nopush'>Arrival</label> 
		                                </div> 
		                            </fieldset> 
		                        </div> 
		                        <div class='align_right buttons'> 
		                            <input type='submit' class='search' value='Search' /> 
		                        </div> 
		                    </form> 
		  </body>
		</html>";
}

