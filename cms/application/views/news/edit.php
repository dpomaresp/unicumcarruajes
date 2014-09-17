<div class="container-fluid">
    <div class="row">
       <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <li class="active"><a href="<?php echo base_url('news'); ?>">Noticias</a></li>
            <li><a href="#">Documentos</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Editar noticia</h1>
            
          <div class="row placeholders">
            <form role="form" action="cms/news/edit">
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" value="<?php echo set_value('new->new_title'); ?>">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" rows="3"><?php echo set_value('new->new_description'); ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="external_link">Link externo</label>
                    <input type="text" class="form-control" id="external_link" value="<?php echo set_value('new->new_external_link'); ?>">
                </div>
                <div class="form-group">
                    <label for="creation_date">Fecha de creación</label>
                    <input type="text" class="form-control" id="creation_date" value="<?php echo set_value('new->new_creation_date'); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>    
        </div>
    </div>
    <div class="row">
        <div id="footer" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
            <p class="text-right">Copyright &copy; 2014 - dpe</p>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function() {
        
    });
</script>