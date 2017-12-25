<?php
    include 'function.php';
    $query = "select DISTINCT(bid.agi_id), item.listing_length from ambit_general_item_bid as bid left join add_general_items as item on bid.agi_id = item.agi_id where item.status = 1 and item.sold_status = 0";
    $results = mysqli_query($conn, $query);
    $general_items = [];
    if(!$results){
        exit('404');
    }
    while ($row = mysqli_fetch_assoc($results)) {
        $general_items[] = $row;
    }
    foreach ($general_items as $general_item) {
        if(expired($general_item)){
            continue;
        }

        // select auto bidders
        $query = "select * from ambit_general_item_bid where agi_id={$general_item['agi_id']} and auto_bid > 0 order by auto_bid asc, agib_id desc";
        $results = mysqli_query($conn, $query);
        $bidders = [];
        if($results){
            while ($row = mysqli_fetch_assoc($results)) {
                $bidders[] = $row;
            }
        }
        $count = count($bidders);
        
        if ($count <= 0) {
            // if none:
            // continue
            continue;
        } elseif ($count == 1) {
            // echo '----------------single--------------start<br>';
            // if one:
            // make him highest bidder if not also check his limit
            // if out of his limit then send him email if required
            $bidder = $bidders[0];
            $higest_bid=higest_bid_general_item($general_item["agi_id"]);
            if ($bidder['bid_price'] == $higest_bid) {
                // echo 'continue<br>';
                // echo '----------------single--------------end<br>';
                continue;
            } else {
                $next_bid  = $higest_bid + 0.50;
                // echo "next:$next_bid<br>";
                if ($next_bid <= $bidder['auto_bid']) {
                    updateBidOnItem($general_item["agi_id"], $bidder['cus_id'], $next_bid);
                } else {
                    updateBidOnItem($general_item["agi_id"], $bidder['cus_id'], $bidder['auto_bid']);
                    // echo 'send someone out bidded you mail';
                }
            }
            // echo '----------------single--------------end<br>';
        } elseif ($count > 1) {
            // echo '----------------multiple--------------start<br>';
            $highestBidder = $bidders[$count - 1];
            foreach ($bidders as $bidder) {
                if (!($bidder['cus_id'] == $highestBidder['cus_id'])) {
                    if ($bidder['auto_bid'] <= $highestBidder['auto_bid']) {
                        if ($bidder['bid_price'] < $bidder['auto_bid']) {
                            updateBidOnItem($general_item["agi_id"], $bidder['cus_id'], $bidder['auto_bid']);
                            // email to say you have been out bidded
                            sendOutBiddedMailOnItem($bidder);
                            echo "you have been out bidded {$bidder['cus_id']}<br>";
                        }
                    }
                } else {
                    $current_highest_bid = higest_bid_general_item($general_item["agi_id"]);
                    if ($current_highest_bid !== $bidder['bid_price']) {
                        $next_bid = $current_highest_bid + 0.50;
                        echo '$'.$next_bid;
                        if ($next_bid <= $bidder['auto_bid']) {
                            updateBidOnItem($general_item["agi_id"], $bidder['cus_id'], $next_bid);
                        } else {
                            updateBidOnItem($general_item["agi_id"], $bidder['cus_id'], $bidder['auto_bid']);
                        }
                    }
                }
                // echo "{$bidder['cus_id']} | {$bidder['agi_id']}<br>";
            }
            // echo '----------------multiple--------------end<br>';
        }
    }
