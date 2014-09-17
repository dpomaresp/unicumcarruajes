<div class="container-fluid">
    <div class="row">
       <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="">Usuarios</a></li>
          </ul>
          <ul class="nav nav-sidebar">
          <li><a href="#">Noticias</a></li>
            <li><a href="#">Documentos</a></li>
            <li><a href="#">Export</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
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
                  <th class="text-center">Usuario</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
            <?php
                foreach($users_list as $user){
                    echo '<tr>';
                      echo '<td class="text-center">'.$user->user_id.'</td>';
                      echo '<td class="text-center">'.$user->user_name.'</td>';
                      echo '<td class="text-center">'.$user->user_email.'</td>';
                      echo '<td class="text-center">'.$user->active.'</td>';
                      echo '<td class="text-center"><a href="'.$this->config->item('base_url').'user/edit/'.$user->user_id.'" class="btn btn-goto-web navbar-btn navbar-left">
                            <span class="glyphicon glyphicon-edit"></span>  Editar
                            </a>
                            <a class="delete_btn" href="'.$this->config->item('base_url').'user/delete/'.$user->user_id.'" class="btn navbar-btn navbar-left">
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

<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete_btn').on("click", function(e){
            if(!confirm('¿Estás seguro de que quieres eliminar el usuario?')){
                e.preventDefault();
            }
        });
    });
</script>
