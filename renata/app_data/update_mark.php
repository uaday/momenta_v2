    <?php
    require 'db_connect.php';
    $db_connect=new Db_connect();
    $conn=$db_connect->conn;
    $pso_id=$_GET['pso_id'];
    $assign_id=$_GET['assign_id'];
    $mark=$_GET['mark'];
    $answer=$_GET['answer'];
    $sql1="SELECT pso_point FROM tbl_user_pso WHERE pso_id='$pso_id'";
    $result=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result);
    $marks=floatval($row['pso_point'])+floatval($mark);

    $sql5="SELECT exam_status FROM tbl_exam_assign WHERE assign_id='$assign_id' LIMIT 0,1";
    $result1=mysqli_query($conn,$sql5);
    $row1=mysqli_fetch_assoc($result1);
    $exam_status=$row1['exam_status'];

    if($exam_status=='0')
    {
    	$sql2="UPDATE tbl_exam_assign SET marks='$mark',pso_answers='$answer',exam_status=1,start_date=CURRENT_DATE,start_time=CURRENT_TIME,date_time=now() WHERE assign_id='$assign_id'";
        $sql3="UPDATE tbl_user_pso SET pso_point='$marks' WHERE pso_id='$pso_id'";
        if(mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3))
        {
            $output="{'response'".':'."'ok'}";
            print($output);
        }
        else
        {
            $output=array();
            $output[]='not ok';
            print(json_encode($output));
        }
    }
    else
    {
        $output="{'response'".':'."'ok'}";
        print($output);
    }
