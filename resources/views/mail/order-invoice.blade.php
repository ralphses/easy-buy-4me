<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
</head>

<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">

    <!-- Hero Start -->
    <div style="margin-top: 50px;">
        <table cellpadding="0" cellspacing="0"
            style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
            <thead>
                <tr
                    style="background-color: #980f08; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
                    <th scope="col"><img src="assets/images/logo-light.png" alt=""></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <table cellpadding="0" cellspacing="0" style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;">Invoice No. :</td>
                                    <td style="color: #8492a6;">#land45845621</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;">Name :</td>
                                    <td style="color: #8492a6;">Harry Patel</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;">Address :</td>
                                    <td style="color: #8492a6;">1962 Pike Street, CA 92123</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;">{{ $order->status }}</td>
                                    <td style="color: #8492a6;">March, 25 2021</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 24px;">
                        <div
                            style="display: block; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 6px; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                            <table cellpadding="0" cellspacing="0">
                                <thead class="bg-gray">
                                    <tr>
                                        <th scope="col"
                                            style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">
                                            No.</th>
                                        <th scope="col"
                                            style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px; width: 200px;">
                                            Item</th>
                                        <th scope="col"
                                            style="text-align: end; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">
                                            Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"
                                            style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">1
                                        </th>
                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">
                                            Techwind Template</td>
                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">$
                                            5200</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">2
                                        </th>
                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">
                                            Customization</td>
                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">$
                                            3660</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">3
                                        </th>
                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">
                                            Development</td>
                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">$
                                            13740</td>
                                    </tr>

                                    <tr
                                        style="background-color: rgba(77, 69, 230, 0.05); color: #980f08; overflow-x: hidden;">
                                        <th scope="row"
                                            style="text-align: left; padding: 12px; border-top: 1px solid rgba(77, 69, 230, 0.05);">
                                            Total</th>
                                        <td colspan="2"
                                            style="text-align: end; font-weight: 700; font-size: 18px; padding: 12px; border-top: 1px solid rgba(77, 69, 230, 0.05);">
                                            $ 22600</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Techwind.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Hero End -->
</body>

</html>
