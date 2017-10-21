<?
$statistics = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $statistics = $response['data']['out'];
    };
};
if ( $statistics ) {
}
?>
<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>통계</h4>
                      <ul id="tabs-swipe-demo" class="tabs">
                            <li class="tab col s3"><a class="" href="/admin/statistics/day">일간</a></li>
                            <li class="tab col s3"><a class="active" href="/admin/statistics/month">월간</a></li>
                        </ul>
                        <div id="test-swipe-1" class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="datepicker">
                                </div>
                            </div>
                            <canvas id="myChart-d"></canvas>
                        </div>
                        <div id="test-swipe-2" class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="monthpicker">
                                </div>
                            </div>
                            <canvas id="myChart-m"></canvas>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/FreddyFY/material-datepicker/master/dist/material-datepicker-with-moment-js.js"></script>
<script>
var ctx = document.getElementById('myChart-d').getContext('2d');
var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14"],
                datasets: [{
                        label: "일간",
                        backgroundColor: '#ff9800',
                        borderColor: '#ff9800',
                        data: [0, 10, 5, 2, 20, 30, 45,1,2,3,2,3,4,5],
                }]
        },

        // Configuration options go here
        options: {}
});

var ctx = document.getElementById('myChart-m').getContext('2d');
    var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                    labels: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
                    datasets: [{
                            label: "월간",
                            backgroundColor: '#ff9800',
                            borderColor: '#ff9800',
                            data: [0, 10, 5, 2, 20, 30, 45,1,2,3,4,5],
                    }]
            },

            // Configuration options go here
            options: {}
    });

var materialPicker002 = new MaterialDatepicker('#datepicker', {
    type: "date"
});

var materialPicker003 = new MaterialDatepicker('#monthpicker', {
    type: "month"
});
</script>    