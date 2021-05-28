<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    var usuariosTable = $('#usuarios_data').bootgrid({
        ajax:true,
        rowSelect: true,
        url:"<?php echo base_url('bootgrid/fetch_data'); ?>",
        formatters:{
            "commands":function(column, row)
            {
                return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id+"'>Edit</button>" + "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"'>Delete</button>";
            }
        }
    });
    
    $('#add_button').click(function(){
        $('#usuarios_form')[0].reset();
        $('.modal-title').text("Add Usuario");
        $('#action').val("Add");
        $('#operation').val("Add");
    });

    $(document).on('submit', '#usuarios_form', function(event){
        event.preventDefault();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var usuario = $('#usuario').val();
        var password = $('#password').val();
        var perfil = $('#perfil').val(); 
        var form_data = $(this).serialize();
        if(nombre != '' && apellido != '' &&  email != '' &&  usuario != '' &&  password != '' &&  perfil != '')
        {
            $.ajax({
                url:"<?php echo base_url(); ?>bootgrid/action",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    alert(data);
                    $('#usuarios_form')[0].reset();
                    $('#usuariosModal').modal('hide');
                    $('#usuarios_data').bootgrid('reload');
                }
            });
        }
        else
        {
            alert("All Fields are Required");
        }
    });

    $(document).on("loaded.rs.jquery.bootgrid", function(){
        usuariosTable.find('.update').on('click', function(event){
            var id = $(this).data('row-id');
            $.ajax({
                url:"<?php echo base_url(); ?>bootgrid/fetch_single_data",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                {
                    $('#usuariosModal').modal('show');
                    $('#nombre').val(data.nombre);
                    $('#apellido').val(data.apellido);
                    $('#email').val(data.email);
                    $('#usuario').val(data.usuario);
                    $('#password').val(data.password);
                    $('#perfil').val(data.perfil);
                    $('.modal-title').text("Editar Usuarios");
                    $('#usuario_id').val(id);
                    $('#action').val('Edit');
                    $('#operation').val('Edit');
                }
            });
        });
        
        
        usuariosTable.find('.delete').on('click', function(event){
            if(confirm("Are you sure you want to delete this?"))
            {
                var id = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>bootgrid/delete_data",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#usuarios_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                return false;
            }
        });
    }); 
    
});
</script>