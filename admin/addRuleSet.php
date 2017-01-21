
<div class="container" >
  <div class="row">
    <div class="col-lg-6"><div class="jumbotron " style="overflow: auto; height:400px;">
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
         <script>
$('.input-1').checkboxpicker({
  html: true,
  offLabel: '<span class="glyphicon glyphicon-remove">',
  onLabel: '<span class="glyphicon glyphicon-ok">'
});
</script>
        <!--set rule here !!!-->

        <!--end of set rule here!!!-->


			<!--You first need to Add Subjects, Faculty, Course 				
			<form class="form-horizontal" method="post" action="">
			<fieldset>

			<!-- Form Name -
			<legend>Generate Time Table</legend>
			
			<!-- Select Basic --
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Course">Course Name</label>
			  <div class="col-md-8">
				<select id="coursefullname" name="coursefullname" class="form-control" required="">
				<?php/*
				// lists the course on drop down button course
				$query = $link->query("SELECT DISTINCT course_full_name FROM course WHERE user_id='$user_id'"); 
				$query->setFetchMode(PDO::FETCH_ASSOC);	
				while($result = $query->fetch()){
				   echo "<option value='".$result['course_full_name']."'>".$result['course_full_name']."</option>";
				}
				*/?>
				  
				</select>
				
			  </div>
			</div>

			<!-- Text input-
			<div class="form-group">
			  <label class="col-md-4 control-label" for="year">Year / Session</label>  
			  <div class="col-md-8">
			  <input id="year" name="year" type="text" placeholder="" class="form-control input-md" required="">
			  <span class="help-block">Write Year e.g 2015-2016</span>  
			  </div>
			</div>

			<!-- Select Basic -
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

			<!-- Select Basic -
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Course">Course Code</label>
			  <div class="col-md-8">
				<select id="Coursecode" name="Coursecode" class="form-control" required="">
				<?php/*
				// lists the course on drop down button course
				$query = $link->query("SELECT DISTINCT course_name, semester, section FROM course WHERE user_id='$user_id'"); 
				$query->setFetchMode(PDO::FETCH_ASSOC);	
				while($result = $query->fetch()){
				   echo "<option value='".$result['course_name']."'>".$result['course_name']." | ".$result['semester']." | ".$result['section']."</option>";
				}
*/				?>
				  
				</select>
				<span class="help-block">course, semester, section</span>  
			  </div>
			</div>

			<!-- Button 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="generate"></label>
			  <div class="col-md-4">
				<input type="submit" id="generate" name="generate" class="btn btn-success" value="Create Time Table">
				</div>
			</div>

			</fieldset>
			</form>
-->
		</div>
    </div>
    