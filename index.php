<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">

    <title>How Much You Make</title>
</head>
<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="period">Period</label>
                <select class="form-control" id="period">
                    <option value="8760">Year (8 hours per day)</option>
                    <option value="720">Month(8 hours per day)</option>
                    <option value="1">Hour</option>
                </select>
            </div>
            <div class="form-group">
                <label for="income">How Much You Make</label>
                <input type="number" class="form-control" id="income" placeholder="Enter how much you make" value="1">
                <small>Please enter the amount in US dollars.</small>
            </div>
            <input type="hidden" id="menu-coin" value="dollar">
            <img src="images/goldkilo.png" class="menu-coin" new-type="goldkilo">
            <img src="images/dollar.png" class="menu-coin" new-type="dollar">
            <img src="images/quarter1.png" class="menu-coin" new-type="quarter">
            <img src="images/cent.png" class="menu-coin" new-type="cent">
            <br>
            <small>Select a coin</small><br>
            <br>
            <button class="btn btn-primary" id="message"></button>
            <br>
            <div class="form-group">
                <label for="template">Templates</label>
                <select class="form-control" id="template">
                    <option readonly>Templates</option>
                    <?php
                    $templates = [
                        'US Senator' => '476',
                        'US Supreme Court Judge' => '731',
                        'US President' => '1095',
                        'Sean Hannity' => '98630',
                        'Steve Harvey' => '123287',
                        'Bill Gates' => '10959000',
                        'Elon Musk' => '800000000',
                        'Jeff Bezos' => '321000000',
                    ];
                    foreach ($templates as $name => $value) {
                        echo "<option value='" . $value * 365 . "'>$name $" . number_format($value * 365, 2, '.', ',') . "</option>";
                    }
                    ?>
                </select>
        </div>
    </div>
</div>
<div id="game">
    <img src="images/valve1.png" id="valve">
    <img src="images/cochinito.png" id="piggy">
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="js/coins.js"></script>

<script>
    let coins = new Coins();
    $(document).ready(function(){
        $('.menu-coin').click(function(){
            $('.menu-coin').removeClass('selected');
            $(this).addClass('selected');
            $('#menu-coin').val($(this).attr('new-type'));
            coins.incomeChange();
        })

        $('#template').on('change', function() {
            $('#income').val($(this).val());
            $('#period[value=8760]').attr('selected', 'selected');

            $('.menu-coin').removeClass('selected');
            let coin = 'cent';
            if (parseInt($('#income').val()) > 10000000) {
                coin = 'dollar';
            }
            if (parseInt($('#income').val()) > 1000000000) {
                coin = 'goldkilo';
            }
            $('.menu-coin[new-type="' + coin + '"').addClass('selected');
            $('#menu-coin').val(coin);
            coins.incomeChange();
        })

        window.onresize = function() {
            location.reload();
        }
    });
</script>
</body>
</html>