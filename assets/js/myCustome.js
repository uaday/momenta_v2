var i = 0;
var test_id;
var o_p=0,r_p=0;


//    setInterval("refresh_home();",5000);
//
//    function refresh_home() {
//        $(".clit").load("<?php //echo base_url()?>//home/total_drug");
//        $(".cpsos").load("<?php //echo base_url()?>//home/total_pso");
//        $(".ctest").load("<?php //echo base_url()?>//home/total_exam");
//        $(".coffer").load("<?php //echo base_url()?>//home/total_incentives");
//    }
//
//    function delete_pso_exams() {
//        var check = confirm('Are You Sure To Delete Pso all Exam ??');
//        if (check) {
//            return true;
//        }
//        else {
//            return false;
//        }
//    }

function delete_gen() {
    var check = confirm('Are You Sure To Delete This Generic Name?\nIf you Delete then all information regarding this generic name will Delete');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function delete_exam() {
    var check = confirm('Are You Sure To Delete This Exam\nIf you delete this PSO exam will delete ??');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}

function publish_exam() {
    var check = confirm('Are You Sure To Publish The Exam ??');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function unpublish_exam() {
    var check = confirm('Are You Sure To Unpublish The Exam ??');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}


function delete_incentive() {
    var check = confirm('Are You Sure To Delete This Incentives?\nIf you delete this then this incentives transaction will delete');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}

function district(division_id) {
    $.ajax(
        {
            type: 'POST',
            data: {division_id: division_id},
            url: "<?php echo site_url('find/find_district')?>",
        success: function (result) {
        $('.district').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}
function region(district_id) {
    $.ajax(
        {
            type: 'POST',
            data: {district_id: district_id},
            url: "<?php echo site_url('find/find_region')?>",
        success: function (result) {
        $('.region').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}
function update_password() {
    var check = confirm('Are you sure to update the password?');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function delete_account() {
    var check = confirm('Are You Sure To Delete Pso Account!!!');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function delete_med() {
    var check = confirm('Are You Sure To Delete This!!!');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function delete_version() {
    var check = confirm('Are You Sure To Delete This Version!!!');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function delete_question() {
    var check = confirm('Are You Sure To Delete This Question!!!');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
function approve_transaction() {
    var check = confirm('Are You Sure To Purchase this Incentive!!!');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}

function change() {

    var elems = document.getElementsByClassName("change");
    for (var i = 0; i < elems.length; i++) {
        elems[i].disabled = false;
    }
    document.getElementById('image').type = 'file';
    document.getElementById('submit').type = 'submit';
}

function hidee() {

    if (document.getElementById('hh1').style.visibility == 'hidden') {
        document.getElementById('hh1').style.visibility = 'visible';
        document.getElementById('hh2').style.visibility = 'visible';
        document.getElementById('hh3').style.visibility = 'visible';
        document.getElementById('hh4').style.visibility = 'visible';
    }
    else {
        document.getElementById('hh1').style.visibility = 'hidden';
        document.getElementById('hh2').style.visibility = 'hidden';
        document.getElementById('hh3').style.visibility = 'hidden';
        document.getElementById('hh4').style.visibility = 'hidden';
    }

}

var drug_idd;
var drug_idd2;
var upload_type;
var doc_typee;
function gen_list(business_code, result) {
    $.ajax(
        {
            type: 'POST',
            data: {business_code: business_code},
            url: "<?php echo site_url('find/find_gen')?>",
        success: function (result) {
        $('.generic_name').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}
function drug_list(gen_id, result) {
    $.ajax(
        {
            type: 'POST',
            data: {gen_id: gen_id},
            url: "<?php echo site_url('find/find_drugs')?>",
        success: function (result) {
        $('.drug').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}
function drug_list2(gen_id, result) {
    $.ajax(
        {
            type: 'POST',
            data: {gen_id: gen_id},
            url: "<?php echo site_url('find/find_drugs')?>",
        success: function (result) {
        $('.doc_type,.version').val('-1');
        $('.drug_audio,.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
        document.getElementById('files1').innerHTML='';
        document.getElementById('version_delete').style.visibility='hidden';
        $('.drug2').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}
function drug_no(drug_id) {
    drug_idd = drug_id;
}
function drug_no1(drug_id) {
    $('.doc_type,.version').val('-1');
    $('.drug_audio,.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
    document.getElementById('files1').innerHTML='';
    document.getElementById('version_delete').style.visibility='hidden';
    drug_idd = drug_id;
}

function version_find(doc_type, result) {
    doc_typee = doc_type;
    $.ajax(
        {
            type: 'POST',
            data: {doc_type: doc_type, drug_id: drug_idd},
            url: "<?php echo site_url('find/find_version')?>",
        success: function (result) {
        $('.version').val('-1');
        $('.drug_audio,.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
        document.getElementById('files1').innerHTML='';
        document.getElementById('version_delete').style.visibility='hidden';
        $('#version').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}

function fill_data(version_id) {
    version_id = version_id;
    if (version_id != '0' && version_id != '-1') {
        $.ajax({
            url: "<?php echo site_url('find/find_version_data')?>",
            type: "POST",
            dataType: 'json',
            data: {version_id: version_id},
        success: function (data) {
            var id = data[0]['detail_version_id'];
            var version = data[0]['version_id'];
//                    if(version!='1')
//                    {
//                        document.getElementById('drug_audio_logo').style.visibility='hidden';
//
//                    }
//                    else
//                    {
//                        document.getElementById('drug_audio_logo').style.visibility='visible';
//                    }
            $("#version_delete").attr("href", "<?php echo base_url()?>medicine_literature/delete_version?version_id="+id);
            document.getElementById('version_delete').style.visibility='visible';
            $('#point1').val('');
            $('#point2').val('');
            $('#point3').val('');
            $('#audio1_test').val('');
            $('#audio2_test').val('');
            $('#audio3_test').val('');
            $('#drug_audio_test').val('');
            $('#image_test').val('');
            $('#files1').html('');

            var point1 = data[0]['point1'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var point2 = data[0]['point2'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var point3 = data[0]['point3'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var audio1 = data[0]['audio1'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var audio2 = data[0]['audio2'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var audio3 = data[0]['audio3'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var drug_audio = data[0]['drug_name_audio'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            var drug_image = data[0]['drug_detail_image'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
            //var all = '1. Drug Audio: ' + drug_audio + '<br>' + '2.Point 1 audio: ' + audio1 + '<br>' + '3.Point 2 audio: ' + audio2 + '<br>' + '4.Point 3 audio: ' + audio3 + '<br>' + '5. Drug Image: ' + drug_image;
            var all = '1. Drug Image: ' + drug_image;
            $('#ver_id').val(id);
            $('#point1').val(point1);
            $('#point2').val(point2);
            $('#point3').val(point3);
            $('#files1').html(all);
            $('#audio1_test').val(data[0]['audio1']);
            $('#audio2_test').val(data[0]['audio2']);
            $('#audio3_test').val(data[0]['audio3']);
            $('#drug_audio_test').val(data[0]['drug_name_audio']);
            $('#image_test').val(data[0]['drug_detail_image']);
        },
        error: function (result) {
            alert('POST failed.');
        }
    })
    }
    if (version_id == '0') {
        if($('.doc_type').val()=='-1'||$('.drug2').val()=='-1')
        {
            document.getElementById('version_delete').style.visibility='hidden';
            alert("Please Select Drug Name And Doc Type");
        }
        else
        {
            if (confirm('Are you sure you want a new version?')) {
                document.getElementById('version_delete').style.visibility='hidden';
                $('#point1').val('');
                $('#point2').val('');
                $('#point3').val('');
                $('#audio1_test').val('');
                $('#audio2_test').val('');
                $('#audio3_test').val('');
                $('#drug_audio_test').val('');
                $('#image_test').val('');
                $('#files1').html('');
                $.ajax(
                    {
                        type: 'POST',
                        dataType: 'json',
                        data: {doc_type: doc_typee, drug_id: drug_idd},
                        url: "<?php echo site_url('find/add_new_version')?>",
                    success: function (data) {
                    $('#ver_id').val(data[0]['detail_version_id']);
                    $('#drug_audio_test').val(data[0]['drug_name_audio']);
                },
                error: function (result) {
                    alert(result);
                }
            }
            )
            }
        }
    }
    if (version_id == '-1') {
        $('#point1').val('');
        $('#point2').val('');
        $('#point3').val('');
        $('#audio1_test').val('');
        $('#audio2_test').val('');
        $('#audio3_test').val('');
        $('#drug_audio_test').val('');
        $('#image_test').val('');
        $('#files1').html('');
    }
}

function drug_no2(drug_id) {
    drug_idd2 = drug_id;
    var d_id = drug_id;
    $.ajax(
        {
            type: 'POST',
            data: {drug_id: d_id},
            url: "<?php echo site_url('find_drug/find_drug_des')?>",
        success: function (result) {
        $('.views').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)

}
function drug_des(upload_file_type, result) {
    upload_type = upload_file_type;
    $.ajax(
        {

            type: 'POST',
            data: {type: upload_file_type, drug_id: drug_idd},
            url: "<?php echo site_url('find/find_file')?>",
        success: function (result) {
        $('#typee').html(result);
    },
    error: function (result) {
        alert('POST failed.');
    }
}
)
}

function check_upload_drug_des() {

    if ($('#drug').val() == '-1') {
        alert("Please Select Drug");
        return false;
    }
    else if ($('#type').val() == '-1') {
        alert("Please Select Type");
        return false;
    }
    else if ($('#pdf').val() == '') {
        alert("Please Select a File");
        return false;
    }
    else {
        return true;
    }
}

function region_check() {

    if ($('#region').val() == '-1') {
        alert("Please Select Region");
        return false;
    }
    else
    {
        return true;
    }
}


function add_ques() {
    var test_name = $('.test_name').val();
    var test_suggestion = $('.test_suggestion').val();
    var exp_date = $('.exp_date').val();
    var test_type = $('.test_type').val();
    var test_marks = $('.test_marks').val();
    var pass_marks = $('.pass_marks').val();
    var test_time = $('.test_time').val();
    var ques = $('.ques').val();
    var op1 = $('.option1').val();
    var op2 = $('.option2').val();
    var op3 = $('.option3').val();
    var op4 = $('.option4').val();
    var ans = $('.ans').val();

    if(pass_marks=='-1')
    {
        pass_marks=50;
    }

    if (test_name == '') {
        alert('Please fill up the test name')
    }
    else if (test_suggestion == '') {
        alert('Please fill up the test suggestion')
    }
    else if (exp_date == '') {
        alert('Please fill up the Expire Date')
    }
    else if (test_type == '') {
        alert('Please fill up the test type')
    }
    else if (test_time == '') {
        alert('Please fill up the test time')
    }
    else if (test_marks == '') {
        alert('Please fill up the test marks')
    }
    else if (ques == '') {
        alert("Please Fill up the question");
    }
    else if (op1 == '') {
        alert("Please Fill up option 1");
    }
    else if (op2 == '') {
        alert("Please Fill up option 2");
    }
    else if (op3 == '') {
        alert("Please Fill up option 3");
    }
    else if (op4 == '') {
        alert("Please Fill up option 4");
    }
    else if (ans == '-1') {
        alert("Please select answer");
    }
    else {
        i++;
        document.getElementById('qus_no').innerHTML = i;
        $('.ques').val('');
        $('.option1').val('');
        $('.option2').val('');
        $('.option3').val('');
        $('.option4').val('');
        $('.ans').val('-1');

        if (i == 1) {
            $.ajax(
                {
                    type: 'POST',
                    data: {test_name: test_name,test_suggestion:test_suggestion,exp_date:exp_date,test_time:test_time,test_marks:test_marks,pass_marks:pass_marks,test_type: test_type,ques: ques, op1: op1, op2: op2, op3: op3, op4: op4, ans: ans},
                    url: "<?php echo site_url('test/make_test')?>",
                success: function (result) {
                test_id=result.substr(0,result.indexOf('<'));
                $('#test_id').val(test_id);
            },
            error: function (result) {
                alert(result);
            }
        }
        )
        }
        else
        {
            $.ajax({
                type: 'POST',
                data: {test_name:test_name,ques: ques, op1: op1, op2: op2, op3: op3, op4: op4, ans: ans, test_id: test_id},
                url: "<?php echo site_url('test/upload_ques')?>",
            success: function (data) {
            var bb = data;
        },
            error: function (result) {
                alert('POST failed.');
            }
        });
        }
    }
}
function up_ques() {
    if($('.test_time').val()<=0)
    {
        alert('Test Time Should Be Grater Then 59 sec');
        return false;
    }
    else if($('.test_marks').val()<=0)
    {
        alert('Test Marks Should Be Grater Then 0');
        return false;
    }
    else if(i<1)
    {
        alert('Please Insert Question');
        return false;
    }
    else
    {
        return true;
    }
}
function up_ques2() {
    if($('.test_time').val()<=0)
    {
        alert('Test Time Should Be Grater Then 59 sec');
        return false;
    }
    else if($('.test_marks').val()<=0)
    {
        alert('Test Marks Should Be Grater Then 0');
        return false;
    }
    else
    {
        return true;
    }
}

function check_password() {
    var pass=$('#current_p').val();
    var login_id2=$('#login_id2').val();
    var check;
    $.ajax({
        type:'POST',
        data:{pass:pass,id:login_id2},
        url:"<?php echo site_url('settings/check_pass')?>",
        success:function (result) {
        check=result.substr(0,result.indexOf('<'));
        if(check==login_id2)
        {
            document.getElementById("wrong_p").style.display = "none";
            document.getElementById("correct_p").style.display = "block";
            o_p=1;
        }
        else
        {
            document.getElementById("wrong_p").style.display = "block";
            document.getElementById("correct_p").style.display = "none";
            o_p=0;
        }
    },
    error:function (result) {
        alert(result);
    }
})
}

function pass_match() {
    var npass=$('#new_p').val();
    var rpass=$('#repeat_p').val();
    if(npass==rpass)
    {
        document.getElementById("r_wrong_p").style.display = "none";
        document.getElementById("r_correct_p").style.display = "block";
        r_p=1;
    }
    else
    {
        document.getElementById("r_wrong_p").style.display = "block";
        document.getElementById("r_correct_p").style.display = "none";
        r_p=0;
    }
}
function change_password() {
    if(o_p==0)
    {
        alert('Provide Current Password');
        return false;
    }
    else if(r_p==0)
    {
        alert("Repeat Password won't match");
        return false;
    }
    else
    {
        return true;
    }
}

function user_typee() {
    var type=$('#user_type').val();
    if(type==4)
    {
        document.getElementById('sm_code').style.display="block";
        document.getElementById('rsm_code').style.display="none";
        document.getElementById('dsm_code').style.display="none";
        document.getElementById('region').style.display="none";
        document.getElementById('depot_code').style.display="block";
        document.getElementById('business_code').style.display="block";
    }
    else if(type==5)
    {
        document.getElementById('sm_code').style.display="block";
        document.getElementById('rsm_code').style.display="block";
        document.getElementById('dsm_code').style.display="none";
        document.getElementById('region').style.display="block";
        document.getElementById('depot_code').style.display="block";
        document.getElementById('business_code').style.display="block";
    }
    else if(type==6)
    {
        document.getElementById('sm_code').style.display="none";
        document.getElementById('region').style.display="none";
        document.getElementById('rsm_code').style.display="block";
        document.getElementById('dsm_code').style.display="block";
        document.getElementById('depot_code').style.display="block";
        document.getElementById('business_code').style.display="block";
    }
    else
    {
        document.getElementById('sm_code').style.display="none";
        document.getElementById('rsm_code').style.display="none";
        document.getElementById('dsm_code').style.display="none";
        document.getElementById('region').style.display="none";
        document.getElementById('depot_code').style.display="none";
        document.getElementById('business_code').style.display="none";
    }

}

function check_user() {
    var depot_code=$('#depot_code').val();
    var business_code=$('#business_code').val();
    var phone_number=$('.phone_number').val();
    var pso_type=$('#pso_type').val();

    if(phone_number<0&&phone_number.length()<11)
    {
        return false;
    }
    else if(depot_code==-1)
    {
        alert('Please Select Depot');
        return false;
    }
    else if(business_code==-1)
    {
        alert('Please Select Business');
        return false;
    }
    else if(pso_type==-1)
    {
        alert('Please Select PSO Type');
        return false;
    }
    else
    {
        return true;
    }
}
function check_user_update() {

    var phone_number=$('.phone_number').val();

    if(phone_number.length<11)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function check_incentive() {
    var image=$('#shop_image').val();
    var point_needed=$('#point_needed').val();
    var quantity=$('#quantity').val();
    var offer_validity=$('#offer_validity').val();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();


    if(point_needed<0)
    {
        alert("Please Insert Positive Point");
        return false;
    }
    else if(quantity<0)
    {
        alert("Please Insert Positive Quantity");
        return false;
    }
    else if(image=='')
    {
        alert("Select Incentive Image");
        return false;
    }
    else
    {
        return true;
    }
}

function create_user() {
    var user_type=$('#user_type').val();
    var sm_code=$('#sm_code').val();
    var dsm_code=$('#dsm_code').val();
    var rsm_code=$('#rsm_code').val();
    var region=$('#region').val();
    var depot_code1=$('#depot_code').val();
    var business_code1=$('#business_code').val();
    if(user_type=='-1')
    {
        alert('Please Select User Type');
        return false;
    }
    else if(user_type!='-1')
    {
        if(user_type==4)
        {
            if(sm_code=='')
            {
                alert('Please Insert Sales Manager Code');
                return false;
            }
            else if(depot_code1==-1)
            {
                alert('Please Select Depot');
                return false;
            }
            else if(business_code1=='-1')
            {
                alert('Please Select Business');
                return false;
            }
        }
        else if(user_type==5)
        {
            if(rsm_code=='')
            {
                alert('Please Insert Regional Sales Manager Code');
                return false;
            }
            else if(sm_code=='')
            {
                alert('Please Insert Sales Manager Code');
                return false;
            }
            else if(region=='')
            {
                alert('Please Insert Region Name');
                return false;
            }
            else if(depot_code1==-1)
            {
                alert('Please Select Depot');
                return false;
            }
            else if(business_code1=='-1')
            {
                alert('Please Select Business');
                return false;
            }
        }
        else if(user_type==6)
        {
            if(dsm_code=='')
            {
                alert('Please Insert District Sales Manager Code');
                return false;
            }
            else  if(rsm_code=='')
            {
                alert('Please Insert Regional Sales Manager Code');
                return false;
            }
            else if(depot_code1=='-1')
            {
                alert('Please Select Depot');
                return false;
            }
            else if(business_code1=='-1')
            {
                alert('Please Select Business');
                return false;
            }
        }
        else
        {
            return true;
        }
    }
}

function delete_user() {
    var check = confirm('Are you sure to delete this user');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}

$(function () {
    $('#datetimepicker').datetimepicker({
        minDate:new Date()
    });
});


function find_exam_stat(exam_id) {


    $.ajax(
        {
            type: 'POST',
            url: "<?php echo site_url('find/find_exam_data')?>",
        dataType: 'json',
        data: {exam_id: exam_id},
    success: function (data) {

        $('#pass').val(data['0']['tpass']);
        $('#fail').val(data['0']['tfail']);
        $('#attend').val(data['0']['tattend']);
        $('#nattend').val(data['0']['tnattend']);
        myChart.destroy();
        myChart2.destroy();
        Mychart(data['0']['tpass'],data['0']['tfail'],data['0']['tattend'],data['0']['tnattend']);
    },
    error: function (result) {
        alert('No Result Available Right Now');
    }
}
)
}


function Mychart(a,b,c,d) {
    const CHART = document.getElementById("myChart");
    var myChart = new Chart(CHART,{
        type: 'pie',
        options:
            {
                tooltips:
                    {
                        enabled: false
                    }
            },
        data: data = {
            labels: [ "PASS: "+a+"%", "FAIL: "+b+"%"],
            datasets:
                [{
                    data: [a,b],
                    backgroundColor: [
                        "#5B5B95",
                        "#E94699"
                    ],

                    hoverBackgroundColor: [
                        "#5B5B95",
                        "#E94699"
                    ]
                }]
        }
    });
    const CHART2 = document.getElementById("myChart2");
    var myChart2 = new Chart(CHART2,{
        type: 'pie',
        options:
            {
                tooltips:
                    {
                        enabled: false
                    }
            },
        data: data = {
            labels: ["EXAM ATTEND: "+c+"%", "NOT ATTEND: "+d+"%"],
            datasets:
                [{
                    data: [c, d],
                    backgroundColor: [
                        "#3580BE",
                        "#00BADA"
                    ],

                    hoverBackgroundColor: [
                        "#3580BE",
                        "#00BADA"
                    ]
                }]
        }
    });
    myChart.update();
    myChart2.update();
}


function  check_drug_insert() {
    if($('#drug_name').val()=='')
    {
        alert('Please Insert Drug Name');
        return false;
    }
    else if($('#gen_id').val()=='-1')
    {
        alert('Please Select Generic Name');
        return false;
    }
    else
    {
        return true;
    }
}
function  check_drug_update() {

    if($('#drug_name1').val()=='')
    {
        alert('Please Insert Drug Name');
        return false;
    }
    else if($('#gen_id1').val()=='-1')
    {
        alert('Please Select Generic Name');
        return false;
    }
    else
    {
        return true;
    }
}

//region ways assign

function region_pso_list() {

    $("#pso_type").multiselect();
    var region=$('#region').val();
    if(region!='')
    {
        $.ajax(
            {
                type: 'POST',
                data: {region: region},
                url: "<?php echo site_url('find/open_pso_type')?>",
        success: function (result) {
        $("#pso_type").empty();
        $("#pso_type").multiselect("clearSelection");
        $("#psos").empty();
        $("#pso_type").append(result);
        $("#pso_type").multiselect('rebuild');


    },
        error: function (result) {
            alert('POST failed.');
        }
    }
    )
    }
    else
    {
        $("#psos").val("<option value='-1'>No Result</option>");
        $("#psos").multiselect('rebuild');
    }
}
function type_pso_list() {
    $("#psos").multiselect();
    var pso_type=$('#pso_type').val();
    var region=$('#region').val();
    if(pso_type!='')
    {
        $.ajax(
            {
                type: 'POST',
                data: {pso_type: pso_type,region:region},
                url: "<?php echo site_url('find/find_pso_by_types')?>",
        success: function (result) {
        $("#psos").empty();
        $("#psos").append(result);
        $("#psos").multiselect('rebuild');

    },
        error: function (result) {
            alert('POST failed.');
        }
    }
    )
    }
    else
    {
        $("#psos").val("<option value='-1'>No Result</option>");
        $("#psos").multiselect('rebuild');
    }
}



