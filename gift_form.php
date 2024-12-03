<!DOCTYPE html>
<html>
<head>
    <title>Gift Selector</title>
</head>
<body>
    <h1>Gift Selector</h1>
    <?php


    $gifts = [
        "Book", "Toy", "Gadget", "Video Game", "Headphones",
        "Smartphone", "Laptop", "Watch", "Shoes", "Wallet",
        "Headset", "Camera", "Drone", "Smart Watch", "Bluetooth Speaker"
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $selected_indices = $_POST['indices'] ?? [];
        $indices_str = implode(",", $selected_indices);

        $command = escapeshellcmd("python3 gift_selector.py $indices_str");
        $output = shell_exec($command);


        echo $output;
    } else {
        echo '<form method="post">';
        echo '<p>Select gifts:</p>';
        echo '<select name="indices[]" multiple>';
        foreach ($gifts as $index => $gift) {
            echo "<option value=\"$index\">$gift</option>";
        }
        echo '</select>';
        echo '<br><br>';
        echo '<button type="submit">Submit</button>';
        echo '</form>';
    }
    ?>
</body>
</html>
