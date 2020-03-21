<?PHP
session_start();
if (!$_SESSION['id']) {
    header("Location:../");
} else {
    include('../../condb.php');
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Main Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= DataTables ?>datatables.css">
        <link rel="stylesheet" href="<?= CSS ?>style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/stock/highstock.js"></script>
        <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
        <script>
            $(document).ready(function() {

                $("#btn1").click(function() { //อ้างอิงจาก button id = btn1
                    year = $("#year").val(); //ตัวแปรวันที่เริ่มต้น เพื่อส่งค่าไป
                    month = $("#month").val(); //ตัวแปรวันที่เริ่มต้น เพื่อส่งค่าไป
                    $.ajax({ // get ค่า วันที่ ไปที่ไฟล์ test2.php
                        type: "GET",
                        url: "chart.php",
                        data: {
                            "year": year,
                            "month": month
                        },
                        dataType: "xml",
                        beforeSend: function() {
                            $("#container").html("<center><img src=\"http://www.jlg.com/images/layout/loadingGif.gif\" alt=\"Loading...\"/></center>");
                        },
                        success: function(xml) { // รับค่ามาเป็น xml
                            // Split the lines
                            var $xml = $(xml);

                            // push categories
                            $xml.find('categories item').each(function(i, category) {
                                options.xAxis.categories.push($(category).text());
                            });

                            // push series
                            $xml.find('series').each(function(i, series) {
                                var seriesOptions = {
                                    name: $(series).find('name').text(),
                                    data: []
                                };

                                // push data points
                                $(series).find('data point').each(function(i, point) {
                                    seriesOptions.data.push(
                                        parseInt($(point).text())
                                    );
                                });

                                // add it to the options
                                options.series.push(seriesOptions);
                            });
                            var chart = new Highcharts.Chart(options);
                        },
                        cache: false
                    });
                    //จบ get ajax


                    //เริ่ม chart
                    var options = {
                        chart: {
                            renderTo: 'container',
                            type: 'column'
                        },
                        title: {
                            text: 'จำนวนวัสดุที่รับเข้ามา'
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
                            categories: []
                        },
                        yAxis: {
                            title: {
                                text: null
                            },
                            labels: {
                                formatter: function() {
                                    //return (Math.abs(this.value));
                                    return Highcharts.numberFormat(Math.abs(this.value), 0, ',');

                                }
                            },
                        },
                        legend: {
                            layout: 'horizontal ',
                            align: 'botton',
                            verticalAlign: 'top',
                            x: -10,
                            y: 100,
                            borderWidth: 0
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: true,

                            }
                        },
                        tooltip: {
                            enabled: true,
                            formatter: function() {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    this.x + ': ' + this.y + ' จำนวน';
                            }

                        },
                        exporting: {
                            enabled: false
                        },
                        series: []
                    };
                });
            });
        </script>
    </head>

    <body class="sb-nav-fixed">
        <?php include 'Sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- Table Member -->
            <table>
                <tr>
                    <td>ปี : </td>
                    <td>
                        <select class="form-control" name='year' id='year'>
                            <option value='2020'>2020</option>
                            <option value='2019'>2019</option>
                            <option value='2018'>2018</option>
                            <option value='2017'>2017</option>
                        </select>
                    </td>
                    <td>เดือน : </td>
                    <td>
                        <select select class="form-control" name='month' id='month'>
                            <option value=''>- ทุกเดือน -</option>
                            <?php for ($i = 1; $i <= 12; $i++) {
                            ?>
                                <option value='<?= sprintf("%02d", $i) ?>'><?= sprintf("%02d", $i) ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td><input class="btn btn-primary" type='button' id='btn1' name='btn1' value='ประมวลผล'></td>
                </tr>
            </table>
            <div id="container" style="min-width: 320px; height: 500px; margin: 0 auto"></div>
            <!-- END Page Content  -->
        </div>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="./js/jquery.min.js"></script>
        <!-- DataTable -->
        <script src="<?= DataTables ?>datatables.min.js"></script>
        <script src="<?= JS ?>datatable.js"></script>
        <!-- Chart -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= JS ?>barchart.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= JS ?>main.js"></script>
        <script src="<?= JS ?>/js/popper.js"></script>
        <script src="<?= JS ?>/js/bootstrap.min.js"></script>

    </body>

    </html>
<?PHP } ?>