{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; line-height: 24px;">
    <div style="max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); font-size: 16px;">
        <table cellpadding="0" cellspacing="0" style="width: 100%; line-height: inherit; text-align: left; border-collapse: collapse;">
            <tr class="top">
                <td colspan="2" style="padding-bottom: 20px;">
                    <table style="width: 100%;">
                        <tr>
                            <td class="title" style="font-size: 45px;">
                                <p>Event Informatics 24</p>
                            </td>
                            <td style="text-align: right; padding-top: 100px">
                                Invoice #{{$code_payment}}<br>
                                Created: {{$payment->created_at}}<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2" style="padding-bottom: 40px;">
                    <table style="width: 100%;">
                        <tr>
                            <td>

                                <strong>Nama Rekening / E-Wallet : {{$payment->account_name}}</strong><br>
                                <strong>Nomber Rekening / E-Wallet : {{$payment->account_number}}</strong><br>
                                <strong>Nominal : {{$payment->account_number}}</strong><br>

                            </td>
                            <td style="text-align: right;">
                                Customer Name<br>
                                <strong>{{$payment_username}}</strong><br>
                                <strong>{{$payment_email}}</strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <table style="width: 100%; align-content: center">
                <thead>
                    <tr  style="background: #eee; border-bottom: 1px solid #ddd; font-weight: bold;">
                        <td style="padding: 5px;">
                            Nama Menu
                        </td>
                        <td style="padding: 5px; text-align: center;">
                            Harga
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="item" style="border-bottom: 1px solid #eee;">
                    @foreach($menus as $menu)
                        <td >
                            {{ $menu['name'] }}
                        </td>
                        <td >
                            $Rp. {{ number_format($menu['price'], 0, ',', '.') }}
                        </td>
                        @endforeach
                    </tr>
                </tbody>

            </table>

            <tr class="total" style="margin-top: 200px">
                <td style="padding: 5px;"></td>
                <td style="padding: 5px; text-align: right; border-top: 2px solid #eee; font-weight: bold;">
                   Total: Rp. {{ number_format($total_price, 0, ',', '.') }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; line-height: 24px;">
    <div style="max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); font-size: 16px;">
        <table cellpadding="0" cellspacing="0" style="width: 100%; line-height: inherit; text-align: left; border-collapse: collapse;">
            <tr class="top">
                <td colspan="2" style="padding-bottom: 20px;">
                    <table style="width: 100%;">
                        <tr>
                            <td class="title" style="font-size: 45px;">
                                <p>Event Informatics 24</p>
                            </td>
                        </tr><tr>

                            <td style="text-align: right; padding-top: 5px">
                                Invoice #{{$code_payment}}<br>
                                Created order : {{$payment->created_at}}<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2" style="padding-bottom: 40px;">
                    <table style="width: 100%;">
                        <tr>
                            <td>

                                <strong>Nama Rekening / E-Wallet : {{$payment->account_name}}</strong><br>
                                <strong>Nomber Rekening / E-Wallet : {{$payment->account_number}}</strong><br>
                                <strong>Nominal : {{$payment->account_number}}</strong><br>

                            </td>
                            <td style="text-align: right;">
                                Customer Name<br>
                                <strong>{{$payment_username}}</strong><br>
                                <strong>{{$payment_email}}</strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading" style="text-align: center;background: #eee; border-bottom: 1px solid #ddd; font-weight: bold;">
                <td style="padding: 5px;">
                    Item
                </td>
                <td style="padding: 5px; ">
                    Price
                </td>
            </tr>
            @foreach($menus as $menu)
            <tr class="item" style="text-align: center;border-bottom: 1px solid #eee;">
                <td style="padding: 5px;">
                    {{ $menu['name'] }}
                </td>
                <td style="padding: 5px; ">
                    Rp. {{ number_format($menu['price'], 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
            <tr class="total">
                <td style="padding: 5px;"></td>
                <td style="padding: 5px; text-align: right; border-top: 2px solid #eee; font-weight: bold;">
                   Total: Rp. {{ number_format($total_price, 0, ',', '.') }}
                </td>
            </tr>
        </table>
        <br>
        <p style="padding: 5px; margin-top: 20px; border-top: 1px solid #eee; font-size: 14px;">
            <strong>Note:</strong> Thank you for your business. Please make the payment by the due date to avoid any late fees. If you have any questions regarding this invoice, feel free to contact us.
        </p>
        <p style="padding: 5px; font-size: 14px;">
            Best regards,<br>
            Admin and team
        </p>
    </div>
</body>
</html>
