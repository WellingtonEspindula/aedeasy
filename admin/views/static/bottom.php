</div>

<!-- footer content -->
<footer>
    <div class="copyright-info">
        <p class="pull-right">Desenvolvido por Wildcats
        </p>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->

</div>
<!-- /page content -->
</div>

</div>

<div class="custom-notifications dsp_none" id="custom_notifications">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div class="tabbed_notifications" id="notif-group"></div>
</div>

<script src="../../assets/js/bootstrap.min.js"></script>

<!-- bootstrap progress js -->
<script src="../../assets/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="../../assets/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="../../assets/js/icheck/icheck.min.js"></script>

<script src="../../assets/js/custom.js"></script>

<script src="../../assets/js/validator/validator.js"></script>

<!-- pace -->
<script src="../../assets/js/pace/pace.min.js"></script>

<script type="text/javascript">
    function alterar(id) {
        location.href = "inserir.php?id=" + id;
    }

    function vermais(id) {
        location.href = "vermais.php?id=" + id;
    }

    function excluir(id) {
        var asc = confirm("Você tem certeza que deseja excluir esse item?");
        if (asc) {
            location.href = "excluir.php?id=" + id;
        } else {
            alert("Você cancelou a operação!");
        }
    }

    function excluirTudo() {
        var asc = confirm("Você tem certeza que deseja excluir todos os item?");
        if (asc) {
            location.href = "excluirAll.php";
        } else {
            alert("Você cancelou a operação!");
        }
    }
</script>


<div class="nicescroll-rails" id="ascrail2000"
     style="left: 225px; top: 0px; width: 5px; height: 693px; position: absolute; z-index: auto; cursor: url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize; opacity: 0;">
    <div
        style="border-radius: 5px; border: 0px solid rgb(255, 255, 255); border-image: none; top: 0px; width: 5px; height: 692px; position: relative; float: right; background-clip: padding-box; background-color: rgba(42, 63, 84, 0.35);"></div>
</div>
<div class="nicescroll-rails" id="ascrail2000-hr"
     style="left: 0px; top: 688px; width: 225px; height: 5px; display: none; position: absolute; z-index: auto; opacity: 0;">
    <div
        style="border-radius: 5px; border: 0px solid rgb(255, 255, 255); border-image: none; top: 0px; width: 230px; height: 5px; position: relative; background-clip: padding-box; background-color: rgba(42, 63, 84, 0.35);">

    </div>
</div>
</body>
</html>
