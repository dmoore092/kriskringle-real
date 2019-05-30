
<?php include 'assets/inc/head.inc.php'; ?>

    <div>
        <p class="welcome">Welcome</p>
        <img src="/assets/img/santa.png" alt="santa" class='santa' />
        <p class='pc'>To The Polish Campout</p>
        <p class='pc'>Kris Kringle 2019</p>
    </div>
    <div class='content-wrapper'>
        <form onsubmit="event.preventDefault(); return check(this)" class='login-form' method='POST' action='main.php'>
            <div class="login-wrap">
                <div id="prompt-wrap">
                    <label class='prompt'>Who hosted the 2018 Polish Campout?</label>
                    <input type="text" name='host' value="" onChange="" class='login-text' placeholder='Last Name' />
                </div>
                <input type="submit" name="login" value="Submit" class="btn" id="login-btn" />
            </div>
        </form>
    </div>
<script>
    function check(event){
        if(document.getElementsByClassName('login-text')[0].value == 'Dorofee' || document.getElementsByClassName('login-text')[0].value == 'dorofee'){
            window.location.href = "/main.php";
        }
        else{

            var loginFail = document.createElement('div');
            loginFail.setAttribute('id', 'fail');
            var failText = document.createElement('p');
            failTextContent = document.createTextNode('Whoops, that\'s not it!');

            failText.appendChild(failTextContent);
            loginFail.appendChild(failText);
            document.getElementsByTagName('form')[0].appendChild(loginFail);


        }
    }
</script>
<?php include 'assets/inc/footer.inc.php'; ?>
