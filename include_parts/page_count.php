<?php
    $count = get_general_item_page_count($v);
    $count++;
    increase_general_item_page_count($v);
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
        Sicial Share :
        <i class="fa fa-facebook" style="color:rgb(55,0,255)"></i>
        <i class="fa fa-twitter" style="color:rgb(0,255,255)"></i>
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
</style>