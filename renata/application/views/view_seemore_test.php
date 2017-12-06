<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="col-md-12">
        <h3 class="center-block back-similar text-center" style="width: 20%;">Recent Test</h3><br>
        <table id="example" class="full_width table result">
            <thead>
            <tr>
                <th class="text-center" style=" border-radius: 10px 0 0 10px;">Test Name</th>
                <th class="text-center" >Duration</th>
                <th class="text-center" style=" border-radius: 0 10px 10px 0;">Marks</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tests as $test){?>
                <tr>
                    <td align="center"><?php echo $test['exam_name']?></td>
                    <td align="center"><?php echo $test['duration']?> min</td>
                    <td align="center"><?php echo $test['exam_marks']?> pts</td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>

</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->