<!DOCTYPE html>
<html>

<style type="text/css" media="print">
@page {
    size: auto;
    /* auto is the initial value */
    margin: 0mm;
    /* this affects the margin in the printer settings */

}
</style>

<head>
    <meta charset="utf-8">
    <title><?= $titles; ?></title>
    <link rel="stylesheet" type="text/css" href="/assets/bower_components/invoice.css">
    <script src="https://kit.fontawesome.com/9edf9d6f4e.js" crossorigin="anonymous"></script>
</head>

<body onload="window.print();"><br><br>
    <img src="/assets/bower_components/harlem_logo.png" class="logo-top">
    <br><br>
    <div class="entete">
        <div>
            <p style="font-size: 18px;border-bottom: 2px solid rgb(236,31,38);"><i class="far fa-file-alt"></i> FACTURE
                DE</p>
        </div>
        <div>
            <?= $content; ?>
        </div>
        <br><br><br>
        <div class="footer">
            <div class="footer-info">
                <div class="footer-cell">
                    <span class="icone-f">
                        <i class="fa fa-phone-alt"></i>
                    </span>
                    <span class="data-f">
                        <p>+223 20 80 25 99</p>
                        <p>+223 82 71 06 57</p>
                    </span>
                </div>
                <div class="footer-cell">
                    <span class="icone-f">
                        <i class="far fa-envelope"></i>
                    </span>
                    <span class="data-f">
                        <p><i class="fa fa-mail"> </i>info@harlemservices.com</p>
                        <p>www.harlemservices.com</p>
                    </span>
                </div>
                <div class="footer-cell">
                    <span class="icone-f">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <span class="data-f">
                        <p>Sur la route de Niamana</p>
                        <p>en face du stade de 26 mars</p>
                    </span>
                </div>
            </div>
        </div>
</body>

</html>