@extends('admin.layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more"
                                    role="tab" aria-selected="false">More</a>
                            </li>
                        </ul>
                        <div>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i>
                                    Share</a>
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i>
                                    Export</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <!------- More Tab Content ---------------------------------------------------------------->
                        <div class="tab-pane fade show" id="more" role="tabpanel" aria-labelledby="more">
                            there is nothing
                        </div>
                        <!-------OverView Tab Content -------------------------------------------------------------->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="statistics-details d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="statistics-title">Users</p>
                                            <h3 class="rate-percentage">{{ $users->count() }}</h3>
                                            <p class="text-danger d-flex"><i
                                                    class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Products</p>
                                            <h3 class="rate-percentage">{{ $products->count() }}</h3>
                                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Orders</p>
                                            <h3 class="rate-percentage">{{ $orders->count() }}</h3>
                                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Done Orders</p>
                                            <h3 class="rate-percentage">{{ $doneOrders->count() }}</h3>
                                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Waiting Orders</p>
                                            <h3 class="rate-percentage">{{ $waitOrders->count() }}</h3>
                                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div class="card-title">
                                                            <h4>Orders Review</h4>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <canvas id="orderOverview"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                            <div class="card bg-primary card-rounded">
                                                <div class="card-body pb-0">
                                                    <h4 class="card-title card-title-dash text-white mb-4">
                                                        Orders Summary</h4>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <p class="status-summary-ight-white mb-1">
                                                                Order in Week</p>
                                                            <h2 class="text-info">{{ $orderInWeek->count() }}</h2>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="status-summary-chart-wrapper pb-4">
                                                                <canvas id="status-summary"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                                <div class="circle-progress-width">
                                                                    <div id="totalVisitors"
                                                                        class="progressbar-js-circle pr-2">
                                                                    </div>
                                                                    <strong></strong>
                                                                </div>
                                                                <div>
                                                                    <p class="text-small mb-2">Total Visitors</p>
                                                                    <h4 class="mb-0 fw-bold">26.80%</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="circle-progress-width">
                                                                    <div id="visitperday"
                                                                        class="progressbar-js-circle pr-2">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <p class="text-small mb-2">Visits per
                                                                        day</p>
                                                                    <h4 class="mb-0 fw-bold">9065</h4>
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
                            <div class="row">
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div class="card-title">
                                                            <h4>Week Done Orders Review</h4>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <canvas id="weekOrderReview"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded table-darkBGImg">
                                                <div class="card-body">
                                                    <div class="col-sm-8">
                                                        <h3 class="text-white upgrade-info mb-0">
                                                            Enhance your <span class="fw-bold">Campaign</span> for better
                                                            outreach
                                                        </h3>
                                                        <a href="#" class="btn btn-info upgrade-btn">Upgrade
                                                            Account!</a>
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
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {

        /************ Weekly Done Orders chart********************************************/
        var allOrderWeek = @json($allOrderWeek);
        var doneOrderWeek = @json($doneOrderWeek);

        var dataFirst = {
            label: "All Orders",
            data: [allOrderWeek['Monday'], allOrderWeek['Tuesday'], allOrderWeek['Wednesday'], allOrderWeek[
                'Thursday'], allOrderWeek['Friday'], allOrderWeek['Saturday'], allOrderWeek[
                'Sunday']],
            backgroundColor: 'dodgerblue',
            borderColor: 'blue',
            borderWidth: 1
        };

        var dataSecond = {
            label: "Done Orders",
            data: [doneOrderWeek['Monday'], doneOrderWeek['Tuesday'], doneOrderWeek['Wednesday'],
                doneOrderWeek['Thursday'], doneOrderWeek['Friday'], doneOrderWeek['Saturday'],
                doneOrderWeek['Sunday']
            ],
            backgroundColor: 'yellowgreen',
            borderColor: 'green',
            borderWidth: 1
        };

        var data = {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            datasets: [dataFirst, dataSecond]
        };
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: true
            },
            elements: {
                point: {
                    radius: 0
                }
            }

        };
        if ($("#weekOrderReview").length) {
            var barChartCanvas = $("#weekOrderReview").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: data,
                options: options
            });

        }

        /****************************Month Order OverView**********************************/
        var orderWeek = @json($orderMonth);
        var dataArr= new Array(31);
        for (let index = 1; index <= 31; index++) {
            dataArr[index] = orderWeek[index];          
        }
        var dataM = {
            label: "Orders Review",
            data: dataArr, //[98,89,100,20,50,60,70,50,10,30,98,89,100,20,50,60,70,50,10,30,98,89,100,20,50,60,70,50,10,30,97],
            backgroundColor: 'pink',
            borderColor: 'red',
            borderWidth: 1
        };
        var dataMonth = {
            labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10",
            "11", "12", "13", "14", "15", "16", "17","18","19","20",
            "21", "22", "23", "24", "25", "26", "27","28","29","30","31"],
            datasets: [dataM]
        };

        if ($("#orderOverview").length) {
            var barChartCanvas = $("#orderOverview").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas, {
                type: 'line',
                data: dataMonth,
                options: options
            });

        }



        /*******************************************************************************************/



    });
</script>
