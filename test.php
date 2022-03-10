<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

    <script>
        function Send_Data() 
        {
            var name = document.getElementById("name").value;
            var cont = document.getElementById("cont").value;

            var httpr = new XMLHttpRequest();

            httpr.open("POST", "test-1.php", true);
            httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            httpr.onreadystatechange = function()
            {
                if(httpr.readyState==4 && httpr.status==200)
                {
                    document.getElementById("response").innerHTML=httpr.responseText;
                }
            }
            httpr.send("name="+name+"&cont="+cont);

        }
    </script>
</head>
<body>
    <div class="form">
        <center>
            <h3>Ajax Example</h3>
        </center>
        <hr>
        <input type="text" name="" id="name">
        <br>
        <input type="text" name="" id="cont">
        <br>
        <input type="button" value="Submit" onclick="Send_Data()"><br>
        <span id="response"></span>
    </div>
</body>
</html>