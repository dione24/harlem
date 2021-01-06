<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $titles; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <?= $content; ?>
    <script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>