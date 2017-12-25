<?php
    $count = get_car_page_count($v);
    $count++;
    increase_car_page_count($v);
    $minDigits = 4;
    $page_count = str_pad($count, $minDigits, '0', STR_PAD_LEFT);

?>

<div class="page-count text-center">
    <span class="page-views"> Page View(s)</span>   

    <span class="count">
    <?php
        $strlen = strlen($page_count);
        for ($i = 0; $i <$strlen; $i++) {
            $char= substr($page_count, $i, 1); 
        ?>
            <span class=" text-center digit <?= $i==$strlen-1 ? 'digit-border-left':'' ?>">
                <?= $char ?>
            </span>
    
        <?php
        }?>
    </span>

    <span class="social-share">
        Social Share :
        <a class="facebook_share facebook_share_page_count" data-url="classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/" data-text="CANON CAMERA 7-D IN BOX">
            <i class="fa fa-facebook" style="color:rgb(55,0,255)"></i>
        </a>
        <a class="box" target="_blank" href="https://twitter.com/share">
            <i class="fa fa-twitter" style="color:rgb(0,255,255)"></i>
        </a>
    </span>
</div>

<style>
    .page-count{
        background-color: rgba(202, 223, 249, .25);
        padding: 20px;
    }
    .page-views, .social-share{
        font-size: 1.4em;
        font-weight: 700;
    }
    
    .count{
        padding: 0 10px;
    }
    .digit{
        margin: -10px 0;
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
        border-left: 1px solid gray;
        padding: 15px;
        background-color: rgb(204,204,204);
    }
    .digit-border-left{
        border-right: 1px solid gray;
    }
    .page-count * {
        text-decoration: none !important;
    }
    .facebook_share_page_count * {
        color: rgb(55,0,255) !important; 
    }
    .facebook_share_page_count span:last-child{
        display: none;
    }
</style>