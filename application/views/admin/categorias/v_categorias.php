
<script>
$(document).ready( function () {
    $('#usuarios').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        }   
    });
    });
</script>
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $pagina; ?></h1>
          </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?php echo base_url(); ?>adm_categorias/nova_categoria" class="btn btn-info">
                    Nova categoria
                </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">

            <table id="usuarios" class="table table-bordered ">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                   <td>Imagem</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $row): ?>
                <tr>
                    <td><?php echo $row->id_categoria; ?></td>

                    <td><?php echo $row->nome_categoria; ?></td>
                    <td><img src="<?php echo base_url(); ?><?php echo $row->imagem_categoria; ?>" class="thumb-list" /></td>
                    <td>
                       <a class="btn btn-success" href="adm_categorias/edit/<?php echo $row->id_categoria; ?>" >Editar</a>
                        <a href="javascript:void(0)" onclick="delete_categoria(<?php echo $row->id_categoria; ?>)" class="btn btn-danger" >Apagar</a>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
                  </div>
            </div>
        </div>
</div>


<script>
    function reload_table()
{
    location.reload();
}


  function delete_categoria(id)
{
    if(confirm('Tem certeza que deseja excluir esta categoria?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('adm_categorias/ajax_delete/')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
               // $('#modal_form').modal('hide');
               alert('Apagado com sucesso');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Erro ao deletar');
            }
        });

    }
}
</script><?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
