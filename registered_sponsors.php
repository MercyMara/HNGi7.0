<?php
    require 'classControllers/init.php';
    if (!isset($_SESSION["role"])) {
        header('Location:login.php');
    }
    $sponsors = new classSponsor;
    $display = $sponsors->allsponsors();
    if (isset($_POST['search'])) {
        $sponsors = new classSponsor;
        $display = $sponsors->search($_POST['search']);
    }
    if (isset($_GET['delete_id'])) {
        $sponsor_id = $_GET['delete_id'];
        $message = $sponsors->Deletesponsor($sponsor_id);
    }
    if (isset($_GET['acceptsponsorId'])) {
        $mentor_id = $_GET['acceptsponsorId'];
        $accept_message = $sponsors->Acceptsponsor($sponsor_id);
    }
    if (isset($_GET['rejectsponsorId'])) {
        $sponsor_id = $_GET['rejectsponsorId'];
        $reject_message = $sponsors->Rejectsponsor($sponsor_id);
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registered Sponsors</title>
    <link rel="icon" type="img/png" href="images/hng-favicon.png">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!--This contains the styling for the side bar -->
    <link href="css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
    <link href="css/newDashboard.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    

    <!-- This version required for Pagination -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   
    <style type="text/css">
        .card {
            height: 150px;
            background: #ccc;
            margin: 15px;
            padding: 10px;
            border-radius: 15px;
        }
    </style>

</head>

<body>
    <main class="reg">
    <div id="overlay"></div>
            <p id="message"></p>
            <button type="button" class="exports" id="download">Download</button>
        </div>
        <input type="text" class="searchBox"><i class="fas fa-search"></i>
        <section id="overview-section">
            <!-- <h1>Dashboard</h1> -->
            <h2>Registered Sponsors </h2>
            <!-- <section id="sponsor-section">
				Populated by `js/dashboard.js` 
			</section> -->

            <div class="container">
                <div class="row">

                    <?php
                    if ($display == "0") {
                        echo "<h2>There are no Registered Sponsors</h2>";
                    } 
                    else {
                    
                        ?>
                        </div>
                            <div class="scroll">
                            <!-- <table id="my-table" class="table table-hover table-bordered mt-3 mb-1"> -->
                            <table class="table table-hover">
                                <!-- <thead class="table-primary"> -->
                                <thead>
                                    <tr>
                                    <th data-heading="sponsor_id">SN<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                    <th data-heading="sponsor_name">Your company name<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                    <th data-heading="sponsor_email">Email Address<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                    <th data-heading="sponsor_logo">company logo<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                    <th data-heading="business_address">Your company address<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                    <th data-heading="about_you">About your company<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                    <th data-heading="updated_at">Date<!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>--></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                      echo $display;
                                        ?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    <?php
                    }
                    ?>
           
                </div>
            </div>
       </section>
        <section id="details-section">
			<div id="details-back" class="details-back">
                <div class="details-back">
                    <!-- <a href="overview.html" id="newitem-go-back" title="Go back">
                        <div></div>
                    </a> -->
                </div>
            </div>
            <div id="centralize">
			<h2>sponsor Details</h2>
			<em id="no-sponsor">No sponsor selected</em>
            <br />
            <p class="details" style="margin-left:10%;"><span id="photo"></span></p>
			<p class="details">Name: <span id="name"></span></p>
			<p class="details">Email: <span id="email"></span></p>
            <p class="details">Timestamp: <span id="timeStamp"></span></p>
            <!-- <div href="" id="details-return">Back to Overview</div> -->
            <div id="navigator">
                <i class="fas fa-chevron-left fa-2x left navigator"></i> 
                <p class="details"><span id="sn"></span></p>
                <i class="fas fa-chevron-right fa-2x right navigator"></i>
            </div>
            </div>
		</section>
    </main>

    <input type="checkbox" id="mobile-bars-check" />
    <label for="mobile-bars-check" id="mobile-bars">
        <div class="stix" id="stik1"></div>
        <div class="stix" id="stik2"></div>
        <div class="stix" id="stik3"></div>
    </label>

    <?php include('fragments/sidebar.php'); ?>

</body>

</html>
<script src="js/jspdf.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>
<script src="js/paginator.js"></script>
<script type="text/javascript" src="js/newDashboard.js"></script>
