<?php include('header.php'); ?>
<?php


$db = new mysqli(HOST, USER, PASSWORD, DATABASE);


$user_id = $_SESSION['user_id'];

if (login_check($db) == true) {
    $logged = true;
} else {
    $logged = false;
}


if ($user_id) {

    $result = $db->query('SELECT * from members WHERE id = ' . $user_id . ' LIMIT 1;');
    $member = $result->fetch_assoc();

    $result = $db->query('SELECT COUNT(*) from monitors;');
    $monitors = $result->fetch_assoc();
//    echo print_r($rows);

    if ($member) {
        if ($member['first_name'] != '') {
            $user = $member['first_name'];
        }
        if ($member['api_key'] != '') {
            $api_key = $member['api_key'];
            //        echo "API KEY FOUND: " . $api_key . '</br>';
        }
    }
}


?>

<?php
$rand = rand(0, 10);

switch ($rand){
    case 1:
        $msg = 'All quiet here, go enjoy your day!';
        break;
    case 2:
        $msg =  'No problems so far, I can take it from here.';
        break;
    case 3:
        $msg =  'You shouldnt look so worried, nothings happened!';
        break;
    case 4:
        $msg =  'A site down? Not on my watch.';
        break;
    case 5:
        $msg =  'These are not the stats your looking for.';
        break;
    case 6:
        $msg =  'Oh no, looks like one of your sites doesnt want to talk to me.';
        break;
    case 7:
        $msg =  'Hows the weather today?';
        break;
    case 8:
        $msg =  '[insert_lame_joke_here]';
        break;
    case 9:
        $msg =  'The cake is a lie.';
        break;
    default:
        $msg =  'Everything looks good today!';
        break;
}
?>
<?php $events = array(); ?>

<div class="grid-12" id="content">

    <section class="grid-12 content-area grey">
        <div class="section-container">
            <div class="grid-2"></br></div>
            <div class="grid-8 center">
                <h2>
                    <strong>
                        Hello <?php echo $user; ?>, <?php echo $msg; ?>
                    </strong>
                </h2>

                <?php if (count($events) > 0) { ?>
                    <p>You have 1 new event in your activity feed.</p>
                <?php } else { ?>
                    <p>There are no new events.</p>
                <?php } ?>
            </div>
            <div class="grid-2"></br></div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area">
        <div class="section-container">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Day', 'Down Time', 'Up Time'],
                        ['Sunday, 14th',  1,      3],
                        ['Saturday, 13th',  0,      3],
                    ]);

                    var options = {
                        title: 'Uptime Statistics',
                        hAxis: {title: 'Day',  titleTextStyle: {color: '#499dff'}},
                        vAxis: {minValue: 0},
                        colors: ['#499dff', '#499dff']
                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
            <div id="chart_div"></div>
        </div>
    </section>

    <section class="grid-12 content-area grey">
        <div class="section-container">
            <div class="grid-2"></br></div>
            <div class="grid-8 center">
                <h2>
                    <strong>
                        <i class="fa fa-user-secret small-icon"></i> Add new monitor
                    </strong>
                </h2>

                <p>
                    </br>
                <div class="text-center">
                    <a class="button add full animated large">Add</a>
                </div>

            </div>
            <div class="grid-2"></br></div>
        </div>
    </section>

    <div class="line-divider"></div>
    <div class="clearfix"></div>

    <?php
        $result = $db->query('SELECT * from monitors WHERE member_id = ' . $user_id);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            // do what you need.
            $data[] = $row;

        }
    ?>

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-6 center">
                <h2><strong> <i class="fa fa-desktop small-icon"></i> Monitor List (<?php echo count($data); ?>)</strong></h2>

                <?php foreach ($data as $monitor) { ?>
                    <div class="monitor">
                        <span class="monitor-title"><?php echo $monitor['monitor_name']; ?></span>
                        <span class="monitor-url"><?php echo $monitor['monitor_url']; ?></span>
                        <?php if ($monitor['monitor_status'] == 1){ ?>
                            <span class="monitor-status">Active</span>
                        <?php } else { ?>
                            <span class="monitor-status">Inactive</span>
                        <?php } ?>
                        <span class="monitor-percentage">99%</span>
                    </div>
                <?php } ?>
            </div>
            <?php $activity = false; ?>
            <div class="grid-6 center">
                <h2><strong><i class="fa fa-rss small-icon"></i> Latest Activity</strong></h2>
                <?php if ($activity) { ?>
                    <div class="activity">
                        <span class="activity-title">Up</span>
                    <span class="activity-comment">
                        Ping has detected that your site is now responding again.</br>
                        - http://www.johnanthonyvella.com
                    </span>
                        <span class="activity-time">5 minutes ago</span>
                    </div>
                    <div class="activity">
                        <span class="activity-title error">Error</span>
                        <span class="activity-comment">
                            Ping has detected that the site is not responding.</br>
                            - http://www.johnanthonyvella.com
                        </span>
                        <span class="activity-time">23 minutes ago</span>
                    </div>
                <?php } else { ?>
                    <div class="activity">
                        No Recent Activity
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="grid-12 content-area grey">
        <div class="section-container">
            <div class="grid-2"></br></div>
            <div class="grid-8 center">
                <h2>
                    <strong>
                        <i class="fa fa-plug small-icon"></i> Your API Key
                    </strong>
                </h2>

                <p>
                    </br>
                    <?php if ($api_key == '') { ?>
                <div class="text-center">
                    <a class="button generate full animated large">Generate</a>
                </div>
                <?php } else { ?>
                    <div class="api-key">
                        <?php echo $api_key; ?>
                    </div>
                    <a class="api-key-regenerate">
                        Renew API Key?
                    </a>
                <?php } ?>
                </p>
            </div>
            <div class="grid-2"></br></div>
        </div>
    </section>

    <div id="popup-window" class="add-monitor">
        <span class="button b-close"><span>X</span></span>
        <div class="popup-content">

            <form role="form">
                <h2>Add a new monitor</h2>
                <div class="form-group">
                    <input type="monitor_name" class="form-control" id="name" placeholder="Monitor Name">
                </div>
                <div class="form-group">
                    <input type="monitor_url" class="form-control" id="url" placeholder="Monitor URL">
                </div>

                <a type="submit" class="button full animated fadeInUp add-monitor-submit">Submit</a>
            </form>

        </div>
    </div>

    <div class="line-divider"></div>
    <div class="clearfix"></div>

    <script>

        jQuery('.generate').click(function()
        {
            getKey(false);
        });

        jQuery('.monitor-url').click(function()
        {
            var host = jQuery(this).text();

            var data = {
                'member_id': "<?php echo $user_id; ?>",
                'host':host
            }
            var postForm = {
                'method': 'pingHost',
                'data': data
            };

            RequestAjax('GetKey', 'ping/pingHost', postForm, onGetKey);
        });

        jQuery('.api-key-regenerate').click(function()
        {
            getKey(true);
        });

        jQuery('.add').click(function()
        {
            $('#popup-window').bPopup({
                modalClose: false,
                opacity: 0.6,
                positionStyle: 'fixed' //'fixed' or 'absolute'
            });

        });

        jQuery('.add-monitor-submit').click(function()
        {
            var data = {
                'member_id': "<?php echo $user_id; ?>",
                'monitor_url': jQuery('.add-monitor').find('#url').val(),
                'monitor_title': jQuery('.add-monitor').find('#name').val(),
            }

            var postForm = {
                'type': 'cache',
                'action': 'pageload-flush',
                'method': 'getPageLoadCSS',
                'data': data
            };

            RequestAjax('AddMonitor', 'ping/add', postForm, onMonitorAdded);
        });

        function getKey(recreate)
        {
            var data = {
                'member_id': "<?php echo $user_id; ?>",
                'regenerate':recreate
            }
            var postForm = {
                'method': 'getKey',
                'data': data
            };

            RequestAjax('GetKey', 'ping/', postForm, onGetKey);
        }

        function onMonitorAdded(data)
        {
            console.log('New Monitor Added, Please Refresh Page.');
            $('#popup-window').bPopup().close();

            window.location.reload();
        }

        function onGetKey(data)
        {
            console.log('Key Returned: ' + data['key']);
            jQuery('.api-key').text(data['key']);
            jQuery('.api-key').show();
        }

        function RequestAjax(name, url, parameters, callBack) {
            $.ajax({ //Process the form using $.ajax()
                type: 'POST', //Method type
                url: url, //Your form processing file URL
                data: parameters, //Forms name
                dataType: 'json',
                error: function (request, error) {

                    //alertify.error("Failed to execute: " + name + ' Action with error: ' + error);
                },
                success: function (data) {

                    if (callBack) {
                        callBack(data);
                    }
                    //alertify.success('Successfully executed ' + name + ' Action');
                }
            });
        }
    </script>

</div>
<?php include('footer.php'); ?>
