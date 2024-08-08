<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for submitting your video!</title>
</head>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color:#fff;">
        <tbody>
            <tr>
                {{-- @dd( $data) --}}
                <td align="center" valign="top">
                    <table border="0" cellspacing="0" cellpadding="0"
                        style="border-radius:20px;background:#F8F8F8;width: 700px; padding-top: 25px; padding-bottom: 40px;  margin: 0 auto; padding: 30px;">
                        <tbody>
                            <tr>
                                <td colspan="4" valign="top"
                                    style="text-align: left; font-weight: 500; color: #000; padding-bottom: 5px; padding-top: 20px;">
                                    <div style="margin-bottom:8px">Dear, Shuvo </div>
                                    <div style="color:#6D6D6D;line-height: 24px; font-weight: 400;">
                                        {!! $data->body !!}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('login') }}">Login Here</a>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" valign="top"
                                    style="text-align: left; font-weight: 500; color: #000; padding-bottom: 5px; padding-top: 20px;">
                                    <div style="color:#6D6D6D;line-height: 24px; font-weight: 400;">
                                        Kind regards, <br>
                                        Team SohojWare
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
