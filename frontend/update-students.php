<?php
session_start();
include 'logout.php';
//$_SESSION['token']=null;
if (!isset($_SESSION['token'])) {
    header("location: login.html");
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Joseph Vaz College Attendence System - User Manager</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_registration.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->
    <?php include 'includes/left-menu.php' ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include 'includes/header.php' ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Student Details</h1>
                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">
            <!-- Make alert visible after submit -->
            <!-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->

            <form id="index-grabber" role="form">
                <div class="form-group">
                    <input id="studIndex" name="indexNo" type="number" class="form-control" placeholder="Index No *" value="">
                </div>
                <button id="fetch-student" type="button" class="btn btn-primary" data-dismiss="modal">Populate Student</button>
            </form>

            <form id="studentupdate" data-toggle="validator" role="form">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="notify_panel3"></div>
                        <h3 class="register-heading">Student Update Form</h3>

                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="populated-index" name="indexNo" type="number" class="form-control" placeholder="Index No *" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <input name="nameWithInitials" type="text" class="form-control" placeholder="Name With Initials *" value="" required>
                                </div>
                                <div class="form-group">
                                    <input name="fullName" type="text" class="form-control" placeholder="Full Name *" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input name="DOB" id="dob" type="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" placeholder="Address *" value="" required>
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="grade" id="grade" class="form-control" required>
                                            <option value="" class="hidden" selected disabled> Grade</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="section" type="text" class="form-control" placeholder="Section/Class" value="" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <select name="medium" id="medium" class="form-control" required>
                                        <option value="" class="hidden" selected disabled> Medium</option>
                                        <option value="Sinhala">Sinhala</option>
                                        <option value="English">English</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="guardianName" type="text" class="form-control" placeholder="Guardian Name" value="">
                                </div>
                                <div class="form-group">
                                    <input name="guardianAddress" type="text" class="form-control" placeholder="Guardian Adress" value="">
                                </div>
                                <div class="form-group">
                                    <input name="guardianRelationship" type="text" class="form-control" placeholder="Guardian Relationship" value="">
                                </div>
                                <div class="form-group">
                                    <input type="number" minlength="10" maxlength="10" name="contactNo1" class="form-control" placeholder="Contact Number 1 *" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" minlength="10" maxlength="10" name="contactNo2" class="form-control" placeholder="Contact Number 2" value="">
                                </div>

                                <button id="update-form-submit" type="Submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Apply as a Hirer</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option class="hidden" selected disabled>Please select your Sequrity Question</option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                </div>

                            </div>
                        </div>
                    </div> -->
                </div>
            </form>
        </div>

        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>

        <script src="properties.js"></script>
        <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/widgets.js"></script>
        <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="js/select-min.js"></script>
        <script type="text/javascript" src="js/noty.min.js"></script>
        <script>
            (function($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
            var web_token = "<?php echo $_SESSION['token'] ?>";
            var auth = "BEARER " + web_token;

            $('#fetch-student').on('click', function(e) {
                var sindex = $("#studIndex").val();
                console.log(sindex);
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: gOptions.serverUrl + "/protected/students/" + sindex,
                    data: {},
                    headers: {
                        Authorization: auth
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.indexNo != null) {
                            console.log(response)
                            populate('#studentupdate', response);
                            $('#index-grabber')[0].reset();
                        } else {
                            notifyMe('.notify_panel', 'User does not exist', '0');
                            $('#studentupdate')[0].reset();
                        }
                    },
                    error: function(err) {
                        notifyMe('.notify_panel', 'User does not exist', '0');
                        $('#studentupdate')[0].reset();
                    }
                });
                return false;
            });

            function populate(frm, data) {
                $.each(data, function(key, value) {
                    if (key == "DOB") {
                        datevalue = convertDate(value);
                        console.log("datevalue:", datevalue);
                        $('#dob').value = datevalue;
                        document.getElementById("dob").value = "2014-02-09";
                    }
                    $('input[name="' + key + '"]').val(value);

                    if (key = "grade") {
                        $('#grade').find('option[value="' + value + '"]').prop('selected', 'selected');
                    }
                    if (key = "medium") {
                        $('#medium').find('option[value="' + value + '"]').prop('selected', 'selected');
                    }

                    var $ctrl = $('[name=' + key + ']', frm);
                    if ($ctrl.is('select')) {
                        $("option", $ctrl).each(function() {
                            if (this.value == value) {
                                this.selected = true;
                            }
                        });
                    } else {
                        switch ($ctrl.attr("type")) {
                            case "text":
                            case "hidden":
                            case "textarea":
                                $ctrl.val(value);
                                break;
                            case "radio":
                            case "checkbox":
                                $ctrl.each(function() {
                                    if ($(this).attr('value') == value) {
                                        $(this).attr("checked", value);
                                    }
                                });
                                break;
                        }
                    }
                });
            };

            function convertDate(dateval) {
                var date = new Date(dateval);
                var day = String(date.getDate()).padStart(2, '0');
                var month = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                var year = date.getFullYear();
                var dateStr = year + "-" + month + "-" + day;
                return dateStr;
            }

            $('#update-form-submit').on('click', function(e) {
                $.fn.serializeObject = function() {
                    var o = {};
                    var a = this.serializeArray();
                    $.each(a, function() {
                        if (o[this.name] !== undefined) {
                            if (!o[this.name].push) {
                                o[this.name] = [o[this.name]];
                            }
                            o[this.name].push(this.value || '');
                        } else {
                            o[this.name] = this.value || '';
                        }
                    });
                    return o;
                };
                var data = JSON.stringify($('#studentupdate').serializeObject());
                console.log("data: " + data)

                var sindex = $("#populated-index").val();
                console.log(sindex);
                e.preventDefault();

                $.ajax({
                    type: "PUT",
                    url: gOptions.serverUrl + "/protected/students/" + sindex,
                    data: data,
                    dataType: 'json',
                    contentType: 'application/json;charset=UTF-8',
                    headers: {
                        Authorization: auth
                    },
                    success: function(response) {
                        console.log("Success: ", response);
                        if (response.indexNo != null) {
                            notifyMe('.notify_panel', 'User added', '1');
                            $('#studentupdate')[0].reset();
                        }
                    },
                    error: function(err) {
                        console.log("Error: ", err)
                        alert(err);
                    },
                });
                return false;
            });

            function notifyMe($classname, $message, $status) {
                if ($status == "1") {
                    statusnew = 'success';
                } else {
                    statusnew = 'error';
                }
                console.log(statusnew);
                var n = $($classname).noty({
                    text: $message,
                    theme: 'metroui',
                    type: statusnew,
                    animation: {
                        open: {
                            height: 'toggle'
                        },
                        close: {
                            height: 'toggle'
                        },
                        speed: 500
                    }
                });
                n.setTimeout(3000);
            }
        </script>

</body>

</html>