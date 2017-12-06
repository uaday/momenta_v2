<?php $i=0;?>
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="container_wrapper">
        <div class="col-md-12" align="center">
            <?php if($this->session->userdata('message')=='Upload Successful'){?>
                <div class="alert alert-success"><strong><?php echo 'File has been uploaded successfully'; ?></strong></div>
            <?php }else if($this->session->userdata('message')=='Version Deleted'){?>
                <div class="alert alert-success"><strong><?php echo 'Version has been Deleted successfully'; ?></strong></div>
                <?php } else{?>
                <h3 style="color: red"><?php echo $this->session->userdata('message');?></h3>
            <?php } $this->session->unset_userdata('message');?>
        </div>

        <div class="col-md-5 first_one_med">
            <h3 class="header_wrapper center-block text-center">Literature Upload</h3>
            <div class="med_form_type">
                <form method="post" action="<?php echo base_url()?>medicine_literature/drug_dse_upload" id="upload_form" onsubmit="return check_upload_drug_des()" enctype="multipart/form-data">
                    <fieldset>

                        <div class="col-md-12 med_sec">
                            <div class="form-group">
                                <br>
                                <div class="col-md-8 col-md-offset-2">
                                    <select id="selectbasic" class="form-control" name="gen_id" onchange="drug_list(this.value, 'drug');">
                                        <option value="-1">Generic Name</option>
                                        <?php foreach ($gens as $gen) { ?>
                                            <option
                                                value="<?php echo $gen['gen_id']; ?>"><?php echo $gen['gen_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div><br><br>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <select id="drug" class="form-control drug" name="drug_id"  onchange="drug_no(this.value);">
                                        <option value="-1">Select Drug </option>
                                    </select>
                                </div><br><br>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <select id="type" name="upload_file_type" class="form-control"
                                            onchange="drug_des(this.value, 'typee');">
                                        <option value="-1">Select Upload Type</option>
                                        <option value="1">Full Book</option>
                                        <option value="2">Feature & Benefit</option>
                                        <option value="3">Drug Image</option>
                                    </select>
                                </div><br><br>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-8 col-md-offset-2 upload_img_p">
                                    <p class="text-center" style="font-size:16px;margin-top:10px;">Uploaded:</p>
                                    <div id="typee"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2 drag-section">
                                    <label class="myLabel">
                                        <input type="file" name="pdf" id="pdf" />

                                        <img class="img-responsive center-block" src="<?php echo base_url()?>asset/images/cloud.png" alt="reneta drag and drop icon">
                                        <p class="text-center" style="padding-top: 10px;">Upload file-full<br/> book, feature <br/> benefit &amp; Drug Image</p>

                                    </label>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <div class="container col-md-12">
                                    <div class="bigger_spacer"></div>
                                    <div class="col-md-4"></div>
                                    <input type="submit" id="med-button" name="buttonSubmit" class="btn btn-primary col-md-4" value="Upload">
                                </div><br><br>
                            </div>

                        </div> <!-- col-md-12 -->

                    </fieldset>
                </form>
            </div>
        </div> <!-- first_one_med -->

        <div class="col-md-7 last_one_med">
            <h3 class="header_wrapper center-block text-center">Detailing Pointer</h3>
            <div class="med_form_type">
                <form action="<?php echo base_url()?>medicine_literature/drug_dse_version_upload" method="post" accept-charset="utf-8" class="form-horizontal medicine_submit" enctype="multipart/form-data">
                    <fieldset>
                        <div class="med_sec">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <br>
                                    <div >
                                        <input id="ver_id" name="version_id" type="hidden">
                                        <input id="audio1_test" name="audio1_test" type="hidden">
                                        <input id="audio2_test" name="audio2_test" type="hidden">
                                        <input id="audio3_test" name="audio3_test" type="hidden">
                                        <input id="drug_audio_test" name="drug_audio_test" type="hidden">
                                        <input id="image_test" name="image_test" type="hidden">
                                    </div>
                                    <div class="col-md-6">
                                        <select id="selectbasic" class="form-control" name="gen_id" onchange="drug_list2(this.value, 'drug2');">
                                            <option value="1">Generic Name</option>
                                            <?php foreach ($gens as $gen) { ?>
                                                <option
                                                    value="<?php echo $gen['gen_id']; ?>"><?php echo $gen['gen_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="drug2  " class="form-control drug2" name="drug_id"  onchange="drug_no1(this.value);">
                                            <option value="-1">Select Drug </option>
                                        </select> <br>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="selectbasic" name="selectbasic" class="form-control doc_type" onchange="version_find(this.value,'version')">
                                            <option value="-1">Select Doctor Type</option>
                                            <?php foreach ($docs as $doc){?>
                                                <option value="<?php echo $doc['doc_type_id']?>"><?php echo $doc['type_name']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="version" name="version" class="form-control version" onchange="fill_data(this.value)">
                                            <option value="-1">Select Version</option>
                                            <option value="0">New Version</option>
                                            <?php foreach ($versions as $version) {?>
                                                <option value="<?php echo $version['detail_version_id']?>">Version <?php echo $version['version_id']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <!-- <br><br> -->
                                </div> <!-- form-group -->
                            </div>

                            <div  class="col-md-1 " style="padding-left: 0;margin-top: 20px">
                                <label class="myLabel">
                                    <input name="drug_audio" class="drug_audio" type="file" />
                                    <img id="drug_audio_logo" src="<?php echo base_url()?>asset/images/cloud-ring.png" alt="cloud">
                                </label>

                            </div>
                            <div  class="col-md-1" style="padding-left: 0;margin-top: 10px">
                                <a onclick="return delete_version();" id="version_delete" style="visibility: hidden" href="#"><img id="drug_audio_logo" style="height: 35px;width: 35px"  src="<?php echo base_url()?>asset/images/delete_version.png" alt="cloud"></a>
                            </div>
                        </div> <!-- med_sec -->

                        <div class="col-md-12">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <textarea name="point1" id="point1" placeholder="Point 1" class="form-control point1" rows="4" required="required"></textarea>
                                </div> <!-- form-group -->
                            </div>
                            <div class="col-md-1 cloud-up">
                                <label class="myLabel">
                                    <input name="audio1" class="audio1" type="file" />
                                    <img src="<?php echo base_url()?>asset/images/cloud-ring.png" alt="cloud">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <textarea name="point2" id="point2" placeholder="Point 2" class="form-control point2" rows="4" required="required"></textarea>
                                </div> <!-- form-group -->
                            </div>
                            <div class="col-md-1 cloud-up">
                                <label class="myLabel">
                                    <input name="audio2"  class="audio2" type="file" />
                                    <img src="<?php echo base_url()?>asset/images/cloud-ring.png" alt="cloud">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <textarea name="point3" id="point3" placeholder="Point 3" class="form-control point3" rows="4" required="required"></textarea>
                                </div> <!-- form-group -->
                            </div>
                            <div class="col-md-1 cloud-up">
                                <label class="myLabel">
                                    <input name="audio3" class="audio3" type="file" />
                                    <img src="<?php echo base_url()?>asset/images/cloud-ring.png" alt="cloud">
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 upload_img">
                            <label class="myLabel col-md-4">
                                <input name="drug_des_image" class="drug_des_image" type="file" />
                                <div class="upload_img_cloud">
                                    <img class="img-responsive center-block" src="<?php echo base_url()?>asset/images/cloud.png" alt="button">
                                    <p class="text-center">Image</p>
                                </div>
                            </label>
                            <div class="col-md-8 upload_img_p">
                                <p class="text-center" style="font-size:16px;margin-top:10px;">Uploaded:</p>
                                <div id="files1" class="files1" style="overflow: scroll; height: 75px"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-9 col-md-3">
                                <input type="submit" id="singlebutton" name="buttonSubmit1" class="btn btn-primary btn-block " value="Upload">

                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div> <!-- last_one_med -->

        <div class="last_med_head col-md-12 drag_type" class="full_width">
            <button onclick="location.href = '<?php echo base_url()?>medicine_literature/show_all_med';"  type="button" class="btn pull-right up-n-down">
                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
            </button>
            <h3 class=" header_wrapper center-block text-center">Drug Literatures</h3>
            <div >
                <div >
                    <table  class="table result">
                        <thead>
                        <th>Drug Name</th>
                        <th>Upload File</th>
                        <th>Date</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach ($meds as $med){ if($i<3){ if($med['drug_full_book']){ $i++; ?>

                            <tr class="color_wrapper med_spacer">
                                <td><?php echo $med['drug_name']?></td>
                                <td>
                                    <a target="_blank" class="btn btn-primary center-block"  href="https://docs.google.com/viewerng/viewer?url=<?php echo $med['drug_full_book']?>">Full Book</a>
                                </td>
                                <td><?php echo $med['create_drug_date']?></td>
                                <td><a   onclick="return delete_med();"  href="<?php echo base_url()?>medicine_literature/delete_med?med_des_id=<?php echo $med['drug_des_id']?>&type=1&full_book=<?php echo $med['drug_full_book']?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } if($med['benefits_feature']){ $i++; ?>
                            <tr class="color_wrapper med_spacer">
                                <td><?php echo $med['drug_name']?></td>
                                <td>
                                    <a target="_blank" class="btn btn-primary center-block"  href="https://docs.google.com/viewerng/viewer?url=<?php echo $med['benefits_feature']?>">Feature & Benefits</a>
                                </td>
                                <td><?php echo $med['create_drug_date']?></td>
                                <td><a   onclick="return delete_med();"  href="<?php echo base_url()?>medicine_literature/delete_med?med_des_id=<?php echo $med['drug_des_id']?>&type=2&benefits_feature=<?php echo $med['benefits_feature']?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php }}}
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- last_med_head -->
    </div> <!-- container_wrapper -->
    <div class="copy_right col-md-12">
        <br>
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>
</div> <!-- body_wrapper -->
</div><!-- right-col -->