<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="col-md-12">
        <h3 class="center-block back-similar text-center" style="width: 20%;">Recent Literature</h3><br>
        <table id="example" class="full_width table result">
            <thead>
            <tr>
                <th class="text-center" style=" border-radius: 10px 0 0 10px;">Drug Name</th>
                <th class="text-center" style=" border-radius: 0 10px 10px 0;">Full Book</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($drugs as $drug){ if($drug['drug_full_book']){?>
                <tr>
                    <td align="center"><?php echo $drug['drug_name']?></td>
                    <td align="center">
                        <a  target="_blank" class="btn  btn-primary col-md-offset-3 col-md-6"  href="https://docs.google.com/viewerng/viewer?url=<?php echo $drug['drug_full_book']?>">Full Book</a>
                    </td>
                </tr>
            <?php }}?>

            </tbody>
        </table>
    </div>

</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->