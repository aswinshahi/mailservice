@component('mail::message')
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    </head>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="text-align: -webkit-center;height: 80px; width: 50%; background-color: #628930; padding-left: 50px;">
                   <h1 style="color:#fff;font-size:24px;font-weight:600;text-align:center;">Free Mail Service</h1>
            </td>
            <td style="height: 80px; width: 50%;background-color: #628930; text-align: center; padding-right:30px;">
            </td>
        </tr>
            <tr>
                <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0 30px;background:#ffffff;text-align:left;width:100%;">
                    <p style="text-align:center;color:#474747;font-size:18px;line-height:24px;font-family:'poppins', sans-serif;font-weight:400;margin:1em 0 30px">Hi, {{$mail["sender_name"]}}</p>
                </td>
            </tr>
        <tr>
            <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0 30px;background:#ffffff;text-align:left;width:100%;">
                <p style="text-align:center;color:#474747;font-size:18px;line-height:24px;font-family:'poppins', sans-serif;font-weight:400;margin:1em 0 30px">{{$mail["body"]}}</p>
            </td>
        </tr>
    </table>
@endcomponent 
