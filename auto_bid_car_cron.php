<?php
    include 'function.php';
    $query = "select DISTINCT(bid.acm_id), car.listing_length from ambit_car_bid as bid left join add_car_motorcycle as car on bid.acm_id = car.acm_id where car.status = 1 and car.sold_status = 0";
    $results = mysqli_query($conn, $query);
    $cars = [];
    if (!$results) {
        exit('404');
    }
    while ($row = mysqli_fetch_assoc($results)) {
        $cars[] = $row;
    }
    foreach ($cars as $car) {
        if (expired($car)) {
            continue;
        }

        // select auto bidders
        $query = "select * from ambit_car_bid where acm_id={$car['acm_id']} and auto_bid > 0 order by auto_bid asc, acb_id desc";
        $results = mysqli_query($conn, $query);
        $bidders = [];
        if ($results) {
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
            echo '----------------single--------------start<br>';
            // if one:
            // make him highest bidder if not also check his limit
            // if out of his limit then send him email if required
            $bidder = $bidders[0];
            $higest_bid=higest_bid_car($car["acm_id"]);
            if ($bidder['bid_price'] == $higest_bid) {
                echo 'continue<br>';
                echo '----------------single--------------end<br>';
                continue;
            } else {
                $next_bid  = $higest_bid + 0.50;
                echo "next:$next_bid<br>";
                if ($next_bid <= $bidder['auto_bid']) {
                    updateBidOnCar($car["acm_id"], $bidder['cus_id'], $next_bid);
                } else {
                    // updateBidOnCar($car["acm_id"], $bidder['cus_id'], $bidder['auto_bid']);
                    echo 'send someone out bidded you mail';
                }
            }
            echo '----------------single--------------end<br>';
        } elseif ($count > 1) {
            echo '----------------multiple--------------start<br>';
            $highestBidder = $bidders[$count - 1];
            foreach ($bidders as $bidder) {
                if (!($bidder['cus_id'] == $highestBidder['cus_id'])) {
                    if ($bidder['auto_bid'] <= $highestBidder['auto_bid']) {
                        if ($bidder['bid_price'] < $bidder['auto_bid']) {
                            // updateBidOnCar($car["acm_id"], $bidder['cus_id'], $bidder['auto_bid']);
                            // email to say you have been out bidded
                            // sendOutBiddedMailOnCar($bidder);
                            echo "you have been out bidded {$bidder['cus_id']}<br>";
                        }
                    }
                } else {
                    $current_highest_bid = higest_bid_car($car["acm_id"]);
                    if ($current_highest_bid !== $bidder['bid_price']) {
                        $next_bid = $current_highest_bid + 0.50;
                        echo '$'.$next_bid;
                        if ($next_bid <= $bidder['auto_bid']) {
                            updateBidOnCar($car["acm_id"], $bidder['cus_id'], $next_bid);
                        } else {
                            updateBidOnCar($car["acm_id"], $bidder['cus_id'], $bidder['auto_bid']);
                        }
                    }
                }
                echo "{$bidder['cus_id']} | {$bidder['acm_id']}<br>";
            }
            echo '----------------multiple--------------end<br>';
        }
    }
