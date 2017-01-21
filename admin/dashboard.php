<?php 
   session_start();
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/timetablepro/header.php";
   include_once($path);
   include_once("navbar.php");
   
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/timetablepro/class.database.php";
   include_once($path);
   $check=false;
   if(@$_SESSION['name']){
		   $db_connection = new dbConnection();
		   $link = $db_connection->connect(); 
		   
		   function get_user_id($username){
			   $db_connection = new dbConnection();
			   $link = $db_connection->connect(); 
			   $query = $link->query("SELECT * FROM users WHERE username='$username'");
			   $query->setFetchMode(PDO::FETCH_ASSOC);
			  
			   while($result = $query->fetch()){
						$user_id =$result['user_id'];
					}
				return $user_id;
		   }
		   $_SESSION['user_id'] = get_user_id($_SESSION['name']);
		   $user_id = $_SESSION['user_id'];	   
	
       if(!empty($_POST['ruleSet'])&&(isset($_POST['ruleSet']))){
 
           $timeSlot=(isset($_POST["timeSlot"]))?:0;
           $teacherSlot=(isset($_POST['teacherSlot']))?:0;
           $studentSlot=(isset($_POST['studentSlot']))?:0;
           $capacity=(isset($_POST['capacity']))?:0;
           $SpaceConstrain=(isset($_POST['SpaceConstrain']))?:0;
           $breakContraint=(isset($_POST['breakContraint']))?:0;
           $minimumActivites=(isset($_POST['minimumActivites']))?:0;
           $timeContraint=(isset($_POST['timeContraint']))?:0;
           $stuAvaiableContraint=(isset($_POST['stuAvaiableContraint']))?:0;
           $roomavailableContraint=(isset($_POST['roomavailableContraint']))?:0;
           $stuPreferredRoom=(isset($_POST['stuPreferredRoom']))?:0;
           
     $countRow = $link->query("SELECT count(*) FROM ruleset");
			   //$query->setFetchMode(PDO::FETCH_ASSOC);
			  
					
					if($countRow->fetchColumn()>0){
							  $check=true;
							 // echo "exit";
						   }
						   else{
							   // INSERT the values of the form to make a new time table if time table doesn't already exits.. 
							   $query = $link->prepare("INSERT INTO ruleset (roomSlot,teacherSlot,studentSlot,roomCapacity,comSpace,breaktime,miniActivity,teacherTime,studentTime,roomTime,studentPre) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
							   $values = array ($timeSlot,$teacherSlot,$studentSlot,$capacity,$SpaceConstrain,$breakContraint,$minimumActivites,$timeContraint,$stuAvaiableContraint,$roomavailableContraint,$stuPreferredRoom);
							 $r=  $query->execute($values);
							  // header('Location: ../table.php');
			                    $check=false;
			                  //  echo "not exit okk ";
						   }
			

  

       }

		   if(!empty($_POST['generate'])){
			   $course_full_name = $_POST['coursefullname'];
			   $year = $_POST['year'];
			   $semester = $_POST['semester'];
			   $course_code = $_POST['Coursecode'];
			   
			   // create session variable to send the current semester, course, branch, year being choosen to the page table.php 
			   
			   $_SESSION['semester'] = $semester;
			   $_SESSION['course_code'] = $course_code;
			   $_SESSION['course_full_name'] = $course_full_name;
			   $_SESSION['year'] = $year;
			   
			   // check to see if time table already exists..
			   $query = $link->query("SELECT * FROM timetable WHERE semester='$semester' AND course='$course_code' AND course_full_name= '$course_full_name' AND user_id='$user_id'");
			   $query->setFetchMode(PDO::FETCH_ASSOC);
			  
			   while($result = $query->fetch()){
						$id =$result['timetable_id'];
					}
					
					if($id){
							   echo '<div class="alert alert-success">  
										<a class="close" data-dismiss="alert">X</a>  
										<strong>OOPs! </strong>Time table already exists.   
									</div>';
						   }
						   else{
							   // INSERT the values of the form to make a new time table if time table doesn't already exits.. 
							   $query = $link->prepare("INSERT INTO timetable (user_id,course_full_name,year,semester,course) VALUES(?,?,?,?,?)");
							   $values = array ($user_id,$course_full_name,$year,$semester,$course_code);
							   $query->execute($values);
							   header('Location: ../table.php');
						   }
			
		   }
		   
   }
   else{
	   echo "You are not logged in yet. please go back and login again";
	   exit();
   }
			
?>

<script TYPE="text/javascript">
var message="Sorry, right-click has been disabled";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")

</SCRIPT>   
<body>
<div class="container" >
  <div class="row">
    <div class="col-lg-6"><div class="jumbotron " style="overflow: auto; height:400px;">
    <?php    
     $countRow = $link->query("SELECT count(*) FROM ruleset");
					
					if($countRow->fetchColumn()<=0){
					
?>

     <h3 class="text-primary">Set rule for time table </h3>
    <form method="POST">
  
        <div class="row">
           <div class="col-md-6">
             <strong>Room or Lab is not assigned to more than one Activity at the same timeslot</strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" value="0" id="check1"  name="timeSlot" data-group-cls="btn-group-sm"  />
            
          </div>
        </div> 
        <br/>
        <div class="row">
           <div class="col-md-6">
             <strong>
         Teacher is not assigned to more than one Activity at the same timeslot
            </strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check2" value="0"   name="teacherSlot" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/>
        <div class="row">
           <div class="col-md-6">
             <strong>Student are not assigned to more than one Activity at the same timeslot</strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check3" value="0"    name="studentSlot" data-group-cls="btn-group-sm"/>
            
          </div>

        </div> 
        
          <br/>
        <div class="row">
           <div class="col-md-6">
             <strong>Room for an Activity should have enough capacity to fit NO of students</strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check4" value="0"   name="capacity" data-group-cls="btn-group-sm"/>
            
          </div>
        </div>
        <br/> 
        <div class="row">
           <div class="col-md-6"><strong>
BAsic compulsory space constrain</strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check5" value="0"    name="SpaceConstrain" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/>
         <br/> 
        <div class="row">
           <div class="col-md-6"><strong>
Break time constraint </strong>
           </div>
           <div class="col-md-4">
             <input type="checkbox" class="input-1" id="check6" value="0" "  name="breakContraint" data-group-cls="btn-group-sm"/>
             </div>
             <div class="col-md-4" id="breakConstraint"><span><strong>select time for break</strong></span>
              <select name="breakContraint" class="form-control">
              <option value="1">12:30</option>
              <option value="2">1:30</option>
              <option value="3">2:30</option>
              
              </select>
          </div>
        </div> 
        <br/>
         <br/> 
        <div class="row">
           <div class="col-md-6"><strong>
minimum 'n' days between Activites </strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check7" value="0"   name="minimumActivites" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/> <br/> 
        <div class="row">
           <div class="col-md-6"><strong>
A teacher not available time constraint </strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check8" value="0" "   name="timeContraint" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/>
<div class="row">
           <div class="col-md-6"><strong>
A student not available constraint  </strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check9"value="0"   name="stuAvaiableContraint" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/>
<div class="row">
           <div class="col-md-6"><strong>
A Room not available constraint </strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check10" value="0"    name="roomavailableContraint" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/>
<div class="row">
           <div class="col-md-6"><strong>
A student has preferred room  </strong>
           </div>
           <div class="col-md-6">
             <input type="checkbox" class="input-1" id="check11" value="0"   name="stuPreferredRoom" data-group-cls="btn-group-sm"/>
            
          </div>
        </div> 
        <br/>

       <input type="submit" class="btn btn-success" name="ruleSet"  value="Rule set" />
       </form>
  <?php  }else{
?>

<!--You first need to Add Subjects, Faculty, Course--> 				
			<form class="form-horizontal" method="post" action="">
			<fieldset>

			<!-- Form Name -
			<legend>Generate Time Table</legend>
			
			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Course">Course Name</label>
			  <div class="col-md-8">
				<select id="coursefullname" name="coursefullname" class="form-control" required="">
				<?php
				// lists the course on drop down button course
				$query = $link->query("SELECT DISTINCT course_full_name FROM course WHERE user_id='$user_id'"); 
				$query->setFetchMode(PDO::FETCH_ASSOC);	
				while($result = $query->fetch()){
				   echo "<option value='".$result['course_full_name']."'>".$result['course_full_name']."</option>";
				}
				?>
				  
				</select>
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="year">Year / Session</label>  
			  <div class="col-md-8">
			  <input id="year" name="year" type="text" placeholder="" class="form-control input-md" required="">
			  <span class="help-block">Write Year e.g 2015-2016</span>  
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="semester">Select Semester</label>
			  <div class="col-md-8">
				<select id="semester" name="semester" class="form-control" required="">
				  <option value="one">1</option>
				  <option value="two">2</option>
				  <option value="three">3</option>
				  <option value="four">4</option>
				  <option value="five">5</option>
				  <option value="six">6</option>
				  <option value="seven">7</option>
				  <option value="eight">8</option>
				</select>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Course">Course Code</label>
			  <div class="col-md-8">
				<select id="Coursecode" name="Coursecode" class="form-control" required="">
				<?php
				// lists the course on drop down button course
				$query = $link->query("SELECT DISTINCT course_name, semester, section FROM course WHERE user_id='$user_id'"); 
				$query->setFetchMode(PDO::FETCH_ASSOC);	
				while($result = $query->fetch()){
				   echo "<option value='".$result['course_name']."'>".$result['course_name']." | ".$result['semester']." | ".$result['section']."</option>";
				}
				?>
				  
				</select>
				<span class="help-block">course, semester, section</span>  
			  </div>
			</div>

			<!-- Button--> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="generate"></label>
			  <div class="col-md-4">
				<input type="submit" id="generate" name="generate" class="btn btn-success" value="Create Time Table">
				</div>
			</div>

			</fieldset>
			</form>




<?php
    	}?>
         <script>
$('.input-1').checkboxpicker({
  html: true,
  offLabel: '<span class="glyphicon glyphicon-remove">',
  onLabel: '<span class="glyphicon glyphicon-ok">'
});
</script>
        <!--set rule here !!!-->

        <!--end of set rule here!!!-->


			
		</div>
    </div>
    <div class="col-lg-6">
		<div class="jumbotron">
		<?php include_once("timetable.list.php"); ?>
		</div>
    </div>
  </div>
  
</div>
	





<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/timetablepro/footer.php";
   include_once($path);
?>