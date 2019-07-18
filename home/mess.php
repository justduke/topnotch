<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <script>
        function submitChat() {
            if (form1.uname.value==''|| form1.mess.value=='') {
                alert('All fields are mandatory');
                return;
            }

            var uname = form1.uname.value;
            var mess  = form1.mess.value;
            var xmlhttp = new XMLhttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == ) {
                    
                }
            }
        }
    </script>

</head>
<body>
    <form name="form1">
        Chat Name: <input type="text" name="uname"> </br>
        Your Message: </br>
        <textarea rows="30" name="mess" cols="40"></textarea></br>

        <a href="$" onclick="">Send</a></br></br>
        
    </form>
<div id="chatlogs">
    Loading Chatlogs please wait....
</div>
</body>
</html>