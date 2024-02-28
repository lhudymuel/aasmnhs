<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

?>
<div class="row">
      <div class="col-lg-12">
       	 <div class="col-lg-8">
            <h2 class="page-header">List of Archive Subjects per Strand/Year <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h2>
       		</div>
       		<div class="col-lg-4" >
			   <img style="float:right; width:140px; height: 140px;" src="<?php echo web_root; ?>img/logonbg.png" >
       		</div>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Subject</th>
				  		<th>Description</th> 
				  		<th>Unit</th>
				  		<th>Pre-Requisite</th>
				  		<th>Strand/Year</th>
				  		
				  		<th>Semester</th>
				  		<th width="10%" >Action</th>
				 
				  	</tr>	
				  </thead> 
        <tbody>
            <?php
            // Retrieve and display archived employees
            $mydb->setQuery("SELECT * FROM `subject` s, `course` c WHERE s.COURSE_ID = c.COURSE_ID AND s.ARCHIVE = 'Archived'");

            $archived = $mydb->loadResultList();

            foreach ($archived as $result) {
                echo '<tr>';
                // echo '<td width="5%" align="center"></td>';
                echo '<td>' . $result->SUBJ_ID.'</a></td>';
                echo '<td>'. $result->SUBJ_CODE.'</td>';
                echo '<td>'. $result->SUBJ_DESCRIPTION.'</td>';
                echo '<td>' . $result->UNIT.'</a></td>';
                echo '<td>'. $result->PRE_REQUISITE.'</td>';
                echo '<td>'. $result->COURSE_NAME.'-'.$result->COURSE_LEVEL.'</td>';
                // echo '<td>' . $result->AY.'</a></td>';
                echo '<td>'. $result->SEMESTER.'</td>'; 
                echo '<td align="center">
                        <a title="Restore" href="controller.php?action=restore&id=' . $result->SUBJ_ID . '" class="btn btn-success btn-xs">
                            <span class="fa fa-undo fw-fa"></span>
                        </a>
                      </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>