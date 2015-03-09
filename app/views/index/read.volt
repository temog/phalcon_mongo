{{ partial('header') }}
{{ partial('navi') }}

<div class="container">

	<h1>Read Action</h1>

	{{ flash.output() }}

	{% for test in tests %}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">{{ test.name }}</h3>
		</div>
		<div class="panel-body">
			<p>email: {{ test.email }}</p>
			<p>nickname: {{ test.nickname }}</p>
			{{ link_to('index/update/' ~ test._id, '編集', 'class':'btn btn-info') }}
			{{ link_to('index/delete/' ~ test._id, '削除', 'class':'btn btn-danger') }}
		</div>
	</div>
	{% endfor %}

	{% if ! tests %}
	<div class="alert alert-warning">Data not found</div>
	{% endif %}

</div>

{{ partial('footer') }}
