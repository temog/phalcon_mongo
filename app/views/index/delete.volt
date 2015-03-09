{{ partial('header') }}
{{ partial('navi') }}

<div class="container">

	<h1>Delete Action</h1>

	{{ flash.output() }}

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">{{ test.name }}</h3>
		</div>
		<div class="panel-body">
			<p>email: {{ test.email }}</p>
			<p>nickname: {{ test.nickname }}</p>
		</div>
	</div>

	<div class="alert alert-warning">
		このアカウントを削除

		{{ form(null, 'method':'post') }}
		{{ submit_button('Delete', 'class':'btn btn-danger') }}
		{{ end_form() }}
	</div>

</div>

{{ partial('footer') }}
