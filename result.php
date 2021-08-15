<?php require_once "includes/header1.php"; ?>

<!-- <?php require_once "includes/banner.php" ?> -->
  
<div class="about-section section-padding admission-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h4><strong>Select your class and roll number to get result</strong></h4>
                <form action="" method="post">
                    <div class="form-group">
                        <select name="student_class" id="" class="form-control">
                            <option value="">Select Class</option>
                            <option value="1">KG 1</option>
                            <option value="2">KG 2</option>
                            <option value="3">Nursery 1</option>
                            <option value="4">Nursery 2</option>
                            <option value="5">Primary 1</option>
                            <option value="6">Primary 2</option>
                            <option value="7">Primary 3</option>
                            <option value="8">Primary 4</option>
                            <option value="9">Primary 5</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Student ID</label>
                        <input type="text" class="form-control" name="student_id">
                    </div>
                    <div class="form-group">
                        <label for="">Exam Type</label>
                        <select name="exam_type" id="" class="form-control">
                            <option value="mid">First Test</option>
                            <option value="mid1">Second Test</option>
                            <option value="final">Final Exam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="result_publish" value="Get Result">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['result_publish'])) {
        $class = $_POST['student_class'];
        $student_id = $_POST['student_id'];
        $exam_type = $_POST['exam_type'];

        $query = "SELECT * FROM results WHERE student_id='$student_id' AND exam_type='$exam_type' AND student_class='$class'";
        $get_res = mysqli_query($conn, $query);
        $getnow = mysqli_fetch_assoc($get_res);
        $fullname = get_name_by_email($getnow['student_id']);

        if(mysqli_num_rows($get_res) > 0) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-info">
                    <div class="panel-heading"><h3>Here is your Result</h3></div>
                    <div class="panel-body">
                        <p>Name: <?php echo $fullname; ?></p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Marks</th>
                            </tr>
                        </thead>
                            <?php
                                $totalMarks = 0;
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    $subject_id = $row['subject_id'];
                                    $subject = get_subject_name_by_id($subject_id);
                                    $marks = $row['marks'];
                                    $totalMarks = $totalMarks + $marks;

                                    echo "<tr>";
                                    echo "<td>$subject</td>";
                                    echo "<td>$marks</td>";
                                    echo "</tr>";
                                }
                            ?>
                            <tr>
                                <th>Total</th>
                                <th><?php echo $totalMarks; ?></th>
                            </tr>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h2 class="text-center">Please fill up the correct information.</h2>
    <?php } } ?>
</div>

<?php require_once "includes/footer.php"; ?>