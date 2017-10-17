<?php include 'inc/head.php'; ?>
<div class="graphs">
    <div class="col_3">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="fa fa-mail-forward"></i>
                <div class="stats">
                  <h5>45 <span>%</span></h5>
                  <div class="grow">
                    <p>Growth</p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="fa fa-users"></i>
                <div class="stats">
                  <h5>50 <span>%</span></h5>
                  <div class="grow grow1">
                    <p>New Users</p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="fa fa-eye"></i>
                <div class="stats">
                  <h5>70 <span>%</span></h5>
                  <div class="grow grow3">
                    <p>Visitors</p>
                  </div>
                </div>
            </div>
         </div>
         <div class="col-md-3 widget">
            <div class="r3_counter_box">
                <i class="fa fa-usd"></i>
                <div class="stats">
                  <h5>70 <span>%</span></h5>
                  <div class="grow grow2">
                    <p>Profit</p>
                  </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>

<!-- switches -->
<div class="switches">
    <div class="col-md-4 span_8">
    <div class="activity_box">
        <h3>Inbox</h3>
        <div class="scrollbar scrollbar1" id="style-2">
            <div class="activity-row">
                <div class="col-xs-3 activity-img"><img src='images/1.png' class="img-responsive" alt=""/></div>
                <div class="col-xs-7 activity-desc">
                    <h5><a href="#">John Smith</a></h5>
                    <p>Hey ! There I'm available.</p>
                </div>
                <div class="col-xs-2 activity-desc1"><h6>13:40 PM</h6></div>
                <div class="clearfix"> </div>
            </div>
            <div class="activity-row">
                <div class="col-xs-3 activity-img"><img src='images/5.png' class="img-responsive" alt=""/></div>
                <div class="col-xs-7 activity-desc">
                    <h5><a href="#">Andrew Jos</a></h5>
                    <p>Hey ! There I'm available.</p>
                </div>
                <div class="col-xs-2 activity-desc1"><h6>13:40 PM</h6></div>
                <div class="clearfix"> </div>
            </div>
            <div class="activity-row">
                <div class="col-xs-3 activity-img"><img src='images/3.png' class="img-responsive" alt=""/></div>
                <div class="col-xs-7 activity-desc">
                    <h5><a href="#">Adom Smith</a></h5>
                    <p>Hey ! There I'm available.</p>
                </div>
                <div class="col-xs-2 activity-desc1"><h6>13:40 PM</h6></div>
                <div class="clearfix"> </div>
            </div>
            <div class="activity-row">
                <div class="col-xs-3 activity-img"><img src='images/4.png' class="img-responsive" alt=""/></div>
                <div class="col-xs-7 activity-desc">
                    <h5><a href="#">Peter Carl</a></h5>
                    <p>Hey ! There I'm available.</p>
                </div>
                <div class="col-xs-2 activity-desc1"><h6>13:40 PM</h6></div>
                <div class="clearfix"> </div>
            </div>
            <div class="activity-row">
                <div class="col-xs-3 activity-img"><img src='images/1.png' class="img-responsive" alt=""/></div>
                <div class="col-xs-7 activity-desc">
                    <h5><a href="#">John Smith</a></h5>
                    <p>Hey ! There I'm available.</p>
                </div>
                <div class="col-xs-2 activity-desc1"><h6>13:40 PM</h6></div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    </div>
<div class="col-md-4 switch-right">
    <div class="switch-right-grid">
        <div class="switch-right-grid1">
            <h3>ALLTIME STATS</h3>
            <p>Duis aute irure dolor in reprehenderit.</p>
            <ul>
                <li>Earning: $80,000 USD</li>
                <li>Items Sold: 8,000 Items</li>
                <li>Last Hour Sales: $75,434 USD</li>
            </ul>
        </div>
    </div>
    <div class="sparkline">
        <!--graph-->
        <link rel="stylesheet" href="css/graph.css">
        <script src="js/jquery.flot.min.js"></script>
    <!--//graph-->
            <script>
                $(document).ready(function () {

                    // Graph Data ##############################################
                    var graphData = [{
                            // Returning Visits
                            data: [ [4, 4500], [5,3500], [6, 6550], [7, 7600],[8, 4500], [9,3500], [10, 6550], ],
                            color: '#FFCA28',
                            points: { radius: 7, fillColor: '#fff' }
                        }
                    ];

                    // Lines Graph #############################################
                    $.plot($('#graph-lines'), graphData, {
                        series: {
                            points: {
                                show: true,
                                radius: 1
                            },
                            lines: {
                                show: true
                            },
                            shadowSize: 0
                        },
                        grid: {
                            color: '#fff',
                            borderColor: 'transparent',
                            borderWidth: 10,
                            hoverable: true
                        },
                        xaxis: {
                            tickColor: 'transparent',
                            tickDecimals: false
                        },
                        yaxis: {
                            tickSize: 1200
                        }
                    });

                    // Graph Toggle ############################################
                    $('#graph-bars').hide();

                    $('#lines').on('click', function (e) {
                        $('#bars').removeClass('active');
                        $('#graph-bars').fadeOut();
                        $(this).addClass('active');
                        $('#graph-lines').fadeIn();
                        e.preventDefault();
                    });

                    $('#bars').on('click', function (e) {
                        $('#lines').removeClass('active');
                        $('#graph-lines').fadeOut();
                        $(this).addClass('active');
                        $('#graph-bars').fadeIn().removeClass('hidden');
                        e.preventDefault();
                    });

                });
            </script>
            <div id="graph-wrapper">
                <div class="graph-container">
                    <div id="graph-lines"> </div>
                    <div id="graph-bars"> </div>
                </div>
            </div>
    </div>
</div>
<div class="col-md-4 switch-right">
    <div class="switch-right-grid">
        <div class="switch-right-grid1">
            <h3>ALLTIME STATS</h3>
            <p>Duis aute irure dolor in reprehenderit.</p>
            <ul>
                <li>Earning: $80,000 USD</li>
                <li>Items Sold: 8,000 Items</li>
                <li>Last Hour Sales: $75,434 USD</li>
            </ul>
        </div>
    </div>
    <div class="sparkline">
        <!--graph-->
        <link rel="stylesheet" href="css/graph.css">
        <script src="js/jquery.flot.min.js"></script>
    <!--//graph-->
            <script>
                $(document).ready(function () {

                    // Graph Data ##############################################
                    var graphData = [{
                            // Returning Visits
                            data: [ [4, 4500], [5,3500], [6, 6550], [7, 7600],[8, 4500], [9,3500], [10, 6550], ],
                            color: '#FFCA28',
                            points: { radius: 7, fillColor: '#fff' }
                        }
                    ];

                    // Lines Graph #############################################
                    $.plot($('#graph-lines-2'), graphData, {
                        series: {
                            points: {
                                show: true,
                                radius: 1
                            },
                            lines: {
                                show: true
                            },
                            shadowSize: 0
                        },
                        grid: {
                            color: '#fff',
                            borderColor: 'transparent',
                            borderWidth: 10,
                            hoverable: true
                        },
                        xaxis: {
                            tickColor: 'transparent',
                            tickDecimals: false
                        },
                        yaxis: {
                            tickSize: 1200
                        }
                    });

                    // Graph Toggle ############################################
                    $('#graph-bars-2').hide();

                    $('#lines').on('click', function (e) {
                        $('#bars').removeClass('active');
                        $('#graph-bars-2').fadeOut();
                        $(this).addClass('active');
                        $('#graph-lines-2').fadeIn();
                        e.preventDefault();
                    });

                    $('#bars').on('click', function (e) {
                        $('#lines').removeClass('active');
                        $('#graph-lines-2').fadeOut();
                        $(this).addClass('active');
                        $('#graph-bars-2').fadeIn().removeClass('hidden');
                        e.preventDefault();
                    });

                });
            </script>
            <div id="graph-wrapper">
                <div class="graph-container">
                    <div id="graph-lines-2"> </div>
                    <div id="graph-bars-2"> </div>
                </div>
            </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
</div>
<!-- //switches -->
</div>

<?php include 'inc/foot.php'; ?>
