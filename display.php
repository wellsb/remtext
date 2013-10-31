<!DOCTYPE html>
<html>
    <head>
        <title>Remtext Display</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="remote.css" />
        <script type="text/javascript" src="http://shuttle.brendanwells.co.uk/webdev/jquery/jquery.js"></script>
    </head>
    <body>
        <div id="output" align="center">
            <script type="text/javascript">
                var count = "0";
                var updrate = "1000";
                var bgcolor;
                var size;
                function getUpdate() {

                $.ajax({
                    url: 'handler.php',
                    data: "",
                    dataType: 'json',
                    success: function(data)
                    {
                        user = data[1];
                        curdata = data[3];
                        bgcolor = data[4];
                        size = data[5];
                        debug = data[6];
                    }
                    });
                    count++;
                    if (debug == "1") {
                        $("div#output").text('us:'+user+' co:'+count+' co:'+bgcolor+' ur:'+updrate+' si:'+size+ ' de:' + debug+' te:' + curdata);
                    } else {
                        $("div#output").text(curdata);
                    }

                    $("#output").css("background-color", '#'+bgcolor);
                    $("#output").css("font-size", +size);
                }
                window.onload = setInterval("getUpdate()",updrate);
            </script>
        </div>
    </body>
</html>