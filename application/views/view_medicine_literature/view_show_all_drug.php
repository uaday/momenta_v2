<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="container_wrapper">
        <div class="last_med_head col-md-12 drag_type" class="full_width" style="height: 1000px;">
            <button onclick="location.href = '<?php echo base_url()?>medicine_literature';" type="button" class="btn pull-right up-n-down">
                <a href="<?php echo base_url()?>medicine_literature"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span></a>
            </button>
            <h3 class=" header_wrapper center-block text-center">Drug Literatures</h3>
            <div class="med_scroll_table" style=" height: 100%; overflow-y: hidden;">
                <!-- <div class="scroll_insider"> -->
                <table id="example" class="table result">
                    <thead>
                        <th>Drug Name</th>
                        <th>Upload File</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($meds as $med){ if($med['drug_full_book']){?>

                        <tr class="color_wrapper med_spacer">
                            <td><?php echo $med['drug_name']?></td>
                            <td>
                                <a target="_blank" class="btn btn-primary center-block"  href="https://docs.google.com/viewerng/viewer?url=<?php echo $med['drug_full_book']?>">Full Book</a>
                            </td>
                            <td><?php echo $med['create_drug_date']?></td>
                            <td><a   onclick="return delete_med();"  href="<?php echo base_url()?>medicine_literature/delete_med?med_des_id=<?php echo $med['drug_des_id']?>&type=1&full_book=<?php echo $med['drug_full_book']?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php } if($med['benefits_feature']){?>
                        <tr class="color_wrapper med_spacer">
                            <td><?php echo $med['drug_name']?></td>
                            <td>
                                <a target="_blank" class="btn btn-primary center-block"  href="https://docs.google.com/viewerng/viewer?url=<?php echo $med['benefits_feature']?>">Feature & Benefits</a>
                            </td>
                            <td><?php echo $med['create_drug_date']?></td>
                            <td><a   onclick="return delete_med();"  href="<?php echo base_url()?>medicine_literature/delete_med?med_des_id=<?php echo $med['drug_des_id']?>&type=2&benefits_feature=<?php echo $med['benefits_feature']?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
                <!-- </div> -->
            </div>
        </div> <!-- last_med_head -->
    </div>