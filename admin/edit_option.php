<?php

session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
  ?>
<script type="text/javascript">
    window.location="index.php";
</script>
  <?php
}
$id=$_GET["id"];
$id1=$_GET["id1"];

$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";

$res=mysqli_query($link,"select * from questions where id='$id'")or die( mysqli_error($link));;
while($row= mysqli_fetch_array($res))
{
  $question=$row["question"];         //fill the details inside variable
  $opt1=$row["opt1"];  
  $opt2=$row["opt2"]; 
  $opt3=$row["opt3"]; 
  $opt4=$row["opt4"]; 
  $answer=$row["answer"];
}
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                             <div class="col-lg-12">
                                   <form name="form1" action="" method="post">
                        <div class="card">
                            <div class="card-header"><strong>Update Questions with text</strong>
                                 </div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Question</label><input type="text" name="question" 
                                              placeholder="Add Question" 
                                              class="form-control" value="<?php echo $question;?>"></div>
                                    <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt1</label><input type="text" name="opt1" 
                                              placeholder="Add Opt1" 
                                              class="form-control"value="<?php echo $opt1;?>"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt2</label><input type="text" name="opt2" 
                                              placeholder="Add Opt2" 
                                              class="form-control"value="<?php echo $opt2;?>"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt3</label><input type="text" name="opt3" 
                                              placeholder="Add Opt3" 
                                              class="form-control"value="<?php echo $opt3;?>"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt4</label><input type="text" name="opt4" 
                                              placeholder="Add Opt4" 
                                              class="form-control"value="<?php echo $opt4;?>"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Answer</label><input type="text" name="answer" 
                                              placeholder="Add Answer" 
                                              class="form-control"value="<?php echo $answer;?>"></div>
                                               
                                    <div class="form-group">
                                        <input type="submit" name="submit1"  value="Update Question" class="btn btn-success">            
                                    </div>              
                                </div>  
                             </div>
                                     </form>   
                              </div>                                
                            </div>
                        </div> 
                    </div>
                    <!--/.col-->
              </div>
           </div><!-- .animated -->
       </div><!-- .content -->
        
        <?php
       if(isset($_POST["submit1"]))
       {
           mysqli_query($link,"update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id=$id")or die( mysqli_error($link));;    
       
           ?>
        <script type="text/javascript">
        window.location="add_edit_questions.php?id=<?php echo $id1 ?>";
        
        </script>
        <?php
       }  
        ?>
     
    <?php
    include "footer.php";
    ?>

