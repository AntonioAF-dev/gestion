<?php
session_start();
include("../../config/conexion.php");

$sql = "SELECT fp.*, u.Nombre as autor 
        FROM foro_posts fp 
        JOIN usuarios u ON fp.usuario_id = u.idusuarios 
        ORDER BY fp.fecha_creacion DESC";
$result = $conexion->query($sql);
?>

<div class="page-header">
    <h1>Foros Publicados</h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <button class="btn btn-primary btn-white btn-bold" data-toggle="modal" data-target="#nuevoTemaModal">
                    <i class="ace-icon fa fa-plus bigger-110 blue"></i>
                    Nuevo Tema
                </button>
            </div>
        </div>

        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-sm-6">
                        <div class="widget-box widget-color-blue">
                            <div class="widget-header">
                                <h5 class="widget-title lighter">
                                    <i class="ace-icon fa fa-comment"></i>
                                    <?php echo htmlspecialchars($row['titulo']); ?>
                                </h5>
                                <div class="widget-toolbar">
                                    <?php echo date('d/m/Y H:i', strtotime($row['fecha_creacion'])); ?>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="post-author">
                                        <i class="ace-icon fa fa-user"></i>
                                        <?php echo htmlspecialchars($row['autor']); ?>
                                    </div>
                                    <div class="post-content">
                                        <?php echo nl2br(htmlspecialchars($row['contenido'])); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-xs-12">
                    <div class="alert alert-info">
                        <i class="ace-icon fa fa-info-circle"></i>
                        No hay temas publicados aún.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal para nuevo tema -->
<div id="nuevoTemaModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forumForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nuevo Tema</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Contenido</label>
                        <textarea name="contenido" class="form-control" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ace-icon fa fa-check"></i>
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#forumForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'forum_process.php',
            data: $(this).serialize(),
            success: function(response) {
                if(response === 'success') {
                    $('#nuevoTemaModal').modal('hide');
                    location.reload();
                } else {
                    alert('Error al publicar el tema');
                }
            },
            error: function() {
                alert('Error al publicar el tema');
            }
        });
    });
});
</script>