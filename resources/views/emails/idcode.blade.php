<!doctype html>
<html>
<head>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <center>
    <table width="600" cellspacing="0" cellpadding="0" bordercolor="#eeeeee" border="20" bgcolor="#FFFFFF"  style="border-color: #eeeeee #eeeeee #eeeeee #eeeeee; font-size: 12px; border-collapse: collapse; background-color: #ffffff; line-height: 20px; font-family: Arial, sans-serif; color: #666666; border-spacing: 0px; border-style: solid solid solid solid; border-width: 20px 20px 20px 20px;" frame="border" rules="none" dir="rtl">
        <tr>
            <td style="color: #666666; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;padding: 12px;">
                <div  style="     text-align: center;">
                    <img alt="Bright Creations" src="{{ asset('/images/BC_Signature.gif')}}">
                </div>
                <p style='color: #4285f4;
                  font-family: "Roboto",OpenSans,"Open Sans",Arial,sans-serif;
                  font-size: 32px;
                  font-weight: 300;
                  line-height: 46px;
                  margin: 0;
                  padding: 0 25px 0 25px;
                  text-align: center;'>
                  Hello , {{$name}}
                </p>
                <br>
                <hr height="1"
                  style="color: #eeeeee;
                  background: #eeeeee;
                  border: 0;
                  height: 1px;
                  background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);">
            		<br>
                <div style="    font-family: Verdana,Tahoma,Arial,Helvetica,sans-serif;    font-size: 14px;">
                    <h1 style="text-align: center;">activation code</h1>
                    <h3 style="text-align: center; background-color: #ccc; width:200px; margin: 0 auto;">{{$idcode}}</h3>


                    <a href="{{ url('/c/'.$idcode.'/'.$id)  }}" style="text-align: center;
                                                        display: block;
                                                        background-color: #4cae4c;
                                                        color: #fff;
                                                        text-decoration: none;
                                                        padding: 10px;
                                                        width: 190px;
                                                        font-size: 18px;
                                                        margin: 15px auto;
                                                        border-radius: 4px;" >
                      Verify email address
                    </a>
                  </div>

                  <br>
                  <hr height="1"
                    style="color: #eeeeee;
                    background: #eeeeee;
                    border: 0;
                    height: 1px;
                    background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                    background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                    background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                    background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);">
                  <br>
                    <div  style="    font-family: Verdana,Tahoma,Arial,Helvetica,sans-serif;    font-size: 14px;    text-align: center;">
                        <a href="{{ asset('/') }}" style=" color: #292827; font-size: 15px; font-weight: bold; text-decoration: none;">
                            Bright Creations
                        </a>
                    </div>
            </td>
        </tr>
    </table>
  </center>
</body>
</html>
