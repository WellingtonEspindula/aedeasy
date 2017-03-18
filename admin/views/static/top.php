<?php
ini_set('display_errors', 1);

function redirect($url) {
    echo '<script language="javascript">';
    echo '  location.href = "' . $url . '";';
    echo '</script>';
}

function reload() {
    echo '<script language="javascript">';
    echo '  location.reload(true)';
    echo '</script>';
}

session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: ../../login.php");
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AedesEasy</title>


        <!-- Custom styling plus plugins -->
        <link href="../../assets/css/custom.css" rel="stylesheet">
        <link href="../../assets/css/icheck/flat/green.css" rel="stylesheet">
        <link href="../../assets/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">


        <!-- Bootstrap core CSS -->

        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/global.css" rel="stylesheet">

        <link href="../../assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../assets/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="../../assets/css/custom.css" rel="stylesheet">
        <link href="../../assets/css/icheck/flat/green.css" rel="stylesheet">


        <script src="../../assets/js/jquery.min.js"></script>
        <link href="../../assets/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="../../assets/fonts/css/font-awesome.css" rel="stylesheet">
        <link href="../../assets/css/editor/index.css" rel="stylesheet">
        <link href="../../assets/css/select/select2.min.css" rel="stylesheet">

        <script src="../../assets/js/tags/jquery.tagsinput.min.js"></script>
        <script src="../../assets/js/select/select2.full.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/editor/bootstrap-wysiwyg.js"></script>
        <script src="../../assets/js/editor/external/jquery.hotkeys.js"></script>
        <script src="../../assets/js/editor/external/google-code-prettify/prettify.js"></script>


        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $(".select2_multiple").select2({
                    allowClear: true
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $('.xcxc').click(function () {
                    $('#descr').val($('#editor').html());
                });
            });

            $(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                        'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                        'Times New Roman', 'Verdana'
                    ],
                            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                        return false;
                    })
                            .change(function () {
                                $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                            })
                            .keydown('esc', function () {
                                this.value = '';
                                $(this).change();
                            });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                                target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();
                        $('#voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('#voiceBtn').hide();
                    }
                }
                ;

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                }
                ;
                initToolbarBootstrapBindings();
                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });
                window.prettyPrint && prettyPrint();
            });
        </script>
        <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>


    <body class="nav-md pace-running">
        <div class="pace pace-active">
            <div class="pace-progress" style="transform: translate3d(99.8065%, 0px, 0px);" data-progress-text="99%"
                 data-progress="99">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>

        <div class="container body">


            <div class="main_container">
                <div class = "col-md-3 left_col">
                    <div tabindex = "5000" class = "left_col scroll-view"
                         style = "outline: invert; cursor: url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize; overflow-x: hidden; overflow-y: hidden;">

                        <div class = "navbar nav_title" style = "border: 0;">
                            <a class = "site_title"><i class = "fa fa-book"></i> <span>AedesEasy</span></a>
                        </div>
                        <div class = "clearfix"></div>
                        <!--sidebar menu -->
                        <div class = "main_menu_side hidden-print main_menu" id = "sidebar-menu">

                            <div class = "menu_section">

                                <ul class = "nav side-menu">
                                    <li><a><i class = "fa fa-user"></i> Dispositivos <span
                                                class = "fa fa-chevron-down"></span></a>
                                        <ul class = "nav child_menu">
                                            <li><a href = "../dispositivos/index.php">Listar</a>
                                            </li>
                                            <li><a href = "../dispositivos/inserir.php">Cadastrar</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class = "fa fa-users"></i> Usuários <span class = "fa fa-chevron-down"></span></a>
                                        <ul class = "nav child_menu">
                                            <li><a href = "../users/index.php">Listar</a>
                                            </li>
                                            <li><a href = "../users/inserir.php">Cadastrar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!--/sidebar menu -->

                    </div>
                </div>

                <!--top navigation -->
                <div class = "top_nav">

                    <div class = "nav_menu">
                        <nav role = "navigation">
                            <div class = "nav toggle">
                                <a id = "menu_toggle"><i class = "fa fa-bars"></i></a>
                            </div>
                            <ul class = "nav navbar-nav navbar-right">
                                <li><a href = "../../logout.php"><i style = "font-size: 20px;" class = "fa fa-sign-out pull-right"></i></a>
                                </li>
                            </ul>


                        </nav>
                    </div>

                </div>
                <!--/top navigation -->

                <!--page content -->
                <div class="right_col" role = "main" style = "min-height: 691px;">
                    <div class = "conteudo">
