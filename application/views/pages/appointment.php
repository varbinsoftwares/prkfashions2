<?php
$this->load->view('layout/header');
$prefixshopappointment = array('Sun' => [9, 19], 'Other' => [9, 21]);
$cdateshort = date("D");
$timingarray = [];
if (isset($prefixshopappointment[$cdateshort])) {
    $timingarray = $prefixshopappointment[$cdateshort];
} else {
    $timingarray = $prefixshopappointment['Other'];
}
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    #ui-datepicker-div{
        z-index: 200000!important;
    }
</style>
<div ng-controller="AppointmentDetails">
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area" style="    background: url(<?php echo base_url(); ?>assets/images/shop2.jpg);
         background-size: cover;
         background-position: 459px -1031px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>Appointment</h1>
                        <ul>
                            <li><a href="#">Home</a> /</li>
                            <li>Appointment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Contact Us Page Area Start Here -->
    <!-- Single Blog Page Area Start Here -->
    <div class="single-blog-page-area" style="padding: 0px 0 0px;background: url(<?php echo base_url(); ?>assets/theme2/img/mapback.png);background-size: contain;">
        <div class="container contact-us-page-area" style="padding: 50px 0 30px;">
            <div class="row" style="border-bottom: 2px solid;    background: #ffffffb5; ">
                <div class="contact-us-right">
                    <h2 class="title-sidebar text-center" style="margin-bottom: 30px;padding-bottom:  30px;border-bottom: 1px dotted ">Local Appointment</h2>
                    <table class="table table-borderd">
                        <tr style="    background-color: #000;
                            color: #fff;">
                            <th style="width: 100px">Country</th>
                            <th style="width: 150px">City/State</th>
                            <th style="">Address</th>

                            <th style="width: 350px">Date/Time</th>
                            <th style="width: 200px"></th>

                        </tr>
                        <?php
                        foreach ($appointmentdetailslocal as $key => $value) {
                            ?>
                            <tr>
                                <td>

                                    <?php echo $value['country']; ?>
                                </td>
                                <td>
                                    <?php echo $value['city_state']; ?>
                                </td>

                                <td>
                                    <b>
                                        <i class="fa fa-building-o"></i>
                                        <span style="line-height: 14px;"> <?php echo $value['hotel']; ?></span>
                                    </b>
                                    <br/>
                                    <small>
                                        <?php echo $value['address']; ?>
                                    </small>
                                </td>

                                <td>
                                    <?php
                                    if ($value['type'] == 'globle') {
                                        ?>

                                        <i class="fa fa-calendar"></i>
                                        <b><?php
                                            $date1 = date_create($value['start_date']);
                                            echo date_format($date1, "j<\s\u\p>S</\s\u\p>   F");
                                            ?></b> <span style="
                                            font-size: 12px;
                                            line-height: 24px;
                                                       margin: 0px 10px;"> Until</span>  <b><?php
                                                       $date2 = date_create($value['end_date']);
                                                       echo date_format($date2, "j<\s\u\p>S</\s\u\p> F Y");

                                                       $days = $date2->diff($date1)->format("%a");
                                                       echo "<br/> <center> (" . ($days + 1) . " Days)</center> ";
                                                       ?></b>
                                        <br/>
                                        <?php
                                    } else {
                                        ?>
                                        <ul style="    margin-bottom: 0px;">

                                            <li class="">

                                                <span class="timeing_opensm"> <i class="fa fa-clock-o"></i> Timing</span><br/>
                                                <span class="timeing_open">Mon - Sat</span>: 09:00 to 19:00 <br/>
                                                <span class="timeing_open">Sun & Holidays</span>: 09:00 to 18:00
                                            </li>
                                        </ul>

                                        <?php
                                    }
                                    ?>

                                    <br/>

                                    <button class="btn btn-danger btn-lg" style="background: black" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Book Now</button>
                                    <div class = "modal fade" id = "<?php echo $value['id']; ?>"  role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">

                                        <div class = "modal-dialog ">
                                            <div class = "modal-content">
                                                <form method="post" action="#">
                                                    <div class = "modal-header" style=" color: #fff;background: #000 ">
                                                        <button type = "button" style="    background-color: #000;
                                                                border: 1px solid #000;" class = " btn btn-danger btn-xm pull-right" data-dismiss = "modal" aria-hidden = "true">

                                                            <i class="fa fa-close"></i>

                                                        </button>

                                                        <div class = "modal-title row" id = "myModalLabel">

                                                            <address style="    margin-bottom: 0;">
                                                                <span id="location"><b><?php echo $value['hotel']; ?></b>
                                                                </span><br>
                                                                <span id="address">  
                                                                    <?php echo $value['address']; ?></span><br>
                                                            </address>
                                                            <input type="hidden" name="country" value="">

                                                            <div style="clear: both"></div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="hotel" value="<?php echo $value['hotel']; ?>">
                                                    <input type="hidden" name="address" value="<?php echo $value['address']; ?>">

                                                    <input type="hidden" name="address2" value="<?php echo $value['address2']; ?>">
                                                    <input type="hidden" name="type" value="<?php echo $value['type']; ?>">
                                                    <input type="hidden" name="city_state" value="<?php echo $value['city_state']; ?>">
                                                    <input type="hidden" name="country" value="<?php echo $value['country']; ?>">
                                                    <input type="hidden" name="contact_no2" value="<?php echo $value['contact_no']; ?>">


                                                    <div class = "modal-body">




                                                        <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                            <div class="col-md-4" >
                                                                <div class="form-group" style="font-color:black">

                                                                    <label for="first_name">Last Name</label> 
                                                                    <input type="text" class="time start form-control" name="last_name"  style="height:34px;" required/>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                                <div class="form-group" style="font-color:black">

                                                                    <label for="first_name">First Name</label> 
                                                                    <input type="text" class="time start form-control" name="first_name"  style="height:34px;" required />

                                                                </div>
                                                            </div>


                                                            <div class="col-md-4" >
                                                                <div class="form-group" style="font-color:black">
                                                                    <label for="first_name">No. Of Persons</label> 
                                                                    <input  class="time start form-control" type="number"  name="no_of_person"  style="height:34px;" min="1" value="1" />

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                            <div class="col-md-6" >
                                                                <div class="form-group" style="font-color:black">

                                                                    <label for="first_name">Email</label> 
                                                                    <input type="text" class="time start form-control" name="email"   style="height:34px;" required />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6" >
                                                                <div class="form-group" style="font-color:black">

                                                                    <label for="first_name">Contact No.</label> 
                                                                    <input type="text" class="time start form-control" name="contact_no"  style="height:34px;" required />

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                            <div class="col-md-4" >
                                                                <div class="form-group" style="font-color:black">

                                                                    <label for="select_date">Available Date</label> 
                                                                    <input type="text" class="form-control" name="select_date" id="appintmentDate" style="height:34px;" required ng-model="dateselection<?php echo $value['id']; ?>"  ng-init="dateselection<?php echo $value['id']; ?> = '<?php echo $value['dates'][0]['date']; ?>'" >



                                                                </div>
                                                            </div>

                                                            <div class="col-md-4" >
                                                                {{dateselection}}


                                                                <?php
                                                                $dataes = $value['dates'];
                                                                foreach ($dataes as $dkey => $dvalue) {
                                                                    
                                                                }
                                                                foreach ($dataes as $dtkey => $dtvalue) {
                                                                    $dateid = $value['id'] . $dkey;
                                                                    $t1 = $dtvalue['timing1'];
                                                                    $t2 = $dtvalue['timing2'];

                                                                    $cnt1 = array_search($t1, $timeslot);
                                                                    $cnt2 = array_search($t2, $timeslot);
                                                                    ?>
                                                                    <div class="form-group tab-pane " ng-if="dateselection<?php echo $value['id']; ?> == '<?php echo $dtvalue['date']; ?>'" style="font-color:black">
                                                                        <label for="select_time">Available Time</label> 
                                                                        <select class="form-control" name="select_time" id="select_time" style="height:34px;" required />
                                                                        <?php
                                                                        for ($tm = $cnt1; $tm < $cnt2 + 1; $tm++) {
                                                                            $time1 = $timeslot[$tm];
                                                                            echo "<option >$time1</option>";
                                                                        }
                                                                        ?>
                                                                        </select>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </div>
                                                            <div class="col-md-4" >
                                                                <div class="form-group" style="font-color:black">

                                                                    <label for="select_date">Referral</label> 

                                                                    <select class="form-control" name="referral" id="select_time" style="height:34px;" required >
                                                                        <option value="">Select</option>
                                                                        <option value="Newspaper">Newspaper</option>
                                                                        <option value="Facebook">Facebook</option>
                                                                        <option value="E-Newsletter">E-Newsletter</option>
                                                                        <option value="Online Search">Online Search</option>
                                                                        <option value="Word of Mouth">Word of Mouth</option>
                                                                        <option value="Paper Flier">Paper Flier</option>
                                                                        <option value="Instagram">Instagram</option>
                                                                        <option value="I am a Repeat Customer">I am a Repeat Customer</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--                    <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                                                <div class="col-md-12" >
                                                                                    <label for="first_name">Address</label> <br>
                                                                                    <textarea name="address" class="form-control"  rows="1" cols="27" style="height: 94px !important;"></textarea>
                                                                                </div>
                                                                            </div>-->



                                                        <div style="clear:both"></div>
                                                    </div>









                                                    <div class = "modal-footer">


                                                        <button type = "submit" name="submit" class="btn btn-danger" style="background: black" >
                                                            Book Appointment
                                                        </button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                </td>
                                <td style="">
                                    <span style="    line-height: 15px;
                                          padding: 0px 0px 10px;    color: black;
                                          float: left;">
                                        <i class="fa fa-phone-square"></i>  <?php echo $value['contact_no']; ?>
                                    </span>
                                    <iframe  frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'  height="100px" width="300px"  src="https://maps.google.com/?q=Bespoke Tailors+<?php echo $value['address']; ?>&output=embed">
                                    </iframe>  

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

            <!--global appointment-->
            <div class="row"  style="border-bottom: 2px solid;    background: #ffffffb8; ">
                <h2 class="title-sidebar text-center" style="margin: 30px;padding-bottom:  30px;border-bottom: 1px dotted ">Global Appointment</h2>
                <table class="table table-borderd">
                    <tr style="    background-color: #000;
                        color: #fff;">
                        <th style="width: 100px">Country</th>
                        <th style="width: 150px">City/State</th>
                        <th style="">Hotel Name & Address</th>

                        <th style="width: 350px">From Date - To Date</th>
                        <th style="width: 200px"></th>

                    </tr>
                    <?php
                    foreach ($appointmentdata as $key => $value) {
                        ?>
                        <tr>
                            <td>

                                <?php echo $value['country']; ?>
                            </td>
                            <td>
                                <?php echo $value['city_state']; ?>
                            </td>

                            <td>
                                <b>
                                    <i class="fa fa-building-o"></i>
                                    <span style="line-height: 14px;"> <?php echo $value['hotel']; ?></span>
                                </b>
                                <br/>
                                <small>
                                    <?php echo $value['address']; ?>

                                </small><br/>
                                <br/>
                                <p style="line-height: 12px;">  Note: Please ask for Mr. Mohammad Siraj at reception.</p>
                            </td>

                            <td>


                                <i class="fa fa-calendar"></i>

                                <b><?php
                                    echo $value["days"];
                                    $date1 = date_create($value['start_date']);
                                    // echo date_format($date1, "j<\s\u\p>S</\s\u\p>   F");
                                    ?></b>
                                <br/><ul style="    margin-bottom: 0px;margin-top: 10px;    font-size: 12px;">






                                    <?php
                                    $dataes = $value['dates'];
                                    foreach ($dataes as $dtkey1 => $dtvalue1) {
                                        echo "<li>";
                                        $dateid = $value['id'] . $dkey;

                                        echo '<span class = "timeing_open" style="    ">' . $dtvalue1['date'] . "</span>: " . $dtvalue1['timing1'] . " to " . $dtvalue1['timing2'] . "<br/>";

                                        echo "</li>";
                                    }
                                    ?>
                                </ul>


                                <br/>

                                <button class="btn btn-danger btn-lg" style="background: black" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Book Now</button>
                                <div class = "modal fade" id = "<?php echo $value['id']; ?>"  role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">

                                    <div class = "modal-dialog ">
                                        <div class = "modal-content">
                                            <form method="post" action="#">
                                                <div class = "modal-header" style=" color: #fff;background: #000 ">
                                                    <button type = "button" style="    background-color: #000;
                                                            border: 1px solid #000;" class = " btn btn-danger btn-xm pull-right" data-dismiss = "modal" aria-hidden = "true">

                                                        <i class="fa fa-close"></i>

                                                    </button>

                                                    <div class = "modal-title row" id = "myModalLabel">

                                                        <address style="    margin-bottom: 0;">
                                                            <span id="location"><b><?php echo $value['hotel']; ?></b>
                                                            </span><br>
                                                            <span id="address">  
                                                                <?php echo $value['address']; ?></span><br>
                                                        </address>
                                                        <input type="hidden" name="type" value="<?php echo $value['type']; ?>">
                                                        <input type="hidden" name="hotel" value="<?php echo $value['hotel']; ?>">
                                                        <input type="hidden" name="address" value="<?php echo $value['address']; ?>">
                                                        <input type="hidden" name="city_state" value="<?php echo $value['city_state']; ?>">
                                                        <input type="hidden" name="country" value="<?php echo $value['country']; ?>">
                                                        <input type="hidden" name="contact_no2" value="<?php echo $value['contact_no']; ?>">

                                                        <div style="clear: both"></div>
                                                    </div>
                                                </div>



                                                <div class = "modal-body">




                                                    <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                        <div class="col-md-4" >
                                                            <div class="form-group" style="font-color:black">

                                                                <label for="first_name">Last Name</label> 
                                                                <input type="text" class="time start form-control" name="last_name"  style="height:34px;" required/>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" >
                                                            <div class="form-group" style="font-color:black">

                                                                <label for="first_name">First Name</label> 
                                                                <input type="text" class="time start form-control" name="first_name"  style="height:34px;" required />

                                                            </div>
                                                        </div>


                                                        <div class="col-md-4" >
                                                            <div class="form-group" style="font-color:black">
                                                                <label for="first_name">No. Of Persons</label> 
                                                                <input  class="time start form-control" type="number"  name="no_of_person"  style="height:34px;" min="1" value="1" />

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                        <div class="col-md-6" >
                                                            <div class="form-group" style="font-color:black">

                                                                <label for="first_name">Email</label> 
                                                                <input type="text" class="time start form-control" name="email"   style="height:34px;" required />

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" >
                                                            <div class="form-group" style="font-color:black">

                                                                <label for="first_name">Contact No.</label> 
                                                                <input type="text" class="time start form-control" name="contact_no"  style="height:34px;" required />

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                        <div class="col-md-4" >
                                                            <div class="form-group" style="font-color:black">

                                                                <label for="select_date">Available Date</label> 
                                                                <select class="form-control" name="select_date" id="dateselection" style="height:34px;" required ng-model="dateselection<?php echo $value['id']; ?>"  ng-init="dateselection<?php echo $value['id']; ?> = '<?php echo $value['dates'][0]['date']; ?>'" >

                                                                    <?php
                                                                    $dataes = $value['dates'];
                                                                    foreach ($dataes as $dkey => $dvalue) {
                                                                        $dateid = $value['id'] . $dkey;
                                                                        ?>    
                                                                        <option  value="<?php echo $dvalue['date']; ?>"><?php echo $dvalue['date']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>


                                                            </div>
                                                        </div>

                                                        <div class="col-md-4" >
                                                            {{dateselection}}


                                                            <?php
                                                            foreach ($dataes as $dtkey => $dtvalue) {
                                                                $dateid = $value['id'] . $dkey;
                                                                $t1 = $dtvalue['timing1'];
                                                                $t2 = $dtvalue['timing2'];

                                                                $cnt1 = array_search($t1, $timeslot);
                                                                $cnt2 = array_search($t2, $timeslot);
                                                                ?>
                                                                <div class="form-group tab-pane " ng-if="dateselection<?php echo $value['id']; ?> == '<?php echo $dtvalue['date']; ?>'" style="font-color:black">
                                                                    <label for="select_time">Available Time</label> 
                                                                    <select class="form-control" name="select_time" id="select_time" style="height:34px;" required />
                                                                    <?php
                                                                    for ($tm = $cnt1; $tm < $cnt2 + 1; $tm++) {
                                                                        $time1 = $timeslot[$tm];
                                                                        echo "<option >$time1</option>";
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="col-md-4" >
                                                            <div class="form-group" style="font-color:black">

                                                                <label for="select_date">Referral</label> 

                                                                <select class="form-control" name="referral" id="select_time" style="height:34px;" required >
                                                                    <option value="">Select</option>
                                                                    <option value="Newspaper">Newspaper</option>
                                                                    <option value="Facebook">Facebook</option>
                                                                    <option value="E-Newsletter">E-Newsletter</option>
                                                                    <option value="Online Search">Online Search</option>
                                                                    <option value="Word of Mouth">Word of Mouth</option>
                                                                    <option value="Paper Flier">Paper Flier</option>
                                                                    <option value="Instagram">Instagram</option>
                                                                    <option value="I am a Repeat Customer">I am a Repeat Customer</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--                    <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                                            <div class="col-md-12" >
                                                                                <label for="first_name">Address</label> <br>
                                                                                <textarea name="address" class="form-control"  rows="1" cols="27" style="height: 94px !important;"></textarea>
                                                                            </div>
                                                                        </div>-->



                                                    <div style="clear:both"></div>
                                                </div>









                                                <div class = "modal-footer">


                                                    <button type = "submit" name="submit" class="btn btn-danger" style="background: black" >
                                                        Book Appointment
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </td>
                            <td style="">
                                <span style="    line-height: 15px;
                                      padding: 0px 0px 10px;    color: black;
                                      float: left;">
                                    <i class="fa fa-phone-square"></i>  <?php echo $value['contact_no']; ?>
                                </span>
                                <iframe  frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'  height="100px" width="300px"  src="https://maps.google.com/?q=<?php echo $value['hotel']; ?>+<?php echo $value['address']; ?>&output=embed">
                                </iframe>  

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>


                <!--                <div class="contact-us-right" ng-if="appointmentData.length == 0">
                
                                    <h2 class="title-sidebar text-center" style="margin: 30px;padding-bottom:  30px;border-bottom: 1px dotted ">Global Appointment</h2>
                
                                    <p class="text-center" style="font-size: 20px;">Coming Soon</p>
                
                                </div>-->

            </div>
        </div>
    </div>
    <!-- Single Blog Page Area End Here -->
    <!-- Contact Us Page Area End Here -->



</div>

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                                                    $(document).ready(function () {
                                                            $("#appintmentDate").datepicker({
                                                            minDate: 0,
                                                                    dateFormat: "yy-mm-dd"
                                                            });
                                                                    $.datepicker.parseDate("yy-mm-dd", "<?php echo date('Y-m-d'); ?>");
                                                                    $('#dateselection').on('change', function (e) {
                                                            var $optionSelected = $("option:selected", this);
                                                                    console.log(this);
                                                                    $optionSelected.tab('show')
                                                            });
                                                            });
<?php
if ($sentemail == "1") {
    ?>
                                                                swal({
                                                                title: 'Appointment Booked',
                                                                        type: 'success',
                                                                        html: "<?php echo $message;?>",
//                 timer: 1500,
                                                                      

                                                                }).then(
                    function () {
//                         window.location =  "<?php echo site_url("Shop/appointment");?>";
                    },
                    function (dismiss) {
                        alert("Hello");
                    }
            )
    <?php
}
?>


</script>

<?php
$this->load->view('layout/footer');
?>