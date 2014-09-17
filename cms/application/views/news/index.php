<div class="container-fluid">
    <div class="row">
       <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <li class="active"><a href="">Noticias</a></li>
            <li><a href="#">Documentos</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Noticias</h1>

          <?php if(validation_errors()) { ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
          </div>
          <?php } ?>


          <?php if($this->session->flashdata('info_message')) { ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('info_message'); ?>
          </div>
          <?php } ?>
            
          <div class="row placeholders">
            <a class="btn btn-create pull-right col-md-offset-10 col-md-2" href="<?php echo $this->config->item('base_url'); ?>news/create/">
                <button type="button" class="btn btn-success glyphicon glyphicon-plus"> Crear</button>
            </a>
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center"><? echo utf8_decode('Título'); ?></th>
                  <th class="text-center">Link</th>
                  <th class="text-center"><? echo utf8_decode('Fecha creación'); ?></th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach($news_list as $new){
                        $max = $this->config->item('max_chars_td');
                        echo '<tr>';
                        echo '<td class="text-center col-md-1">'.$new->new_id.'</td>';
                        echo '<td class="text-center col-md-5">'.utf8_decode($new->new_title).'</td>';
                        
                        if(!empty($new->new_external_link)){
                            echo '<td class="text-center col-md-1">Si</td>';
                        }
                        else{
                            echo '<td class="text-center col-md-1">No</td>';
                        }
                        
                        echo '<td class="text-center col-md-2">'.date("d-m-Y", strtotime($new->new_creation_date)).'</td>';
                        echo '<td class="text-center col-md-3"><a class="link_button" href="'.$this->config->item('base_url').'news/edit/'.$new->new_id.'">
                                <button type="button" class="btn btn-primary glyphicon glyphicon-edit"> Editar</button>
                              </a>
                              <a class="link_button delete_new" href="'.$this->config->item('base_url').'news/delete/'.$new->new_id.'">
                                <button type="button" class="btn btn-danger glyphicon glyphicon-trash"> Borrar</button>
                              </a>
                            </td>';
                        echo '</tr>';
                    }
                ?>
              </tbody>
              </table>
            </div>
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
        $('.delete_new').on('click', function(e){
            if(!confirm('¿Estás seguro de que quieres eliminar la noticia?')){
                e.preventDefault();
            }
        });
    });
</script>