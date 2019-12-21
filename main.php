<?php include 'assets/inc/head.inc.php'; 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
?>

    <div>
        <img src="/assets/img/santa.png" alt="santa" id = "santa1" />
        <a class="home-nav" href="/index.php">Home</a>
        <img src="/assets/img/frosty.png" alt="frosty" id = "frosty" />
        <h1 id="kk2019">Kris Kringle 2019</h1>
    </div>
    <div class="content-wrapper">
        <form id="see-form" onSubmit="" method="POST" action="">
            <p class="spacer"><span class="preferences">I want to see..</span></p>
            <select value="" onChange="" name="name-see">
                <option value='' selected disabled >Select</option>
                <option <?php if($_POST['name-see'] == 'Adam'){ echo 'selected'; } ?>  value="Adam">Adam's</option>
                <option <?php if($_POST['name-see'] == 'Amanda'){ echo 'selected'; } ?>  value="Amanda">Amanda's</option>
                <option <?php if($_POST['name-see'] == 'Audrey'){ echo 'selected'; } ?>  value="Audrey">Audrey's</option>
                <option <?php if($_POST['name-see'] == 'Chloe'){ echo 'selected'; } ?>  value="Chloe">Chloe's</option>
                <option <?php if($_POST['name-see'] == 'Dale'){ echo 'selected'; } ?>  value="Dale">Dale's</option>
                <option <?php if($_POST['name-see'] == 'Dave'){ echo 'selected'; } ?>  value="Dave">Dave's</option>
                <option <?php if($_POST['name-see'] == 'Denise'){ echo 'selected'; } ?>  value="Denise">Denise's</option>
                <option <?php if($_POST['name-see'] == 'Dennis'){ echo 'selected'; } ?>  value="Dennis">Dennis'</option>
                <option <?php if($_POST['name-see'] == 'Emma'){ echo 'selected'; } ?>  value="Emma">Emma's</option>
                <option <?php if($_POST['name-see'] == 'Erin'){ echo 'selected'; } ?>  value="Erin">Erin's</option>
                <option <?php if($_POST['name-see'] == 'Gi'){ echo 'selected'; } ?>  value="Gi">Gi's</option>
                <option <?php if($_POST['name-see'] == 'Harry'){ echo 'selected'; } ?>  value="Harry">Harry's</option>
                <option <?php if($_POST['name-see'] == 'Jason'){ echo 'selected'; } ?>  value="Jason">Jason's</option>
                <option <?php if($_POST['name-see'] == 'John'){ echo 'selected'; } ?>  value="John">John's</option>
                <option <?php if($_POST['name-see'] == 'JP'){ echo 'selected'; } ?>  value="JP">JP's</option>
                <option <?php if($_POST['name-see'] == 'Justin'){ echo 'selected'; } ?>  value="Justin">Justin's</option>
                <option <?php if($_POST['name-see'] == 'Linda'){ echo 'selected'; } ?>  value="Linda">Linda's</option>
                <option <?php if($_POST['name-see'] == 'Lizzie'){ echo 'selected'; } ?>  value="Lizzie">Lizzie's</option>
                <option <?php if($_POST['name-see'] == 'Michelle'){ echo 'selected'; } ?>  value="Michelle">Michelle's</option>
                <option <?php if($_POST['name-see'] == 'Richie T.'){ echo 'selected'; } ?>  value="Richie T.">Richie T.'s</option>
                <option <?php if($_POST['name-see'] == 'Richie W.'){ echo 'selected'; } ?>  value="Richie W.">Richie W.'s</option>
                <option <?php if($_POST['name-see'] == 'Sam'){ echo 'selected'; } ?>  value="Sam">Sam's</option>
                <option <?php if($_POST['name-see'] == 'Steven Jr.'){ echo 'selected'; } ?>  value="Steven Jr.">Steven Jr.'s</option>
                <option <?php if($_POST['name-see'] == 'Steven Sr.'){ echo 'selected'; } ?>  value="Steven Sr.">Steven Sr.'s</option>
                <option <?php if($_POST['name-see'] == 'Tina'){ echo 'selected'; } ?>  value="Tina">Tina's</option>
                <option <?php if($_POST['name-see'] == 'Vicky'){ echo 'selected'; } ?>  value="Vicky">Vicky's</option>
            </select>
            <p class="spacer"><span class="preferences">preferred items...</span></p>
            <button type="submit" class="btn" id="see-btn" name="see-prefs" onSubmit="">Show me!</button>
<?php
    //get preferences
    //$mysqli = new mysqli("localhost", "root", " ", "kriskringle");
    $mysqli = new mysqli("thzz882efnak0xod.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "j37292f0v1vpzfk1", "ifgpishmejci95mc", "mgmvuiir2cf63tq7");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $name = $_POST['name-see'];
    if(isset($_POST['see-prefs'])){
        $results = $mysqli->query("SELECT * FROM preferences WHERE name = '{$name}';");
        $row = $results->fetch_assoc();
        if(empty($row['pref1']) && empty($row['pref2']) && empty($row['pref3'])){
?>
            <div class='alert'>
                <p>Aww! <?php echo $name ?> hasn't updated <?php echo $row['pronoun1'] ?> preferences. Message <?php echo $row['pronoun2'] ?> and tell <?php echo $row['pronoun2'] ?> to add them here!</p>
            </div>
<?php }else{ ?>
            <div class='show-prefs'>
            <p> <?php echo $row['name'] ?>'s first preference:<br> <?php echo $row['pref1']?>
            <br>
        <?php if($row['pref1link'] != ""){ ?><a href='<?php echo $row['pref1link']?>' target='_blank'>Link</a><?php } ?>
            <?php if($row['pref1note'] != ""){ ?> <p>Note: <?php echo $row['pref1note'] ?></p> <?php }?>
            </p>
            <p> <?php echo $row['name']?>'s second preference:<br> <?php echo $row['pref2']?>
            <br>
        <?php if($row['pref2link'] != ""){ ?><a href='<?php echo $row['pref2link']?>' target='_blank'>Link</a><?php } ?>
            </p>
            <p><?php echo $row['name']?>'s third preference:<br> <?php echo $row['pref3']?>
            <br>
        <?php if($row['pref3link'] != ""){ ?><a href='<?php echo $row['pref3link']?>' target='_blank'>Link</a><?php } ?>
            </p>
        </div>  
<?php        }

    }
?>
        </form>
    </div>
    <div class="content-wrapper">
        <form id="set-form" method="POST" action="">
            <p class="spacer"><span class="preferences">I am..</span></p>
            <select value="" onChange="" name ="name-set">
                <option value='' selected disabled >Select</option>
                <option <?php if($_POST['name-set'] == 'Adam'){ echo 'selected'; } ?>  value="Adam">Adam</option>
                <option <?php if($_POST['name-set'] == 'Amanda'){ echo 'selected'; } ?>  value="Amanda">Amanda</option>
                <option <?php if($_POST['name-set'] == 'Audrey'){ echo 'selected'; } ?>  value="Audrey">Audrey</option>
                <option <?php if($_POST['name-set'] == 'Chloe'){ echo 'selected'; } ?>  value="Chloe">Chloe</option>
                <option <?php if($_POST['name-set'] == 'Dale'){ echo 'selected'; } ?>  value="Dale">Dale</option>
                <option <?php if($_POST['name-set'] == 'Dave'){ echo 'selected'; } ?>  value="Dave">Dave</option>
                <option <?php if($_POST['name-set'] == 'Denise'){ echo 'selected'; } ?>  value="Denise">Denise</option>
                <option <?php if($_POST['name-set'] == 'Dennis'){ echo 'selected'; } ?>  value="Dennis">Dennis</option>
                <option <?php if($_POST['name-set'] == 'Emma'){ echo 'selected'; } ?>  value="Emma">Emma</option>
                <option <?php if($_POST['name-set'] == 'Erin'){ echo 'selected'; } ?>  value="Erin">Erin</option>
                <option <?php if($_POST['name-set'] == 'Gi'){ echo 'selected'; } ?>  value="Gi">Gi</option>
                <option <?php if($_POST['name-set'] == 'Harry'){ echo 'selected'; } ?>  value="Harry">Harry</option>
                <option <?php if($_POST['name-set'] == 'Jason'){ echo 'selected'; } ?>  value="Jason">Jason</option>
                <option <?php if($_POST['name-set'] == 'John'){ echo 'selected'; } ?>  value="John">John</option>
                <option <?php if($_POST['name-set'] == 'JP'){ echo 'selected'; } ?>  value="JP">JP</option>
                <option <?php if($_POST['name-set'] == 'Justin'){ echo 'selected'; } ?>  value="Justin">Justin</option>
                <option <?php if($_POST['name-set'] == 'Linda'){ echo 'selected'; } ?>  value="Linda">Linda</option>
                <option <?php if($_POST['name-set'] == 'Lizzie'){ echo 'selected'; } ?>  value="Lizzie">Lizzie</option>
                <option <?php if($_POST['name-set'] == 'Michelle'){ echo 'selected'; } ?>  value="Michelle">Michelle</option>
                <option <?php if($_POST['name-set'] == 'Richie T.'){ echo 'selected'; } ?>  value="Richie T.">Richie T.</option>
                <option <?php if($_POST['name-set'] == 'Richie W.'){ echo 'selected'; } ?>  value="Richie W.">Richie W.</option>
                <option <?php if($_POST['name-set'] == 'Sam'){ echo 'selected'; } ?>  value="Sam">Sam</option>
                <option <?php if($_POST['name-set'] == 'Steven Jr.'){ echo 'selected'; } ?>  value="Steven Jr.">Steven Jr.</option>
                <option <?php if($_POST['name-set'] == 'Steven Sr.'){ echo 'selected'; } ?>  value="Steven Sr.">Steven Sr.</option>
                <option <?php if($_POST['name-set'] == 'Tina'){ echo 'selected'; } ?>  value="Tina">Tina</option>
                <option <?php if($_POST['name-set'] == 'Vicky'){ echo 'selected'; } ?>  value="Vicky">Vicky</option>
            </select>
            <p class="spacer"><span class="preferences">and my top 3 items are...</span></p>
            <span class="preferences clear">Preference 1:</span>
            <input class = "clear" type="text" name="pref1" id="pref1" value='<?php echo $_POST['pref1'] ?>'>
            <span class="preferences clear">Link to item:</span>
            <input class = "clear" type="text" name="pref1link" id="pref1link" value='<?php echo $_POST['pref1link'] ?>'>
            <span class="preferences clear">Notes:</span>
            <input class = "clear" type="text" name="pref1note" id="pref1note" value='<?php echo $_POST['pref1note'] ?>'>
            <hr>
            <span class="preferences clear">Preference 2:</span>
            <input class = "clear" type="text" name="pref2" id="pref2" value='<?php echo $_POST['pref2'] ?>'>
            <span class="preferences clear">Link to item:</span>
            <input class = "clear" type="text" name="pref2link" id="pref2link" value='<?php echo $_POST['pref2link'] ?>'>
            <span class="preferences clear">Notes:</span>
            <input class = "clear" type="text" name="pref2note" id="pref2note" value='<?php echo $_POST['pref2note'] ?>'>
            <hr>
            <span class="preferences clear">Preference 3:</span>
            <input class = "clear" type="text" name="pref3" id="pref3" value='<?php echo $_POST['pref3'] ?>'>
            <span class="preferences clear">Link to item:</span>
            <input class = "clear" type="text" name="pref3link" id="pref3link" value='<?php echo $_POST['pref3link'] ?>'>
            <span class="preferences clear">Notes:</span>
            <input class = "clear" type="text" name="pref3note" id="pref3note" value='<?php echo $_POST['pref3note'] ?>'>
            <hr>
            <button type="submit" class="btn" id="set-btn" name="set-prefs">Submit</button>
            <button type="submit" class="btn" id="set-btn" name="clear-prefs">Delete my preferences and start over</button>
<?php
    //set preferences
    //$conn = new mysqli("localhost", "root", "", "kriskringle");
    $conn = new mysqli("thzz882efnak0xod.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "j37292f0v1vpzfk1", "ifgpishmejci95mc", "mgmvuiir2cf63tq7");
    if ($conn->connect_errno) {
       echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    }

    $name2 = $_POST['name-set'];

    if(isset($_POST['clear-prefs'])){
        $emptyString = "";
        $clear = $conn->prepare('UPDATE preferences SET pref1 = ?, pref1link = ?, pref2 = ?, pref2link = ?, pref3 = ?, pref3link = ? WHERE name = "'.$name2.'";');
        $clear->bind_param("ssssss", $emptyString,$emptyString,$emptyString,$emptyString,$emptyString,$emptyString,); 
        if($clear->execute()){
            echo "<div class='saved'>Preferences Reset!</div>";
            echo "<script>document.getElementsByClassName('clear').value='';</script>";
        }
        else{
            echo "<div id='fail'>Uh Oh! Something went wrong, none of your preferences were cleared. Email me at <a href='mailto:dmoore092@gmail.com'>dmoore092@gmail.com</a></div>";
        }
    }
    else if(isset($_POST['set-prefs'])){
        $pref1 = $_POST['pref1'];
        $pref1link = $_POST['pref1link'];
        $pref2 = $_POST['pref2'];
        $pref2link = $_POST['pref2link'];
        $pref3 = $_POST['pref3'];
        $pref3link = $_POST['pref3link'];

        //$pref1 = mysql_real_escape_string($pref1);
        if($pref1 != ''){
            $stmt = $conn->prepare('UPDATE preferences SET pref1 = ?, pref1link = ? WHERE name = "'.$name2.'";');
            $stmt->bind_param("ss", $pref1, $pref1link); // 's' specifies the variable type => 'string'
            if($stmt->execute()){
                $success1 = true;
            }
            else{
                $success1 = false;
            }
        }
        if($pref2 != ''){
            $stmt = $conn->prepare('UPDATE preferences SET pref2 = ?, pref2link = ?  WHERE name = "'.$name2.'";');
            $stmt->bind_param("ss", $pref2, $pref2link); // 's' specifies the variable type => 'string'
            if($stmt->execute()){
                $success2 = true;
            }
            else{
                $success2 = false;
            }
        }
        if($pref3 != ''){
            $stmt = $conn->prepare('UPDATE preferences SET pref3 = ?, pref3link = ? WHERE name = "'.$name2.'";');
            $stmt->bind_param("ss", $pref3, $pref3link); // 's' specifies the variable type => 'string'
            if($stmt->execute()){
                $success3 = true;
            }
            else{
                $success4 = false;
            }
        }
        if($success1 == true || $success2 == true || $success3 == true){
            echo "<div class='saved'>Preferences Saved!</div>";
            echo "<script>document.getElementsByClassName('clear').value='';</script>";
        }
        else{
            echo "<div id='fail'>Uh Oh! Something went wrong, none of your preferences were saved. Email me at <a href='mailto:dmoore092@gmail.com'>dmoore092@gmail.com</a></div>";

        }
    }
?>
        </form>
      </div>
<?php include 'assets/inc/footer.inc.php'; ?>
