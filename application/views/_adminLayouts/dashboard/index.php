<div class="row row-cols-1 row-cols-md- row-cols-xl-2">
    <div class="col">
        <div class="card radius-10 ">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Member Active</p>
                        <h4 class="my-1"><?= $dataCountActiveMember?> User</h4>
                    </div>
                    <div class="widgets-icons ms-auto"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Member Register</p>
                        <h4 class="my-1"><?= $dataCountRegisteredMember ?> User</h4>
                    </div>
                    <div class="widgets-icons ms-auto"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row row-cols-1 row-cols-md- row-cols-xl-12">

<h6 class="mb-0 text-uppercase">Line Chart</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="chart1" width="815" height="340" style="display: block; width: 815px; height: 340px;" class="chartjs-render-monitor js-dashboard_chart"></canvas>
            </div>
        </div>
    </div>
</div>




