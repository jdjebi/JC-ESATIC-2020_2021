@error('content')
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
     Publication vide
    </div>
@enderror

<hr>

<div id="scrolling-cotainer">
  <div class="quill-box">
  <form method="post" action="{{ route("backend.post.create.libre") }}">
      @csrf
      <input type="hidden" name="content">
      <div id="editor" class="bg-white ui-widget-content border-bottom"></div>
      <div class="pt-3">
        <div class="d-flex align-items justify-content-between mb-4">
          <div class="" style="padding-top: 8px;">
            <span class="post-badge post-badge-info">INFORMATION</span>
          </div>
          <button class="btn btn-sm btn-primary" type="submit" name="register-post">Enregistrer</button>
        </div>
      </div>
    </form>
  </div>
</div>


@section('scripts')
@parent
<script src="{{ asset('asset/lib/quill/quill.js') }}"></script>

<script>
var toolbarOptions = [];

var options = {
  placeholder: 'Commencez la redaction...',
  theme: 'bubble',
  scrollingContainer: '#scrolling-container', 
  modules: {
   toolbar: toolbarOptions
 }
};

var editor = new Quill('#editor', options);

$('form').on('submit',function(e){
  e.preventDefault();
  var form = e.target
  var content = JSON.stringify(editor.getContents());
  var length = editor.getLength();
  var text = editor.getText(0, length);
  $('input[name=content]').first().val(text);
  form.submit();
});
</script>

@endsection
