<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chatbox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script>
        function submitChat() {
            if(form1.uname.value =='' || form1.msg.value ==''){
                alert('All FIELDS ARE MANDATORY!!');
                return;
            }
            var uname =form1.uname.value;
            var msg = form1.msg.value;
            var xmlhttp = new XMLHttpRequest();

            xmlhtttp.onreadystatechange = function(){
                if(xmlhttp.readyState==4&&xmlhttp.status == 200){
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg+,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <form name="form1">
        Chatname:<input type="text" name="uname" value=""><br/>
       Enter Message: <textarea  name="msg" rows="5" cols="10"></textarea><br/>
       <a href="#" onclick="submitChat()">Send</a><br/><br/>


    </form>

    <div id="chatlogs">
        Loading messages...
    </div>

</body>
</html>