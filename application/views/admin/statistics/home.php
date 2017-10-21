<?
$statistics = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $statistics = $response['data']['out'];
    };
};
?>
<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>통계</h4>
                        <form method="get" enctype="application/x-www-form-urlencoded">                    
                            <a class="waves-effect waves-light btn" href="/admin/statistics/day">일간</a>
                            <a class="waves-effect waves-light btn" href="/admin/statistics/month">월간</a>
                    
                        <?
                        if ( $sub_key == 'day' ) {
                            ?> 
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="datepicker" name="date" value="<? echo $date; ?>">
                                    </div>
                                    <div class="input-field col s12">                                    
                                        <button type="submit" class="waves-effect waves-light btn">통계보기</button>
                                    </div>                                        
                                </div>
                                <canvas id="myChart-d"></canvas>
                            </div>
                            <?
                        } elseif ( $sub_key == 'month' ) {
                            ?> 
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="monthpicker" name="date" value="<? echo $date; ?>">
                                    </div>
                                    <div class="input-field col s12">                                    
                                        <button type="submit" class="waves-effect waves-light btn">통계보기</button>
                                    </div>    
                                </div>
                                <canvas id="myChart-m"></canvas>
                            </div>
                            <?                            
                        }
                        ?>
                    </form>                    
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/FreddyFY/material-datepicker/master/dist/material-datepicker-with-moment-js.js"></script>
<?
if ( $sub_key == 'day' ) {
    $labels = FALSE;
    $data = FALSE;
    if ( $statistics ) {
        $j = count($statistics);
        for ( $i = 0; $i < count($statistics); $i++ ) {
            $row = $statistics[$j-1];
            if ( $labels ) {
                $labels = $labels.',"'.$row['statistics_date'].'"';                                
                $data = $data.','.$row['statistics_cnt'];
            } else {
                $labels = $labels.'"'.$row['statistics_date'].'"';                                
                $data = $data.''.$row['statistics_cnt'];                
            };            
            $j--;
        };
    };
    ?> 
<script>
var ctx = document.getElementById('myChart-d').getContext('2d');
var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
                labels: [<? echo $labels; ?>],
                datasets: [{
                        label: "일간",
                        backgroundColor: '#ff9800',
                        borderColor: '#ff9800',
                        data: [<? echo $data; ?>],
                }]
        },

        // Configuration options go here
        options: {}
});    
</script>
    <?
} elseif ( $sub_key == 'month' ) {
    $labels = FALSE;
    $data = FALSE;
    if ( $statistics ) {
        $j = count($statistics);
        for ( $i = 0; $i < count($statistics); $i++ ) {
            $row = $statistics[$j-1];
            if ( $labels ) {
                $labels = $labels.',"'.$row['statistics_date'].'"';                                
                $data = $data.','.$row['statistics_cnt'];
            } else {
                $labels = $labels.'"'.$row['statistics_date'].'"';                                
                $data = $data.''.$row['statistics_cnt'];                
            };            
            $j--;
        };
    };
    ?> 
<script>
var ctx = document.getElementById('myChart-m').getContext('2d');
var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
                labels: [<? echo $labels; ?>],
                datasets: [{
                        label: "월간",
                        backgroundColor: '#ff9800',
                        borderColor: '#ff9800',
                        data: [<? echo $data; ?>],
                }]
        },

        // Configuration options go here
        options: {}
});    
</script>
    <?                            
}
?>
<script>
var materialPicker002 = new MaterialDatepicker('#datepicker', {
    type: "date",
    outputFormat: 'YYYY-MM-DD'
});

var materialPicker003 = new MaterialDatepicker('#monthpicker', {
    type: "month",
    outputFormat: 'YYYY-MM-DD'    
});
</script>    