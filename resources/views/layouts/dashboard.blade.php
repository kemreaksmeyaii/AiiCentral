<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-chart-area'></i> Welcome to <span class='fw-300'>Dashboard</span>
    </h1>
</div>

<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="p-3 bg-info-400 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    <label for="visitorTotal" id="visitorTotal"></label>
                    <small class="m-0 l-h-n">Total Visitors</small>
                </h3>
            </div>
            <i class="fal fa-eye position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4"
                style="font-size: 6rem;"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    <label for="articleTotal" id="articleTotal"></label>
                    <small class="m-0 l-h-n">Total Articles</small>
                </h3>
            </div>
            <i class="fal fa-pager position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6"
                style="font-size: 8rem;"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="p-3 bg-success-400 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    <label for="eventTotal" id="eventTotal"></label>
                    <small class="m-0 l-h-n">Total Events</small>
                </h3>
            </div>
            <i class="fal fa-calendar-alt position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4"
                style="font-size: 6rem;"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div id="panel-1" class="panel panel-locked" data-panel-lock="false" data-panel-close="false"
            data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false"
            data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
            <div class="panel-hdr">
                <h2>
                    Live Feeds
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content bg-subtlelight-fade">
                    <div id="barlineCombine">
                        <canvas style="width:100%; height:300px;"></canvas>
                    </div>
                </div>
                <hr>
                <div class="panel-content p-0">
                    <div class="row row-grid no-gutters">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="px-3 py-2 d-flex align-items-center">
                                <div>
                                    <div id="visitorBarChart">
                                        <canvas style="width:100%; height:300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="px-3 py-2 d-flex align-items-center">
                                <div>
                                    <div id="articleBarChart">
                                        <canvas style="width:100%; height:300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="px-3 py-2 d-flex align-items-center">
                                <div>
                                    <div id="eventBarChart">
                                        <canvas style="width:100%; height:300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function() {
        getdata();
    });
    /* bar & line combine */
    var barlineCombine = function(label, visitor, article, event) {
        var barlineCombineData = {
            labels: label,
            datasets: [{
                    type: 'line',
                    label: 'Event',
                    borderColor: color.success._300,
                    pointBackgroundColor: color.success._500,
                    pointBorderColor: color.success._500,
                    pointBorderWidth: 1,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    data: event
                },
                {
                    type: 'line',
                    label: 'Article',
                    borderColor: color.warning._300,
                    pointBackgroundColor: color.warning._500,
                    pointBorderColor: color.warning._500,
                    pointBorderWidth: 1,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    data: article
                },
                {
                    type: 'bar',
                    label: 'Visitor',
                    backgroundColor: color.info._300,
                    borderColor: color.info._500,
                    data: visitor,
                    borderWidth: 1
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barlineCombineData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    // text: 'Chart.js Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barlineCombine > canvas").get(0).getContext("2d"), config);
    }
    /* bar & line combine -- end */
    /* bar chart */
    var visitorBarChart = function(label, data) {
        var barChartData = {
            labels: label,
            datasets: [{
                label: "Visitor",
                backgroundColor: color.info._300,
                borderColor: color.info._500,
                borderWidth: 1,
                data: data
            }]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#visitorBarChart > canvas").get(0).getContext("2d"), config);
    }
    var articleBarChart = function(label, data) {
        var barChartData = {
            labels: label,
            datasets: [{
                label: "Article",
                backgroundColor: color.warning._300,
                borderColor: color.warning._500,
                borderWidth: 1,
                data: data
            }]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#articleBarChart > canvas").get(0).getContext("2d"), config);
    }
    var eventBarChart = function(label, data) {
        var barChartData = {
            labels: label,
            datasets: [{
                label: "Event",
                backgroundColor: color.success._300,
                borderColor: color.success._500,
                borderWidth: 1,
                data: data
            }]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#eventBarChart > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    function getdata() {
        $.ajax({
            url: "{{ url('api/admin/dashboard-backend') }}",
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                if (response.status == "error") {
                    sweetToast(response.msg, response.icon);
                    return;
                }
                setValue(response);
                setChartValue(response);
                mapAllDataToChart(response);
                unblockagePage();
            },
            error: function(e) {
                if (e.status = 401) //unauthenticate not login
                {
                    Msg('Login is Required', 'error');
                }
                unblockagePage();
            }
        });
    }

    function setValue(data) {
        $("#visitorTotal").text(data.visitor.all);
        $("#articleTotal").text(data.article.all);
        $("#eventTotal").text(data.event.all);
    }

    function setChartValue(data) {
        let labelVisitor = Object.keys(data.visitor.chart);
        let dataVisitor = Object.values(data.visitor.chart);
        let labelArticle = Object.keys(data.article.chart);
        let dataArticle = Object.values(data.article.chart);
        let labelEvent = Object.keys(data.event.chart);
        let dataEvent = Object.values(data.event.chart);

        visitorBarChart(labelVisitor, dataVisitor);
        articleBarChart(labelArticle, dataArticle);
        eventBarChart(labelEvent, dataEvent);

    }

    function mapAllDataToChart(data) {
        let newArticle = [];
        let newEvent = [];
        for (const i in data.visitor.chart) {
            if (data.article.chart[i]) {
                newArticle.push(data.article.chart[i]);
            } else {
                newArticle.push(0);
            }
            if (data.event.chart[i]) {
                newEvent.push(data.event.chart[i]);
            } else {
                newEvent.push(0);
            }
        }
        let label = Object.keys(data.visitor.chart);
        let visitor = Object.values(data.visitor.chart);
        barlineCombine(label, visitor, newArticle, newEvent);
    }
</script>
