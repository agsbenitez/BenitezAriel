<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
	<p>pondre un grid con la data</p>

    <table id="list"><tr><td></td></tr></table> 
    <div id="pager"></div>
</section>


<script type="text/javascript">
$(function () {
    $("#list").jqGrid({
        url: '<?=$base_url('usuarios/listJson');?>',
        datatype: "json",
        mtype: "post",
        colNames: ["ID", "Nombre", "Apllido", "Email", "Usuario", "Tipo"],
        colModel: [
            { name: "id", width: 55 },
            { name: "nombre", width: 90 },
            { name: "apelldido", width: 80, align: "right" },
            { name: "email", width: 80, align: "right" },
            { name: "usuario", width: 80, align: "right" },
            { name: "perfil_id", width: 150, sortable: false }
        ],
        pager: "#pager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "id",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: "Mi Grilla"
    }); 
}); 
</script>