<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <style type="text/css">
    body{
      margin:0;
      padding:0;
    }
    .main_info th, .main_info td{
        padding:8px;
        border: 1px solid #c3c3c3;
        border-collapse: collapse;
        color: #565656;
    }
    .main_info{
        border-collapse: collapse;
    }
    .details p{
    margin: 8px 0;
    color:#152c3b;
    }
    .details h2{
    color:#152c3b;
    }
    
    @media (max-width:600px){
    table.main_outter {
        width: 100% !important;
        padding: 0 15px !important;
    }
.details td{
  width:100% !important;
}   
    }
</style>
</head>
    <body>
        <?php $header = getThemeOptions('header'); ?>
        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="600px" id="bodyTable" style="background: #ececec;padding: 20px 0px 40px;" >
           <tr>
                <td>
                 
                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                        <tr>
                            <td style="text-align:center;padding: 0 0 20px;">
                                <img style="width: 200px;" src="<?php echo publicPath().'/'.$header['headerlogo'] ?>">
                            </td>
                        </tr>
                    </table>
                <table align="center" border="0"  height="100%" width="600px" class="main_outter" style="padding: 0 15px;">
                 <tr>
                 <td>
                    <table border="0" cellpadding="0" cellspacing="0"  style="margin:auto; width: 100%;">
                        <tr>
                                <td align="center" valign="top" id="templatePreheader" style="padding:15px 15px;background:#ffffff;">
                                    <h1 style="    color: #565656;font-size: 16px;">Thanks for your subscription at <a href="<?php echo siteUrl() ?>" style="color: #ff5c7a !important; text-decoration: none;"><?php echo appName() ?></a></h1>
                                </td>
                        </tr>
                    </table>
                    <table class="footer" style="margin:auto;">
                        <tr>
                            <td>
                                <h5 style="margin-bottom:0;">Need Support ?</h5>
                                <p style="margin-top:8px;">Feel free to email us if you have any questions, comments or suggestions. We'll be happy to resolve your issues.</p>
                            </td>
                            
                        </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                </td>
           </tr>
        </table>
        
    </body>
</html>    
