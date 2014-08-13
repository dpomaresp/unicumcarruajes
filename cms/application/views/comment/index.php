<div class="container-fluid">
    <div class="row">
       <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="">Comentarios</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">Noticias</a></li>
            <li><a href="#">Documentos</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Usuarios</h1>

          <div class="row placeholders">
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Id. noticia</th>
                  <th class="text-center">Autor</th>
                  <th class="text-center">Comentario</th>
                  <th class="text-center">Fecha</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
            <?php
                foreach($comments_list as $comment){
                    echo '<tr>';
                      echo '<td class="text-center">'.$comment->comment_id.'</td>';
                      echo '<td class="text-center">'.$comment->new_id.'</td>';
                      echo '<td class="text-center">'.$comment->user_name.'</td>';
                      echo '<td class="text-center">'.$comment->comment_description.'</td>';
                      echo '<td class="text-center">'.$comment->comment_date.'</td>';
                      echo '<td class="text-center"><a href="'.$this->config->item('base_url').'comment/view/'.$user->comment_id.'" class="btn btn-goto-web navbar-btn navbar-left">
                            <span class="glyphicon glyphicon-view"></span>  Ver
                            </a>
                            <a class="delete_btn" href="'.$this->config->item('base_url').'comment/delete/'.$user->comment_id.'" class="btn navbar-btn navbar-left">
                            <span class="glyphicon glyphicon-remove"></span>  Eliminar
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

<script type="text/javascript" src="/scripts/jquery-1.4.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete_btn').on("click", function(e){
            if(!confirm('¿Estás seguro de que quieres eliminar el comentario?')){
                e.preventDefault();
            }
        });
    });
</script>