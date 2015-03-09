{{ partial('header') }}
{{ partial('navi') }}

<div class="container">

	<h1>Update Action</h1>

	{{ flash.output() }}

	<div class="well">
	{{ form(null, 'method':'post') }}

	<div class="form-group">
		<label>name</label>
		{{ text_field('name', 'class':'form-control', 'value':test.name) }}
	</div>

	<div class="form-group">
		<label>email</label>
		{{ email_field('email', 'class':'form-control', 'value':test.email) }}
	</div>

	<div class="form-group">
		<label>nickname</label>
		{{ text_field('nickname', 'class':'form-control', 'value':test.nickname) }}
	</div>

	{{ submit_button('Update', 'class':'btn btn-primary') }}


	{{ end_form() }}
	</div>

</div>

{{ partial('footer') }}
