@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Uh Oh!</strong>
  @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
  @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
