<?php
get_header(); 
setlocale(LC_ALL, "sv_SE.UTF-8");
$months = cal_info(0)['months'];
$month_number = 1;
$year = 2023;
?>
<div class="content">
    <div class="calendar"><?php
    foreach($months as $month){
        ?>
        <section class="month <?php echo strtolower( $month); ?>">
            <h2><?php echo $month;?></h2>
            <div>        
                <?php

            
                $number_of_days = cal_days_in_month(CAL_GREGORIAN, $month_number, $year);
                
                for($i = 0; $i <$number_of_days; $i++){
                    $day_num = $i + 1;
                    $day_en = date("l", mktime(0, 0, 0, $month_number, $day_num, $year));
                    $ddate = $year."-".$month_number."-".$day_num;
                    $date = new DateTime($ddate);
                    $week = $date->format("W");
                    if($day_en == "Monday" || $day_num == 1){ ?> <div class='week <?php echo "week-".$week; ?>'><?php } 
                    if($day_num == 1){
                        $day_num_of_week = date("N", mktime(0, 0, 0, $month_number, 1, $year));
                        for($x = 1; $x< $day_num_of_week ; $x++){
                        if($x==1){ ?><div class="single-day monday empty"></div> <?php }
                        if($x==2){ ?><div class="single-day tuesday empty"></div> <?php }
                        if($x==3){ ?><div class="single-day wednesday empty"></div> <?php }
                        if($x==4){ ?><div class="single-day thursday empty"></div> <?php }
                        if($x==5){ ?><div class="single-day friday empty"></div> <?php }
                        if($x==6){ ?><div class="single-day saturday empty"></div> <?php }
                        }
                    }
                    ?> 
                    <div class="single-day <?php echo strtolower( $day_en); ?>">
                        <?php
                            $full_date = date("Y M d", mktime(0, 0, 0, $month_number, $day_num, $year));
                            $day_id = date("z", mktime(0, 0, 0, $month_number, $day_num, $year))+1;
                            $sv_name_of_day = strftime("%A %d", mktime(0, 0, 0, $month_number, $day_num, $year));
                            ?><p class="day-text"><?php echo $sv_name_of_day; ?></p>
                            <button type="button" onclick="loadDoc(<?php echo $day_num; ?>, '<?php echo $month; ?>', <?php echo $year; ?>)">Change Content</button>
                    </div>
                    <?php
                    if($day_en == "Sunday"){ ?></div><?php }
                }

                $month_number++;
                if($day_en <> "Sunday"){ ?></div><?php }
                ?>
            </div><!-- calendar -->
        </section><?php
        
        
    }

    ?></div>
    <div class="right-side-wrapper">

        <div id="demo">
            <h2>Let AJAX change this text</h2>
        </div>
       
        <div id="demo_two">
            <h2>Demo 2</h2>
        </div>

    </div> <!-- rightside -->
</div> <!-- content -->

<?php
//jddayofweek() //	Returns the day of the week
//jdmonthname() //	Returns a month name
get_footer();
