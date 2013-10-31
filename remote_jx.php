<!DOCTYPE html>
<html>
    <head>
        <title>RemoteJX</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="remote.css" />
        <link rel="Stylesheet" type="text/css" href="http://shuttle.brendanwells.co.uk/webdev/jquery/plugins/jpicker116/jPicker.css" />
        <link rel="Stylesheet" type="text/css" href="http://shuttle.brendanwells.co.uk/webdev/jquery/plugins/jpicker116/css/jPicker-1.1.6.min.css" />
        <script type="text/javascript" src="http://shuttle.brendanwells.co.uk/webdev/jquery/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="http://shuttle.brendanwells.co.uk/webdev/jquery/plugins/jpicker116/jpicker-1.1.6.min.js"></script>
    </head>
    <body>

        <?php
            include('remtextlib.php');
            $dbaction = new dbstuff();
            $tools = new Tools();
            $dbaction->dbconnect();

             session_start();

            if (empty($_SESSION['uid'])) {
                $_SESSION['uid'] = $tools->genrandom();
            }
        ?>

        <script type="text/javascript">
            var jsu = "<?php echo $_SESSION['uid'];?>";
            var count = "0";
            var checkstate = "0";
            function sendUpdate() {

                if ($("#debugin").is(":checked")) {
                checkstate = "1";
                } else {
                checkstate = "0";
                }

                $.ajax({
                    type: 'POST',
                    data: {uid: jsu, data: $("#textin").val(), colo: $("#coloin").val(), size: $("#sizein").val(), debug: +checkstate},
                    url: 'handler.php',
                    cache:false
                });

                count++;
                refreshRemote();
            }

            function refreshRemote() {
                $("div#outputremote").text(' co:'+count+' us:'+jsu+ ' co:'+$("#coloin").val()+' si:'+$("#sizein").val()+ ' de:'+checkstate+' te:'+$("#textin").val());
            }

            $("#textin").live('input', sendUpdate);
            $("#coloin").click('input', sendUpdate);
            $("#sizein").live('input', sendUpdate);

            window.onload = function() {
                refreshRemote();
                $('#coloin').jPicker({
                    //window:{position:{x:'30',y:'center'},expandable: false,liveUpdate: true}
                    images:{
                        clientPath: 'http://shuttle.brendanwells.co.uk/webdev/jquery/plugins/jpicker116/images/'
                    }
                }
                );
            };
        </script>

        <div id="outputremote">
        </div>

        <div id="formin">
            <form>
                <textarea id="textin" name="textin" cols="77" rows="5">-</textarea><br>
            <div id="sendnow" align="center">
                <script type="text/javascript">
                    $("#sendnow").click(function() {
                        sendUpdate();
                    });
                </script>
            F O R C E | S E N D
            </div>
                <input id="coloin" type="text" value="e2ddcf" />
                <textarea id="sizein" name="sizein" cols="4" rows="1">100</textarea>
                <input type="checkbox" id="debugin" name="debugin" value="0" />
            </form>
        </div>
    </body>
</html>