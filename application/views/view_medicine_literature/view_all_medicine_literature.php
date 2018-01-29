<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 10/1/2017
 * Time: 12:47 PM
 */
?>
<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Medicine Literature List</h1>
            <p class="description">View all medicine list for information source</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?= base_url()?>"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Medicine Literature</a>
                </li>
                <li class="active">

                    <strong>Medicine Literature List</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Literature List</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $("#example-1").dataTable({
                        aLengthMenu: [
                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                        ]
                    });
                });
            </script>
                <table id="example-1" class="table table-striped  table-responsive" cellspacing="0"
                       width="100%">
                    <thead style="background-color: #2c2e2f;color: white">
                <tr>
                    <th style="color: white; vertical-align: top;text-align: left">Drug Image</th>
                    <th style="color: white; vertical-align: top;text-align: left">Business Code</th>
                    <th style="color: white; vertical-align: top;text-align: left">Drug Name</th>
                    <th style="color: white; vertical-align: top;text-align: left">Last Update Date</th>
                    <th style="color: white; vertical-align: top;text-align: left">View documents</th>
                </tr>
                </thead>
                <tbody>
                {meds}
                <tr>
                    <td><img src="{drug_image}" class="img-responsive img-circle" alt="" height="50px" width="50px">
                    </td>
                    <td>{tbl_business_business_code}</td>
                    <td>{drug_name}</td>
                    <td>{create_drug_date}</td>
                    <td><a style="border-radius: 10px" target="_blank" class="btn btn-gray"
                           href="https://docs.google.com/viewerng/viewer?url={drug_full_book}">Full Book</a>
                        <span>|</span>
                        <a style="border-radius: 10px" target="_blank" class="btn btn-primary "
                           href="https://docs.google.com/viewerng/viewer?url={benefits_feature}">Feature & Benefit</a>
                    </td>
                </tr>
                {/meds}
                </tbody>
            </table>
        </div>
        </div>
    </div>


    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
