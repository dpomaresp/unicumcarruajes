<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf=8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link href="/styles/css/style.css" rel="stylesheet">
    <link href="/styles/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid vcenter">
	    <div class="row">
	        <div>
    	        <img class="img-responsive center-block" src="/styles/images/cms_title.png" alt="Titulo CMS" />
    	    </div>
            <?php echo validation_errors(); ?>
    
          	<?
          		$attributes_form = array('class' => 'form-signin', 'role' => 'form');
          		echo form_open('login', $attributes_form);
    
          		$attributes_user = array(
          			'id' => 'user_name',
                    'name' => 'user_name',
          			'type' => 'text',
          			'class' => 'form-control',
          			'placeholder' => 'Usuario',
    			    'autofocus' => TRUE,
                    'required' => TRUE,
                    'value' => set_value('user_name')
          		);
    
          		echo form_input($attributes_user);
    
          		$attributes_password = array(
          			'id' => 'user_password',
                    'name' => 'user_password',
          			'type' => 'password',
          			'class' => 'form-control',
          			'placeholder' => 'Password',
                    'required' => TRUE,
                    'value' => set_value('user_password')
          		);
          		
          		echo form_input($attributes_password);
    
          		$attributes_button = array(
          			'type' => 'submit',
          			'class' => 'btn btn-lg btn-primary btn-block',
          			'content' => 'Entrar'
          		);
          		echo form_button($attributes_button);
          		echo form_close();
          	?>
        </div>
    </div>
	
	<script type="text/javascript" src="/scripts/jquery-1.4.1.min.js"></script>
	<script src="/styles/js/bootstrap.min.js"></script>
</body>
</html>